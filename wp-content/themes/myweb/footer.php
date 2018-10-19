	
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

<div class="search" id="search">
	<div class="form-search">
		<i class="fa fa-close" id="close-search"></i>
		<?php get_search_form(); ?>

		<?php /*<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_home_url(); ?>">
			<div>
				<label class="screen-reader-text" for="s">Pesquisar por:</label>
				<fieldset>
					<span>
						<input class="text-search" type="text" value="" name="s" id="s" placeholder="O que você deseja buscar?">
					</span>
				</fieldset>
				<fieldset>
					<input type="submit" id="searchsubmit" value="Pesquisar">
				</fieldset>
			</div>
		</form>*/?>

	</div>	
</div>

<script type="text/javascript">
	jQuery('#btn-buscar').click(function(){
		jQuery('#search').show();
		jQuery('.text-search').val('').focus();
	});

	jQuery('#close-search').click(function(){
		jQuery('#search').hide();
	});

	jQuery(document).ready(function(){
		jQuery('#searchform').submit(function(){
			if((jQuery('.text-search').val()) != ''){
				return true;
			}else{
				return false;
			}
		});
	});
</script>

</html>