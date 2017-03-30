<?php get_header(); ?>

<section class="box-container box-simulador-cores">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
					<?php
						$imgPiso = get_field('produto-sala','option'); var_dump($imgPiso);
						$imgParede = get_field('parede-sala','option');
					?>
	<div class="container">
		<div class="tab">
			<div class="item item-ambiente active" rel="#sala">SALA</div>
			<div class="item item-ambiente" rel="#cozinha">COZINHA</div>
			<div class="item item-ambiente" rel="#banheiro">BANHEIRO</div>
			<div class="item item-ambiente" rel="#piscina">PISCINA</div>

			<div class="tab-content active" id="sala">
				<div class="simulador base">
					<div class="cor-piso"></div>
					<div class="cor-parede"></div>
					<div class="piso" style="background-image: url('<?php //echo $imgPiso[0]['imagem']; ?>');">
						<div class="parede" style="background-image: url('<?php //echo $imgParede[0]['imagem']; ?>');">
							<div class="mask" style="background-image: url('<?php //the_field('mask-sala','option'); ?>');">
								<div class="moveis" style="background-image: url('<?php //the_field('moveis-sala','option'); ?>"></div>
							</div>
						</div>
					</div>
				</div>

				<?php 
					if( have_rows('produto-sala','option') ):
						//$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="sala">
									<option value="null" selected="selected">ESCOLHA UM PRODUTO</option>


									<?php while ( have_rows('produto-sala','option') ) : the_row();

									    $produto = get_sub_field('produto','option');
										if (!array_key_exists($produto->ID, $produto_ambiente)):											
										
										    echo '<option value="'.$produto->ID.'">'.$produto->post_title.'</option>';

										    // info produto
										    /*$produto_ambiente[$produto->ID]['id'] = $produto->ID;
										    $produto_ambiente[$produto->ID]['nome'] = $produto->post_title;*/

										    // rejunte
										    /*if( have_rows('rejunte','option') ):
										    	while ( have_rows('rejunte','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['rejunte'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										    // piso
										    if( have_rows('piso','option') ):
										    	while ( have_rows('piso','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['piso'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;*/

										endif;

									endwhile; ?>

								</select>
							</span>
						</div>

					<?php endif;
				?>

				<?php
					//if(count($produto_ambiente)):
						//foreach ($produto_ambiente as $produto){ ?>
						    <div class="option-produto parede" id="sala-<?php //echo $produto['id']; ?>">
						    	<?php //if(count($produto['rejunte'])): ?>
									<div class="slide-cor">
										<span class="tit-cores">SELECIONE A COR DA PAREDE</span>
										<div class="slide-item-cor slide-simulacao">

											<?php// foreach ($produto['rejunte'] as $rejunte){ ?>
												<div class="item" rel="<?php //echo $rejunte['imagem']; ?>" ambiente="sala" local="parede">
													<span class="cor" style="background-color: <?php //echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php //echo $rejunte['nome']; ?></span>
												</div>
											<?php //} ?>

										</div>
									</div>
								<?php //endif; ?>
							</div>

							<div class="option-produto piso" id="sala-<?php //echo $produto['id']; ?>">
								<?php //if(count($produto['piso'])): ?>
									<div class="slide-cor">
										<span class="tit-cores">SELECIONE A COR DO PISO:</span>
										<div class="slide-item-cor slide-simulacao">

											<?php //foreach ($produto['piso'] as $piso){ ?>
												<div class="item" rel="<?php //echo $piso['imagem']; ?>" ambiente="sala" local="piso">
													<span class="cor" style="background-color: <?php //echo $piso['cor']; ?>"></span>
													<span class="nome-cor"><?php //echo $piso['nome']; ?></span>
												</div>
											<?php //} ?>

										</div>
									</div>
								<?php //endif; ?>
						    </div>
						<?php //} 
					//endif;
				?>
			</div>

			<div class="tab-content" id="cozinha">
				<div class="simulador base" style="background-image: url('<?php the_field('base-cozinha','option'); ?>">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php the_field('moveis-cozinha','option'); ?>">
								<div class="mask" style="background-image: url('<?php the_field('mask-cozinha','option'); ?>');"></div>
							</div>
						</div>
					</div>
				</div>

				<?php 
					if( have_rows('produto-cozinha','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="cozinha">
									<option value="null" selected="selected">ESCOLHA UM PRODUTO</option>

									<?php while ( have_rows('produto-cozinha','option') ) : the_row();

									    $produto = get_sub_field('produto','option');
										if (!array_key_exists($produto->ID, $produto_ambiente)):											
										
										    echo '<option value="'.$produto->ID.'">'.$produto->post_title.'</option>';

										    // info produto
										    $produto_ambiente[$produto->ID]['id'] = $produto->ID;
										    $produto_ambiente[$produto->ID]['nome'] = $produto->post_title;

										    // rejunte
										    if( have_rows('rejunte','option') ):
										    	while ( have_rows('rejunte','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['rejunte'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										    // piso
										    if( have_rows('piso','option') ):
										    	while ( have_rows('piso','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['piso'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										endif;

									endwhile; ?>

								</select>
							</span>
						</div>

					<?php endif; 
				?>

				<?php
					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>
						    <div class="option-produto" id="cozinha-<?php echo $produto['id']; ?>">
						    	<?php if(count($produto['rejunte'])): ?>
									<div class="slide-cor rejunte">
										<span class="tit-cores">SELECIONE A COR DO REJUNTE:</span>
										<div class="slide-item-cor cor-rejunte">

											<?php foreach ($produto['rejunte'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['imagem']; ?>" ambiente="cozinha" local="parede">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php endif; ?>

								<?php if(count($produto['piso'])): ?>
									<div class="slide-cor piso">
										<span class="tit-cores">SELECIONE A COR DO PISO:</span>
										<div class="slide-item-cor cor-piso">

											<?php foreach ($produto['piso'] as $piso){ ?>
												<div class="item" rel="<?php echo $piso['imagem']; ?>" ambiente="cozinha" local="piso">
													<span class="cor" style="background-color: <?php echo $piso['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php endif; ?>
						    </div>
						<?php } 
					endif;
				?>
			</div>

			<div class="tab-content" id="banheiro">
				<div class="simulador base" style="background-image: url('<?php the_field('base-banheiro','option'); ?>">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php the_field('moveis-banheiro','option'); ?>">
								<div class="mask" style="background-image: url('<?php the_field('mask-banheiro','option'); ?>');"></div>
							</div>
						</div>
					</div>
				</div>

				<?php 
					if( have_rows('produto-banheiro','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="banheiro">
									<option value="null" selected="selected">ESCOLHA UM PRODUTO</option>

									<?php while ( have_rows('produto-banheiro','option') ) : the_row();

									    $produto = get_sub_field('produto','option');
										if (!array_key_exists($produto->ID, $produto_ambiente)):											
										
										    echo '<option value="'.$produto->ID.'">'.$produto->post_title.'</option>';

										    // info produto
										    $produto_ambiente[$produto->ID]['id'] = $produto->ID;
										    $produto_ambiente[$produto->ID]['nome'] = $produto->post_title;

										    // rejunte
										    if( have_rows('rejunte','option') ):
										    	while ( have_rows('rejunte','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['rejunte'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										    // piso
										    if( have_rows('piso','option') ):
										    	while ( have_rows('piso','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['piso'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										endif;

									endwhile; ?>

								</select>
							</span>
						</div>

					<?php endif; 
				?>

				<?php
					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>
						    <div class="option-produto" id="banheiro-<?php echo $produto['id']; ?>">
						    	<?php if(count($produto['rejunte'])): ?>
									<div class="slide-cor rejunte">
										<span class="tit-cores">SELECIONE A COR DO REJUNTE:</span>
										<div class="slide-item-cor cor-rejunte">

											<?php foreach ($produto['rejunte'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['imagem']; ?>" ambiente="banheiro" local="parede">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php endif; ?>

								<?php if(count($produto['piso'])): ?>
									<div class="slide-cor piso">
										<span class="tit-cores">SELECIONE A COR DO PISO:</span>
										<div class="slide-item-cor cor-piso">

											<?php foreach ($produto['piso'] as $piso){ ?>
												<div class="item" rel="<?php echo $piso['imagem']; ?>" ambiente="banheiro" local="piso">
													<span class="cor" style="background-color: <?php echo $piso['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php endif; ?>
						    </div>
						<?php } 
					endif;
				?>
			</div>

			<div class="tab-content" id="piscina">
				<div class="simulador base" style="background-image: url('<?php the_field('base-piscina','option'); ?>">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php the_field('moveis-piscina','option'); ?>">
								<div class="mask" style="background-image: url('<?php the_field('mask-piscina','option'); ?>');"></div>
							</div>
						</div>
					</div>
				</div>

				<?php 
					if( have_rows('produto-piscina','option') ):
						$produto_ambiente = []; ?>

						<div class="bg-select">
							<span class="select">
								<select name="produto" class="select-produto" rel="piscina">
									<option value="null" selected="selected">ESCOLHA UM PRODUTO</option>

									<?php while ( have_rows('produto-piscina','option') ) : the_row();

									    $produto = get_sub_field('produto','option');
										if (!array_key_exists($produto->ID, $produto_ambiente)):											
										
										    echo '<option value="'.$produto->ID.'">'.$produto->post_title.'</option>';

										    // info produto
										    $produto_ambiente[$produto->ID]['id'] = $produto->ID;
										    $produto_ambiente[$produto->ID]['nome'] = $produto->post_title;

										    // rejunte
										    if( have_rows('rejunte','option') ):
										    	while ( have_rows('rejunte','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['rejunte'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										    // piso
										    if( have_rows('piso','option') ):
										    	while ( have_rows('piso','option') ) : the_row();

										    		$produto_ambiente[$produto->ID]['piso'][] = array(
										    			'nome' => get_sub_field('nome','option'),
										    			'cor' => get_sub_field('hexa','option'),
										    			'imagem' => get_sub_field('imagem','option')
										    		);

												endwhile;
											endif;

										endif;

									endwhile; ?>

								</select>
							</span>
						</div>

					<?php endif; 
				?>
							
				<?php
					if(count($produto_ambiente)):
						foreach ($produto_ambiente as $produto){ ?>
						    <div class="option-produto" id="piscina-<?php echo $produto['id']; ?>">
						    	<?php if(count($produto['rejunte'])): ?>
									<div class="slide-cor rejunte">
										<span class="tit-cores">SELECIONE A COR DO REJUNTE:</span>
										<div class="slide-item-cor cor-rejunte">

											<?php foreach ($produto['rejunte'] as $rejunte){ ?>
												<div class="item" rel="<?php echo $rejunte['imagem']; ?>" ambiente="piscina" local="parede">
													<span class="cor" style="background-color: <?php echo $rejunte['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $rejunte['nome']; ?></span>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php endif; ?>

								<?php if(count($produto['piso'])): ?>
									<div class="slide-cor piso">
										<span class="tit-cores">SELECIONE A COR DO PISO:</span>
										<div class="slide-item-cor cor-piso">

											<?php foreach ($produto['piso'] as $piso){ ?>
												<div class="item" rel="<?php echo $piso['imagem']; ?>" ambiente="piscina" local="piso">
													<span class="cor" style="background-color: <?php echo $piso['cor']; ?>"></span>
													<span class="nome-cor"><?php echo $piso['nome']; ?></span>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php endif; ?>
						    </div>
						<?php } 
					endif;
				?>
			</div>

		</div>

		<div class="option-produto parede">			
			<div class="slide-cor">
				<span class="tit-cores">SELECIONE A COR DO REJUNTE DA PAREDE:</span>
				<div class="slide-item-cor slide-simulacao">
					<?php if( have_rows('cores','option') ):
						while ( have_rows('cores','option') ) : the_row(); ?>
							<div class="item" rel="<?php the_sub_field('hexa','option') ?>" ambiente="sala" local="cor-parede">
								<span class="cor" style="background-color: <?php the_sub_field('hexa','option') ?>"></span>
								<span class="nome-cor"><?php the_sub_field('nome','option') ?></span>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div>		
		</div>

		<div class="option-produto piso">			
			<div class="slide-cor">
				<span class="tit-cores">SELECIONE A COR DO REJUNTE DO PISO:</span>
				<div class="slide-item-cor slide-simulacao">
					<?php if( have_rows('cores','option') ):
						while ( have_rows('cores','option') ) : the_row(); ?>
							<div class="item" rel="<?php the_sub_field('hexa','option') ?>" ambiente="sala" local="cor-piso">
								<span class="cor" style="background-color: <?php the_sub_field('hexa','option') ?>"></span>
								<span class="nome-cor"><?php the_sub_field('nome','option') ?></span>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div>		
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
		autoWidth:true,
		nav:true,
		loop: false
	});
/*
	var owl = jQuery('.cor-piso');
	owl.owlCarousel({
		margin: 5,
		autoWidth:true,
		nav:true,
		loop: false
	});

	/*jQuery('.cor-rejunte .item').click(function(){
		jQuery('.cor-rejunte .item').removeClass('active');
		jQuery(this).addClass('active');
	});*/

	function cleanAmbiente(){
		jQuery('.option-produto').hide();
		jQuery('.simulador .piso').css('background-image','');
		jQuery('.simulador .parede').css('background-image','');
		jQuery('.slide-item-cor .item').removeClass('active');
	}

	jQuery('.slide-item-cor .item').click(function(){
		jQuery('.slide-item-cor .item').removeClass('active');
		jQuery(this).addClass('active');
		ambiente = jQuery(this).attr('ambiente');
		local = jQuery(this).attr('local');
		cor = jQuery(this).attr('rel');
		simulador = '#'+ambiente+' .'+local;
		jQuery(simulador).css('background-color',cor);
	});

	jQuery('.tab .item-ambiente').click(function(){
		//cleanAmbiente();
		jQuery('select.select-produto').val("null").change();
		jQuery('.tab .item-ambiente').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.tab-content').removeClass('active');
		jQuery(jQuery(this).attr('rel')).addClass('active');
	});

	jQuery('select.select-produto').change(function(){
		//cleanAmbiente();
		if((jQuery(this).val()) != 'null'){	
			jQuery('.option-produto').hide();		
			option_produto = '#'+(jQuery(this).attr('rel'))+'-'+(jQuery(this).val());
			jQuery(option_produto).show();
			piso = jQuery('option:selected',this).attr('piso');
			alert(piso);
		}
	});
</script>