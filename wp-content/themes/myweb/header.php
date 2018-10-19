<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php
	global $idioma;
	global $url_idioma;
	$idioma = WPGlobus::Config()->language;
	if($idioma == 'en'){
		$url_idioma = explode('/en',home_url());
		$url_idioma = $url_idioma[0];
	}else{
		if($idioma == 'es'){
			$url_idioma = explode('/es',home_url());
			$url_idioma = $url_idioma[0];
		}else{
			$url_idioma = home_url();
		}
	}
?>

<?php 
	$titulo = '';
	$descricao = get_field('descricao', 'option');
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
	$page = get_page_by_path('sobre-mim');
	$imagem = get_field('imagem_perfil',$page->ID);
	$url = get_home_url();

	if(is_category()){ 
		$category= get_queried_object(); //print_r($category);
		$infoCategoria = get_the_category($category->term_id); //print_r($infoCategoria);
		$titulo = $infoCategoria[0]->name.' - ';
		$descricao = $infoCategoria[0]->description;
		//$imagem = '';
		$url = $url.'/'.$infoCategoria[0]->slug;
	}

	if(is_page()){
		if(!is_home()){
			$titulo = get_the_title().' - ';
			if(get_field('descrição') != ''){
				$descricao = get_field('descrição');
			}
			if($imgPage[0] != ''){
				$imagem = $imgPage[0];	
			}			
			$url = get_the_permalink();
		}
	}

	if(is_single()){
		$titulo = get_the_title().' - ';
		if(get_field('descrição') != ''){
			$descricao = get_field('descrição');
		}
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	$titulo = $titulo.get_bloginfo('name'); 
	$autor = get_bloginfo('name');
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<?php if(is_singular('produto')){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" type="text/css" media="screen" />
<?php } ?>

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){
		/* MAPA GOOGLE */
		jQuery('.mapa-google').click(function () {
		    jQuery('.mapa-google').css("pointer-events", "auto");
		});
		jQuery('.mapa-google').mouseleave(function() {
		  	jQuery('.mapa-google').css("pointer-events", "none"); 
		});

		/* SETA */
		jQuery(".seta").click(function(){
			var scroll = jQuery(this).attr('rel');
		    jQuery("html, body").animate({ scrollTop: jQuery(scroll).offset().top }, 1000);
		});

		/* OPEN/CLOSE MENU */
		jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				jQuery(this).removeClass('active');
				jQuery('.nav').css('left','100vw');
				jQuery('.region').css('left','100vw');
				jQuery('.info-tel').css('left','100vw');
			}else{
				jQuery(this).addClass('active');
				jQuery('.nav').css('left','0vw');
				jQuery('.region').css('left','0vw');
				jQuery('.info-tel').css('left','0vw');
			}
		});

		jQuery('.nav a').click(function(){
			if(jQuery('.menu-mobile').hasClass('active')){
				jQuery('.menu-mobile').removeClass('active');
				jQuery('.nav').css('left','100vw');
				jQuery('.region').css('left','100vw');
				jQuery('.info-tel').css('left','100vw');
			}
		});

		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});	

	jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.nav').css('left','100vw');
		jQuery('.region').css('left','100vw');
		jQuery('.info-tel').css('left','100vw');
		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});
</script>

</head>
<body <?php body_class(); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100022583-1', 'auto');
  ga('send', 'pageview');

