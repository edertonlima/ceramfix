<?php get_header(); ?>

<section class="produtos">
	<div class="container">

		<?php while ( have_posts() ) : the_post();

			$produto_ID = get_the_ID();
			get_template_part( 'content-produto', get_post_format() );

		endwhile; ?>

	</div>
</section>






<?php /*
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.easing-1.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery(".img-produto").fancybox();
	});
</script>
*/ ?>



<?php get_footer(); ?>