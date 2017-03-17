<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php

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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

	});	

	$(window).resize(function(){

	});

</script>

<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){
		jQuery(".seta").click(function(){
			var scroll = jQuery(this).attr('rel');
		    jQuery("html, body").animate({ scrollTop: jQuery(scroll).offset().top }, 1000);
		});
	});
</script>

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
			<div class="row">

				<h1>
					<a href="<?php echo get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
					</a>
				</h1>

				<div class="box-menu">
					<div class="info">
						<span class="info-tel">0800 7045049</span>
						<div class="region">
							<a href="#" class="" title="EN">EN</a>
							<a href="#" class="ativo" title="PT">PT</a>
							<a href="#" class="" title="ES">ES</a>
						</div>
					</div>

					<nav class="nav">
						<ul>
							<li class="">
								<a href="#" title="PRODUTOS" class="ativo">PRODUTOS</a>
							</li>
							<li class="">
								<a href="#" title="SIMULADORES">SIMULADORES</a>
								<ul class="submenu">
									<li class="matriz-filiais"><a href="#" title="SIMULADOR DE CORES">SIMULADOR<br>DE CORES</a></li>		
									<li class="trabalhe-conosco"><a href="#" title="CALCULADORA DE CONSUMO">CALCULADORA<br>DE CONSUMO</a></li>	
								</ul>
							</li>
							<li class="">
								<a href="<?php echo get_permalink(49); ?>" title="EMPRESA">EMPRESA</a>
								<ul class="submenu">
									<li class="matriz-filiais"><a href="#" title="MATRIZ E FILIAIS">MATRIZ E<br>FILIAIS</a></li>		
									<li class="trabalhe-conosco"><a href="#" title="TRABALHE CONOSCO">TRABALHE<br>CONOSCO</a></li>		
									<li class="premios"><a href="<?php echo get_permalink(49); ?>#premios" title="PRÊMIOS">PRÊMIOS</a></li>				
									<li class="ideologia-corporativa"><a href="<?php echo get_permalink(49); ?>#ideologia-corporativa" title="IDEOLOGIA CORPORATIVA">IDEOLOGIA<br>CORPORATIVA</a></li>
								</ul>
							</li>
							<li class="">
								<a href="#" title="CONTATO">CONTATO</a>
								<ul class="submenu">
									<li class="matriz-filiais"><a href="#" title="MATRIZ E FILIAIS">MATRIZ E<br>FILIAIS</a></li>		
									<li class="trabalhe-conosco"><a href="#" title="FALE CONOSCO">FALE<br>CONOSCO</a></li>		
									<li class="trabalhe-conosco"><a href="#" title="TRABALHE CONOSCO">TRABALHE<br>CONOSCO</a></li>
								</ul>
							</li>
							<li class="">
								<a href="#" title="MÍDIA">MÍDIA</a>
								<ul class="submenu">
									<li class="matriz-filiais"><a href="#" title="RELEASES">RELEASES</a></li>		
									<li class="trabalhe-conosco"><a href="#" title="NA MÍDIA">NA MÍDIA</a></li>		
									<li class="premios"><a href="#" title="DOWNLOAD">DOWNLOAD</a></li>				
								</ul>
							</li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</header>