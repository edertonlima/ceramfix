<?php get_header(); ?>

<section class="box-container box-simulador-cores">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>

	<div class="container">
		<div class="tab">
			<div class="item item-ambiente active" rel="#sala">SALA</div>
			<div class="item item-ambiente" rel="#cozinha">COZINHA</div>
			<div class="item item-ambiente" rel="#banheiro">BANHEIRO</div>
			<div class="item item-ambiente" rel="#piscina">PISCINA</div>

			<div class="tab-content active" id="sala">
				<div class="simulador base" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/base-sala.png');">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/moveis-sala.png');">
								<div class="mask" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/mask.png');"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="bg-select">
					<span class="select">
						<select name="produto">
							<option value="null" selected="selected">ESCOLHA UM PRODUTO</option>
							<?php
								$produto = [];
								$args = array(
								    'taxonomy'      => 'categoria_produto',
								    'parent'        => 0,
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
								    	<option value="<?php echo $category->term_id; ?>"><?php echo strtoupper($category->name); ?></option>
								    <?php }
								}
							?>
						</select>
					</span>
				</div>

				<div class="slide-cor">
					<span class="tit-cores">SELECIONE A COR DO REJUNTE:</span>
					<div class="slide-item-cor cor-rejunte">
						<?php for($i=0;$i<3;$i++){ ?>
							<div class="item">
								<span class="cor" style="background-color: #231F20"></span>
								<span class="nome-cor">PRETO</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #8F8E8C"></span>
								<span class="nome-cor">CINZA</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #FFFFFF"></span>
								<span class="nome-cor">BRANCO</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #7C604B"></span>
								<span class="nome-cor">MARROM</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #DDC8B5"></span>
								<span class="nome-cor">BEGE</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #CB9557"></span>
								<span class="nome-cor">BEGE ESCURO</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #EADCC1"></span>
								<span class="nome-cor">BEGE CLARO mais claro</span>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="slide-cor">
					<span class="tit-cores">SELECIONE A COR DO REJUNTE:</span>
					<div class="slide-item-cor cor-piso">
						<?php for($i=0;$i<3;$i++){ ?>
							<div class="item">
								<span class="cor" style="background-color: #231F20"></span>
								<span class="nome-cor">PRETO</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #8F8E8C"></span>
								<span class="nome-cor">CINZA</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #FFFFFF"></span>
								<span class="nome-cor">BRANCO</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #7C604B"></span>
								<span class="nome-cor">MARROM</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #DDC8B5"></span>
								<span class="nome-cor">BEGE</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #CB9557"></span>
								<span class="nome-cor">BEGE ESCURO</span>
							</div>
							<div class="item">
								<span class="cor" style="background-color: #EADCC1"></span>
								<span class="nome-cor">BEGE CLARO mais claro</span>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="tab-content" id="cozinha">
				<div class="simulador base" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/base-cozinha.png');">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/moveis-cozinha.png');">
								<div class="mask" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/mask.png');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-content" id="banheiro">
				<div class="simulador base" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/base-banheiro.png');">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/moveis-banheiro.png');">
								<div class="mask" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/mask.png');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-content" id="piscina">
				<div class="simulador base" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/base-piscina.png');">
					<div class="piso">
						<div class="parede">
							<div class="moveis" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/moveis-piscina.png');">
								<div class="mask" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/simuladores/mask.png');"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script>
	jQuery.noConflict();
	var owl = jQuery('.cor-rejunte');
	owl.owlCarousel({
		margin: 5,
		autoWidth:true,
		nav:true,
		loop: false
	});

	var owl = jQuery('.cor-piso');
	owl.owlCarousel({
		margin: 5,
		autoWidth:true,
		nav:true,
		loop: false
	});

	jQuery('.cor-rejunte .item').click(function(){
		jQuery('.cor-rejunte .item').removeClass('active');
		jQuery(this).addClass('active');
	});

	jQuery('.cor-piso .item').click(function(){
		jQuery('.cor-piso .item').removeClass('active');
		jQuery(this).addClass('active');
	});

	jQuery('.tab .item-ambiente').click(function(){
		jQuery('.tab .item-ambiente').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.tab-content').removeClass('active');
		jQuery(jQuery(this).attr('rel')).addClass('active');
	});
</script>