<?php
/*
 * @App     Empresarial Web
 * @Author  Rafael Clares <falecom@phpstaff.com.br> 
 * @Web     www.phpstaff.com.br
 */
require_once './class/Foto.php';
require_once 'class/Album.php';
$album = new Album ();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Galeria de obras Futgrass</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Projetos já realizados pela Futgrass.">
	<meta name="author" content="Empresarial Web" />
	<meta name="robots" content="index, all"/>
<meta name="robots" content="index, follow"/>
<meta name="Googlebot" content="index, follow"/>
<meta name="MSNBot" content="index,all" />
<meta name="yahooBot" content="index,all" />
<meta name="expires" content="never" />
<meta name="distribution" content="Global" />
<meta name="revisit-after" content="7" />
<meta name="service" content="construction" />
<meta name="category" content="soccer"/>
<meta name="category" content="construction"/>

<meta name="country" content="all" />
<meta name="coverage" content="Worldwide" />
<meta name="dc.language" content="br" />
<meta name="geo.region" content="BR-PR" />
<meta name="geo.placename" content="Curitiba" />
<meta name="geo.position" content="-25.4477824;-49.3213937,12" />
<meta name="ICBM" content="-25.4477824;-49.3213937,12" />

        <!-- Le styles -->
        <link href="http://www.futgrass.com.br/stylesheets/bootstrap.css" rel="stylesheet">
        <link href="http://www.futgrass.com.br/stylesheets/responsive.css" rel="stylesheet">
        <link href="http://www.futgrass.com.br/js/rs-plugin/css/settings.css" rel="stylesheet">
        <link href="http://www.futgrass.com.br/stylesheets/main.css" rel="stylesheet">
		
		        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/stack/css/component.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">	
 <link href="http://www.futgrass.com.br/stylesheets/main2.css" rel="stylesheet">	

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://www.futgrass.com.br/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.futgrass.com.br/images/apple-touch-icon/114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.futgrass.com.br/images/apple-touch-icon/114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.futgrass.com.br/images/apple-touch-icon/72x72.png">
        <link rel="apple-touch-icon-precomposed" href="http://www.futgrass.com.br/images/apple-touch-icon/57x57.png">
        <link rel="shortcut icon" href="http://www.futgrass.com.br/favicon.ico">
    </head>

    <body>

        <!-- STYLESWITCHER HTML -->

        <!-- /STYLESWITCHER HTML -->

        <div class="">

            <div class="navbar2 navbar2-inverse navbar2-fixed-top">
                <div class="navbar2-head">
                    <div class="container">
                        <div class="header-padding" id="shrinkableHeader">
                            <div class="row">
							       <div class="span1">
                                    <a class="brand" href="#" title=""><img src="http://www.futgrass.com.br/images/arrumar.png" alt="Logo Futgrass"></a>
                                </div>
                                <div class="span3">
                                    <a class="brand" href="http://www.futgrass.com.br/" title=""><img src="http://www.futgrass.com.br/images/logo.gif" alt="Logo Futgrass"></a>
                                </div>
                                <div class="span8">
                                    <div class="pull-right">
                                        <div class="call-us">
                                            CONTATO: (41) 3082-8850
                                        </div>
                                        <div class="social">
                                            <span><a href="http://www.futgrass.com.br/https://www.linkedin.com/company/futgrass" class="social-icon-linkedin"></a></span>
                                            <span><a href="http://www.futgrass.com.br/https://www.facebook.com/gramasinteticafutgrass" class="social-icon-facebook"></a></span>
                                            <span><a href="http://www.futgrass.com.br/https://www.youtube.com/channel/UC1o47rkgPrYIXjr7dy7LhgA" class="social-icon-youtube"></a></span>
                                            <span><a href="http://www.futgrass.com.br/https://vimeo.com/user38657692" class="social-icon-vimeo"></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="navbar2-menu2-line">
                    <div class="container">

                        <div class="nav-collapse">
                            <ul class="nav" id="mainNavigation">
                                <li class="divider-vertical"></li>
								 <li class="dropdown">
                                    <a href="#"><span></span></a></li> <li class="dropdown">
                                    <a href="#"><span></span></a></li>
                                <li class="dropdown">
                                    <a href="http://www.futgrass.com.br/"><span>Início</span></a></li>

                                <li class="divider-vertical"></li>
                                <li>
                                    <a href="http://www.futgrass.com.br/empresa-futgrass.html"><span>Empresa</span><small>melhor atendimento</small></a>
                                </li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href=""><span>Produtos</span><small>qualidade garantida</small></a>
                                    <ul class="dropdown-menu2">
                                        <li>
                                            <a href="http://www.futgrass.com.br/quadra-futebol-grama-sintetica-esportiva.html">Futebol Society</a>
                                        </li>
                                        <li>
                                            <a href="http://www.futgrass.com.br/grama-sintetica-esportiva.html">Grama Sintética Esportiva</a>
                                        </li>
                                        <li>
                                            <a href="http://www.futgrass.com.br/grama-sintetica-decorativa.html">Grama Sintética Decorativa</a>
                                        </li>
                                        <li>
                                            <a href="http://www.futgrass.com.br/alambrado-protecao.html">Alambrados</a>
                                        </li>
                                        <li>
                                            <a href="http://www.futgrass.com.br/iluminacao-esportiva-futebol-quadras.html">Iluminação Esportiva</a>
                                        </li>
                                        <li>
                                            <a href="http://www.futgrass.com.br/acessorios-esportivos-futebol-volei-basquete.html">Acessorios Esportivos</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle"><span>Portfolio</span><small>obras concluídas</small></a>

                                </li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a href="http://www.futgrass.com.br/grama-sintetica.html" class="dropdown-toggle"><span>Grama sintética</span><small>alto padrão</small></a></li>
                                <li class="divider-vertical"></li>
                                <li>
                                    <a href="http://www.futgrass.com.br/contato.html"><span>Contato</span><small>aguardando você</small></a>
                                </li>
                            </ul>

                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>

            <div class="fullwidthbanner-subpage-container img-slide img-sub-01">

                <div class="parallax-slider">
                	<div class="container">
                	    <div class="slide">
                	        <h1>Galeria de Projetos</h1>
                	        <div class="clearfix"></div>
                	        <h2>Construções esportivas,</h2>
                	        <div class="clearfix"></div>
                	       
                	    </div>
                	</div>
                </div>

            </div>
            <!-- /fullwidthbanner-container -->

            <div class="container content page">

                <div class="row mobile-spacing-5">

                    <div class="span12">
                        <div class="page-header arrow-grey">
                            <h2>Galeria de projetos</h2>
                        </div>
                    </div>

                    <div class="span12">
					
					    

	<!-- SLIDESHOW - -->
        <?php require_once 'slide.inc.php'; ?>

        <div class="container">
            <?php
            if (isset($_GET['categoria'])) :
                $cat_id = intval($_GET['categoria']);
                $album->bd->url = "index.php?categoria=$cat_id";
                $album->bd->paginate(12);     //12 é o numero de itens por página              
                $album->getAlbumByCat($cat_id);
            else:
                $album->bd->url = "index.php";
                $album->bd->paginate(12);  //12 é o numero de itens por página                              
                $album->getAlbuns();
            endif;
            if ($album->bd->data >= 1):
                foreach ($album->bd->data as $a):
			if (isset($_GET['fx'])) {
			    if (isset($fx_list[intval($_GET['fx'])])) {
				$a->album_fx = $fx_list[intval($_GET['fx'])];
			    }
			    $a->album_fx = $_GET['fx'];
			}

                    $foto = new Foto();
                    $pg = 4;
                    if ($a->album_fx == 'coverflow' || $a->album_fx == 'sideslide' || $a->album_fx == 'peekaboo') {
                        $pg = 3;
                    }
                    if ($a->album_fx == ''  ){
                        $pg = 1;
                    }
                    $foto->getFotosHome($a->album_id,$pg);
                    if (isset($foto->bd->data[0])) :
                        $tfoto = count($foto->bd->data);
                        ?>
                        <div class="col-md-3 col-xs-12 col-sm-12 album-d">
                            <section>
                                <figure class="stack stack-<?= $a->album_fx ?> <?= ($tfoto >= 2) ? 'for-active' : 'no-active'; ?>" id="<?= $a->album_id ?>">
                                    <?php
                                    foreach ($foto->bd->data as $f):
                                        if (isset($f->foto_url)):
                                            if (!file_exists("fotos/$f->foto_url")):
                                                $f->foto_url = "nopic.jpg";
                                            endif;
                                        else:
                                            $f->foto_url = "nopic.jpg";
                                        endif;
                                        ?>

                                        <img src="thumb.php?w=600&h=500&zc=1&src=fotos/<?= $f->foto_url ?>" 
                                             class=" img-responsive" style="max-height:500px;" />

                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </figure>
                            <h1> <?= $a->album_nome ?></h1>
                        </section>
                    </div>

                    <?php
                endforeach;
            endif;
            ?>
        </div>
        <div class="container"><?= $album->bd->link ?></div>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="plugins/stack/js/classie.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            window.onload = function () {
                setTimeout(function () {
                    $('.for-active').addClass('active');
                }, 900);
                setTimeout(function () {
                    $('.for-active').removeClass('active');
	    	    // comente a linha acima de desejar que o efeito fique fixo ao 
		    // invés de aparece apenas quando passa o mouse
                }, 2000);
            }
            $('.for-active').hover(
                    function () {
                        $(this).addClass('active')
                    },
                    function () {
                        $(this).removeClass('active')
                    }
            );
            $('figure').on('click', function () {
                window.location = 'album.php?id=' + $(this).attr('id');
            });         
            $('.efx').on('click', function () {
                window.location = 'index.php?fx=' + $(this).attr('id') + '#album-set';
            });
        </script>

                    </div>

                </div>

               <!-- <div class="row no-bottom">

                    <div class="span12">
                        <div class="page-header arrow-grey">
                            <div class="row">
                                <div class="span6">
                                    <h2>Nossa Equipe</h2>
                                </div>

                                <div class="span6">
                                    <div class="navs pull-right">
                                        <a href="#" class="nav-left" id="teamNavLeft"></a><a href="#" class="nav-right" id="teamNavRight"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span12">
                        <div class="carouFredSel" data-nav="teamNav">
                            <div class="slide">
                                <div class="row team">
                                    <div class="span4">
                                        <div class="thumbnail">
                                            <div class="picture">
                                                <a href="http://www.futgrass.com.br/images/dummy/portfolio/portfolio_6.jpg" class="add-prettyphoto"> 
												<img src="http://www.futgrass.com.br/images/dummy/portfolio/portfolio_6.jpg" alt="Vendedor Futgrass Quadra" title="Vendedor Futgrass Quadra"> <span> 
												<span class="plus"><i class="icon-plus"></i></span> </span> </a>
                                            </div>
                                            <div class="caption-border-bottom">
                                                <div class="caption caption-arrow">
                                                    <div class="thumbnail-arrow"></div>
                                                    <h3>Matheus</h3>
                                                    <span class="job">Comercial</span>
                                                    <p>
                                                        Vendedor de <b>construções esportivas</b>, estruturas e grama sintética. Acessorando do início ao fim da obra.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="thumbnail-footer thumbnail-footer-social ">
                                                <div class="pull-left">
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-twitter" data-original-title="Twitter"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-linkedin" data-original-title="LinkedIn"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-facebook" data-original-title="Facebook"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-skype" data-original-title="Skype"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-envelope" data-original-title="Email"></a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="icon-share"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <div class="thumbnail">
                                            <div class="picture">
                                                <a href="http://www.futgrass.com.br/images/empresa/john_l.jpg" class="add-prettyphoto"> <img src="http://www.futgrass.com.br/images/empresa/john_l.jpg" alt="Eneas Diretor Futgrass" title="Eneas Diretor Futgrass"> <span> <span class="plus"><i class="icon-plus"></i></span> </span> </a>
                                            </div>
                                            <div class="caption-border-bottom">
                                                <div class="caption caption-arrow">
                                                    <div class="thumbnail-arrow"></div>
                                                    <h3>Eneas</h3>
                                                    <span class="job">Diretor</span>
                                                    <p>
                                              Nós não somos motivados pelo dinheiro. Somos totalmente apaixonados pelo que estamos construindo.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="thumbnail-footer thumbnail-footer-social ">
                                                <div class="pull-left">
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-twitter" data-original-title="Twitter"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-linkedin" data-original-title="LinkedIn"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-facebook" data-original-title="Facebook"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-skype" data-original-title="Skype"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-envelope" data-original-title="Email"></a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="icon-share"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <div class="thumbnail">
                                            <div class="picture">
                                                <a href="http://www.futgrass.com.br/images/empresa/julia_l.jpg" class="add-prettyphoto"> <img src="http://www.futgrass.com.br/images/empresa/julia_l.jpg" alt="Thiago Engenheiro Futgrass" title="Thiago Engenheiro Futgrass"> <span> <span class="plus"><i class="icon-plus"></i></span> </span> </a>
                                            </div>
                                            <div class="caption-border-bottom">
                                                <div class="caption caption-arrow">
                                                    <div class="thumbnail-arrow"></div>
                                                    <h3>Thiago</h3>
                                                    <span class="job">Engenheiro</span>
                                                    <p>
                                                        Nas revoluções, há dois tipos de pessoas: as que fazem e aquelas que se aproveitam de quem faz.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="thumbnail-footer thumbnail-footer-social ">
                                                <div class="pull-left">
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-twitter" data-original-title="Twitter"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-linkedin" data-original-title="LinkedIn"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-facebook" data-original-title="Facebook"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-skype" data-original-title="Skype"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-envelope" data-original-title="Email"></a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="icon-share"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="slide">
                                <div class="row team">
                                    <div class="span4">
                                        <div class="thumbnail">
                                            <div class="picture">
                                                <a href="http://www.futgrass.com.br/images/empresa/eva_l.jpg" class="add-prettyphoto"> <img src="http://www.futgrass.com.br/images/empresa/eva_l.jpg" alt=""> <span> <span class="plus"><i class="icon-plus"></i></span> </span> </a>
                                            </div>
                                            <div class="caption-border-bottom">
                                                <div class="caption caption-arrow">
                                                    <div class="thumbnail-arrow"></div>
                                                    <h3>Ann Lee</h3>
                                                    <span class="job">assistant</span>
                                                    <p>
                                                        Et eros omnes theophrastus mei, cumit usu dicit omnium eripuit. Qui tever illum facete, officiis gubergren sea cu.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="thumbnail-footer thumbnail-footer-social ">
                                                <div class="pull-left">
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-twitter" data-original-title="Twitter"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-linkedin" data-original-title="LinkedIn"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-facebook" data-original-title="Facebook"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-skype" data-original-title="Skype"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-envelope" data-original-title="Email"></a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="icon-share"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <div class="thumbnail">
                                            <div class="picture">
                                                <a href="http://www.futgrass.com.br/images/empresa/john_l.jpg" class="add-prettyphoto"> <img src="http://www.futgrass.com.br/images/empresa/john_l.jpg" alt=""> <span> <span class="plus"><i class="icon-plus"></i></span> </span> </a>
                                            </div>
                                            <div class="caption-border-bottom">
                                                <div class="caption caption-arrow">
                                                    <div class="thumbnail-arrow"></div>
                                                    <h3>Rick Taylor</h3>
                                                    <span class="job">co-founder</span>
                                                    <p>
                                                        Copiosae molestiae sed at, eu quem purt an perlac, eleifend reprehen untc sea. Doctus vivendum at quo mei.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="thumbnail-footer thumbnail-footer-social ">
                                                <div class="pull-left">
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-twitter" data-original-title="Twitter"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-linkedin" data-original-title="LinkedIn"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-facebook" data-original-title="Facebook"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-skype" data-original-title="Skype"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-envelope" data-original-title="Email"></a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="icon-share"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <div class="thumbnail">
                                            <div class="picture">
                                                <a href="http://www.futgrass.com.br/images/empresa/julia_l.jpg" class="add-prettyphoto"> <img src="http://www.futgrass.com.br/images/empresa/julia_l.jpg" alt=""> <span> <span class="plus"><i class="icon-plus"></i></span> </span> </a>
                                            </div>
                                            <div class="caption-border-bottom">
                                                <div class="caption caption-arrow">
                                                    <div class="thumbnail-arrow"></div>
                                                    <h3>Suzan Martin</h3>
                                                    <span class="job">assistant</span>
                                                    <p>
                                                        Et eros omnes theophrastus mei, cumit usu dicit omnium eripuit. Qui tever illum facete, officiis gubergren sea cu.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="thumbnail-footer thumbnail-footer-social ">
                                                <div class="pull-left">
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-twitter" data-original-title="Twitter"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-linkedin" data-original-title="LinkedIn"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-facebook" data-original-title="Facebook"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-skype" data-original-title="Skype"></a>
                                                    <a href="#" data-placement="top" class="add-tooltip tooltip-class social-icon-envelope" data-original-title="Email"></a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="icon-share"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>-->
                 

               

            </div>
            <!-- /container -->

			<!-- RODA PE -->
            <div class="foot">
                <div class="container">

                    <div class="row">
                        <div class="span3 foot-item foot-item-green">
                            <div class="foot-item-green-inside">
                                <img src="http://www.futgrass.com.br/images/footer-logo.png" alt=" Logo Futgrass " title=" Logo Futgrass ">
                                <span class="tel-text">(41)3082-8850</span>
                                <span class="support-text">Atendemos todo o Brasil</span>

                            </div>
                        </div>

                        <div class="span3 foot-item">
                            <h4>Menu Rápido</h4>
                            <p>
							<ul>
                               <li><a href="http://www.futgrass.com.br/grama-sintetica-esportiva.html">Grama Esportiva</a></li>
								<li><a href="http://www.futgrass.com.br/grama-sintetica-decorativa.html">Grama Decorativa</a></li>
								<li><a href="http://www.futgrass.com.br/acessorios-esportivos-futebol-volei-basquete.html">Acessórios esportivos</a></li>
								
								<li><a href="http://www.futgrass.com.br/empresa-futgrass.html">Empresa</a></li>
							</ul>
                            </p>

                            <p><br />
                                
                            </p>
                        </div>

                        <div class="span3 foot-item">
                            <h4>Fifa Quality Concept</h4>
                            <p>
                                <iframe src="http://player.vimeo.com/video/12442982?title=0&amp;byline=0&amp;portrait=0&amp;color=15b994" width="226" height="127" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </p>
                           
                            <p>
                                <small></small>
                            </p>
                        </div>

                        <div class="span3 foot-item">
                            <h4 class="pull-left">Acompanhamento</h4>
                            <div class="clearfix"></div>
                            <ul class="tweet_list">
                                <li class="tweet_first tweet_odd">
                                    <span class="tweet_text">Fique inteirado quanto á sua Obra, seu vendedor ficara a disposinção para qualquer dúvida de planejamento.</span>
                                </li>
                                <li class="tweet_even">
                                    <span class="tweet_text">É importante para nós que o cliente acompanhe de perto o desenrrolar do seu projeto, mas não se preocupe. Cuidamos de tudo!</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

          

            <a id="tothetop" href="#"> </a>
        </div>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://www.futgrass.com.br/js/jquery.js"></script>
<script src="http://www.futgrass.com.br/js/bootstrap.min.js"></script>

<!--  ==========  -->
<!--  = Isotope JS =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/isotope/jquery.isotope.min.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = Slider Revolution =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
<script src="http://www.futgrass.com.br/js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = Media Element and mp3 player =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/mediaelementjs-skin/lib/mediaelement.js" type="text/javascript"></script>
<script src="http://www.futgrass.com.br/js/mediaelementjs-skin/lib/mediaelementplayer.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = Carousel CarouFredSel =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = prettyPhoto lightbox =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = Style Swithcer =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/styleswitcher/jquery_cookie.js" type="text/javascript"></script>
<script src="http://www.futgrass.com.br/js/styleswitcher/styleswitcher.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = Flickr Feed =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/jflickrfeed/jflickrfeed.min.js" type="text/javascript"></script>

<!--  ==========  -->
<!--  = Custom JS =  -->
<!--  ==========  -->
<script src="http://www.futgrass.com.br/js/custom.js" type="text/javascript" charset="utf-8"></script>

    </body>
</html>