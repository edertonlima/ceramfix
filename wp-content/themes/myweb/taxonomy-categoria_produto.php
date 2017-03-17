<?php get_header(); ?>

<section class="produtos">
	<div class="container">
		<h2><?php single_term_title(); ?></h2>
		<h4><?php echo term_description(); ?></h4>
	</div>

	<?php if( have_rows('imagem_categoria_produto','option') ):
		while ( have_rows('imagem_categoria_produto','option') ) : the_row(); 

			$term = get_term( get_sub_field('categoria_do_produto','option'), 'categoria_produto' ); 
			if($term->term_id == get_queried_object()->term_id){ ?>
				<img src="<?php the_sub_field('imagem_categoria_produto','option'); ?>" class="img-linha" alt="ARGAMASSA COLANTE">
			<?php } ?>

		<?php endwhile;
	endif; ?>

	

	<div class="container">
		<ul class="list-produto">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content-produto_list', get_post_format() ); ?>

			<?php endwhile; ?>

		</ul>
	</div>
</section>	

<?php get_footer(); ?>