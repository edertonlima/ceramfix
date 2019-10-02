<?php get_header(); /*?>

<section class="produtos">
  <div class="container">

    <?php 
      */$id_tag = get_queried_object_id();/*
      $terms = get_terms( array(
          'taxonomy' => 'post_tag',
          'hide_empty' => true,
      ) );

      if($terms){ ?>

        <div class="solucoes">

          <h5>

            <?php 
              if($idioma == 'es'){ echo 'NUESTRAS SOLUCIONES'; }
              if($idioma == 'pt-br'){ echo 'NOSSAS SOLUÇÕES'; }
              if($idioma == 'en'){ echo 'OUR SOLUTIONS'; }
            ?>

          </h5>
          <?php foreach ($terms as $key => $tag_produto) {
            if($tag_produto->term_id != $id_tag){ ?>

              <a href="<?php echo get_term_link($tag_produto->term_id); ?>" title="<?php echo $tag_produto->name; ?>"><?php echo $tag_produto->name; ?></a>

            <?php }
          } ?>
        </div>
      <?php }
    ?>

    <h2><?php single_term_title(); ?></h2>
    <h4><?php echo term_description(); ?></h4>
  </div>

  <?php if( have_rows('imagem_categoria_produto','option') ):
    while ( have_rows('imagem_categoria_produto','option') ) : the_row(); 

      $term = get_term( get_sub_field('categoria_do_produto','option'), 'categoria_produto' ); 
      if($term->term_id == get_queried_object()->term_id){ ?>
        <div style="background-image: url('<?php the_sub_field('imagem_categoria_produto','option'); ?>');" class="img-linha"></div>
      <?php } ?>

    <?php endwhile;
  endif; ?>

  

  <div class="container">
    <ul class="list-produto">

    <?php
      $prod_list = get_posts(
        array(
          'post_type' => 'produto',
          'tag_id' => $id_tag
        )
      );

      $args = array(
          'post_type' => 'produto',
          'posts_per_page' => 99,
          'tag_id' => $id_tag
      );
      $the_query = new WP_Query( $args );

    while($the_query->have_posts()) :
      $the_query->the_post();

      echo 'aa - ';

    endwhile;

      /*if(count($prod_list) > 0){ ?>

          <?php foreach ( $prod_list as $produto ) {  ?>

            <?php 
              $post = get_post($produto->ID);
              get_template_part( 'content-produto_list', get_post_format() );
            ?>

          <?php } ?>

      <?php }*
    ?>  

    </ul>

    <?php paginacao(); ?>

  </div>  
</section>



*/ ?>



<?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array('post_type' => 'produto', 'tag_id' => $id_tag, 'paged' => $paged);
    $loop = new WP_Query( $args );

    global $wp_query;
    $wp_query = $loop;

//var_dump($loop);
//var_dump($wp_query);

while ( $loop->have_posts() ) : $loop->the_post();
  get_template_part( 'content-produto_list', get_post_format() );
endwhile; 

paginacao();

//wp_reset_postdata(); ?>

<?php get_footer(); ?>