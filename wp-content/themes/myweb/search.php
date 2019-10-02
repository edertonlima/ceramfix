<?php get_header(); ?>

<?php 
	$idioma_busca = [];
	if($idioma == 'pt-br'){
		$idioma_busca = ['BUSCA','IDEOLOGIA CORPORATIVA'];
	}

	if($idioma == 'en'){
		$idioma_busca = ['SEARCH','CORPORATE IDEOLOGY'];
	}

	if($idioma == 'es'){
		$idioma_busca = ['BUSCAR','IDEOLOGÍA CORPORATIVA'];
	}
?>

<section class="box-container box-search">
	<div class="container">

		<h2><?php echo $idioma_busca[0]; ?></h2>
		<p class="subtitulo">
			Buscando por: <strong><?php echo get_search_query(); ?></strong>

			<br>
			<span class="count-busca">
				<?php
					global $wp_query;
					
					if($wp_query->found_posts > 0){
						if($wp_query->found_posts == 1){
							echo '1 item encontrado';
						}else{
							echo $wp_query->found_posts.' itens encontrados';
						}
					}else{
						echo 'Nenhum item encontrado';
					} 
				?>
				
			</span>
		</p>

	</div>


	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
		//var_dump($post);

		switch ( $post->post_type ) {
			case 'lojas':
			$search_loja[] = $post;
			break;

			case 'matriz_filiais':
			$search_matriz_filiais[] = $post;
			break;

			case 'produto':
			$search_produto[] = $post;
			break;

			case 'page':
			$search_page[] = $post;
			break;

			case 'post':
			$categories = get_the_category();
			if($categories[0]->term_id == 1){
				$search_release[] = $post;
			}else{
				if($categories[0]->term_id == 9){
					$search_namidia[] = $post;
				}
			}
			break;
		}

	endwhile;

	//var_dump($search_loja);
	?>

			<?php /* <div class="item-busca">
				<div class="col-4">
					<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
					<?php if($imgPage){ ?>
						<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="" alt="">
					<?php } ?>
				</div>
				<div class="col-8">
					<h3><?php the_title(); ?></h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_field('titulo_link_simuladores'); ?>"><?php the_field('titulo_link_simuladores'); ?></a>
				</div>
			</div> */ ?>



	<?php /*if(count($search_loja)){ ?>

		<section class="box-container box-lojas">
			<div class="container">
				<h2>LOJAS CADASTRADAS</h2>
			</div>
			
			<section class="lojas list-lojas">
				<div class="container">

					<?php foreach ($search_loja as $key => $post) {
						get_template_part( 'content', 'page_empresa' );
					} ?>

				</div>
			</section>
		</section>

	<?php }*/ ?>



	<?php if(count($search_produto)){ ?>
		<div class="page item-busca">
			<section class="produtos">
				<div class="container">

					<h2>PRODUTOS</h2>

					<ul class="list-produto">
						<?php foreach ($search_produto as $key => $post) {
							get_template_part( 'content-produto_list', get_post_format() );
						} ?>
					</ul>

				</div>
			</section>
		</div>
	<?php } ?>


	<?php if(count($search_page)){ ?>
		<div class="page item-busca">
			<section class="produtos institucional">
				<div class="container">

					<h2>INSTITUCIONAL</h2>

					<div class="list-produto busca-institucional">
						<?php foreach ($search_page as $key => $post) { ?>
							<a class="" href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title(); ?>">
								<?php get_template_part( 'content-institucional', get_post_format() ); ?>
							</a>
						<?php } ?>
					</div>

				</div>
			</section>
		</div>
	<?php } ?>


	<?php if(count($search_release)){ ?>
		<div class="page item-busca">
			<section class="box-container box-release">
				<div class="container">

					<h2>Release</h2>

					<div class="row sub-conteudo">
						<?php foreach ($search_release as $key => $post) { ?>
							<div class="col-6 item">
								<?php get_template_part( 'content-list', get_post_format() ); ?>
							</div>
						<?php } ?>
					</div>

				</div>
			</section>
		</div>
	<?php } ?>

	<?php if(count($search_namidia)){ ?>
		<div class="page item-busca">
			<section class="box-container box-release">
				<div class="container">

					<h2>Na Mídia</h2>

					<div class="row sub-conteudo">
						<?php foreach ($search_namidia as $key => $post) { ?>
							<div class="col-6 item">
								<?php get_template_part( 'content-list', get_post_format() ); ?>
							</div>
						<?php } ?>
					</div>

				</div>
			</section>
		</div>
	<?php } ?>


	<?php if(count($search_matriz_filiais)){ ?>
		<div class="page item-busca">
			<section class="box-container box-matriz-filiais">
				<div class="container">
					<h2>MATRIZ E UNIDADES</h2>
				</div>
				
				<div class="container">
					<div class="row sub-conteudo">

						<?php foreach ($search_matriz_filiais as $key => $post) {
							get_template_part( 'content-matriz_filiais', get_post_format() );
						} ?>

					</div>
				</div>
			</section>
		</div>
	<?php } ?>

</section>

<?php get_footer(); ?>
