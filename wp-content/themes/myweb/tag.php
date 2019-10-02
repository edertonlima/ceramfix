<?php get_header(); ?>
 
<section class="produtos">
	<div class="container">
		<h2><?php single_term_title(); ?></h2>
		<h4><?php echo term_description(); ?></h4>
	</div>

	<?php /* if( have_rows('imagem_categoria_produto','option') ):
		while ( have_rows('imagem_categoria_produto','option') ) : the_row(); 

			$term = get_term( get_sub_field('categoria_do_produto','option'), 'categoria_produto' ); 
			if($term->term_id == get_queried_object()->term_id){ ?>
				<div style="background-image: url('<?php the_sub_field('imagem_categoria_produto','option'); ?>');" class="img-linha"></div>
			<?php } ?>

		<?php endwhile;
	endif; */ ?>

	<div class="container">

		<?php 
			$terms_solucoes = get_terms( array(
			    'taxonomy' => 'post_tag',
			    'hide_empty' => true,
			) );

			if($terms_solucoes){ ?>

				<div class="solucoes">

					<h5>

						<?php 
							if($idioma == 'es'){ echo 'NUESTRAS SOLUCIONES'; }
							if($idioma == 'pt-br'){ echo 'NOSSAS SOLUÇÕES'; }
							if($idioma == 'en'){ echo 'OUR SOLUTIONS'; }
						?>

					</h5>
					<?php foreach ($terms_solucoes as $key => $tag_produto) {
						?>
						<a href="<?php echo get_term_link($tag_produto->term_id); ?>" title="<?php echo $tag_produto->name; ?>"><?php echo $tag_produto->name; ?></a>
						<?php
					} ?>
				</div>
			<?php }
		?>

		<ul class="list-produto">
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content-produto_list', get_post_format() ); ?>
				
			<?php endwhile; ?>
		</ul>

		<?php paginacao(); ?>

	</div>
</section>

<?php get_footer(); ?>