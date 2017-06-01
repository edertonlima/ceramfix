<?php get_header(); ?>

<section class="produtos">
	<div class="container">

		<?php while ( have_posts() ) : the_post();

			$produto_ID = get_the_ID();
			get_template_part( 'content-produto', get_post_format() );

		endwhile; ?>

	</div>
</section>

<?php
	$lojas = [];
	$uf_cidades = [];
    $getPosts = array(
        'post_type'   => 'lojas',
        'post_status' => 'any',
        'orderby'     => date,
        'order'       => 'DESC',
        'nopaging' => true
    );
    $posts = new WP_Query( $getPosts );
    if(count($posts) > 0){ 
    	$i = 0;
    	while($posts->have_posts()) : $posts->the_post(); 
    		$lojas[$i]['razaosocial'] = get_the_title();
    		$lojas[$i]['nome_fantasia'] = get_field('cidade');
    		$lojas[$i]['email'] = get_field('email');
    		$lojas[$i]['endereco'] = get_field('endereco');
    		$lojas[$i]['numero'] = get_field('numero');
    		$lojas[$i]['complemento'] = get_field('complemento');
    		$lojas[$i]['bairro'] = get_field('bairro');
    		$lojas[$i]['cidade'] = get_field('cidade');
    		$lojas[$i]['uf'] = get_field('uf');
    		$lojas[$i]['pais'] = get_field('pais');
    		$lojas[$i]['cep'] = get_field('cep');
    		$lojas[$i]['telefone'] = get_field('telefone');
    		$lojas[$i]['fax'] = get_field('fax');

    		//$uf_cidades = array(get_field('uf'));

    		$uf_cidades[get_field('uf')][] = get_field('cidade');

    		/*if($i==0){
    			$uf_cidades[get_field('uf')][] = get_field('cidade');
    		}else{
	    		foreach ($uf_cidades[get_field('uf')] as $key => $val){
					/*if (in_array(get_field('cidade'), $val)){ echo $key.' - '.$val.'<br>';
						echo 'já tem<br>';
					}else{
						$uf_cidades[get_field('uf')][] = get_field('cidade');
						echo 'não tem<br>';
					}
	    		}
    		}

    		/*if (!search(get_field('cidade'), $uf_cidades)) { 
    			echo '<br>Não tem: '.get_field('cidade').' no estado: '.get_field('uf');
    			$uf_cidades[get_field('uf')][] = get_field('cidade');
    		}else{
    			echo '<br>Já tem: '.get_field('cidade').' no estado: '.get_field('uf');
    		}*/

    		$i = $i+1;
    	endwhile;
    }

    //var_dump($lojas);
    //var_dump($uf_cidades); 
    /*
?>

<section class="lojas">
	<div class="container">
		
		<div class="mapa-select" style="background-image: url('<?php the_field('imagem_busca','options'); ?>');">

			<div class="bg-select-">
				<span class="select selectboxproduto">
					<select name="produto" id="produto" class="select-produto">
						<option value="" selected="selected">UF</option>
						<?php
							foreach ($uf_cidades as $uf => $cidades){ ?>
								
								<option value="<?php echo $uf; ?>" selected="selected"><?php echo $uf; ?></option>

								<?php 
									$cidades = array_unique($cidades);
									//$cidades = arraytolower($cidades);

									//foreach ($cidades as $cidade){ ?>
										<script type="text/javascript">
											var <?php echo strtolower($uf); ?> = <?php echo json_encode($cidades); ?>;
										</script>
									<?php //}

							}
						?>
					</select>
				</span>
			</div>
			
		</div>

	</div>
</section>


<?php */if( have_rows('produto') ): ?>

	<section class="produtos">
		<div class="container">
			<h2 class="outros-produtos">Veja outros produtos:</h2>

			<div class="slide-produtos list-produto owl-carousel owl-theme">
					
				<?php if( have_rows('produto') ):
					while ( have_rows('produto') ) : the_row(); 

						$outros_pro = get_sub_field('produto'); ?>

							<div class="item">
								<a href="<?php echo get_permalink($outros_pro->ID); ?>" title="<?php echo $outros_pro->post_title; ?>">
									<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($outros_pro->ID), 'thumbnail' ); ?>
									<?php if($imgPage){ ?>
										<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" alt="<?php echo $outros_pro->post_title; ?>">
									<?php } ?>
									<div class="cont-list-prod">
										<h3><?php echo $outros_pro->post_title; ?></h3>
										<p><?php the_field('descrição_curta_produto',$outros_pro->ID); ?></p>
									</div>
								</a>
							</div>

					<?php endwhile;
				endif; ?>

			</div>
		</div>
	</section>

<?php endif; ?>

<?php /*
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.easing-1.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery(".img-produto").fancybox();
	});
</script>
*/ ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	jQuery.noConflict();
	var owl = jQuery('.slide-produtos');
	owl.owlCarousel({
		margin: 0,
		loop: false,
		nav:true,
		responsive: {
			0: {
				items: 3
			},
			600: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	})
</script>

<?php get_footer(); ?>