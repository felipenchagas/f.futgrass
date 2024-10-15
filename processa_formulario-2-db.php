<?php
session_start();

// Ativar exibição de erros (remover em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclui o PHPMailer
require_once("novo/src/PHPMailer.php");
require_once("novo/src/SMTP.php");
require_once("novo/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Função para detectar requisição AJAX
function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

// Função para registrar logs
function log_error($message) {
    $log_file = 'error_log.txt';
    $current_time = date('Y-m-d H:i:s');
    $message = "[{$current_time}] ERROR: {$message}\n";
    file_put_contents($log_file, $message, FILE_APPEND);
}

// Conectar ao primeiro banco de dados
$servidor1 = "162.214.145.189";
$usuario1 = "empre028_felipe";
$senha1 = "Iuh86gwt--@Z123"; 
$banco1 = "empre028_futgrass";
$conexao1 = new mysqli($servidor1, $usuario1, $senha1, $banco1);

// Conectar ao segundo banco de dados (Locaweb)
$servidor2 = "localhost";
$usuario2 = "futgras1_futgras";
$senha2 = "uRXA1r9Z7pv~Cw5";
$banco2 = "futgras1_futgrass";
$conexao2 = new mysqli($servidor2, $usuario2, $senha2, $banco2);

// Verifica se a conexão foi bem-sucedida com ambos os bancos
if ($conexao1->connect_error) {
    log_error("Erro na conexão com o banco 1: " . $conexao1->connect_error);
    die("Erro na conexão com o banco 1.");
}

if ($conexao2->connect_error) {
    log_error("Erro na conexão com o banco 2: " . $conexao2->connect_error);
    die("Erro na conexão com o banco 2.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Função para sanitizar os dados de entrada
    function sanitizar($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    // Captura e sanitiza os dados do formulário
    $nome = sanitizar(isset($_POST['nome']) ? $_POST['nome'] : '');
    $email = sanitizar(isset($_POST['email']) ? $_POST['email'] : '');
    $ddd = sanitizar(isset($_POST['ddd']) ? $_POST['ddd'] : '');
    $telefone = sanitizar(isset($_POST['telefone']) ? $_POST['telefone'] : '');
    $cidade = sanitizar(isset($_POST['cidade']) ? $_POST['cidade'] : '');
    $estado = sanitizar(isset($_POST['estado']) ? $_POST['estado'] : '');
    $descricao = sanitizar(isset($_POST['descricao']) ? $_POST['descricao'] : '');
    $honeypot = sanitizar(isset($_POST['honeypot']) ? $_POST['honeypot'] : '');
    $form_loaded_at = isset($_POST['form_loaded_at']) ? intval($_POST['form_loaded_at']) : 0;

    log_error("Dados recebidos do formulário: Nome=$nome, Email=$email, Telefone=($ddd) $telefone, Cidade=$cidade, Estado=$estado, Descrição=$descricao");

    // Verificação do Honeypot
    if (!empty($honeypot)) {
        log_error("Honeypot detectado. Submissão bloqueada.");
        header('Location: https://futgrass.com.br/sucesso');
        exit();
    }

    // Verificação do Temporizador de Submissão
    $current_time = round(microtime(true) * 1000); // Tempo atual em milissegundos
    $time_diff = ($current_time - $form_loaded_at) / 1000; // diferença em segundos

    if ($form_loaded_at == 0 || $time_diff < 5) {
        log_error("Submissão suspeita de bot. Tempo de submissão muito rápido.");
        header('Location: https://futgrass.com.br/sucesso');
        exit();
    }

    // Validação básica dos campos
    if (empty($nome) || empty($email) || empty($ddd) || empty($telefone) || empty($cidade) || empty($estado) || empty($descricao)) {
        log_error("Campos obrigatórios ausentes.");
        if (is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Todos os campos são obrigatórios.']);
        } else {
            header('Location: https://futgrass.com.br/error');
        }
        exit();
    }

    // Validação do formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        log_error("E-mail inválido: $email");
        if (is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Endereço de e-mail inválido.']);
        } else {
            header('Location: https://futgrass.com.br/error');
        }
        exit();
    }

    // Combina 'ddd' e 'telefone'
    $telefone_completo = "({$ddd}) {$telefone}";

    // Prepara a consulta SQL de inserção para o primeiro banco
    $sql1 = "INSERT INTO orcamentos (nome, email, telefone, cidade, estado, descricao, data_envio) 
             VALUES (?, ?, ?, ?, ?, ?, NOW())";

    // Prepara a consulta SQL de inserção para o segundo banco
    $sql2 = "INSERT INTO orcamentos (nome, email, telefone, cidade, estado, descricao, data_envio) 
             VALUES (?, ?, ?, ?, ?, ?, NOW())";

    // Prepara a inserção no primeiro banco
    $stmt1 = $conexao1->prepare($sql1);
    if (!$stmt1) {
        log_error("Erro ao preparar a consulta no banco 1: " . $conexao1->error);
        die("Erro ao preparar a consulta no banco 1.");
    }

    // Prepara a inserção no segundo banco
    $stmt2 = $conexao2->prepare($sql2);
    if (!$stmt2) {
        log_error("Erro ao preparar a consulta no banco 2: " . $conexao2->error);
        die("Erro ao preparar a consulta no banco 2.");
    }

    // Bind os parâmetros para ambos os bancos
    $stmt1->bind_param("ssssss", $nome, $email, $telefone_completo, $cidade, $estado, $descricao);
    $stmt2->bind_param("ssssss", $nome, $email, $telefone_completo, $cidade, $estado, $descricao);

    // Executa as inserções
    if ($stmt1->execute() && $stmt2->execute()) {
        log_error("Inserção bem-sucedida nos dois bancos.");

        // Envio do e-mail somente se os dados forem inseridos com sucesso nos dois bancos
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor SMTP
            $mail->SMTPDebug = 2; // Adiciona logs detalhados de depuração
            $mail->Debugoutput = 'error_log'; // Redireciona o debug para o log de erros
            $mail->isSMTP();
            $mail->Host       = 'mail.embrafer.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'futgrass@futgrass.com.br';
            $mail->Password   = 'Futgrass80802!'; // **ATENÇÃO:** Alterar imediatamente
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Remetente e destinatário
            $mail->setFrom('futgrass@futgrass.com.br', 'FUTGRASS');
            $mail->addAddress('contato@futgrass.com.br', 'FUTGRASS');

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Novo Contato - Site FUTGRASS Empresarial';
            $mail->Body    = "
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

            // Envia o e-mail
            if ($mail->send()) {
                log_error("E-mail enviado com sucesso.");
                header('Location: https://futgrass.com.br/sucesso');
                exit();
            } else {
                log_error("Erro ao enviar e-mail: " . $mail->ErrorInfo);
            }

        } catch (Exception $e) {
            log_error("Erro ao enviar e-mail: " . $e->getMessage());
            if (is_ajax_request()) {
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar e-mail.']);
            } else {
                header('Location: https://futgrass.com.br/error');
            }
            exit();
        }
    } else {
        log_error("Erro ao inserir dados no banco de dados: Banco 1: " . $stmt1->error . ", Banco 2: " . $stmt2->error);
        die("Erro ao inserir dados no banco de dados.");
    }

    $stmt1->close();
    $stmt2->close();

    // Fecha a conexão com os bancos de dados
    $conexao1->close();
    $conexao2->close();
} else {
    if (is_ajax_request()) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
    } else {
        header('Location: https://futgrass.com.br/error');
    }
    exit();
}
?>