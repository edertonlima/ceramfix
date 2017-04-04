<?php get_header(); ?>

<section class="box-container box-calculadora-consumo">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
	
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	if($imagem[0]){ ?>
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-page">
	<?php } ?>

	<div class="container">
		<p>Calcule a quantidade e evite desperdício:</p>
		
		<div class="passos-calculadora">
			<span class="passo first-passo">1</span>
			<div class="box-passos">
				<div class="bg-select">
					<span class="select">
						<select name="produto" class="select-produto">
							<option value="null" selected="selected">ESCOLHA UM PRODUTO</option>
    <?php
        $getPosts = array(
            'post_type'   => 'produto',
            'post_status' => 'any',
            'orderby'     => date,
            'order'       => 'DESC'
        );
        $posts = new WP_Query( $getPosts );
        if(count($posts) > 0){ 
        	while($posts->have_posts()) : $posts->the_post(); ?>

				<option value="<?php echo $post->ID; ?>"><?php echo strtoupper(get_the_title()); ?></option>

        <?php endwhile; }
    ?>
						</select>
					</span>
				</div>
			</div>
		</div>

		<div class="passos-calculadora">
			<span class="passo">2</span>
			<div class="box-passos">
				<div class="item-passo num-passo passo-2">
					<span class="tit-campo">DIMENSÕES DO REVESTIMENTO</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-2.png" alt="">
					<div class="campos">
						<input type="" name="">
						<span>cm</span>
						<span class="label">X</span>
						<input type="" name="">
						<span>cm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-3">
					<span class="passo">3</span>
					<span class="tit-campo">LARGURA DA JUNTA</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-3.png" alt="">
					<div class="campos">
						<input type="" name="">
						<span>mm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-4">
					<span class="passo">4</span>
					<span class="tit-campo">ESPESSURA DO REVESTIMENTO</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-4.png" alt="">
					<div class="campos">
						<input type="" name="">
						<span>mm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-5">
					<span class="passo">5</span>
					<span class="tit-campo">ÁREA TOTAL A SER REVESTIDA</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-5.png" alt="">
					<div class="campos">
						<input type="" name="">
						<span>m²</span>
					</div>
				</div>
			</div>
		</div>

		<button class="calcular">CALCULAR!</button>

	</div>
</section>	

<section class="box-home contato calculadora-consumo">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="info-contato">
					<span>CENTRAL DE RELACIONAMENTO CERAMFIX</span>
					<h2>0800 704549</h2>
					<a href="#">www.ceramfix.com.br</a>
					<a href="#">info@ceramfix.com.br</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<script>

</script>