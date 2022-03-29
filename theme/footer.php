	
	<footer class="footer">
		<div class="container">
			<div class="row">

				<?php if( have_rows('redesociais','option') ):
					while ( have_rows('redesociais','option') ) : the_row(); ?>

						<a href="<?php the_sub_field('url','option'); ?>" class="social" target="_blank" title="<?php the_sub_field('titulo','option'); ?>"><?php the_sub_field('icone','option'); ?></a>

					<?php endwhile;
				endif; ?>

				<div class="info">
					<span class="info-tel"><?php the_field('telefone','option'); ?></span>
				</div>				


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
	
    <!-- Inclusão RD Station -->
	<script type="text/javascript" async src="https://eur02.safelinks.protection.outlook.com/?url=https%3A%2F%2Fd335luupugsy2.cloudfront.net%2Fjs%2Floader-scripts%2F193c6361-3087-42d5-bb14-459a6c167e4f-loader.js&amp;data=04%7C01%7Cfelipe.wilwert%40ceramfix.com.br%7Ca014b5e2e26548badd1008d993064342%7Ca58418612bbb4fdb8658afcae426b642%7C0%7C0%7C637702477814946646%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C3000&amp;sdata=rZPhFpn1zc5RV0qehaChjcD9F96a0r3xW3acDZFfxck%3D&amp;reserved=0" ></script>

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

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery('#btn-buscar').click(function(){
		//jQuery('#search').show();
		jQuery('.nav-pesquisa').toggle();
		jQuery('#s').focus();
	});

	jQuery('#close-search').click(function(){
		//jQuery('#search').hide();
		jQuery('.nav-pesquisa').hide();
	});

	/*jQuery('.menu-principal li').hover(function(){
		jQuery('.nav-pesquisa').hide();
	});*/

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