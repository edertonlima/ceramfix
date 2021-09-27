<?php get_header(); ?>

<section class="box-container box-empresa">

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'content', 'page_empresa' );

	// End the loop.
	endwhile;
	?>

</section>

<?php get_footer(); ?>
