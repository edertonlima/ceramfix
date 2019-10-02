<?php get_header(); ?>

<section class="box-container box-matriz-filiais">
	<div class="container">
		<h2>
			<?php
				if($idioma == 'en'){
					echo 'CONTACT<br>MATRIX AND UNITS';
				}

				if($idioma == 'pt-br'){
					echo 'CONTATO<br>MATRIZ E UNIDADES';
				}

				if($idioma == 'es'){
					echo 'CONTACTO<br>MATRIZ Y UNIDADES';
				}
			?>
		</h2>
	</div>
	
	<div id="map" class="mapa-google"></div>

    <script>

		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 5,
				center: {lat: -22.3513294, lng: -49.0868505}
			});

			<?php
				$cont = 0;
				while ( have_posts() ) : the_post();
					if((get_field('Latitude')) && (get_field('longitude'))){

						$cont = $cont+1; 

						$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
						$imagem = '';
						
						if($imgPage){
							$imagem = '<img src="'.$imgPage[0].'" class="" alt="">';
						}
						$contMarcador = '<div class="box-info-marker">'.$imagem.'<p><strong>'.get_field("cidade").' - '.get_field("estado").'</strong></p><p>'.get_field('telefone').'</p><p>'.get_field('endereco').'</p></div>'; ?>

						var contentString<?php echo $cont; ?> = '<?php echo $contMarcador; ?>';

						var infowindow<?php echo $cont; ?> = new google.maps.InfoWindow({
							content: contentString<?php echo $cont; ?>
						});

						var marker<?php echo $cont; ?> = new google.maps.Marker({
							position: new google.maps.LatLng(<?php the_field('Latitude') ?>, <?php the_field('longitude') ?>),
							map: map,
							icon: '<?php echo get_template_directory_uri(); ?>/assets/images/marcador.png',
							title: '<?php if(get_field('cidade')){ the_field('cidade'); } if(get_field('estado')){ echo ' - '.get_field('estado'); } ?>'
						});
						marker<?php echo $cont; ?>.addListener('click', function() {
							<?php for($i=1;$i <= $wp_the_query->post_count;$i++){ ?>
								infowindow<?php echo $i; ?>.close();
							<?php } ?>
							infowindow<?php echo $cont; ?>.open(map, marker<?php echo $cont; ?>);
						});

						<?php
					}
				endwhile;
			?>

		}


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgFPAcmDR1PFBimQax_CVbjOjbC0sGj8A&callback=initMap" async defer></script>

	<div class="container">

		<?php
			if($idioma == 'en'){
				if(get_field('descricao',31777)){ ?>
					<div class="conteudo">
						<p><?php the_field('descricao',31777); ?></p>
					</div>
				<?php }
			}

			if($idioma == 'pt-br'){
				if(get_field('descricao',49)){ ?>
					<div class="conteudo">
						<p><?php the_field('descricao',49); ?></p>
					</div>
				<?php }
			}

			if($idioma == 'es'){
				if(get_field('descricao',31780)){ ?>
					<div class="conteudo">
						<p><?php the_field('descricao',31780); ?></p>
					</div>
				<?php }
			}
		?>

		<div class="row sub-conteudo">
			<?php 
				$matriz = 0;
				while ( have_posts() ) : the_post();

					if(get_field('matriz')){
						$matriz = $matriz+1;
						if($matriz == 1){ ?>
							<div class="col-12 item">
								<h3>
									<?php
										if($idioma == 'en'){
											echo 'MATRIX';
										}

										if($idioma == 'pt-br'){
											echo 'MATRIZ';
										}

										if($idioma == 'es'){
											echo 'MATRIZ';
										}
									?>
								</h3>
							</div>
						<?php }
						get_template_part( 'content-matriz_filiais', get_post_format() );
					}
				endwhile; 
			?>
		</div>

		<div class="row sub-conteudo">
			<?php 
				$filiais = 0;
				while ( have_posts() ) : the_post();

					if(!get_field('matriz')){
						$filiais = $filiais+1;
						if($filiais == 1){ ?>
							<div class="col-12 item">
								<h3>
									<?php
										if($idioma == 'en'){
											echo 'UNITS';
										}

										if($idioma == 'pt-br'){
											echo 'UNIDADES';
										}

										if($idioma == 'es'){
											echo 'UNIDADES';
										}
									?>
								</h3>
							</div>
						<?php }
						get_template_part( 'content-matriz_filiais', get_post_format() );
					}
				endwhile; 
			?>
		</div>
	</div>
</section>	

<?php get_footer(); ?>