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
		<a href="<?php the_permalink(); ?>" title="SAIBA MAIS" class="saiba-mais">SAIBA MAIS</a>
	</div>	
</article>