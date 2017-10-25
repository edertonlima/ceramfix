	
	<footer class="footer">
		<div class="container">
			<div class="row">

				<?php if( have_rows('redesociais','option') ):
					while ( have_rows('redesociais','option') ) : the_row(); ?>

						<a href="<?php the_sub_field('url','option'); ?>" class="social" target="_blank" title="<?php the_sub_field('titulo','option'); ?>"><?php the_sub_field('icone','option'); ?></a>

					<?php endwhile;
				endif; ?>


				<div class="outros-icones">
					<?php if( have_rows('outros_icones','option') ):
						while ( have_rows('outros_icones','option') ) : the_row(); ?>

							<a href="<?php the_sub_field('url','option'); ?>" class="social" target="_blank" title=""><img src="<?php the_sub_field('icone','option'); ?>"></a>

						<?php endwhile;
					endif; ?>
				</div>

				<a href="http://www.di20.com.br" class="di20" target="_blank"><img src="assets/images/logo_di20.png" alt="di20 DESENV." /></a>
				
			</div>
		</div>

		<a href="#" class="seta" rel="body"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	</footer>

</body>
</html>