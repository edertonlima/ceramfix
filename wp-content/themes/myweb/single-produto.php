<?php get_header(); ?>

<section class="produtos">
	<div class="container">

		<?php while ( have_posts() ) : the_post();

			$produto_ID = get_the_ID();
			get_template_part( 'content-produto', get_post_format() );

		endwhile; ?>

	</div>
</section>

<section class="produtos">
	<div class="container">
		<h2 class="outros-produtos">Veja outros produtos:</h2>

		<div class="slide-produtos list-produto">

			<?php while ( have_posts() ) : the_post();

				if($produto_ID != get_the_ID()){
					get_template_part( 'content-produto_list_slide', get_post_format() );
				}

			endwhile; ?>

		</div>
	</div>
</section>
	
<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	jQuery.noConflict();
	var owl = jQuery('.slide-produtos');
	owl.owlCarousel({
		margin: 0,
		loop: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	})
</script>

<?php get_footer(); ?>