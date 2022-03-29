<?php get_header(); ?>

<?php 
	$idioma_empresa = [];
	if($idioma == 'pt-br'){
		$idioma_empresa = ['PRÊMIOS','IDEOLOGIA CORPORATIVA'];
	}

	if($idioma == 'en'){
		$idioma_empresa = ['AWARDS','CORPORATE IDEOLOGY'];
	}

	if($idioma == 'es'){
		$idioma_empresa = ['PREMIOS','IDEOLOGÍA CORPORATIVA'];
	}
?>

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