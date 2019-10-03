<?php get_header(); ?>

<?php 
	$query_get_produto = array(
		'posts_per_page' => 99999,
		'post_type'   => 'produto',
		'post_status' => 'any',
		'orderby' => 'title',
		'order'   => 'ASC',
	);

	$get_produto = new WP_Query( $query_get_produto );
	if (have_posts()){
		while($get_produto->have_posts()) : $get_produto->the_post();
			$count_amb = 0;
			$name_amb = array();

			if(get_field('amb_sala')){
				$name_amb[] = 'sala';
				$count_amb = $count_amb+1;
			}
			
			if(get_field('amb_cozinha',$simulacao_prod)){
				$name_amb[] = 'cozinha';
				$count_amb = $count_amb+1;
			}

			if(get_field('amb_banheiro',$simulacao_prod)){
				$name_amb[] = 'banheiro';
				$count_amb = $count_amb+1;
			}

			if(get_field('amb_piscina',$simulacao_prod)){
				$name_amb[] = 'piscina';
				$count_amb = $count_amb+1;
			}

			if(get_field('amb_fachada',$simulacao_prod)){
				$name_amb[] = 'fachada';
				$count_amb = $count_amb+1;
			}

			if($count_amb > 0){
				$data  = [ 'ID' => $post->ID ];
				$data += [ 'post_title' => $post->post_title ];
				$data += [ 'post_name' => $post->post_name ];

				if( have_rows('cores') ):														    
				    while ( have_rows('cores') ) : the_row();

				    	$cor  = [ 'hexa' => get_sub_field('hexa') ];
				    	$cor += [ 'nome' => get_sub_field('nome') ];

				    	$cores[] = $cor;			    	

					endwhile;
				endif;
				//var_dump($name_amb);
				$data += [ 'cores' => $cores ];

				foreach ($name_amb as $key => $nome_ambiente) {
					$ambiente_prod[$nome_ambiente][] = $data;
				}
			}

		endwhile;
	}
	wp_reset_postdata();
	//echo '<pre>', var_dump($ambiente_prod), '</pre>';
?>


<style type="text/css">
	.page .box-container.box-simulador-cores .tab > .item {
		width: 20%;
	}
</style>

<?php
	$idioma_single_produto = [];
	if($idioma == 'pt-br'){
		$idioma_single_produto = ['SALA','COZINHA','BANHEIRO','PISCINA','ESCOLHA UM PRODUTO','SELECIONE A COR DO REJUNTE DA PAREDE','SELECIONE A COR DO REJUNTE DO PISO','SELECIONE A IMAGEM DA PAREDE','SELECIONE A IMAGEM DO PISO','SELECIONE A IMAGEM DA PASTILHA','SELECIONE A COR DO REJUNTE DA PASTILHA','FACHADA'];
	}

	if($idioma == 'en'){
		$idioma_single_produto = ['LIVING ROOM','KITCHEN','WC','POOL','CHOOSE A PRODUCT','SELECT THE COLOR OF THE WALL JOINT', 'SELECT THE COLOR OF THE FLOOR JOINT', 'SELECT THE WALL IMAGE', 'SELECT THE IMAGE FROM THE FLOOR','SELECT THE PICTURE OF THE SHEET', 'SELECT THE COLOR OF THE SHEET OF THE SHEET','FACHADA'];
	}

	if($idioma == 'es'){
		$idioma_single_produto = ['SALA','COCINA','BAÑO','PISCINA','ELEGIR UN PRODUCTO','SELECCIONE EL COLOR DEL REJUNTO DE LA PARED', 'SELECCIONE EL COLOR DEL REJUNTE DEL PISO', 'SELECCIONE LA IMAGEN DE LA PARED', 'SELECCIONE LA IMAGEN DEL PISO','SELECCIONE LA IMAGEN DE LA PASTILLA', 'SELECCIONE EL COLOR DEL REJUNTE DE LA PASTILLA','FACHADA'];
	}



	/* produto pré-selecionado */
	if($_GET['prod']){
		$simulacao_prod = $_GET['prod'];
		//echo '<pre>', var_dump(get_field('amb_banheiro',$simulacao_prod)), '</pre>';

		$prod_set_amb = array();
		if(get_field('amb_sala',$simulacao_prod)){
			$prod_set_amb[] = 1;
		}else{
			$prod_set_amb[] = 0;
		}
		
		if(get_field('amb_cozinha',$simulacao_prod)){
			$prod_set_amb[] = 1;
		}else{
			$prod_set_amb[] = 0;
		}

		if(get_field('amb_banheiro',$simulacao_prod)){
			$prod_set_amb[] = 1;
		}else{
			$prod_set_amb[] = 0;
		}

		if(get_field('amb_piscina',$simulacao_prod)){
			$prod_set_amb[] = 1;
		}else{
			$prod_set_amb[] = 0;;
		}

		if(get_field('amb_fachada',$simulacao_prod)){
			$prod_set_amb[] = 1;
		}else{
			$prod_set_amb[] = 0;
		}

		//echo '<pre>', var_dump($prod_set_amb), '</pre>';
		$set_prod_amb = true;
	}
