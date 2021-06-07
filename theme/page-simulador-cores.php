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
					$i = 0;													    
				    while ( have_rows('cores') ) : the_row();

				    	$cor  = [ 'hexa' => get_sub_field('hexa') ];
				    	$cor += [ 'nome' => get_sub_field('nome') ];

				    	$cores[$i] = $cor;
				    	$i = $i+1;

					endwhile;
					//if($post->ID == '895'){ var_dump($cores); echo '<pre>'.$i.'</pre>'; }
				endif;
				//var_dump($name_amb);
				$data += [ 'cores' => $cores ];
				$produtoID = "produtoID_{$post->ID}";

				foreach ($name_amb as $key => $nome_ambiente) {
					$ambiente_prod[$nome_ambiente][$produtoID] = $data;
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
				if((!empty($ambiente_prod['sala'])) AND (!empty(get_field("mask-sala",'option')))){ ?>
					<div class="item item-ambiente active" rel="#sala"><?php echo $idioma_single_produto[0]; ?></div>
				<?php }

				if((!empty($ambiente_prod['cozinha'])) AND (!empty(get_field("mask-cozinha",'option')))){ ?>
					<div class="item item-ambiente" rel="#cozinha"><?php echo $idioma_single_produto[1]; ?></div>
				<?php }

				if((!empty($ambiente_prod['banheiro'])) AND (!empty(get_field("mask-banheiro",'option')))){ ?>
					<div class="item item-ambiente" rel="#banheiro"><?php echo $idioma_single_produto[2]; ?></div>
				<?php }

				if((!empty($ambiente_prod['piscina'])) AND (!empty(get_field("mask-piscina",'option')))){ ?>
					<div class="item item-ambiente" rel="#piscina"><?php echo $idioma_single_produto[3]; ?></div>
				<?php }

				if((!empty($ambiente_prod['fachada'])) AND (!empty(get_field("mask-fachada",'option')))){ ?>
					<div class="item item-ambiente" rel="#fachada" style=""><?php echo $idioma_single_produto[11]; ?></div>
				<?php }
			?>
			
			<?php
				foreach ($ambiente_prod as $ambiente => $produtos) {

					$piso = get_field("piso-{$ambiente}",'option');
					$parede = get_field("parede-{$ambiente}",'option');
					$moveis = get_field("moveis-{$ambiente}",'option');
					$mask = get_field("mask-{$ambiente}",'option');

					if(!empty($mask)){ ?>
				
						<div class="tab-content <?php if($ambiente == 'sala'): echo 'active'; endif; ?>" id="<?php echo $ambiente; ?>">
							
							<?php // BLOCO SIMULADOR ?>	
							<div class="simulador base">
								<div class="cor-parede"></div>
								<div class="cor-piso"></div>


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

							<?php // SELECT ?>
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

							<?php // CORES ?>
							<?php if( have_rows("piso-simulacao-ambiente-{$ambiente}",'option') ): ?>
								<div class="option-produto esq cores">			
									<div class="slide-cor">
										<span class="tit-cores"><?php echo $idioma_single_produto[6]; ?>:</span>
										<div class="carousel-itens owl-carousel owl-theme owl-loaded itens-simulacao-cores" local="cor-piso"></div>										
									</div>		
								</div>
							<?php endif; ?>

							<?php if( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ): ?>
								<div class="option-produto dir cores">			
									<div class="slide-cor">
										<span class="tit-cores"><?php echo $idioma_single_produto[5]; ?>:</span>
										<div class="carousel-itens owl-carousel owl-theme owl-loaded itens-simulacao-cores" local="cor-parede"></div>									
									</div>		
								</div>
							<?php endif; ?>

							<?php // IMAGENS PISO ?>
							<?php if( have_rows("piso-simulacao-ambiente-{$ambiente}",'option') ): ?>
								<div class="option-produto esq select-piso">			
									<div class="slide-cor">
										<span class="tit-cores"><?php echo $idioma_single_produto[8]; ?>:</span>							

										<div class="carousel-itens owl-carousel owl-theme owl-loaded itens-simulacao">
											<div class="owl-stage-outer">
												<div class="owl-stage">

													<?php while ( have_rows("piso-simulacao-ambiente-{$ambiente}",'option') ) : the_row(); ?>

													    <div class="owl-item">
															<div class="item-simulacao" rel="<?php the_sub_field('imagem-imagem-piso'); ?>" ambiente="<?php echo $ambiente; ?>" local="piso">
																<span class="cor" style="background-image: url('<?php the_sub_field('miniatura-imagem-piso'); ?>');"></span>
																<span class="nome-cor"><?php the_sub_field('nome-imagem-piso'); ?></span>
															</div>
														</div>

													<?php endwhile; ?>

												</div>
											</div>
										</div>	
										
									</div>		
								</div>
							<?php endif; ?>

							<?php // IMAGENS PAREDE ?>
							<?php if( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ): ?>
								<div class="option-produto dir select-parede">			
									<div class="slide-cor">
										<span class="tit-cores"><?php echo $idioma_single_produto[7]; ?>:</span>

										<div class="carousel-itens owl-carousel owl-theme owl-loaded itens-simulacao">
											<div class="owl-stage-outer">
												<div class="owl-stage">

													<?php while ( have_rows("parede-simulacao-ambiente-{$ambiente}",'option') ) : the_row(); ?>

													    <div class="owl-item">
															<div class="item-simulacao" rel="<?php the_sub_field('imagem-imagem-parede'); ?>" ambiente="<?php echo $ambiente; ?>" local="parede">
																<span class="cor" style="background-image: url('<?php the_sub_field('miniatura-imagem-parede'); ?>');"></span>
																<span class="nome-cor"><?php the_sub_field('nome-imagem-parede'); ?></span>
															</div>
														</div>

													<?php endwhile; ?>

												</div>
											</div>
										</div>

									</div>		
								</div>
							<?php endif; ?>
						</div>

					<?php }
				}
			?>

		</div>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<!-- CAROUSEL -->
<script type="text/javascript">

	jQuery.noConflict();

	jQuery(document).ready(function() {
		jQuery('select.select-produto').val("null").change();

		<?php if($_GET['prod']){

		} ?>

		jQuery('.itens-simulacao-cores').owlCarousel({
			margin:3,
			autoWidth:true,
			nav:true,
			navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
		});

		jQuery('.itens-simulacao').owlCarousel({
			loop:false,
			margin:3,
			autoWidth:true,
			center: false,
			touchDrag: true,
			pullDrag: true,
			startPosition: 1,
			//responsive:false,
			//responsiveClass:true,
			nav:true,
			navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>']
		});
	});

		var ambiente_prod_data = '<?php echo json_encode($ambiente_prod); ?>';
		var ambiente_prod = JSON.parse(ambiente_prod_data);
		
	// carrega cores produtos
	jQuery('select.select-produto').change(function(){
		ambiente = jQuery(this).attr('rel');
		produto_ID = jQuery(this).val();

		jQuery.each(jQuery('#'+ambiente+' .itens-simulacao-cores .owl-item'), function (i) {
			jQuery('#'+ambiente+' .itens-simulacao-cores').trigger('remove.owl.carousel', [0] ).trigger('refresh.owl.carousel');
		});

		if(produto_ID != 'null'){
			jQuery.each(ambiente_prod[ambiente]['produtoID_'+produto_ID].cores, function (key, cor) {						
				jQuery('#'+ambiente+' .itens-simulacao-cores').trigger('add.owl.carousel', [
					'<div class="item-simulacao" tipo="cor" rel="'+ cor.hexa +'" ambiente="'+ambiente+'"><span class="cor" style="background-color: '+ cor.hexa +'"></span><span class="nome-cor">'+ cor.nome +'</span></div>'
					]).trigger('refresh.owl.carousel');
			});
			//jQuery('#'+ambiente+' .itens-simulacao-cores').trigger('refresh.owl.carousel').delay(100);
			setTimeout(function(){ jQuery('#'+ambiente+' .option-produto').addClass('show'); }, 200);
		}else{
			jQuery('#'+ambiente+' .option-produto').removeClass('show');
		}
	});

	// muda piso e parede
	jQuery(document).on('click','.item-simulacao',function(){
		if(jQuery(this).attr('tipo') == 'cor'){
			elem = '#'+ jQuery(this).attr('ambiente') + ' .' + jQuery(this).parents('.itens-simulacao-cores').attr('local');
			hexa = jQuery(this).attr('rel');
			jQuery(elem).css('background-color',hexa);

			elem_pai = jQuery(this).parents('.owl-stage');	
			jQuery(this).parents('.owl-stage').find('.item-simulacao').removeClass('ativo');
		}else{
			elem = '#'+ jQuery(this).attr('ambiente') + ' .' + jQuery(this).attr('local');
			img = "url('"+ jQuery(this).attr('rel') +"')";
			jQuery(elem).css('background-image',img);
			elem_irmaos = '#'+ jQuery(this).attr('ambiente') + ' .item-simulacao[local="' + jQuery(this).attr('local') + '"]';	
			jQuery(elem_irmaos).removeClass('ativo');	
		}
		
		jQuery(this).addClass('ativo');
	});

	// muda ambientes
	jQuery('.tab .item-ambiente').click(function(){
		jQuery('.tab .item-ambiente').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.tab-content').removeClass('active');
		jQuery(jQuery(this).attr('rel')).addClass('active');
	});

</script>