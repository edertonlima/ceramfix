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
	
	<section class="lojas list-lojas">
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
				if( (isset($_GET['cidade'])) and ($_GET['cidade'] != '') ) {
					if( have_posts() ):
						while ( have_posts() ) : the_post();

							get_template_part( 'content-loja', get_post_format() );
							
						endwhile;
					else :

						get_template_part( 'content-loja-none', get_post_format() );

					endif;
				}else{ ?>
					<div class="conteudo">
						<p class="not-loja">Selecione o estado e cidade para encontrar a loja mais perto de você.</p>
					</div>
				<?php }
			?>

		</div>
	</div>
</section>	

<?php get_footer(); ?>

<script type="text/javascript">

	var estado = '<?php echo $estado; ?>';
	var cidade = '<?php echo $cidade; ?>';

	jQuery(document).ready(function () {	
		jQuery.getJSON('<?php echo get_template_directory_uri(); ?>/estados_cidades.json', function (data) {
			var items = [];
			var options = '<option value="">Estado</option>';	
			jQuery.each(data, function (key, val) {
				if(val.nome.toLowerCase() == estado.toLowerCase()){
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
								if(val_city.toLowerCase() == cidade.toLowerCase()){
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
				}else{
					options_cidades += '<option value="Cidades">Cidades</option>';
					jQuery("#cidades").html(options_cidades).prop('disabled', true);
				}
			}).change();		
		});

		var str_cidade = "Cidade";	
		jQuery("#cidades").change(function () {	
			jQuery("#cidades option:selected").each(function () {
				str_cidade = jQuery('#cidades option:selected').text();
				str = jQuery('#estados option:selected').text();
			});

			if(str_cidade != 'Cidade'){
				var url = '<?php echo get_home_url(); ?>/?post_type=lojas&estado='+str.toLowerCase()+'&cidade='+str_cidade.toLowerCase();
				window.location.replace(url);				
			}
		}).change();
		
	});
</script>