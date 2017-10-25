<?php get_header(); ?>

<?php 
	$idioma_archive = [];
	if($idioma == 'en'){
		$menu_idioma = ['Products','Know the product lines<br>with the specialty Ceramfix.'];
	}

	if($idioma == 'pt'){
		$menu_idioma = ['Produtos','Conheça as linhas de produtos<br>com a especialidade Ceramfix.'];
	}

	if($idioma == 'es'){
		$menu_idioma = ['Productos','Conozca las líneas de productos<br>con la especialidad Ceramfix.'];
	}
?>

<!-- slide -->
<section class="produtos">
	<div class="container">
		<h2><?php echo $menu_idioma[0]; ?></h2>
		<h4><?php echo $menu_idioma[1]; ?></h4>
		<div class="slide slide-produto">
			<div class="controle-slide">
				<a class="left" href="#slide" role="button" data-slide="prev"></a>
				<a class="right" href="#slide" role="button" data-slide="next"></a>
			</div>
			<div class="carousel slide" data-ride="carousel" data-interval="10000" id="slide">
				<div class="carousel-inner" role="listbox">
					<?php if( have_rows('slide_produtop','option') ):
						$i = 0;
						while ( have_rows('slide_produtop','option') ) : the_row(); ?>

							<div class="item <?php if($i==0){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem_slide_produto','option'); ?>');">
								<?php /* <img src=""> */ ?>
							</div>

						<?php 
							$i = $i+1;
						endwhile;
					endif; ?>
				</div>

				<ol class="carousel-indicators">
					<?php for($slide=0; $slide < $i; $slide++){ ?>
						<li data-target="#slide" data-slide-to="<?php echo $slide; ?>" class="<?php if($slide==0){ echo 'active'; } ?>"></li>
					<?php } ?>
				</ol>
			</div>
		</div>

		<ul class="list-linha">

			<?php if( have_rows('imagem_categoria_produto','option') ):
				while ( have_rows('imagem_categoria_produto','option') ) : the_row(); 

					$term = get_term( get_sub_field('categoria_do_produto','option'), 'categoria_produto' ); ?>

					<li style="background-image: url('<?php the_sub_field('imagem_categoria_produto','option'); ?>');">
						<a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>">
							<div style="background-image: url('<?php the_sub_field('icone_categoria','option'); ?>')">
								<span>
									<?php echo $term->name; ?>
								</span>
							</div>
						</a>
					</li>

				<?php endwhile;
			endif; ?>

			<?php /*
				$args = array(
				    'taxonomy'      => 'categoria_produto',
				    'parent'        => 0, // get top level categories
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $category ){ //print_r($category);?>

					
				<?php } */
			?>

		</ul>
	</div>
</section>

<?php get_footer(); ?>