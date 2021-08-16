<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php
	global $idioma;
	global $url_idioma;
	//$idioma = WPGlobus::Config()->language;
	$idioma = ICL_LANGUAGE_CODE;
	
	if($idioma == 'en'){
		$url_idioma = explode('/en',home_url());
		$url_idioma = $url_idioma[0];
	}else{
		if($idioma == 'es'){
			$url_idioma = explode('/es',home_url());
			$url_idioma = $url_idioma[0];
		}else{
			$url_idioma = explode('/pt',home_url());
			$url_idioma = $url_idioma[0];
		}
	}


/*if(ICL_LANGUAGE_CODE == 'pt')*/
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
<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox.css" media="screen" />-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<?php if(is_singular('produto')){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" type="text/css" media="screen" />
<?php } ?>

<?php if(is_page('simulador-cores')){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.css" type="text/css" media="screen" />
<?php } ?>

<?php if(is_page('argamassas')){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page-argamassas.css" type="text/css" media="screen" />
<?php } ?>

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

<style type="text/css">
	.header .nav ul li.nav-pesquisa {
		display: none;
		margin: 0;
		padding: 0;
	}

	.header .nav ul li.nav-pesquisa ul {
		display: block;
		background-color: #0077C8!important;
		height: 120px;
	}

	.header .nav ul li.nav-pesquisa ul li {
		max-width: 980px;
		width: 80%;
		display: block;
		margin: 0 auto;
	}

	.header .nav ul li.nav-pesquisa ul li #searchform {
		margin: 0;
		position: relative;
		height: 120px;
	}

	.nav-pesquisa #searchsubmit {
		display: none;
	}

	.nav-pesquisa #searchform input {
		/*background-color: #0068af;*/
		width: 100%;
		line-height: 73px;
		padding: 0px;
		margin-top: 21px;
		color: #fff;
	}

	.nav-pesquisa #searchform input::-webkit-input-placeholder {
		color: #fff;
		opacity: 0.75;
	}
	.nav-pesquisa #searchform input:-moz-placeholder           {
		color: #fff;
		opacity: 0.75;
	}
	.nav-pesquisa #searchform input::-moz-placeholder          {
		color: #fff;
		opacity: 0.75;
	}
	.nav-pesquisa #searchform input:-ms-input-placeholder      {
		color: #fff;
		opacity: 0.75;
	}

	.nav-pesquisa #searchform i {
		position: absolute;
		right: 0;
		color: #ffffff;
		font-size: 2rem;
		opacity: 0.75;
		top: 50%;
		margin-top: -16px;
		cursor: pointer;
	}

	.nav-pesquisa #searchform i:hover {
		opacity: 1;
		text-transform: uppercase;
		text-decoration: none;
		-moz-transition: all .2s ease 0s;
		-webkit-transition: all .2s ease 0s;
		-o-transition: all .2s ease 0s;
	}

	.footer .info {
		display: inline-block;
		position: relative;
		top: -4px;
	}
	.footer .info .info-tel {
		font-weight: 700;
		font-size: 1.25rem;
		color: #ffffff;
		display: inline-block;
		margin-left: 20px;
		-moz-transition: all .2s ease 0s;
		-webkit-transition: all .2s ease 0s;
		-o-transition: all .2s ease 0s;
	}

	.tecnologia-ardex {
		display: flex;
		width: 260px;
		align-items: center;
		color: #ffffff;
		text-transform: uppercase;
		font-weight: 300;
		float: left;
		margin-right: 20px;
		padding: 2px 10px;
		box-sizing: content-box;
		margin-top: -2px;
		-moz-transition: all .2s ease 0s;
		-webkit-transition: all .2s ease 0s;
		-o-transition: all .2s ease 0s;
	}
	.tecnologia-ardex:hover {
		text-decoration: navajowhite;
		background: #e55a24;
		color: #ffffff;
	}
	.tecnologia-ardex img {
		margin-left: auto;
	}
	.nav-tecnologia-ardex {
		display: none!important;
	}

	.header .nav ul li a {
		padding: 0px 10px 5px;
	}

	@media all and (min-width: 801px) and (max-width: 1080px) {
		.header .nav ul li a {
			padding: 0 5px 5px;
			font-size: 13px;
		}
	}

	@media (max-width:800px) {
		.header .nav ul li.nav-pesquisa {
			left: 0;
			position: fixed;
			top: 79px;
			width: 100%;
			z-index: 9999;
		}

		.tecnologia-ardex {
			display: none;
		}
		.nav-tecnologia-ardex {
			display: block!important;
		}
		.nav-tecnologia-ardex .tecnologia-ardex {
			display: flex;
			margin-right: 0;
			width: 145px;
			padding: 0;
		}
		.nav-tecnologia-ardex .tecnologia-ardex:hover {
			background: transparent;
		}
	}

	@media (max-width:770px) {
		.footer {
			height: auto;
		}
		.footer .row { 
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.footer a.social i {
			margin: 0 5px;
		}
		.footer .info .info-tel  {
			margin: 20px 0 0;
		}
		.footer .outros-icones {
			position: relative;
			right: 0;
			margin: 20px 0;
			padding: 0;
			border: none;
		}
	}

</style>


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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2608499-26"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-2608499-26');
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
						<?php
							$ardex_idioma[0];
							if($idioma == 'en'){
								$ardex_idioma = ['DISCOVER ARDEX TECHNOLOGY',' Solutions ',' Company'];
							}

							if($idioma == 'pt-br'){
								$ardex_idioma = ['CONHEÇA A TECNOLOGIA ARDEX','Soluções','Empresa'];
							}

							if($idioma == 'es'){
								$ardex_idioma = ['DESCUBRA TECNOLOGÍA ARDEX',' Soluciones ',' Empresa'];
							}
						?>

						<?php 
							$status_page = get_post_status('35648');
							if($status_page == 'publish'){ ?>
								<a href="<?php echo get_home_url(); ?>/ardex" class="tecnologia-ardex" title="<?php echo $ardex_idioma[0]; ?> Ardex">
									<?php echo $ardex_idioma[0]; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ardex_logo.png" alt="<?php echo $ardex_idioma[0]; ?> Ardex">
								</a>
							<?php  }
						?>

						<span class="info-tel" style="display: none;"><?php the_field('telefone','option'); ?></span>
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
									$menu_idioma = ['Products','Simulators','Color Simulator','Consumption Calculator','Company','Matrix and Units','Work with us','Awards & Reviews','Corporate Ideology','Contact','Contact us','DOWNLOADS','Releases','In the Media','Download','Solutions'];
								}

								if($idioma == 'pt-br'){
									$class_pt = 'ativo';
									$on_pt = '';
									$menu_idioma = ['Produtos','Simuladores','Simulador de Cores','Calculadora de Consumo','Empresa','Matriz e Unidades','Trabalhe Conosco','Prêmios','Ideologia Corporativa','Contato','Fale Conosco','DOWNLOADS','Releases','Na Mídia','Download','Soluções'];
								}

									if(is_front_page()){
										$url_idioma_pt = home_url();
									}else{
										$url_idioma_pt = $url_idioma.'/'.add_query_arg(array(),$wp->request);
									}

								if($idioma == 'es'){
									$class_es = 'ativo';
									$on_es = '';
									$menu_idioma = ['Productos','Simuladores','Simulador de color','Calculadora de Consumo','Empresa','Matriz y unidades','Trabaja con nosotros','Premios','Ideología Corporativa','Contacto','Hable con nosotros','DESCARGAR','Noticias','En los medios','Descargar','Soluciones'];
								}
						 	?>


						 	<!-- IDIOMAS --> <?php /*
							<a href="<?php echo $url_idioma.'/en/'.add_query_arg(array(),$wp->request); ?>" class="<?php echo $class_en; ?>" style="<?php echo $on_en; ?>" title="EN">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/en.png">
							<?php /* <a href="<?php echo $url_idioma_pt; ?>" class="<?php echo $class_pt; ?>" style="<?php echo $on_pt; ?>" title="PT">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pt.png">
							</a> */ /*?>

							<a href="<?php echo $url_idioma.'/'.add_query_arg(array(),$wp->request); ?>" class="<?php echo $class_pt; ?>" style="<?php echo $on_pt; ?>" title="PT">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pt.png">
							</a>

							<a href="<?php echo $url_idioma.'/es/'.add_query_arg(array(),$wp->request); ?>" class="<?php echo $class_es; ?>" style="<?php echo $on_es; ?>" title="ES">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/es.png">
							</a> */ ?>


						<?php 
							$langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');

							foreach ($langs as $key => $info_idioma) { //var_dump($info_idioma);
								//if($info_idioma['active']){ ?>

										<a href="<?php echo $info_idioma['url']; ?>" title="<?php echo $info_idioma['native_name']; ?>" class="<?php if($info_idioma['active']){ echo 'ativo'; } ?>">
											<img src="<?php echo get_template_directory_uri() . '/assets/images/' . $info_idioma['code'] . '.png'; ?>">
										</a>

								<?php // }

							}
						?>

							<!-- IDIOMAS -->
							<a href="javascript:" class="search" style="" title="BUSCAR" id="btn-buscar">
								<i class="fa fa-search"></i>
							</a>
						</div>
					</div>

					<nav class="nav">
						<ul class="menu-principal">

							<li class="nav-solucoes <?php if(is_tag()){ echo 'active'; } ?>">
								<a href="javascript:" title="<?php echo $menu_idioma[15]; ?>" class=""><?php echo $menu_idioma[15]; ?></a>
								<ul class="submenu">
									<?php if( have_rows('ico-solucoes','option') ):
										while ( have_rows('ico-solucoes','option') ) : the_row(); 

											$term = get_term( get_sub_field('tag-solucoes','option'), 'post_tag' ); ?>

											<li>
												<a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>" class="<?php if(is_tag($term->slug)){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('icone-solucoes','option'); ?>');">
													<?php echo $term->name; ?>
												</a>
											</li>

										<?php endwhile;
									endif; ?>
								</ul>
							</li>
<?php //or (is_singular('produto')) is_tax('categoria_produto') ?>
							<li class="nav-produtos <?php if( is_post_type_archive('produto') and !is_tag() ){ echo 'active'; } ?>">
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

							<li class="nav-tecnologia-ardex">
								<a href="#" title="<?php echo $ardex_idioma[0]; ?> Ardex">
									<span class="tecnologia-ardex">
										<?php echo $ardex_idioma[0]; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ardex_logo.png" alt="<?php echo $ardex_idioma[0]; ?> Ardex">
									</span>
								</a>
								<ul class="submenu">
									<li class=""><a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php echo $ardex_idioma[1]; ?>" class="<?php if(is_page('simulador-cores')){ echo 'active'; } ?>"><?php echo $ardex_idioma[1]; ?></a></li>		
									<li class=""><a href="<?php echo get_permalink(get_page_by_path('calculadora-consumo')); ?>" title="<?php echo $ardex_idioma[2]; ?>" class="<?php if(is_page('calculadora-consumo')){ echo 'active'; } ?>"><?php echo $ardex_idioma[2]; ?></a></li>	
								</ul>
							</li>
							<?php if($status_page == 'publish'){ ?>
								<li class="nav-cfxferramentas">
									<a>CFX Ferramentas</a>
									<ul class="submenu">
										<?php if( have_rows('ico-cfx-ferramentas','option') ):
											while ( have_rows('ico-cfx-ferramentas','option') ) : the_row(); 

												$term = get_term( get_sub_field('categoria-cfx-ferramentas','option'), 'categoria_cfx_ferramentas' ); ?>

												<li>
													<a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>" class="<?php if(is_tax('categoria_produto',$term->slug)){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('icone-cfx-ferramentas','option'); ?>');">
														<?php echo $term->name; ?>
													</a>
												</li>

											<?php endwhile;
										endif; ?>
									</ul>
								</li>
							<?php } ?>

							<li class="nav-simuladores <?php if((is_page('simulador-cores')) or (is_page('calculadora-consumo'))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php echo $menu_idioma[1]; ?>"><?php echo $menu_idioma[1]; ?></a>
								<ul class="submenu">
									<li class="nav-simuladores-simulador"><a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php echo $menu_idioma[2]; ?>" class="<?php if(is_page('simulador-cores')){ echo 'active'; } ?>"><?php echo $menu_idioma[2]; ?></a></li>		
									<li class="nav-simuladores-calculadora"><a href="<?php echo get_permalink(get_page_by_path('calculadora-consumo')); ?>" title="<?php echo $menu_idioma[3]; ?>" class="<?php if(is_page('calculadora-consumo')){ echo 'active'; } ?>"><?php echo $menu_idioma[3]; ?></a></li>	
								</ul>
							</li>

							<li class="nav-empresa <?php if((is_page('empresa'))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>" title="<?php echo $menu_idioma[4]; ?>"><?php echo $menu_idioma[4]; ?></a>
								<ul class="submenu">
									<li class="nav-empresa-matriz"><a href="<?php echo get_home_url(); ?>/matriz_filiais" title="<?php echo $menu_idioma[5]; ?>" class="<?php if(is_post_type_archive('matriz_filiais')){ echo 'active'; } ?>"><?php echo $menu_idioma[5]; ?></a></li>		
									<li class="nav-empresa-trabalhe"><a href="<?php echo get_permalink(get_page_by_path('trabalhe-conosco')); ?>" title="<?php echo $menu_idioma[6]; ?>" class="<?php if(is_page('trabalhe-conosco')){ echo 'active'; } ?>"><?php echo $menu_idioma[6]; ?></a></li>		
									<li class="nav-empresa-empresa"><a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>#premios" title="<?php echo $menu_idioma[7]; ?>" class=""><?php echo $menu_idioma[7]; ?></a></li>				
									<li class="nav-empresa-ideologia"><a href="<?php echo get_permalink(get_page_by_path('empresa')); ?>#ideologia-corporativa" title="<?php echo $menu_idioma[8]; ?>" class=""><?php echo $menu_idioma[8]; ?></a></li>
								</ul>
							</li>

							<li class="nav-contato <?php if((is_post_type_archive('matriz_filiais')) or (is_page('trabalhe-conosco')) or (is_page('fale-conosco'))){ echo 'active'; } ?>">
								<a href="javascript:" title="<?php echo $menu_idioma[9]; ?>"><?php echo $menu_idioma[9]; ?></a>
								<ul class="submenu">
									<li><a href="<?php echo get_home_url(); ?>/matriz_filiais" title="<?php echo $menu_idioma[5]; ?>" class="nav-contato-matriz <?php if(is_post_type_archive('matriz_filiais')){ echo 'active'; } ?>"><?php echo $menu_idioma[5]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('fale-conosco')); ?>" title="<?php echo $menu_idioma[10]; ?>" class="nav-contato-fale <?php if(is_page('fale-conosco')){ echo 'active'; } ?>"><?php echo $menu_idioma[10]; ?></a></li>		
									<li><a href="<?php echo get_permalink(get_page_by_path('trabalhe-conosco')); ?>" title="<?php echo $menu_idioma[6]; ?>" class="nav-contato-trabalhe <?php if(is_page('trabalhe-conosco')){ echo 'active'; } ?>"><?php echo $menu_idioma[6]; ?></a></li>
								</ul>
							</li>
							<li class="nav-midia <?php if((is_category('release')) or (is_category('na-midia')) or (is_page('downloads')) or (is_singular('post'))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('downloads')); ?>" title="<?php echo $menu_idioma[11]; ?>"><?php echo $menu_idioma[11]; ?></a>
								<?php /*
								<ul class="submenu">
									<li class="nav-midia-release"><a href="<?php echo get_home_url(); ?>/midia/release" title="<?php echo $menu_idioma[12]; ?>" class="<?php if(is_category('release')){ echo 'active'; } ?>"><?php echo $menu_idioma[12]; ?></a></li>		
									<li class="nav-midia-namidia"><a href="<?php echo get_home_url(); ?>/midia/na-midia" title="<?php echo $menu_idioma[13]; ?>" class="<?php if(is_category('na-midia')){ echo 'active'; } ?>"><?php echo $menu_idioma[13]; ?></a></li>		
									<li class="nav-midia-dowloads"><a href="<?php echo get_permalink(get_page_by_path('downloads')); ?>" title="<?php echo $menu_idioma[14]; ?>" class="<?php if(is_page('downloads')){ echo 'active'; } ?>"><?php echo $menu_idioma[14]; ?></a></li>				
								</ul>
								*/ ?>
							</li>


							<li class="nav-pesquisa">
								<ul class="" style="">
									<li>
										<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_home_url(); ?>">
											<div>
												<input type="text" value="" name="s" id="s" placeholder="Pesquisar por:">
												<button type="submit" id="searchsubmit"></button>
												<i class="fa fa-close" id="close-search"></i>
											</div>
										</form>
									</li>
								</ul>
							</li>
						</ul>
					</nav>

				</div>

			</div>
		</div>
	</header>