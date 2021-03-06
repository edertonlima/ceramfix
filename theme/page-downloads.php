<?php get_header(); ?>

<?php 
	$idioma_download = [];
	if($idioma == 'pt-br'){
		$idioma_download = ['DOWNLOAD','INSTITUCIONAL','CATÁLOGOS','PRODUTOS','Selecione o arquivo que deseja baixar.<br>Pode selecionar vários arquivos juntos para baixar simultaneamente.','É preciso selecionar um arquivo.','baixar','BAIXAR','Selecione a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.','ESCOLHA A LINHA DE PRODUTO','MANUAIS TÉCNICOS','MANUAIS CFX FERRAMENTAS','VÍDEOS','Selecione o vídeo que deseja baixar.<br>Pode selecionar vários vídeos juntos para baixar simultaneamente.']; 
	}

	if($idioma == 'es'){
		$idioma_download = ['DESCARGAR','INSTITUCIONAL','CATÁLOGOS','PRODUCTOS','Seleccione el archivo que desea descargar.<br>Puede seleccionar varios archivos juntos para descargar simultáneamente. ',' Debe seleccionar un archivo. ','bajar ','BAJAR ',' la línea a la que el producto y el tipo de material que desea descargar. <br> Puede seleccionar varios materiales juntos para descargar simultáneamente. ',' SELECCIÓN DE LA LÍNEA DE PRODUCTO ','MANUALES TÉCNICOS','MANUALES CFX HERRAMIENTAS','VIDEOS','Seleccione el video que desea descargar.<br>Puede seleccionar varios videos juntos para descargar simultáneamente.'];
	}

	if($idioma == 'en'){
		$idioma_download = ['DOWNLOAD','INSTITUTIONAL','CATALOG', 'PRODUCTS', 'Select the file you want to download.<br>You can select multiple files together to download simultaneously. ',' You must select a file. ','download','DOWNLOAD',' line to which the product and the type of material you want to download. <br> You can select multiple materials together to download simultaneously. ',' CHOOSE THE PRODUCT LINE ','TECHNICAL MANUALS','MANUALS CFX TOOLS','VIDEOS','Select the video you want to download.<br>You can select multiple videos together to download simultaneously'];
	}
?>