</script>

	<header class="header">
		<div class="container">
			<div class="row">

				<h1>
					<a href="<?php echo get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
					</a>
				</h1>

				<div class="box-menu">
					<a href="javascript:" class="menu-mobile"><span><em>X</em></span></a>

					<div class="info">
						<span class="info-tel"><?php the_field('telefone','option'); ?></span>
						<div class="region">
							<?php 
								$class_en = '';
								$on_en = '';
								$class_pt = '';
								$on_pt = '';
								$class_es = '';
								$on_es = '';
								$menu_idioma = [];

								if($idioma == 'en'){
									$class_en = 'ativo';
									$on_en = '';
									$menu_idioma = ['Products','Simulators','Color Simulator','Consumption Calculator','Company','Matrix and Units','Work with us','Awards & Reviews','Corporate Ideology','Contact','Contact us','Media','Releases','In the Media','Download'];
								}

								if($idioma == 'pt'){
									$class_pt = 'ativo';
									$on_pt = '';
									$menu_idioma = ['Produtos','Simuladores','Simulador de Cores','Calculadora de Consumo','Empresa','Matriz e Unidades','Trabalhe Conosco','Prêmios','Ideologia Corporativa','Contato','Fale Conosco','Mídia','Releases','Na Mídia','Download'];
								}

									if(is_front_page()){
										$url_idioma_pt = home_url();
									}else{
										$url_idioma_pt = $url_idioma.'/'.add_query_arg(array(),$wp->request);
									}

								if($idioma == 'es'){
									$class_es = 'ativo';
									$on_es = '';
									$menu_idioma = ['Productos','Simuladores','Simulador de color','Calculadora de Consumo','Empresa','Matriz y unidades','Trabaja con nosotros','Premios','Ideología Corporativa','Contacto','Hable con nosotros','Medios','Noticias','En los medios','Descargar'];
								}
						 	?>

							<a href="<?php echo $url_idioma.'/en/'.add_query_arg(array(),$wp->request); ?>" class="<?php echo $class_en; ?>" style="<?php echo $on_en; ?>" title="EN">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/en.png">
							</a>
							<a href="<?php echo $url_idioma_pt; ?>" class="<?php echo $class_pt; ?>" style="<?php echo $on_pt; ?>" title="PT">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pt.png">
								</a>
							<a href="<?php echo $url_idioma.'/es/'.add_query_arg(array(),$wp->request); ?>" class="<?php echo $class_es; ?>" style="<?php echo $on_es; ?>" title="ES">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/es.png">
							</a>

							<a href="javascript:" class="search" style="" title="BUSCAR" id="btn-buscar">
								<i class="fa fa-search"></i>
							</a>
						</div>
					</div>

					<nav class="nav">
						<ul class="menu-principal">

							<li class="<?php if((is_post_type_archive('lojas')) or (is_post_type_archive('produto')) or (is_tax('categoria_produto')) or (is_singular('produto'))){ echo 'active'; } ?>">
								<a href="<?php echo get_home_url(); ?>/produto" title="<?php echo $menu_idioma[0]; ?>" class=""><?php echo $menu_idioma[0]; ?></a>
								<ul class="submenu">
									<?php if( have_rows('imagem_categoria_produto','option') ):
										while ( have_rows('imagem_categoria_produto','option') ) : the_row(); 

											$term = get_term( get_sub_field('categoria_do_produto','option'), 'categoria_produto' ); ?>

											<li>
												<a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>" class="<?php if(is_tax('categoria_produto',$term->slug)){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('icone_categoria','option'); ?>');">
													<?php echo $term->name; ?>
												</a>
											</li>

										<?php endwhile;
									endif; ?>
								</ul>
							</li>

							<li class="<?php if((is_page('simulador-cores')) or (is_page('calculadora-consumo'))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php echo $menu_idioma[1]; ?>"><?php echo $menu_idioma[1]; ?></a>
								<ul class="submenu">
									<li><a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php echo $menu_idioma[2]; ?>" class="<?php if(is_page('simulador-cores')){ echo 'active'; } ?>"><?php echo $menu_idioma[2]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('calculadora-consumo')); ?>" title="<?php echo $menu_idioma[3]; ?>" class="<?php if(is_page('calculadora-consumo')){ echo 'active'; } ?>"><?php echo $menu_idioma[3]; ?></a></li>	
								</ul>
							</li>

							<li class="<?php if((is_page('empresa'))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>" title="<?php echo $menu_idioma[4]; ?>"><?php echo $menu_idioma[4]; ?></a>
								<ul class="submenu">
									<li><a href="<?php echo get_home_url(); ?>/matriz_filiais" title="<?php echo $menu_idioma[5]; ?>" class="<?php if(is_post_type_archive('matriz_filiais')){ echo 'active'; } ?>"><?php echo $menu_idioma[5]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('trabalhe-conosco')); ?>" title="<?php echo $menu_idioma[6]; ?>" class="<?php if(is_page('trabalhe-conosco')){ echo 'active'; } ?>"><?php echo $menu_idioma[6]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>#premios" title="<?php echo $menu_idioma[7]; ?>" class=""><?php echo $menu_idioma[7]; ?></a></li>				
									<li><a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>#ideologia-corporativa" title="<?php echo $menu_idioma[8]; ?>" class=""><?php echo $menu_idioma[8]; ?></a></li>
								</ul>
							</li>
							<li class="<?php if((is_post_type_archive('matriz_filiais')) or (is_page('trabalhe-conosco')) or (is_page('fale-conosco'))){ echo 'active'; } ?>">
								<a href="javascript:" title="<?php echo $menu_idioma[9]; ?>"><?php echo $menu_idioma[9]; ?></a>
								<ul class="submenu">
									<li><a href="<?php echo get_home_url(); ?>/matriz_filiais" title="<?php echo $menu_idioma[5]; ?>" class="<?php if(is_post_type_archive('matriz_filiais')){ echo 'active'; } ?>"><?php echo $menu_idioma[5]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('fale-conosco')); ?>" title="<?php echo $menu_idioma[10]; ?>" class="<?php if(is_page('fale-conosco')){ echo 'active'; } ?>"><?php echo $menu_idioma[10]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('trabalhe-conosco')); ?>" title="<?php echo $menu_idioma[6]; ?>" class="<?php if(is_page('trabalhe-conosco')){ echo 'active'; } ?>"><?php echo $menu_idioma[6]; ?></a></li>
								</ul>
							</li>
							<li class="<?php if((is_category('release')) or (is_category('na-midia')) or (is_page('downloads')) or (is_singular('post'))){ echo 'active'; } ?>">
								<a href="javascript:" title="<?php echo $menu_idioma[11]; ?>"><?php echo $menu_idioma[11]; ?></a>
								<ul class="submenu">
									<li><a href="<?php echo get_home_url(); ?>/midia/release" title="<?php echo $menu_idioma[12]; ?>" class="<?php if(is_category('release')){ echo 'active'; } ?>"><?php echo $menu_idioma[12]; ?></a></li>		
									<li><a href="<?php echo get_home_url(); ?>/midia/na-midia" title="<?php echo $menu_idioma[13]; ?>" class="<?php if(is_category('na-midia')){ echo 'active'; } ?>"><?php echo $menu_idioma[13]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('downloads')); ?>" title="<?php echo $menu_idioma[14]; ?>" class="<?php if(is_page('downloads')){ echo 'active'; } ?>"><?php echo $menu_idioma[14]; ?></a></li>				
								</ul>
							</li>
						</ul>
					</nav>

				</div>

			</div>
		</div>
	</header>