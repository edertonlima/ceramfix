<?php
	if(isset($_GET['estado'])){
		$estado = $_GET['estado'];	
	}else{
		$estado = '';
	}

	if(isset($_GET['cidade'])){
		$cidade = $_GET['cidade'];	
	}else{
		$cidade = '';
	}
?>

<?php get_header(); ?>

<section class="box-container box-lojas">
	<div class="container">
		<h2>LOJAS CADASTRADAS</h2>
	</div>
	
	<section class="lojas">
		<div class="container">
			
			<div class="mapa-select" style="background-image: url('<?php the_field('imagem_busca','options'); ?>');">

				<h3>ENCONTRAR LOJAS PERTO DE MIM</h3>

				<div class="bg-select">
					<span class="select selectboxproduto">
						<select name="produto" id="estados" class="select-produto"></select>
					</span>

					<span class="select selectboxproduto">
						<select name="cidades" id="cidades" class="select-produto" disabled></select>
					</span>
				</div>
				
			</div>

		</div>
	</section>

	<div class="container">
		<?php if(get_field('descricao_loja','options')){ ?>
			<div class="conteudo">
				<p><?php the_field('descricao_loja','options') ?></p>
			</div>
		<?php } ?>

		<div class="row sub-conteudo">

			<?php 
				while ( have_posts() ) : the_post();

						get_template_part( 'content-loja', get_post_format() );
					
				endwhile; 
			?>

			<?php /*
				$args = array( 'post_type' => 'lojas','posts_per_page' => '10','meta_key' => 'estado','meta_value' => 'Santa Catarina');
				$lojas = new WP_Query( $args );

				if( $lojas->have_posts() ): ?>
					<ul>
					<?php while( $lojas->have_posts() ) : $lojas->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php the_field('event_thumbnail'); ?>" />
								<?php the_title(); ?>
							</a>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif;

				foreach( $lojas as $loja ) {
					//get_template_part( 'content-loja', get_post_format() );
				}*/
			?>

		</div>
	</div>
</section>	

<?php get_footer(); ?>

<script type="text/javascript">

	function get_lojas(cidade){
		//alert(cidade)
	}
		
	<?php 
		if(($estado != '') and ($cidade != '')){ ?>
			var estado = '<?php echo $estado; ?>';
			var cidade = '<?php echo $cidade; ?>';
		<?php }else{ ?>
			var estado = '';
			var cidade = '';
		<?php }
	?>

	jQuery(document).ready(function () {	
		jQuery.getJSON('<?php echo get_template_directory_uri(); ?>/estados_cidades.json', function (data) {
			var items = [];
			var options = '<option value="">Estado</option>';	
			jQuery.each(data, function (key, val) {
				if(val.nome == estado){
					selected = ' selected';
				}else{
					selected = '';
				}
				options += '<option value="' + val.nome + '" '+selected+'>' + val.nome + '</option>';
			});			

			jQuery("#estados").html(options);

			var str = "Estado";	
			jQuery("#estados").change(function () {	
				var options_cidades = '<option value="Cidade">Cidade</option>';
				str = jQuery('#estados option:selected').text();

				if(str != 'Estado'){
					jQuery.each(data, function (key, val) {
						if(val.nome == str) {						
							jQuery.each(val.cidades, function (key_city, val_city) {
								if(val_city == cidade){
									selected = ' selected';
								}else{
									selected = '';
								}
								options_cidades += '<option value="' + val_city + '" '+selected+'>' + val_city + '</option>';
							});					
						}
					});
					jQuery("#cidades").html(options_cidades).prop('disabled', false);
					str_cidade = jQuery('#cidades option:selected').text();
					get_lojas(str_cidade);
				}else{
					options_cidades += '<option value="Cidades">Cidades</option>';
					jQuery("#cidades").html(options_cidades).prop('disabled', true);
				}
			}).change();		
		});
		
	});
</script>