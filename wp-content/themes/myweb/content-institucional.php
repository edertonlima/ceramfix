<div class="col-6 item">
	<div class="img-item">
		<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
		<?php if($imgPage){ ?>
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="" alt="">
		<?php } ?>
	</div>
	<div class="info-item">
		<h3><?php the_title(); ?></h3>
	</div>
</div>