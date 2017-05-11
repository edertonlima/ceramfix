<?php get_header(); ?>

<section class="produtos">
	<div class="container">

		<?php while ( have_posts() ) : the_post();

			$produto_ID = get_the_ID();
			get_template_part( 'content-produto', get_post_format() );

		endwhile; ?>

	</div>
</section>

<?php if( have_rows('produto') ): ?>

	<section class="produtos">
		<div class="container">
			<h2 class="outros-produtos">Veja outros produtos:</h2>

			<div class="slide-produtos list-produto owl-carousel owl-theme">
					
				<?php if( have_rows('produto') ):
					while ( have_rows('produto') ) : the_row(); 

						$outros_pro = get_sub_field('produto'); ?>

							<div class="item">
								<a href="<?php echo get_permalink($outros_pro->ID); ?>" title="<?php echo $outros_pro->post_title; ?>">
									<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($outros_pro->ID), 'thumbnail' ); ?>
									<?php if($imgPage){ ?>
										<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" alt="<?php echo $outros_pro->post_title; ?>">
									<?php } ?>
									<div class="cont-list-prod">
										<h3><?php echo $outros_pro->post_title; ?></h3>
										<p><?php the_field('descrição_curta_produto',$outros_pro->ID); ?></p>
									</div>
								</a>
							</div>

							<div class="item">
								<a href="<?php echo get_permalink($outros_pro->ID); ?>" title="<?php echo $outros_pro->post_title; ?>">
									<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($outros_pro->ID), 'thumbnail' ); ?>
									<?php if($imgPage){ ?>
										<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" alt="<?php echo $outros_pro->post_title; ?>">
									<?php } ?>
									<div class="cont-list-prod">
										<h3><?php echo $outros_pro->post_title; ?></h3>
										<p><?php the_field('descrição_curta_produto',$outros_pro->ID); ?></p>
									</div>
								</a>
							</div>

					<?php endwhile;
				endif; ?>

			</div>
		</div>
	</section>

<?php endif; ?>

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

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	jQuery.noConflict();
	var owl = jQuery('.slide-produtos');
	owl.owlCarousel({
		margin: 0,
		loop: false,
		nav:true,
		responsive: {
			0: {
				items: 3
			},
			600: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	})
</script>

<?php get_footer(); ?>