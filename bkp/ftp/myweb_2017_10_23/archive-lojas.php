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
	</div>		

	<?php 
		if( (isset($_GET['cidade'])) and ($_GET['cidade'] != '') ) {
			if( have_posts() ): ?>
				

			<div class="col-12">
				<div id="map" class="mapa-google"></div>
			</div>

			<script type="text/javascript">
				var locations = [];

    function initMap2() {

		<?php $qtd = 0; while ( have_posts() ) : the_post();?>
			var geocoder = new google.maps.Geocoder();
		    geocoder.geocode({ 'address': '<?php echo get_field('endereco').','.get_field('numero').','.get_field('bairro').','.get_field('cidade').','.get_field('uf').','.get_field('pais'); ?>' }, function (results, status) {
			        if (status == google.maps.GeocoderStatus.OK) {
			            if (results[0]) {
							locations.push({'lat': results[0].geometry.location.lat(), 'lng': results[0].geometry.location.lng()});
			            }
			        }
	    		}
	    	);	
	    <?php $qtd = $qtd+1; endwhile; ?>

        var map = new google.maps.Map(document.getElementById('map'));

		setTimeout(function(){
	        var markers = locations.map(function(localizacao, i) {
	          return new google.maps.Marker({
	            position: localizacao,
	            title: '',
	            icon: '<?php echo get_template_directory_uri(); ?>/assets/images/marcador.png'
	          });
	        });

	        var markerCluster = new MarkerClusterer(map, markers, {
	    	    styles: [
			        {
			            textColor: 'white',
			            url: '<?php echo get_template_directory_uri(); ?>/assets/images/maps/m3.png',
			            height: 65,
			            width: 66
			        }
			    ]
			})


			latlngbounds = new google.maps.LatLngBounds();

			locations.forEach(function(latLng){
				latlngbounds.extend(latLng);
			});

			map.setCenter(latlngbounds.getCenter());
			map.fitBounds(latlngbounds);
		}, 1100);
    }	
			</script>
			

    		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/markerclusterer.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi9fQf_OPrfM4afq_s3TRv6xA-hVtE8-w&callback=initMap2" async defer></script>
			<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2bzSYFXo_wUmJq6v2WFfBvj4em2LbLSo&callback=initMap" async defer></script>-->

				<div class="container">
					<div class="row sub-conteudo">

						<?php while ( have_posts() ) : the_post();

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
			var options = '<option value="Estado">Estado</option>';	
			jQuery.each(data, function (key, val) {
				if(val.sigla.toLowerCase() == estado.toLowerCase()){
					selected = ' selected';
				}else{
					selected = '';
				}
				options += '<option value="' + val.sigla + '" '+selected+'>' + val.nome + '</option>';
			});			

			jQuery("#estados").html(options);

			var str = "Estado";	
			jQuery("#estados").change(function () {	
				var options_cidades = '<option value="Cidade">Cidade</option>';
				str = jQuery('#estados option:selected').val();

				if(str != 'Estado'){
					jQuery.each(data, function (key, val) {
						if(val.sigla == str) {						
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
				str = jQuery('#estados option:selected').val();
			});

			if(str_cidade != 'Cidade'){
				var url = '<?php echo get_home_url(); ?>/lojas/?estado='+str.toLowerCase()+'&cidade='+str_cidade.toLowerCase();
				window.location.replace(url);				
			}
		}).change();
		
	});
</script>