?>

<section class="box-container box-simulador-cores" style="margin-bottom: 50px;">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>

	<div class="container">
		<div class="tab">

			<?php 
				if(!empty($ambiente_prod['sala'])){ ?>
					<div class="item item-ambiente active" rel="#sala"><?php echo $idioma_single_produto[0]; ?></div>
				<?php }

				if(!empty($ambiente_prod['cozinha'])){ ?>
					<div class="item item-ambiente" rel="#cozinha"><?php echo $idioma_single_produto[1]; ?></div>
				<?php }

				if(!empty($ambiente_prod['banheiro'])){ ?>
					<div class="item item-ambiente" rel="#banheiro"><?php echo $idioma_single_produto[2]; ?></div>
				<?php }

				if(!empty($ambiente_prod['piscina'])){ ?>
					<div class="item item-ambiente" rel="#piscina"><?php echo $idioma_single_produto[3]; ?></div>
				<?php }

				if(!empty($ambiente_prod['fachada'])){ ?>
					<div class="item item-ambiente" rel="#fachada" style=""><?php echo $idioma_single_produto[11]; ?></div>
				<?php }
			?>
			
			<?php
				foreach ($ambiente_prod as $ambiente => $produtos) { //echo '<pre>',var_dump($produtos),'</pre>'; ?>
				
					<div class="tab-content <?php if($ambiente == 'sala'): echo 'active'; endif; ?>" id="<?php echo $ambiente; ?>">
						<div class="simulador base">
							<div class="cor-parede"></div>
							<div class="cor-piso"></div>
							<?php
								$piso = get_field("piso-{$ambiente}",'option');
								$parede = get_field("parede-{$ambiente}",'option');
								$moveis = get_field("moveis-{$ambiente}",'option');
								$mask = get_field("mask-{$ambiente}",'option');
							?>
							<div class="piso" style="background-image: url('<?php echo $piso; ?>">
								<div class="parede" style="background-image: url('<?php echo $parede; ?>">
									<?php if(($ambiente != 'piscina') OR ($ambiente != 'fachada')): ?>
										<div class="moveis" style="background-image: url('<?php echo $moveis; ?>">
									<?php endif; ?>
											<div class="mask" style="background-image: url('<?php echo $mask; ?>');"></div>
									<?php if(($ambiente != 'piscina') OR ($ambiente != 'fachada')): ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="<?php echo $ambiente; ?>">
									<option value="null" selected="selected"><?php echo $idioma_single_produto[4]; ?></option>
									<?php
										foreach ($produtos as $produto) {
											echo '<option value="',$produto['ID'],'">',$produto['post_title'],'</option>';
										}
									?>
								</select>
							</span>
						</div>

							<?php /*
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?>">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[5]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-parede'])):
											foreach ($produto['rejunte-parede'] as $rejunte_parede){ ?>
												<div class="item" rel="<?php echo $rejunte_parede['cor']; ?>" ambiente="sala" local="cor-parede">
													<span class="cor" style="background-color: <?php echo $rejunte_parede['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte_parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							*/ ?>
							<?php /*
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?>"">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[6]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-piso'])):
											foreach ($produto['rejunte-piso'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['cor']; ?>" ambiente="sala" local="cor-piso">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							*/ ?>   	

<?php /*
							<div class="option-produto esq select-parede show">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[7]; ?>:</span>
									<div class="slide-item-cor slide-simulacao item-simulacao">

										<?php
											if( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ):														    
											    while ( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ) : the_row(); ?>

													<div class="item" rel="<?php the_sub_field('imagem-imagem-parede'); ?>" ambiente="<?php echo $ambiente; ?>" local="parede">
														<span class="cor" style="background-image: url('<?php the_sub_field('miniatura-imagem-parede'); ?>');"></span>
														<span class="nome-cor"><?php the_sub_field('nome-imagem-parede'); ?></span>
													</div>

												<?php endwhile;
											endif;
										?>
									</div>
								</div>
							</div>
*/ ?>

							<div class="option-produto esq select-piso show">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="item-simulacao">

										<div class="carousel-itens owl-carousel owl-theme owl-loaded itens-simulacao">
											<div class="owl-stage-outer">
												<div class="owl-stage">

													<?php
														if( have_rows("piso-simulacao-ambiente-{$ambiente}",'option') ):														    
														    while ( have_rows("piso-simulacao-ambiente-{$ambiente}",'option') ) : the_row(); ?>

														    <div class="owl-item">
																<div class="item-simulacao" rel="<?php the_sub_field('imagem-imagem-parede'); ?>" ambiente="<?php echo $ambiente; ?>" local="piso">
																	<span class="cor" style="background-image: url('<?php the_sub_field('miniatura-imagem-parede'); ?>');"></span>
																	<span class="nome-cor"><?php the_sub_field('nome-imagem-parede'); ?></span>
																</div>
															</div>

															<?php endwhile;
														endif;
													?>

												</div>
											</div>
										</div>	

									</div>
								</div>		
							</div>

							<div class="option-produto dir select-parede show">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[7]; ?>:</span>
									<div class="item-simulacao">

										<div class="carousel-itens owl-carousel owl-theme owl-loaded itens-simulacao">
											<div class="owl-stage-outer">
												<div class="owl-stage">

													<?php
														if( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ):														    
														    while ( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ) : the_row(); ?>

														    <div class="owl-item">
																<div class="item-simulacao" rel="<?php the_sub_field('imagem-imagem-parede'); ?>" ambiente="<?php echo $ambiente; ?>" local="parede">
																	<span class="cor" style="background-image: url('<?php the_sub_field('miniatura-imagem-parede'); ?>');"></span>
																	<span class="nome-cor"><?php the_sub_field('nome-imagem-parede'); ?></span>
																</div>
															</div>

															<?php endwhile;
														endif;
													?>

												</div>
											</div>
										</div>	

									</div>
								</div>		
							</div>


























































































































							<?php /*
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?> select-piso">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['piso'])):
											$i = 0;
											foreach ($produto['piso'] as $piso){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $piso['imagem']; ?>" ambiente="sala" local="piso">
													<span class="cor" style="background-image: url('<?php echo $piso['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							*/ ?>
					</div>

				<?php }
			?>
			
			<div style="height: 200vh; display: block;"></div>

			<!-- #sala -->
			<div class="tab-content active" id="sala">
				<div class="simulador base">
					<div class="cor-parede"></div>
					<div class="cor-piso"></div>
					<?php
						/*$base = get_field('produto-sala','option');
						$piso = $base[0]['piso'][0]['imagem'];
						$parede = $base[0]['parede'][0]['imagem'];*/

						$piso = get_field('piso-sala','option');
						$parede = get_field('parede-sala','option');
					?>
					<div class="piso" style="background-image: url('<?php echo $piso; ?>">
						<div class="parede" style="background-image: url('<?php echo $parede; ?>">
							<div class="moveis" style="background-image: url('<?php the_field('moveis-sala','option'); ?>">
								<div class="mask" style="background-image: url('<?php the_field('mask-sala','option'); ?>');"></div>
							</div>
						</div>
					</div>
				</div>
				<?php 
					//if( have_rows('produto-sala','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="sala">
									<option value="null" selected="selected"><?php echo $idioma_single_produto[4]; ?></option>

									<?php // while ( have_rows('produto-sala','option') ) : the_row();
							        $getPosts = array(
							            'posts_per_page' => 999,
							            'post_type'   => 'sala',
							            'post_status' => 'any'/*,
										'tax_query' => array(
										    array(
										        'taxonomy' => 'categoria_produto',
										        'terms' => $category->term_id,
										        'include_children' => false,
										        'operator' => 'IN'
										    )
										),*/
							        );
							        $posts = new WP_Query( $getPosts );
								        if(count($posts) > 0){

											while($posts->have_posts()) : $posts->the_post();

											    $produto = $post; //get_sub_field('produto','option');
												if (!array_key_exists($produto->ID, $produto_ambiente)):

												    // info produto
												    $produto_ambiente[$produto->ID]['id'] = $produto->ID;

												    // imagem piso
												    if( have_rows('imagem-piso-simulacao') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('imagem-piso-simulacao') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome-imagem-piso'),
												    			'imagem' => get_sub_field('imagem-imagem-piso'),
												    			'miniatura' => get_sub_field('miniatura-imagem-piso')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem-imagem-piso');
												    		}
														endwhile;
													endif;

												    /* if( have_rows('piso','option') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('piso','option') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome','option'),
												    			'imagem' => get_sub_field('imagem','option'),
												    			'miniatura' => get_sub_field('miniatura','option')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem','option');
												    		}
														endwhile;
													endif; */

												    // imagem parede
												    if( have_rows('imagem-parede-simulacao') ):
												    	$qtd_parede = 0;
												    	while ( have_rows('imagem-parede-simulacao') ) : the_row();
												    		$qtd_parede = $qtd_parede+1;
												    		$produto_ambiente[$produto->ID]['parede'][] = array(
												    			'nome' => get_sub_field('nome-imagem-parede'),
												    			'imagem' => get_sub_field('imagem-imagem-parede'),
												    			'miniatura' => get_sub_field('miniatura-imagem-parede')
												    		);
												    		if($qtd_parede == 1){
												    			$parede = get_sub_field('imagem-imagem-parede');
												    		}
														endwhile;
													endif;

												    // cor rejunte piso
												    if( have_rows('cor-rejunte-piso-simulacao') ):
												    	while ( have_rows('cor-rejunte-piso-simulacao') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-piso'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-piso'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-piso')
												    		);
														endwhile;
													endif;

												    // cor rejunte parede
												    if( have_rows('cor-rejunte-parede-simulacao') ):
												    	while ( have_rows('cor-rejunte-parede-simulacao') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-parede'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-parede'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-parede')
												    		);
														endwhile;
													endif;

													//$nome_produto = explode('{:}', strtoupper($produto->post_title));
													
													$nome_produto = get_field('prod-simulacao');
													
													//var_dump($nome_produto);
													$ID_produto = $nome_produto->ID;
													$nome_produto = $nome_produto->post_title;

													//var_dump($nome_produto);
													/*$nome_produto = explode('{:}', strtoupper($nome_produto->post_title)); 

													if($idioma == 'pt'){
														$titulo_prod = explode('{:PT}', strtoupper($nome_produto[0]));
													}

													if($idioma == 'en'){
														$titulo_prod = explode('{:EN}', strtoupper($nome_produto[1]));
													}

													if($idioma == 'es'){
														$titulo_prod = explode('{:ES}', strtoupper($nome_produto[2]));
													}*/


  /*echo '<script>';
  echo 'console.log('. $ID_produto .')';
  echo '</script>';*/

													if($simulacao_prod){
														if($ID_produto == $simulacao_prod){
															//$select_prod_true = ' selected="selected" ';
															$select_prod_true = '';
															$prod_sala = $produto->ID;

  /*echo '<script>';
  echo 'console.log("ENCONTRADO")';
  echo '</script>';*/

														}else{
															$select_prod_true = '';

															//$set_prod_amb = false;
														}


														if(!$set_prod_amb){
															if($ID_produto == $simulacao_prod){
																$set_prod_amb = true;
																$id_pro_amb = $produto->ID;
																$set_amb = '#sala';
															}
														}
													}

													//echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'">'.$titulo_prod[1].'</option>';
													if($nome_produto != ''){
														echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'"' . $select_prod_true . '>'.$nome_produto.'</option>';
													}

												endif;
													
											endwhile;

								        }
								    wp_reset_postdata();
									//endwhile; ?>

								</select>
							</span>
						</div>

					<?php //endif;

					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?>">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[5]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-parede'])):
											foreach ($produto['rejunte-parede'] as $rejunte_parede){ ?>
												<div class="item" rel="<?php echo $rejunte_parede['cor']; ?>" ambiente="sala" local="cor-parede">
													<span class="cor" style="background-color: <?php echo $rejunte_parede['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte_parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?>"">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[6]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-piso'])):
											foreach ($produto['rejunte-piso'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['cor']; ?>" ambiente="sala" local="cor-piso">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?> select-parede">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[7]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['parede'])):
											$i = 0;
											foreach ($produto['parede'] as $parede){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $parede['imagem']; ?>" ambiente="sala" local="parede">
													<span class="cor" style="background-image: url('<?php echo $parede['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?> select-piso">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['piso'])):
											$i = 0;
											foreach ($produto['piso'] as $piso){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $piso['imagem']; ?>" ambiente="sala" local="piso">
													<span class="cor" style="background-image: url('<?php echo $piso['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
						<?php } 
					endif;
				?>
			</div>
			<!-- #sala -->














			<!-- #cozinha -->
			<div class="tab-content" id="cozinha">
				<div class="simulador base">
					<div class="cor-parede"></div>
					<div class="cor-piso"></div>
					<?php
						/*$base = get_field('produto-cozinha','option');
						$piso = $base[0]['piso'][0]['imagem'];
						$parede = $base[0]['parede'][0]['imagem'];*/

						$piso = get_field('piso-cozinha','option');
						$parede = get_field('parede-cozinha','option');
					?>
					<div class="piso" style="background-image: url('<?php echo $piso; ?>">
						<div class="parede" style="background-image: url('<?php echo $parede; ?>">
							<div class="moveis" style="background-image: url('<?php the_field('moveis-cozinha','option'); ?>">
								<div class="mask" style="background-image: url('<?php the_field('mask-cozinha','option'); ?>');"></div>
							</div>
						</div>
					</div>
				</div>
				<?php 
					//if( have_rows('produto-cozinha','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="cozinha">
									<option value="null" selected="selected"><?php echo $idioma_single_produto[4]; ?></option>

									<?php // while ( have_rows('produto-sala','option') ) : the_row();
							        $getPosts = array(
							            'posts_per_page' => 999,
							            'post_type'   => 'cozinha',
							            'post_status' => 'any'/*,
										'tax_query' => array(
										    array(
										        'taxonomy' => 'categoria_produto',
										        'terms' => $category->term_id,
										        'include_children' => false,
										        'operator' => 'IN'
										    )
										),*/
							        );
							        $posts = new WP_Query( $getPosts );
								        if(count($posts) > 0){

											while($posts->have_posts()) : $posts->the_post();

											    $produto = $post; //get_sub_field('produto','option');
												if (!array_key_exists($produto->ID, $produto_ambiente)):

												    // info produto
												    $produto_ambiente[$produto->ID]['id'] = $produto->ID;

												    // imagem piso
												    if( have_rows('imagem-piso-simulacao') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('imagem-piso-simulacao') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome-imagem-piso'),
												    			'imagem' => get_sub_field('imagem-imagem-piso'),
												    			'miniatura' => get_sub_field('miniatura-imagem-piso')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem-imagem-piso');
												    		}
														endwhile;
													endif;

												    /* if( have_rows('piso','option') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('piso','option') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome','option'),
												    			'imagem' => get_sub_field('imagem','option'),
												    			'miniatura' => get_sub_field('miniatura','option')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem','option');
												    		}
														endwhile;
													endif; */

												    // imagem parede
												    if( have_rows('imagem-parede-simulacao') ):
												    	$qtd_parede = 0;
												    	while ( have_rows('imagem-parede-simulacao') ) : the_row();
												    		$qtd_parede = $qtd_parede+1;
												    		$produto_ambiente[$produto->ID]['parede'][] = array(
												    			'nome' => get_sub_field('nome-imagem-parede'),
												    			'imagem' => get_sub_field('imagem-imagem-parede'),
												    			'miniatura' => get_sub_field('miniatura-imagem-parede')
												    		);
												    		if($qtd_parede == 1){
												    			$parede = get_sub_field('imagem-imagem-parede');
												    		}
														endwhile;
													endif;

												    // cor rejunte piso
												    if( have_rows('cor-rejunte-piso-simulacao') ):
												    	while ( have_rows('cor-rejunte-piso-simulacao') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-piso'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-piso'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-piso')
												    		);
														endwhile;
													endif;

												    // cor rejunte parede
												    if( have_rows('cor-rejunte-parede-simulacao') ):
												    	while ( have_rows('cor-rejunte-parede-simulacao') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-parede'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-parede'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-parede')
												    		);
														endwhile;
													endif;

													//$nome_produto = explode('{:}', strtoupper($produto->post_title));
													$nome_produto = get_field('prod-simulacao');
													$ID_produto = $nome_produto->ID;
													$nome_produto = $nome_produto->post_title;
													//var_dump($nome_produto);
													/*$nome_produto = explode('{:}', strtoupper($nome_produto->post_title)); 

													if($idioma == 'pt'){
														$titulo_prod = explode('{:PT}', strtoupper($nome_produto[0]));
													}

													if($idioma == 'en'){
														$titulo_prod = explode('{:EN}', strtoupper($nome_produto[1]));
													}

													if($idioma == 'es'){
														$titulo_prod = explode('{:ES}', strtoupper($nome_produto[2]));
													}*/

													if($simulacao_prod){
														if($ID_produto == $simulacao_prod){
															//$select_prod_true = ' selected ';
															$select_prod_true = '';
															$prod_cozinha = $ID_produto;
														}else{
															$select_prod_true = '';
														}


														if(!$set_prod_amb){
															if($ID_produto == $simulacao_prod){
																$set_prod_amb = true;
																$id_pro_amb = $produto->ID;
																$set_amb = '#cozinha';
															}
														}
													}

													if($nome_produto != ''){
														echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'"' . $select_prod_true . '>'.$nome_produto.'</option>';
													}

												endif;



													
											endwhile;

								        }
								    wp_reset_postdata();
									//endwhile; ?>

								</select>
							</span>
						</div>

					<?php //endif;

					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?>">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[5]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-parede'])):
											foreach ($produto['rejunte-parede'] as $rejunte_parede){ ?>
												<div class="item" rel="<?php echo $rejunte_parede['cor']; ?>" ambiente="cozinha" local="cor-parede">
													<span class="cor" style="background-color: <?php echo $rejunte_parede['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte_parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?>"">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[6]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-piso'])):
											foreach ($produto['rejunte-piso'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['cor']; ?>" ambiente="cozinha" local="cor-piso">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?> select-parede">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[7]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['parede'])):
											$i = 0;
											foreach ($produto['parede'] as $parede){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $parede['imagem']; ?>" ambiente="cozinha" local="parede">
													<span class="cor" style="background-image: url('<?php echo $parede['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?> select-piso">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['piso'])):
											$i = 0;
											foreach ($produto['piso'] as $piso){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $piso['imagem']; ?>" ambiente="cozinha" local="piso">
													<span class="cor" style="background-image: url('<?php echo $piso['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
						<?php } 
					endif;
				?>
			</div>
			<!-- #cozinha -->











			<!-- #banheiro -->
			<div class="tab-content" id="banheiro">
				<div class="simulador base">
					<div class="cor-parede"></div>
					<div class="cor-piso"></div>
					<?php
						/*$base = get_field('produto-banheiro','option');
						$piso = $base[0]['piso'][0]['imagem'];
						$parede = $base[0]['parede'][0]['imagem'];*/

						$piso = get_field('piso-banheiro','option');
						$parede = get_field('parede-banheiro','option');
					?>
					<div class="piso" style="background-image: url('<?php echo $piso; ?>">
						<div class="parede" style="background-image: url('<?php echo $parede; ?>">
							<div class="moveis" style="background-image: url('<?php the_field('moveis-banheiro','option'); ?>">
								<div class="mask" style="background-image: url('<?php the_field('mask-banheiro','option'); ?>');"></div>
							</div>
						</div>
					</div>
				</div>
				<?php 
					//if( have_rows('produto-banheiro','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="banheiro">
									<option value="null" selected="selected"><?php echo $idioma_single_produto[4]; ?></option>

									<?php // while ( have_rows('produto-sala','option') ) : the_row();
							        $getPosts = array(
							            'posts_per_page' => 999,
							            'post_type'   => 'banheiro',
							            'post_status' => 'any'/*,
										'tax_query' => array(
										    array(
										        'taxonomy' => 'categoria_produto',
										        'terms' => $category->term_id,
										        'include_children' => false,
										        'operator' => 'IN'
										    )
										),*/
							        );
							        $posts = new WP_Query( $getPosts );
								        if(count($posts) > 0){

											while($posts->have_posts()) : $posts->the_post();

											    $produto = $post; //get_sub_field('produto','option');
												if (!array_key_exists($produto->ID, $produto_ambiente)):

												    // info produto
												    $produto_ambiente[$produto->ID]['id'] = $produto->ID;

												    // imagem piso
												    if( have_rows('imagem-piso-simulacao') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('imagem-piso-simulacao') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome-imagem-piso'),
												    			'imagem' => get_sub_field('imagem-imagem-piso'),
												    			'miniatura' => get_sub_field('miniatura-imagem-piso')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem-imagem-piso');
												    		}
														endwhile;
													endif;

												    /* if( have_rows('piso','option') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('piso','option') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome','option'),
												    			'imagem' => get_sub_field('imagem','option'),
												    			'miniatura' => get_sub_field('miniatura','option')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem','option');
												    		}
														endwhile;
													endif; */

												    // imagem parede
												    if( have_rows('imagem-parede-simulacao') ):
												    	$qtd_parede = 0;
												    	while ( have_rows('imagem-parede-simulacao') ) : the_row();
												    		$qtd_parede = $qtd_parede+1;
												    		$produto_ambiente[$produto->ID]['parede'][] = array(
												    			'nome' => get_sub_field('nome-imagem-parede'),
												    			'imagem' => get_sub_field('imagem-imagem-parede'),
												    			'miniatura' => get_sub_field('miniatura-imagem-parede')
												    		);
												    		if($qtd_parede == 1){
												    			$parede = get_sub_field('imagem-imagem-parede');
												    		}
														endwhile;
													endif;

												    // cor rejunte piso
												    if( have_rows('cor-rejunte-piso-simulacao') ):
												    	while ( have_rows('cor-rejunte-piso-simulacao') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-piso'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-piso'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-piso')
												    		);
														endwhile;
													endif;

												    // cor rejunte parede
												    if( have_rows('cor-rejunte-parede-simulacao') ):
												    	while ( have_rows('cor-rejunte-parede-simulacao') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-parede'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-parede'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-parede')
												    		);
														endwhile;
													endif;

													/*//$nome_produto = explode('{:}', strtoupper($produto->post_title));
													$nome_produto = get_field('prod-simulacao');
													//var_dump($nome_produto);
													$nome_produto = explode('{:}', strtoupper($nome_produto->post_title)); 

													if($idioma == 'pt'){
														$titulo_prod = explode('{:PT}', strtoupper($nome_produto[0]));
													}

													if($idioma == 'en'){
														$titulo_prod = explode('{:EN}', strtoupper($nome_produto[1]));
													}

													if($idioma == 'es'){
														$titulo_prod = explode('{:ES}', strtoupper($nome_produto[2]));
													}*/

													$nome_produto = get_field('prod-simulacao');
													$ID_produto = $nome_produto->ID;
													$nome_produto = $nome_produto->post_title;


													if($simulacao_prod){
														if($ID_produto == $simulacao_prod){
															//$select_prod_true = ' selected ';
															$select_prod_true = '';
															$prod_banheiro = $ID_produto;
														}else{
															$select_prod_true = '';
														}


														if(!$set_prod_amb){
															if($ID_produto == $simulacao_prod){
																$set_prod_amb = true;
																$id_pro_amb = $produto->ID;
																$set_amb = '#banheiro';
															}
														}
													}

													if($nome_produto != ''){
														echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'"' . $select_prod_true . '>'.$nome_produto.'</option>';
													}

												endif;



													
											endwhile;

								        }
								    wp_reset_postdata();
									//endwhile; ?>

								</select>
							</span>
						</div>

					<?php //endif;

					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?>">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[5]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-parede'])):
											foreach ($produto['rejunte-parede'] as $rejunte_parede){ ?>
												<div class="item" rel="<?php echo $rejunte_parede['cor']; ?>" ambiente="banheiro" local="cor-parede">
													<span class="cor" style="background-color: <?php echo $rejunte_parede['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte_parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?>"">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[6]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-piso'])):
											foreach ($produto['rejunte-piso'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['cor']; ?>" ambiente="banheiro" local="cor-piso">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?> select-parede">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[7]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['parede'])):
											$i = 0;
											foreach ($produto['parede'] as $parede){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $parede['imagem']; ?>" ambiente="banheiro" local="parede">
													<span class="cor" style="background-image: url('<?php echo $parede['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $parede['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?> select-piso">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['piso'])):
											$i = 0;
											foreach ($produto['piso'] as $piso){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $piso['imagem']; ?>" ambiente="banheiro" local="piso">
													<span class="cor" style="background-image: url('<?php echo $piso['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>
						<?php } 
					endif;
				?>
			</div>
			<!-- #banheiro -->











			<!-- #piscina -->
			<div class="tab-content" id="piscina">
				<div class="simulador base">
					<div class="cor-piso"></div>
					<?php
						/*$base = get_field('produto-piscina','option');
						$piso = $base[0]['piso'][0]['imagem'];*/

						$piso = get_field('piso-piscina','option');
					?>
					<div class="piso" style="background-image: url('<?php echo $piso; ?>">
						<div class="moveis" style="background-image: url('<?php the_field('moveis-piscina','option'); ?>">
							<div class="mask" style="background-image: url('<?php the_field('mask-piscina','option'); ?>');"></div>
						</div>
					</div>
				</div>
				<?php 
					//if( have_rows('produto-piscina','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="piscina">
									<option value="null" selected="selected"><?php echo $idioma_single_produto[4]; ?></option>

									<?php // while ( have_rows('produto-sala','option') ) : the_row();
							        $getPosts = array(
							            'posts_per_page' => 999,
							            'post_type'   => 'piscina',
							            'post_status' => 'any'/*,
										'tax_query' => array(
										    array(
										        'taxonomy' => 'categoria_produto',
										        'terms' => $category->term_id,
										        'include_children' => false,
										        'operator' => 'IN'
										    )
										),*/
							        );
							        $posts = new WP_Query( $getPosts );
								        if(count($posts) > 0){

											while($posts->have_posts()) : $posts->the_post();

											    $produto = $post; //get_sub_field('produto','option');
												if (!array_key_exists($produto->ID, $produto_ambiente)):

												    // info produto
												    $produto_ambiente[$produto->ID]['id'] = $produto->ID;

												    // imagem piso
												    if( have_rows('imagem-piso-simulacao-piscina') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('imagem-piso-simulacao-piscina') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome-imagem-piso'),
												    			'imagem' => get_sub_field('imagem-imagem-piso'),
												    			'miniatura' => get_sub_field('miniatura-imagem-piso')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem-imagem-piso');
												    		}
														endwhile;
													endif;

												    // cor rejunte piso
												    if( have_rows('cor-rejunte-piso-simulacao-piscina') ):
												    	while ( have_rows('cor-rejunte-piso-simulacao-piscina') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-piso'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-piso'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-piso')
												    		);
														endwhile;
													endif;

													/*
													//$nome_produto = explode('{:}', strtoupper($produto->post_title));
													$nome_produto = get_field('prod-simulacao-piscina');
													//var_dump($nome_produto);
													$nome_produto = explode('{:}', strtoupper($nome_produto->post_title)); 

													if($idioma == 'pt'){
														$titulo_prod = explode('{:PT}', strtoupper($nome_produto[0]));
													}

													if($idioma == 'en'){
														$titulo_prod = explode('{:EN}', strtoupper($nome_produto[1]));
													}

													if($idioma == 'es'){
														$titulo_prod = explode('{:ES}', strtoupper($nome_produto[2]));
													}*/

													$nome_produto = get_field('prod-simulacao-piscina');
													echo $ID_produto = $nome_produto->ID;
													$nome_produto = $nome_produto->post_title;

													if($simulacao_prod){
														if($ID_produto == $simulacao_prod){
															//$select_prod_true = ' selected ';
															$select_prod_true = '';
															$prod_piscina = $ID_produto;
														}else{
															$select_prod_true = '';
														}


														if(!$set_prod_amb){
															if($ID_produto == $simulacao_prod){
																$set_prod_amb = true;
																$id_pro_amb = $produto->ID;
																$set_amb = '#piscina';
															}
														}
													}

													if($nome_produto != ''){
														echo '<option value="'.$produto->ID.'" piso="'.$piso.'"' . $select_prod_true . '>'.$nome_produto.'</option>';
													}

												endif;



													
											endwhile;

								        }
								    wp_reset_postdata();
									//endwhile; ?>

								</select>
							</span>
						</div>

					<?php //endif;

					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>

							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?> select-piso">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['piso'])):
											$i = 0;
											foreach ($produto['piso'] as $piso){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $piso['imagem']; ?>" ambiente="piscina" local="piso">
													<span class="cor" style="background-image: url('<?php echo $piso['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>

							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?>"">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[9]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-piso'])):
											foreach ($produto['rejunte-piso'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['cor']; ?>" ambiente="piscina" local="cor-piso">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>

						<?php } 
					endif;
				?>
			</div>
			<!-- #piscina -->



			<!-- #fachada -->
			<div class="tab-content" id="fachada">
				<div class="simulador base">
					<div class="cor-piso"></div>
					<?php
						/*$base = get_field('produto-piscina','option');
						$piso = $base[0]['piso'][0]['imagem'];*/

						$piso = get_field('piso-fachada','option');
					?>
					<div class="piso" style="background-image: url('<?php echo $piso; ?>">
						<div class="moveis" style="background-image: url('<?php the_field('moveis-fachada','option'); ?>">
							<div class="mask" style="background-image: url('<?php the_field('mask-fachada','option'); ?>');"></div>
						</div>
					</div>
				</div>
				<?php 
					//if( have_rows('produto-piscina','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="fachada">
									<option value="null" selected="selected"><?php echo $idioma_single_produto[4]; ?></option>

									<?php // while ( have_rows('produto-sala','option') ) : the_row();
							        $getPosts = array(
							            'posts_per_page' => 999,
							            'post_type'   => 'fachada',
							            'post_status' => 'any'/*,
										'tax_query' => array(
										    array(
										        'taxonomy' => 'categoria_produto',
										        'terms' => $category->term_id,
										        'include_children' => false,
										        'operator' => 'IN'
										    )
										),*/
							        );
							        $posts = new WP_Query( $getPosts );
								        if(count($posts) > 0){

											while($posts->have_posts()) : $posts->the_post();

											    $produto = $post; //get_sub_field('produto','option');
												if (!array_key_exists($produto->ID, $produto_ambiente)):

												    // info produto
												    $produto_ambiente[$produto->ID]['id'] = $produto->ID;

												    // imagem piso
												    if( have_rows('imagem-piso-simulacao-fachada') ):
												    	$qtd_piso = 0;
												    	while ( have_rows('imagem-piso-simulacao-fachada') ) : the_row();
												    	$qtd_piso = $qtd_piso+1;
												    		$produto_ambiente[$produto->ID]['piso'][] = array(
												    			'nome' => get_sub_field('nome-imagem-piso'),
												    			'imagem' => get_sub_field('imagem-imagem-piso'),
												    			'miniatura' => get_sub_field('miniatura-imagem-piso')
												    		);
												    		if($qtd_piso == 1){
												    			$piso = get_sub_field('imagem-imagem-piso');
												    		}
														endwhile;
													endif;

												    // cor rejunte piso
												    if( have_rows('cor-rejunte-piso-simulacao-fachada') ):
												    	while ( have_rows('cor-rejunte-piso-simulacao-fachada') ) : the_row();
												    		$produto_ambiente[$produto->ID]['rejunte-piso'][] = array(
												    			'nome' => get_sub_field('nome-cor-rejunte-piso'),
												    			'cor' => get_sub_field('hexadecimal-cor-rejunte-piso')
												    		);
														endwhile;
													endif;

													/*
													//$nome_produto = explode('{:}', strtoupper($produto->post_title));
													$nome_produto = get_field('prod-simulacao-piscina');
													//var_dump($nome_produto);
													$nome_produto = explode('{:}', strtoupper($nome_produto->post_title)); 

													if($idioma == 'pt'){
														$titulo_prod = explode('{:PT}', strtoupper($nome_produto[0]));
													}

													if($idioma == 'en'){
														$titulo_prod = explode('{:EN}', strtoupper($nome_produto[1]));
													}

													if($idioma == 'es'){
														$titulo_prod = explode('{:ES}', strtoupper($nome_produto[2]));
													}*/

													$nome_produto = get_field('prod-simulacao-fachada');
													echo $ID_produto = $nome_produto->ID;
													$nome_produto = $nome_produto->post_title;

													if($simulacao_prod){
														if($ID_produto == $simulacao_prod){
															//$select_prod_true = ' selected ';
															$select_prod_true = '';
															$prod_fachada = $ID_produto;
														}else{
															$select_prod_true = '';
														}


														if(!$set_prod_amb){
															if($ID_produto == $simulacao_prod){
																$set_prod_amb = true;
																$id_pro_amb = $produto->ID;
																$set_amb = '#fachada';
															}
														}
													}

													if($nome_produto != ''){
														echo '<option value="'.$produto->ID.'" piso="'.$piso.'"' . $select_prod_true . '>'.$nome_produto.'</option>';
													}

												endif;



													
											endwhile;

								        }
								    wp_reset_postdata();
									//endwhile; ?>

								</select>
							</span>
						</div>

					<?php //endif;

					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>

							<div class="option-produto esq <?php echo 'id-'.$produto['id']; ?> select-piso">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['piso'])):
											$i = 0;
											foreach ($produto['piso'] as $piso){ 
												$i = $i+1; ?>
												<div class="item item-<?php echo $i; ?>" rel="<?php echo $piso['imagem']; ?>" ambiente="fachada" local="piso">
													<span class="cor" style="background-image: url('<?php echo $piso['miniatura']; ?>');"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>

							<div class="option-produto dir <?php echo 'id-'.$produto['id']; ?>">			
								<div class="slide-cor">
									<span class="tit-cores"><?php echo $idioma_single_produto[9]; ?>:</span>
									<div class="slide-item-cor slide-simulacao">
										<?php if(count($produto['rejunte-piso'])):
											foreach ($produto['rejunte-piso'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['cor']; ?>" ambiente="fachada" local="cor-piso">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php }
										endif; ?>
									</div>
								</div>		
							</div>

						<?php } 
					endif;
				?>
			</div>
			<!-- #fachada -->



		</div>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<!-- CAROUSEL -->
<script type="text/javascript">

	jQuery.noConflict();
	jQuery('.itens-simulacao').owlCarousel({
		loop:false,
		margin:5,
		autoWidth:true,
		//responsive:false,
		//responsiveClass:true,
		nav:true,
		navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
	})

</script>