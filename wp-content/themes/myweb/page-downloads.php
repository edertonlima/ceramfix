<?php get_header(); ?>

<section class="box-container box-release box-download">
	<div class="container">
		<h2>DOWNLOAD</h2>
	</div>

	<div class="container">

		<div class="tab">
			<div class="item" rel="anuncio">ANÚNCIOS</div>
			<div class="item" rel="catalogo">CATÁLOGOS</div>
			<div class="item active" rel="produtos">PRODUTOS</div>

			<!-- ANUNCIOS -->
			<div class="tab-content" id="anuncios">

				<p class="desc-donwload">Selecione a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.</p>

				<?php /*<span class="select">
					<select name="marca-produto">
						<option selected="selected">ESCOLHA A MARCA</option>
						<option value="CERAMFIX">CERAMFIX</option>
					</select>
				</span>*/ ?>

				<span class="select">
					<select name="linha-produto">
						<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>
					</select>
				</span>

				<h3 class="tit-baixar">
					<span id="tit-anuncios"></span>
					<button id="baixar-produto">baixar</button>
				</h3>

				<div class="row list-download">

					<div class="col-12 item-download">
						<img src="assets/images/img-download.png" alt="">
						<h4><span>PORCELANATOS E PEDRAS NATURAIS</span></h4>
						<div class="mockups">
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="arteFinal">
									<span class="checkbox"></span>
									ARTE FINAL
								</label>
							</fieldset>
						</div>
						<div class="mockups">
							<h3>MOCKUPS</h3>
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="tiff">
									<span class="checkbox"></span>
									TIFF
								</label>
							</fieldset>
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="jpg">
									<span class="checkbox"></span>
									JPG
								</label>
							</fieldset>
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="png">
									<span class="checkbox"></span>
									PNG
								</label>
							</fieldset>
						</div>
					</div>

				</div>

			</div>	

			<!-- CATÁLOGOS	 -->
			<div class="tab-content" id="catalogos">

				<p class="desc-donwload">Selecione a marca, a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.</p>

				<span class="select">
					<select name="marca-produto">
						<option selected="selected">ESCOLHA A MARCA</option>
						<option value="CERAMFIX">CERAMFIX</option>
					</select>
				</span>

				<span class="select">
					<select name="linha-produto">
						<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>
					</select>
				</span>

				<h3 class="tit-baixar">
					<span id="tit-catalogos"></span>
					<button id="baixar-produto">baixar</button>
				</h3>

				<div class="row list-download">

					<div class="col-12 item-download">
						<img src="assets/images/img-download.png" alt="">
						<h4><span>PORCELANATOS E PEDRAS NATURAIS</span></h4>
						<div class="mockups">
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="arteFinal">
									<span class="checkbox"></span>
									ARTE FINAL
								</label>
							</fieldset>
						</div>
						<div class="mockups">
							<h3>MOCKUPS</h3>
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="tiff">
									<span class="checkbox"></span>
									TIFF
								</label>
							</fieldset>
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="jpg">
									<span class="checkbox"></span>
									JPG
								</label>
							</fieldset>
							<fieldset class="arteFinal">
								<label>
									<input type="checkbox" name="png">
									<span class="checkbox"></span>
									PNG
								</label>
							</fieldset>
						</div>
					</div>

				</div>

			</div>	

			<!-- PRODUTOS -->
			<div class="tab-content active" id="produtos">

				<p class="desc-donwload">Selecione a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.</p>

				<?php /*<span class="select">
					<select name="marca-produto">
						<option selected="selected">ESCOLHA A MARCA</option>
						<option value="CERAMFIX">CERAMFIX</option>
					</select>
				</span>*/ ?>

				<span class="select">
					<select name="linha-produto">
						<option value="null" selected="selected">ESCOLHA A LINHA DE PRODUTO</option>
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
										
										if((get_field('arte_final')) or (get_field('tiff')) or (get_field('jpg')) or (get_field('png'))){
											$download = $download+1;
											$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );

											$produto[$category->term_id][$post->ID]['id'] = $post->ID;
											$produto[$category->term_id][$post->ID]['nome'] = get_the_title();
											$produto[$category->term_id][$post->ID]['img'] = $imagem[0];
											$produto[$category->term_id][$post->ID]['artefinal'] = get_field('arte_final');
											$produto[$category->term_id][$post->ID]['tiff'] = get_field('tiff');
											$produto[$category->term_id][$post->ID]['jpg'] = get_field('jpg');
											$produto[$category->term_id][$post->ID]['png'] = get_field('png');
										}			
											
									endwhile;

						        }

							    if($download > 0){ ?>
							    	<option value="<?php echo $category->term_id; ?>"><?php echo strtoupper($category->name); ?></option>
							    <?php }
							}
						?>
					</select>
				</span>

				<h3 class="tit-baixar" id="download-prod">
					<span id="tit-produto"></span>
					<button id="baixar-produto">baixar</button>
				</h3>

				<div class="row list-download" id="list-prod"></div>

			</div>	

		</div>

	</div>
</section>

<?php //var_dump($produto); ?>
<?php //print_r($produto); ?>

<script type="text/javascript">
var produto = <?php echo json_encode($produto); ?>;
//alert(produto[4][159]['nome']);

jQuery(document).ready(function() {

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

		jQuery('select[name="linha-produto"]').change(function(){
			jQuery('#list-prod').html('');
			linhaProduto = jQuery(this).val();
			//alert(linhaProduto);
			if(linhaProduto == 'null'){
				jQuery('#download-prod').hide();
				jQuery('#list-prod').html('');
			}else{
				jQuery('#tit-produto').html(jQuery('option:selected',this).text());

				jQuery.each( produto[linhaProduto], function( prod, label ) {
				  	jQuery('#list-prod').append('<div class="col-12 item-download" id="'+prod+'"></div>');
				  	jQuery('#'+prod).append('<img src="'+label.img+'" class="img-produto" alt="">');
				  	jQuery('#'+prod).append('<h4><span>'+label.nome+'</span></h4>');
				  	jQuery('#'+prod).append('<div class="mockups"><fieldset class="arteFinal"><label><input type="checkbox" name="arteFinal" value="'+label.artefinal+'"><span class="checkbox"></span>ARTE FINAL</label></fieldset></div>');

				  	jQuery('#'+prod).append('<div class="mockups mockups-img"><h3>MOCKUPS</h3></div>');
				  	jQuery('#'+prod+' .mockups-img').append('<fieldset class="arteFinal"><label><input type="checkbox" name="tiff" value="'+label.tiff+'"><span class="checkbox"></span>TIFF</label></fieldset>');
				  	jQuery('#'+prod+' .mockups-img').append('<fieldset class="arteFinal"><label><input type="checkbox" name="jpg" value="'+label.jpg+'"><span class="checkbox"></span>JPG</label></fieldset>');
				  	jQuery('#'+prod+' .mockups-img').append('<fieldset class="arteFinal"><label><input type="checkbox" name="png" value="'+label.png+'"><span class="checkbox"></span>PNG</label></fieldset>');
				});

				jQuery('#download-prod').show();

				jQuery('label').click(function(){
					if(jQuery('input[type="checkbox"]',this).is(':checked')){
						jQuery('input[type="checkbox"]',this).prop( "checked", false );
						jQuery('.checkbox',this).html('');
					}else{
						jQuery('input[type="checkbox"]',this).prop( "checked", true );
						jQuery('.checkbox',this).html('<i class="fa fa-check" aria-hidden="true"></i>');
					}
				});
			}
		});
		
	});
</script>

<?php get_footer(); ?>