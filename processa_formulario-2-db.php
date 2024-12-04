<?php
session_start();

// Ativar exibição de erros (remover em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("novo/src/PHPMailer.php");
require_once("novo/src/SMTP.php");
require_once("novo/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Função para registrar logs
function log_error($message) {
    $log_file = 'error_log.txt';
    $current_time = date('Y-m-d H:i:s');
    $message = "[{$current_time}] ERROR: {$message}\n";
    file_put_contents($log_file, $message, FILE_APPEND);
}

// Conexão ao primeiro banco
$servidor1 = "162.214.145.189";
$usuario1 = "empre028_felipe";
$senha1 = "Iuh86gwt--@Z123"; 
$banco1 = "empre028_futgrass";
$conexao1 = new mysqli($servidor1, $usuario1, $senha1, $banco1);

// Conexão ao segundo banco
$servidor2 = "localhost";
$usuario2 = "futgras1_futgras";
$senha2 = "uRXA1r9Z7pv~Cw5";
$banco2 = "futgras1_futgrass";
$conexao2 = new mysqli($servidor2, $usuario2, $senha2, $banco2);

// Verificação da conexão
if ($conexao1->connect_error) {
    log_error("Erro na conexão com o banco 1: " . $conexao1->connect_error);
    die("Erro na conexão com o banco 1.");
}
if ($conexao2->connect_error) {
    log_error("Erro na conexão com o banco 2: " . $conexao2->connect_error);
    die("Erro na conexão com o banco 2.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function sanitizar($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    $nome = sanitizar($_POST['nome'] ?? '');
    $email = sanitizar($_POST['email'] ?? '');
    $ddd = sanitizar($_POST['ddd'] ?? '');
    $telefone = sanitizar($_POST['telefone'] ?? '');
    $cidade = sanitizar($_POST['cidade'] ?? '');
    $estado = sanitizar($_POST['estado'] ?? '');
    $descricao = sanitizar($_POST['descricao'] ?? '');
    $honeypot = sanitizar($_POST['honeypot'] ?? '');
    $form_loaded_at = intval($_POST['form_loaded_at'] ?? 0);

    if (!empty($honeypot)) {
        log_error("Honeypot detectado. Submissão bloqueada.");
        header('Location: https://futgrass.com.br/sucesso');
        exit();
    }

    $current_time = round(microtime(true) * 1000);
    $time_diff = ($current_time - $form_loaded_at) / 1000;

    if ($form_loaded_at == 0 || $time_diff < 5) {
        log_error("Submissão suspeita de bot. Tempo de submissão muito rápido.");
        header('Location: https://futgrass.com.br/sucesso');
        exit();
    }

    if (empty($nome) || empty($email) || empty($ddd) || empty($telefone) || empty($cidade) || empty($estado) || empty($descricao)) {
        log_error("Campos obrigatórios ausentes.");
        header('Location: https://futgrass.com.br/error');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        log_error("E-mail inválido: $email");
        header('Location: https://futgrass.com.br/error');
        exit();
    }

    $telefone_completo = "({$ddd}) {$telefone}";

    $sql1 = "INSERT INTO orcamentos (nome, email, telefone, cidade, estado, descricao, data_envio) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $sql2 = "INSERT INTO orcamentos (nome, email, telefone, cidade, estado, descricao, data_envio) VALUES (?, ?, ?, ?, ?, ?, NOW())";

    $stmt1 = $conexao1->prepare($sql1);
    $stmt2 = $conexao2->prepare($sql2);

    if (!$stmt1 || !$stmt2) {
        log_error("Erro ao preparar consulta SQL.");
        die("Erro ao preparar consulta SQL.");
    }

    $stmt1->bind_param("ssssss", $nome, $email, $telefone_completo, $cidade, $estado, $descricao);
    $stmt2->bind_param("ssssss", $nome, $email, $telefone_completo, $cidade, $estado, $descricao);

    if ($stmt1->execute() && $stmt2->execute()) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.embrafer.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'futgrass@futgrass.com.br';
            $mail->Password = 'Futgrass80802!';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];

            $mail->setFrom('futgrass@futgrass.com.br', 'FUTGRASS');
            $mail->addAddress('futgrass@futgrass.com.br', 'FUTGRASS');
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Novo Contato - Site FUTGRASS Empresarial';
            $mail->Body = "
                <html>
                <body>
                    <h3>Contato recebido pelo site</h3>
                    <p><strong>Nome:</strong> $nome</p>
                    <p><strong>E-mail:</strong> $email</p>
                    <p><strong>Telefone:</strong> $telefone_completo</p>
                    <p><strong>Cidade:</strong> $cidade</p>
                    <p><strong>Estado:</strong> $estado</p>
                    <p><strong>Descrição:</strong> $descricao</p>
                    <p><strong>Data:</strong> " . date('d/m/Y H:i:s') . "</p>
                </body>
                </html>
            ";

            $mail->send();
            log_error("E-mail enviado com sucesso.");
            header('Location: https://futgrass.com.br/sucesso');
            exit();
        } catch (Exception $e) {
            log_error("Erro ao enviar e-mail: " . $e->getMessage());
            header('Location: https://futgrass.com.br/error');
            exit();
        }
    } else {
        log_error("Erro ao inserir dados no banco.");
        header('Location: https://futgrass.com.br/error');
        exit();
    }

    $stmt1->close();
    $stmt2->close();
    $conexao1->close();
    $conexao2->close();
} else {
    header('Location: https://futgrass.com.br/error');
    exit();
}
?>
