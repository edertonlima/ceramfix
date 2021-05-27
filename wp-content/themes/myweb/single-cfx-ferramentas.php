<?php get_header(); ?>

<section class="produtos">
	<div class="container">

		<?php /*
			$terms = get_terms( array(
			    'taxonomy' => 'post_tag',
			    'hide_empty' => true,
			) );

			if($terms){ ?>

				<div class="solucoes">

					<h5>

						<?php 
							if($idioma == 'es'){ echo 'NUESTRAS SOLUCIONES'; }
							if($idioma == 'pt-br'){ echo 'NOSSAS SOLUÇÕES'; }
							if($idioma == 'en'){ echo 'OUR SOLUTIONS'; }
						?>

					</h5>
					<?php foreach ($terms as $key => $tag_produto) {
						?>
						<a href="<?php echo get_term_link($tag_produto->term_id); ?>" title="<?php echo $tag_produto->name; ?>"><?php echo $tag_produto->name; ?></a>
						<?php
					} ?>
				</div>
			<?php } */
		?>

		<?php while ( have_posts() ) : the_post();

			$produto_ID = get_the_ID();
			get_template_part( 'content-produto', get_post_format() );

		endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>