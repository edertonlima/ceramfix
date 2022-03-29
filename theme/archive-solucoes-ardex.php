<?php get_header(); ?>

<?php 
	$idioma_archive = [];
	if($idioma == 'en'){
		$menu_idioma = ['Products Ardex','Know the product<br>with the specialty Ceramfix.'];
	}

	if($idioma == 'pt-br'){
		$menu_idioma = ['Produtos Ardex','Conheça os produtos<br>com a especialidade Ceramfix.'];
	}

	if($idioma == 'es'){
		$menu_idioma = ['Productos Ardex','Conozca los productos<br>con la especialidad Ceramfix.'];
	}
?>

<section class="produtos">
	<div class="container">
		<h2><?php echo $menu_idioma[0]; ?></h2>
		<h4><?php echo $menu_idioma[1]; ?></h4>
	</div>

	<?php /* if( have_rows('imagem_categoria_produto','option') ):
		while ( have_rows('imagem_categoria_produto','option') ) : the_row(); 

			$term = get_term( get_sub_field('categoria_do_produto','option'), 'categoria_produto' ); 
			if($term->term_id == get_queried_object()->term_id){ ?>
				<div style="background-image: url('<?php the_sub_field('imagem_categoria_produto','option'); ?>');" class="img-linha"></div>
			<?php } ?>

		<?php endwhile;
	endif; */ ?>

	

	<div class="container">

		<?php /*
			$terms_solucoes = get_terms( array(
			    'taxonomy' => 'post_tag',
			    'hide_empty' => true,
			) );

			if($terms_solucoes){ ?>

				<div class="solucoes">

					<h5>

						<?php 
							if($idioma == 'es'){ echo 'NUESTRAS SOLUCIONES'; }
							if($idioma == 'pt-br'){ echo 'NOSSAS SOLUÇÕES'; }
							if($idioma == 'en'){ echo 'OUR SOLUTIONS'; }
						?>

					</h5>
					<?php foreach ($terms_solucoes as $key => $tag_produto) {
						?>
						<a href="<?php echo get_term_link($tag_produto->term_id); ?>" title="<?php echo $tag_produto->name; ?>"><?php echo $tag_produto->name; ?></a>
						<?php
					} ?>
				</div>
			<?php } */
		?>

		<ul class="list-produto">

			<?php 
				if (have_posts()){
					while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content-produto_list', get_post_format() ); ?>

					<?php endwhile;
				}
			?>

		</ul>
	</div>

	<?php /*
 $queried_object = get_queried_object();
 var_dump( $queried_object );*/
 ?>

	<?php paginacao(); ?>


<?php /*
$args = array(     
'post_type'    => 'produto',
'paged'    => get_query_var('paged') ? get_query_var('paged') : 1
 );
$loop = new WP_Query( $args );
                if( $loop->have_posts() ) { ?>
    <?php while( $loop->have_posts() ) {
                $loop->the_post(); ?>
    <?php } ?>
<?php }    
echo paginate_links( array(
                        'base' => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $loop->max_num_pages,
                        'prev_next' => true,
                        'prev_text' => 'Página Anterior',
                        'next_text' => 'Próxima Página',
                        'before_page_number' => '-',
                        'after_page_number' => '>',
                        'show_all' => false,
                        'mid_size' => 3,
                        'end_size' => 1
                    ) );
                wp_reset_postdata(); */?>
	
</section>	

<?php get_footer(); ?>