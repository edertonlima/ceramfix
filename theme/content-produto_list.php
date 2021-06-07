<li>
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
		<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
		<?php if($imgPage){ ?>
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" alt="<?php the_title(); ?>">
		<?php } ?>

		<div class="cont-list-prod">
			<h3><?php the_title(); ?></h3>
			<p><?php the_field('descrição_curta_produto'); ?></p>
		</div>
	</a>
</li>