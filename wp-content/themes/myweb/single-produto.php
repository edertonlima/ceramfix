<?php get_header(); ?>

<section class="produtos">
	<div class="container">

		<?php while ( have_posts() ) : the_post();

			$produto_ID = get_the_ID();
			get_template_part( 'content-produto', get_post_format() );

		endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>