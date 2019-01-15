<?php get_header(); ?>


													<?php /* 
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
														),*/  /*
											        );
											        $posts = new WP_Query( $getPosts );
												        if(count($posts) > 0){

															while($posts->have_posts()) : $posts->the_post();
																		
																var_dump($post);
																	
															endwhile;

												        }
												    wp_reset_postdata(); */
											        ?>




<?php
	$idioma_single_produto = [];
	if($idioma == 'pt'){
		$idioma_single_produto = ['SALA','COZINHA','BANHEIRO','PISCINA','ESCOLHA UM PRODUTO','SELECIONE A COR DO REJUNTE DA PAREDE','SELECIONE A COR DO REJUNTE DO PISO','SELECIONE A IMAGEM DA PAREDE','SELECIONE A IMAGEM DO PISO','SELECIONE A IMAGEM DA PASTILHA','SELECIONE A COR DO REJUNTE DA PASTILHA'];
	}

	if($idioma == 'en'){
		$idioma_single_produto = ['LIVING ROOM','KITCHEN','WC','POOL','CHOOSE A PRODUCT','SELECT THE COLOR OF THE WALL JOINT', 'SELECT THE COLOR OF THE FLOOR JOINT', 'SELECT THE WALL IMAGE', 'SELECT THE IMAGE FROM THE FLOOR','SELECT THE PICTURE OF THE SHEET', 'SELECT THE COLOR OF THE SHEET OF THE SHEET'];
	}

	if($idioma == 'es'){
		$idioma_single_produto = ['SALA','COCINA','BAÑO','PISCINA','ELEGIR UN PRODUCTO','SELECCIONE EL COLOR DEL REJUNTO DE LA PARED', 'SELECCIONE EL COLOR DEL REJUNTE DEL PISO', 'SELECCIONE LA IMAGEN DE LA PARED', 'SELECCIONE LA IMAGEN DEL PISO','SELECCIONE LA IMAGEN DE LA PASTILLA', 'SELECCIONE EL COLOR DEL REJUNTE DE LA PASTILLA'];
	}
?>

<section class="box-container box-simulador-cores" style="margin-bottom: 50px;">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>

	<div class="container">
		<div class="tab">
			<div class="item item-ambiente active" rel="#sala"><?php echo $idioma_single_produto[0]; ?></div>
			<div class="item item-ambiente" rel="#cozinha"><?php echo $idioma_single_produto[1]; ?></div>
			<div class="item item-ambiente" rel="#banheiro"><?php echo $idioma_single_produto[2]; ?></div>
			<div class="item item-ambiente" rel="#piscina"><?php echo $idioma_single_produto[3]; ?></div>

			<!-- #sala -->
			<div class="tab-content active" id="sala">
				<div class="simulador base">
					<div class="cor-parede"></div>
					<div class="cor-piso"></div>
					<?php
						$base = get_field('produto-sala','option');
						$piso = $base[0]['piso'][0]['imagem'];
						$parede = $base[0]['parede'][0]['imagem'];
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
													$nome_produto = explode('{:}', strtoupper($nome_produto->post_title)); 

													if($idioma == 'pt'){
														$titulo_prod = explode('{:PT}', strtoupper($nome_produto[0]));
													}

													if($idioma == 'en'){
														$titulo_prod = explode('{:EN}', strtoupper($nome_produto[1]));
													}

													if($idioma == 'es'){
														$titulo_prod = explode('{:ES}', strtoupper($nome_produto[2]));
													}

													echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'">'.$titulo_prod[1].'</option>';

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
						$base = get_field('produto-cozinha','option');
						$piso = $base[0]['piso'][0]['imagem'];
						$parede = $base[0]['parede'][0]['imagem'];
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
													}

													echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'">'.$titulo_prod[1].'</option>';

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
						$base = get_field('produto-banheiro','option');
						$piso = $base[0]['piso'][0]['imagem'];
						$parede = $base[0]['parede'][0]['imagem'];
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

													//$nome_produto = explode('{:}', strtoupper($produto->post_title));
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
													}

													echo '<option value="'.$produto->ID.'" parede="'.$parede.'" piso="'.$piso.'">'.$titulo_prod[1].'</option>';

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
						$base = get_field('produto-piscina','option');
						$piso = $base[0]['piso'][0]['imagem'];
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
													}

													echo '<option value="'.$produto->ID.'" piso="'.$piso.'">'.$titulo_prod[1].'</option>';

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








		</div>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script>
	
	jQuery.noConflict();
	var owl = jQuery('.slide-simulacao');
	owl.owlCarousel({
		margin: 5,
		//autoWidth:true,
		nav:true,
		loop: false
	});

	/*jQuery('.cor-rejunte .item').click(function(){
		jQuery('.cor-rejunte .item').removeClass('active');
		jQuery(this).addClass('active');
	});*/

	function cleanAmbiente(){
		jQuery('.option-produto').hide();
		jQuery('.simulador .cor-piso').css('background-color','');
		jQuery('.simulador .cor-parede').css('background-color','');
		jQuery('.slide-item-cor .item').removeClass('active');
	}

	jQuery('.slide-item-cor .item').click(function(){
		ambiente = jQuery(this).attr('ambiente');
		local = jQuery(this).attr('local');
		rel = jQuery(this).attr('rel');
		simulador = '#'+ambiente+' .'+local;
		jQuery(this).parent().siblings().find('.item').removeClass('active');
		jQuery(this).addClass('active');
		if((local == 'cor-parede') || (local == 'cor-piso')){
			jQuery(simulador).css('background-color',rel);
		}
		if((local == 'parede') || (local == 'piso')){
			rel = "url('"+rel+"')";
			jQuery(simulador).css('background-image',rel);
		}
	});

	jQuery('.tab .item-ambiente').click(function(){
		cleanAmbiente();
		jQuery('select.select-produto').val("null").change();
		jQuery('.tab .item-ambiente').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.tab-content').removeClass('active');
		jQuery(jQuery(this).attr('rel')).addClass('active');
	});

	jQuery('select.select-produto').change(function(){
		cleanAmbiente();
		if((jQuery(this).val()) != 'null'){			
			option_produto = '#'+(jQuery(this).attr('rel'))+' .id-'+(jQuery(this).val());
			jQuery(option_produto).show();	

			piso = jQuery('option:selected',this).attr('piso');
			imagemPiso = "url('"+piso+"')";
			jQuery('#'+(jQuery(this).attr('rel'))+' .simulador .piso').css('background-image',imagemPiso);
			parede = jQuery('option:selected',this).attr('parede');
			imagemParede = "url('"+parede+"')";
			jQuery('#'+(jQuery(this).attr('rel'))+' .simulador .parede').css('background-image',imagemParede);

			jQuery(option_produto+'.select-piso .item-1').addClass('active');
			jQuery(option_produto+'.select-parede .item-1').addClass('active');
		}
	});
</script>