<?php get_header(); ?>

<section class="box-container box-release">
	<div class="container">
		<h2><?php the_category(); ?></h2>
	</div>

	<div class="container">

		<div class="row sub-conteudo">

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-6 item">
					<?php get_template_part( 'content-list', get_post_format() ); ?>
				</div>
			<?php endwhile; ?>

		</div>

		<ul class="paginacao" style="display: none;">
			<li><a href="javascript:" class="off"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
			<li><a href="javascript:" class="active">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">3</a></li>
			<li><a href="javascript:"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
		</ul>

	</div>
</section>

<?php get_footer(); ?>