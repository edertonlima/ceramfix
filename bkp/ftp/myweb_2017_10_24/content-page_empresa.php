<div class="container">
	<h2><?php the_title(); ?></h2>
	<p class="subtitulo"><?php the_field('titulo_page'); ?></p>
</div>

<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
<?php if($imgPage){ ?>
	<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-page">
<?php } ?>

<div class="container">
	<div class="conteudo">
		<p><?php the_field('conteudo_page'); ?></p>
	</div>

	<div class="row sub-conteudo">

		<?php if( have_rows('blocos_empresa') ):
			while ( have_rows('blocos_empresa') ) : the_row(); ?>

				<div class="col-6 item">
					<img src="<?php the_sub_field('icone_empresa'); ?>" class="icon-item">
					<h3><?php the_sub_field('titulo_empresa'); ?></h3>
					<?php if(get_sub_field('texto_empresa')){ ?>
						<p><?php the_sub_field('texto_empresa'); ?></p>
					<?php } ?>
				</div>

			<?php endwhile;
		endif; ?>

	</div>
</div>