<?php /*
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
	} */
?>

<?php 
	$idioma_front_page = [];
	if($idioma == 'pt-br'){
		$idioma_front_page = ['SAIBA MAIS'];
	}

	if($idioma == 'en'){
		$idioma_front_page = ['KNOW MORE'];
	}

	if($idioma == 'es'){
		$idioma_front_page = ['SEPA MAS'];

	}
?>

<article class="post na-midia">
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );  ?>
		
	<header class="img-item <?php if(get_field('video_release')){ echo 'video'; } ?>">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php if($imagem[0]){ ?>
				<span style="background-image: url('<?php echo $imagem[0]; ?>');"></span>
			<?php }
			if(get_field('video_release')){ ?>
				<i class="fa fa-play" aria-hidden="true"></i>
			<?php } ?>
		</a>
	</header>

	<div class="info-item">
		<span class="date"><?php echo get_the_date(); ?></span>
		<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_field('descricao_release'); ?></p>
		<a href="<?php the_permalink(); ?>" title="<?php echo $idioma_front_page[0]; ?>" class="saiba-mais"><?php echo $idioma_front_page[0]; ?></a>
	</div>	
</article>