<section class="box-container box-release box-download">
	<div class="container">
		<h2><?php echo $idioma_download[0]; ?></h2>
	</div>

	<div class="container">

		<div class="tab">
			<div class="item" rel="#anuncios"><?php echo $idioma_download[1]; ?></div>
			<div class="item" rel="#catalogos"><?php echo $idioma_download[2]; ?></div>
            <div class="item" rel="#videos"><?php echo $idioma_download[12]; ?></div>
			<div class="item" rel="#manuais-tecnicos"><?php echo $idioma_download[10]; ?></div>
			<div class="item" rel="#manuais-tecnicos-cfx"><?php echo $idioma_download[11]; ?></div>			
			<div class="item active" rel="#produtos"><?php echo $idioma_download[3]; ?></div>
            
            <!-- VÍDEOS	 -->
			<div class="tab-content" id="videos">
				<form action="<?php echo get_template_directory_uri(); ?>/compactar.php" method="post" id="form-videos">

					<p class="desc-donwload"><?php echo $idioma_download[13]; ?></p>

					<?php if( have_rows('download-videos','option') ): ?>
						<h3 class="tit-baixar" style="display: block;">
							<span id="tit-videos"></span>
							<span class="erro-download"><?php echo $idioma_download[5]; ?></span>
							<a class="baixar-produto" rel="#form-videos"><?php echo $idioma_download[6]; ?></a>
						</h3>

						<div class="row list-download">

							<?php $itemVideos = 0; while ( have_rows('download-videos','option') ) : the_row(); ?>

								<div class="col-12 item-download <?php if(!get_sub_field('imagem','option')){ echo 'no-image'; } ?>">
									<?php if(get_sub_field('imagem','option')){ ?>
										<img src="<?php the_sub_field('imagem','option'); ?>" alt="<?php the_sub_field('titulo','option'); ?>">
									<?php } ?>
									<h4><span><?php the_sub_field('titulo','option'); ?></span></h4>
									<div class="mockups">
										<fieldset class="arteFinal">
											<label>
												<input type="checkbox" name="arteFinal-<?php echo $itemVideos; ?>" value="<?php the_sub_field('arquivo','option'); ?>">
												<span class="checkbox"></span>
												<?php echo $idioma_download[7]; ?>
											</label>
										</fieldset>
									</div>
								</div>

							<?php $itemVideos = $itemVideos+1; endwhile; ?>
						</div>
					<?php endif; ?>

				</form>
			</div>
            

			<!-- ANUNCIOS -->
			<div class="tab-content" id="anuncios">
				<form action="<?php echo get_template_directory_uri(); ?>/compactar.php" method="post" id="form-anuncios">

					<p class="desc-donwload"><?php echo $idioma_download[8]; ?></p>

					<?php if( have_rows('anuncios','option') ): ?>
						<h3 class="tit-baixar">
							<span id="tit-anuncios"></span>
							<span class="erro-download"><?php echo $idioma_download[5]; ?></span>
							<a class="baixar-produto" rel="#form-anuncios"><?php echo $idioma_download[6]; ?></a>
						</h3>

						<div class="row list-download">

							<?php $itemAnuncio = 0; while ( have_rows('anuncios','option') ) : the_row(); ?>

								<div class="col-12 item-download <?php if(!get_sub_field('imagem','option')){ echo 'no-image'; } ?>">
									<?php if(get_sub_field('imagem','option')){ ?>
										<img src="<?php the_sub_field('imagem','option'); ?>" alt="<?php the_sub_field('titulo','option'); ?>">
									<?php } ?>
									<h4><span><?php the_sub_field('titulo','option'); ?></span></h4>
									<div class="mockups">
										<fieldset class="arteFinal">
											<label>
												<input type="checkbox" name="arquivo-<?php echo $itemAnuncio; ?>" value="<?php the_sub_field('arquivo','option'); ?>">
												<span class="checkbox"></span>
												<?php echo $idioma_download[7]; ?>
											</label>
										</fieldset>
									</div>
								</div>

							<?php $itemAnuncio = $itemAnuncio+1; endwhile; ?>
						</div>
					<?php endif; ?>

				</form>
			</div>	

			<!-- CATÁLOGOS	 -->
			<div class="tab-content" id="catalogos">
				<form action="<?php echo get_template_directory_uri(); ?>/compactar.php" method="post" id="form-catalogo">

					<p class="desc-donwload"><?php echo $idioma_download[4]; ?></p>

					<?php if( have_rows('catalogos','option') ): ?>
						<h3 class="tit-baixar">
							<span id="tit-catalogos"></span>
							<span class="erro-download"><?php echo $idioma_download[5]; ?></span>
							<a class="baixar-produto" rel="#form-catalogo"><?php echo $idioma_download[6]; ?></a>
						</h3>

						<div class="row list-download">

							<?php $itemCatalogo = 0; while ( have_rows('catalogos','option') ) : the_row(); ?>

								<div class="col-12 item-download <?php if(!get_sub_field('imagem','option')){ echo 'no-image'; } ?>">
									<?php if(get_sub_field('imagem','option')){ ?>
										<img src="<?php the_sub_field('imagem','option'); ?>" alt="<?php the_sub_field('titulo','option'); ?>">
									<?php } ?>
									<h4><span><?php the_sub_field('titulo','option'); ?></span></h4>
									<div class="mockups">
										<fieldset class="arteFinal">
											<label>
												<input type="checkbox" name="arteFinal-<?php echo $itemCatalogo; ?>" value="<?php the_sub_field('arquivo','option'); ?>">
												<span class="checkbox"></span>
												<?php echo $idioma_download[7]; ?>
											</label>
										</fieldset>
									</div>
								</div>

							<?php $itemCatalogo = $itemCatalogo+1; endwhile; ?>
						</div>
					<?php endif; ?>

				</form>
			</div>	


			<!-- Manuais Técnicos -->
			<div class="tab-content" id="manuais-tecnicos">
				<form action="<?php echo get_template_directory_uri(); ?>/compactar.php" method="post" id="form-manuais-tecnicos">

					<p class="desc-donwload"><?php echo $idioma_download[4]; ?></p>

					<?php if( have_rows('manuais-tecnicos','option') ): ?>
						<h3 class="tit-baixar" style="display: block;">
							<span id="tit-manuais-tecnicos"></span>
							<span class="erro-download"><?php echo $idioma_download[5]; ?></span>
							<a class="baixar-produto" rel="#form-manuais-tecnicos"><?php echo $idioma_download[6]; ?></a>
						</h3>

						<div class="row list-download">

							<?php $itemManuais_tecnicos = 0; while ( have_rows('manuais-tecnicos','option') ) : the_row(); ?>

								<div class="col-12 item-download <?php if(!get_sub_field('imagem','option')){ echo 'no-image'; } ?>">
									<?php if(get_sub_field('imagem','option')){ ?>
										<img src="<?php the_sub_field('imagem','option'); ?>" alt="<?php the_sub_field('titulo','option'); ?>">
									<?php } ?>
									<h4><span><?php the_sub_field('titulo','option'); ?></span></h4>
									<div class="mockups">
										<fieldset class="arteFinal">
											<label>
												<input type="checkbox" name="arteFinal-<?php echo $itemManuais_tecnicos; ?>" value="<?php the_sub_field('arquivo','option'); ?>">
												<span class="checkbox"></span>
												<?php echo $idioma_download[7]; ?>
											</label>
										</fieldset>
									</div>
								</div>

							<?php $itemManuais_tecnicos = $itemManuais_tecnicos+1; endwhile; ?>
						</div>
					<?php endif; ?>

				</form>
			</div>	


			<!-- Manuais CFX Ferramentas -->
			<div class="tab-content" id="manuais-tecnicos-cfx">
				<form action="<?php echo get_template_directory_uri(); ?>/compactar.php" method="post" id="form-manuais-tecnicos-cfx">

					<p class="desc-donwload"><?php echo $idioma_download[4]; ?></p>

					<?php if( have_rows('manuais-tecnicos-cfx','option') ): ?>
						<h3 class="tit-baixar" style="display: block;">
							<span id="tit-manuais-tecnicos"></span>
							<span class="erro-download"><?php echo $idioma_download[5]; ?></span>
							<a class="baixar-produto" rel="#form-manuais-tecnicos-cfx"><?php echo $idioma_download[6]; ?></a>
						</h3>

						<div class="row list-download">

							<?php $itemManuais_tecnicos_cfx = 0; while ( have_rows('manuais-tecnicos-cfx','option') ) : the_row(); ?>

								<div class="col-12 item-download <?php if(!get_sub_field('imagem','option')){ echo 'no-image'; } ?>">
									<?php if(get_sub_field('imagem','option')){ ?>
										<img src="<?php the_sub_field('imagem','option'); ?>" alt="<?php the_sub_field('titulo','option'); ?>">
									<?php } ?>
									<h4><span><?php the_sub_field('titulo','option'); ?></span></h4>
									<div class="mockups">
										<fieldset class="arteFinal">
											<label>
												<input type="checkbox" name="arteFinal-<?php echo $itemManuais_tecnicos_cfx; ?>" value="<?php the_sub_field('arquivo','option'); ?>">
												<span class="checkbox"></span>
												<?php echo $idioma_download[7]; ?>
											</label>
										</fieldset>
									</div>
								</div>

							<?php $itemManuais_tecnicos_cfx = $itemManuais_tecnicos_cfx+1; endwhile; ?>
						</div>
					<?php endif; ?>

				</form>
			</div>


			<!-- PRODUTOS -->
			<div class="tab-content active" id="produtos">
				<form action="<?php echo get_template_directory_uri(); ?>/compactar.php" method="post" id="form-produto">

					<p class="desc-donwload"><?php echo $idioma_download[4]; ?></p>

					<span class="select">
						<select id="linha-produto">
							<option value="null" selected="selected"><?php echo $idioma_download[9]; ?></option>
							<?php
								$produto = [];
								$args = array(
								    'taxonomy'      => 'categoria_produto',
								    'parent'        => 0, // get top level categories
								    'orderby'       => 'name',
								    'order'         => 'ASC',
								    'hierarchical'  => 1,
								    'pad_counts'    => 0
								);
								$categories = get_categories( $args );
								foreach ( $categories as $category ){

									$download = 0; 
							        $getPosts = array(
							            'posts_per_page' => 999,
							            'post_type'   => 'produto',
							            'post_status' => 'any',
										'tax_query' => array(
										    array(
										        'taxonomy' => 'categoria_produto',
										        'terms' => $category->term_id,
										        'include_children' => false,
										        'operator' => 'IN'
										    )
										),
							        );
							        $posts = new WP_Query( $getPosts );
							        if(count($posts) > 0){

										while($posts->have_posts()) : $posts->the_post();
											
											if((get_field('tiff')) or (get_field('jpg')) or (get_field('png'))){
												$download = $download+1;
												$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );

												$produto[$category->term_id][$post->ID]['id'] = $post->ID;
												$produto[$category->term_id][$post->ID]['nome'] = get_the_title();
												$produto[$category->term_id][$post->ID]['img'] = $imagem[0];
												$produto[$category->term_id][$post->ID]['tiff'] = get_field('tiff');
												$produto[$category->term_id][$post->ID]['jpg'] = get_field('jpg');
												$produto[$category->term_id][$post->ID]['png'] = get_field('png');
											}			
												
										endwhile;

							        }

								    if($download > 0){ ?>
								    	<option value="<?php echo $category->term_id; ?>"><?php echo mb_strtoupper($category->name, 'UTF-8'); ?></option>
								    <?php }
								}
							?>
						</select>
					</span>

					<h3 class="tit-baixar" id="download-prod">
						<span id="tit-produto"></span>
						<span class="erro-download"><?php echo $idioma_download[5]; ?></span>
						<a class="baixar-produto" rel="#form-produto"><?php echo $idioma_download[6]; ?></a>
					</h3>

					<div class="row list-download" id="list-prod"></div>

				</form>
			</div>	

		</div>

	</div>
