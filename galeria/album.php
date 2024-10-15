<?php
/*
 * @App     Empresarial Web
 * @Author  Rafael Clares <falecom@phpstaff.com.br> 
 * @Web     www.phpstaff.com.br
 */
require_once './class/Foto.php';
$album_id = intval($_GET['id']);
$foto = new Foto();
$foto->setAlbum("$album_id");

$foto->bd->url = "album.php?id=$album_id";
$foto->bd->paginate(12);   //12 é o numero de itens por página
$foto->getFotos();

$album_nome = $foto->foto_todos[0]->{'album_nome'};
$albumcat_nome = $foto->foto_todos[0]->{'albumcat_nome'};
$album_desc = $foto->foto_todos[0]->{'album_desc'};
$albumcat_id = $foto->foto_todos[0]->{'albumcat_id'};

$foto_capa = "";
if (isset($foto->bd->data[0])) :
    $foto_capa = $foto->bd->data[0]->{'foto_url'};
endif;
$baseURI = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') .
        (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'] . '@' : '') .
        (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'] .
        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
               $_SERVER['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER['SERVER_PORT']))) .
        substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
?>
<!DOCTYPE html>
<html class="no-js">
    <!--<![endif]-->
    <head>
	
         <title><?=$albumcat_nome?> - Futgrass</title>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <link rel="canonical" href="<?=$baseURI?>/album.php?id=<?=$album_id?>">
        <?php if($foto_capa != ""):?>
        <meta property="og:image" content="<?=$baseURI?>/fotos/<?=$foto_capa?>"/>
        <?php endif;?>
        <meta property="og:url" content="<?=$baseURI?>/album.php?id=<?=$album_id?>"/>
        <meta name="robots" content="all"/>
        <meta name="language" content="br"/>
        <meta name="robots" content="follow"/>
        <meta property="og:type" content="article"/>
        <meta property="og:description" content="<?=$albumcat_nome?>"/>
		        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/lightbox/css/lightbox.css" rel="stylesheet">    
        <!-- Le styles -->
        <link href="http://www.futgrass.com.br/stylesheets/bootstrap.css" rel="stylesheet">
        <link href="http://www.futgrass.com.br/stylesheets/responsive.css" rel="stylesheet">
        <link href="http://www.futgrass.com.br/js/rs-plugin/css/settings.css" rel="stylesheet">
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

        <div class="boxed-container">

            <div class="navbar2 navbar2-inverse navbar2-fixed-top">
                <div class="navbar2-head">
                    <div class="container">
                        <div class="header-padding" id="shrinkableHeader">
                            <div class="row">
                                <div class="span6">
                                    <a class="brand" href="http://www.futgrass.com.br/" title=""><img src="http://www.futgrass.com.br/images/logo.gif" alt="Logo Futgrass"></a>
                                </div>
                                <div class="span5">
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
                                <li class="dropdown active">
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
						<br /><br />
                	        <h2>Futgrass - Especialista em Projetos esportivos</h2>
                	      
                	        <h3>Múltiplas finalidades</h3>
                	        <div class="clearfix"></div>
                	      
                	    </div>
                	</div>
                </div>

            </div>
            <!-- /fullwidthbanner-container -->

         <br />
			  <br />
			
			       
        <div class="container">
            <h4 style="padding-right: 15px; padding-left: 15px;">
                <?= $albumcat_nome ?> / <?= $album_nome ?>
                <span class="pull-right">
                    <a href="javascript:history.back();" class="btn btn-sm btn-primary">
		    <i class="fa fa-arrow-left"></i> voltar</a>
                </span>
            </h4>
	    <br/>
            <div id="image-set">
                <?php
                if (isset($foto->bd->data[0])) :
                    foreach ($foto->bd->data as $f):
                        if (isset($f->foto_url)):
                            if (!file_exists("fotos/$f->foto_url")):
                                $f->foto_url = "nopic.jpg";
                            endif;
                        else:
                            $f->foto_url = "nopic.jpg";
                        endif;
                        ?>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <a  href="fotos/<?= $f->foto_url ?>" data-lightbox="example-set" 
                                data-title="<?= $f->foto_legenda ?>">
                                <img src="thumb.php?w=600&h=500&zc=1&src=fotos/<?= $f->foto_url ?>" 
                                     class="thumbnail img-responsive" style="max-height:500px;" />
                            </a>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
		      <div class="col-md-12"><?= stripslashes($album_desc) ?></div>
                <div class='shareaholic-canvas' data-app='share_buttons' data-app-id='5390245'></div> 
                <script type="text/javascript"> var shr = document.createElement("script"); shr.setAttribute("data-cfasync", "false"); shr.src = "//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js"; shr.type = "text/javascript"; shr.async = "true"; shr.onload = shr.onreadystatechange = function() { var rs = this.readyState; if (rs && rs != "complete" && rs != "loaded") return; var site_id = "39e07923cec488add2e8c7d4263934e0"; try { Shareaholic.init(site_id); } catch (e) {console.log(e)} }; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(shr, s); </script>

                <div class="col-md-12">
                    <br >
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=375098389245172";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-comments" 
                        data-href="<?=$baseURI?>/album.php?id=<?=$album_id?>" 
                        data-width="1200" data-numposts="5" data-colorscheme="light">
                    </div>

                </div>

            </div>
        </div>


                <!-- end row -->




                
                <!-- end row -->

       
                <!-- end row -->

          
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
<p>Futgrass sempre ao seu lado
                                </p>
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

       

            <a id="tothetop" href=""> </a>
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
        <div class="container"><?= $foto->bd->link ?></div>        
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="plugins/lightbox/js/lightbox.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>