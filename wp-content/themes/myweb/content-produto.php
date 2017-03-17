<div class="detalhe-produto">
		
	<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<?php if($imgPage){ ?>
		<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-produto" alt="">
	<?php } ?>

	<div class="cont-detalhe-produto">
		<h2><?php the_title(); ?></h2>
		<p><?php the_field('descrição_produto'); ?></p>

		<div class="indicacao">
			<h2>Indicação de uso</h2>
			<ul>

				<?php if( have_rows('indicação_produto') ):
					while ( have_rows('indicação_produto') ) : the_row(); ?>

						<li>
							<img src="<?php the_sub_field('icone_indicacao'); ?>" alt="<?php the_sub_field('titulo_indicacao'); ?>">
							<span><?php the_sub_field('titulo_indicacao'); ?></span>
						</li>

					<?php endwhile;
				endif; ?>

			</ul>
		</div>
	</div>

</div>