</section>

<?php //print_r($posts); ?>
<?php //echo 'qtd produtos: '.count($posts); ?>
<?php //echo '<br>qtd produtos na categoria 2: '.count($produto['2']); ?>
<?php //var_dump($produto); ?>
<?php //print_r($produto); ?>

<?php //print_r($produto); ?>

<script type="text/javascript">
	var linha = '';
	var form = false;
	var produto = <?php echo json_encode($produto); ?>;
	//alert(produto[4][159]['nome']);

	jQuery(document).ready(function(){

		jQuery('.tab .item').click(function(){
			form = false;
			jQuery('input[type="checkbox"]').prop( "checked", false );
			jQuery('.checkbox').html('');

			jQuery('.erro-download').hide();
			jQuery('.tab .item').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.tab-content').removeClass('active');
			jQuery(jQuery(this).attr('rel')).addClass('active');
		});

		jQuery('fieldset:not(.off) label').click(function(){
			if(jQuery('input[type="checkbox"]',this).is(':checked')){
				jQuery('input[type="checkbox"]',this).prop( "checked", false );
				jQuery('.checkbox',this).html('');
				form = false;
			}else{
				jQuery('input[type="checkbox"]',this).prop( "checked", true );
				jQuery('.checkbox',this).html('<i class="fa fa-check" aria-hidden="true"></i>');
				jQuery('.erro-download').hide();
			}
		});

		/*
		jQuery('select[name="marca-produto"]').change(function(){
			marcaProduto = jQuery(this).val();
			if(marcaProduto == 'ESCOLHA A MARCA'){
				marcaProduto == '';
				jQuery('select[name="linha-produto"]').html('<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>');
			}else{
				jQuery('select[name="linha-produto"]').append('<option value="ARGAMASSA COLANTE">ARGAMASSA COLANTE</option><option value="ARGAMASSA PARA REJUNTAMENTO">ARGAMASSA PARA REJUNTAMENTO</option><option value="ARGAMASSA PARA REVESTIMENTO">ARGAMASSA PARA REVESTIMENTO</option><option value="LINHA AUTOFUGANTE">LINHA AUTOFUGANTE</option><option value="IMPERMEABILIZANTE">IMPERMEABILIZANTE</option><option value="FAÇA FÁCIL">FAÇA FÁCIL</option><option value="LINHA TÉCNICA">LINHA TÉCNICA</option>');
			}
		});
		*/

		jQuery('.baixar-produto').click(function(){
			jQuery('input[type="checkbox"]',jQuery(this).attr('rel')).each(function(){
				if(jQuery(this).prop("checked")){
					if(!form){
						form = true;
					}else{
					}
				}else{
				}
			});

			if(form){
				jQuery(jQuery(this).attr('rel')).submit();
			}else{
				jQuery('.erro-download').show();
			}
		});

		jQuery('select#linha-produto').change(function(){
			form = false;
			jQuery('.erro-download').hide();
			jQuery('#list-prod').html('');
			linhaProduto = jQuery(this).val();
			//alert(linhaProduto);
			if(linhaProduto == 'null'){
				jQuery('#download-prod').hide();
				jQuery('#list-prod').html('');
			}else{
				jQuery('#tit-produto').html(jQuery('option:selected',this).text());

				linha = 0;
				jQuery.each( produto[linhaProduto], function( prod, label ) {
				  	jQuery('#list-prod').append('<div class="col-12 item-download" id="'+prod+'"></div>');
				  	jQuery('#'+prod).append('<img src="'+label.img+'" class="img-produto" alt="">');
				  	jQuery('#'+prod).append('<h4><span>'+label.nome+'</span></h4>');
				  	
				  	/*if(label.artefinal){
				  		jQuery('#'+prod).append('<div class="mockups"><fieldset class="arteFinal"><label><input type="checkbox" name="arteFinal" value="'+label.artefinal+'"><span class="checkbox"></span>ARTE FINAL</label></fieldset></div>');
				  	}*/
				  	
				  	jQuery('#'+prod).append('<div class="mockups mockups-img"></div>');
				  	if((label.png) || (label.tiff) || (label.jpg)){
				  		jQuery('#'+prod+' .mockups-img').append('<h3>MOCKUPS</h3>');
				  	}
				  	
				  	if(label.tiff){
				  		jQuery('#'+prod+' .mockups-img').append('<fieldset class="arteFinal"><label><input type="checkbox" name="tiff-'+linha+'" value="'+label.tiff+'"><span class="checkbox"></span>TIFF</label></fieldset>');
				  	}
				  	

				  	if(label.jpg){
				  		jQuery('#'+prod+' .mockups-img').append('<fieldset class="arteFinal"><label><input type="checkbox" name="jpg-'+linha+'" value="'+label.jpg+'"><span class="checkbox"></span>JPG</label></fieldset>');
				  	}
				  	

				  	if(label.png){
				  		jQuery('#'+prod+' .mockups-img').append('<fieldset class="arteFinal"><label><input type="checkbox" name="png-'+linha+'" value="'+label.png+'"><span class="checkbox"></span>PNG</label></fieldset>');
				  	}

					jQuery('#download-prod').show();

					jQuery('fieldset:not(.off) label').click(function(){
						if(jQuery('input[type="checkbox"]',this).is(':checked')){
							jQuery('input[type="checkbox"]',this).prop( "checked", false );
							jQuery('.checkbox',this).html('');
							form = false;
						}else{
							jQuery('input[type="checkbox"]',this).prop( "checked", true );
							jQuery('.checkbox',this).html('<i class="fa fa-check" aria-hidden="true"></i>');
							jQuery('.erro-download').hide();
						}
					});

					linha = linha+parseInt(1);
				});
			}
		});
	});
</script>

<?php get_footer(); ?>