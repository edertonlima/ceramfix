<?php get_header(); ?>

<?php 
	$idioma_empresa = [];
	if($idioma == 'pt-br'){
		$idioma_empresa = ['SOLUÇÕES','EMPRESA'];
	}

	if($idioma == 'en'){
		$idioma_empresa = ['SOLUÇÕES','EMPRESA'];
	}

	if($idioma == 'es'){
		$idioma_empresa = ['SOLUÇÕES','EMPRESA'];
	}
?>

<main class="page-argamassa">
	<?php while ( have_posts() ) : the_post(); ?>

        <?php 
            $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
        ?>

        <section class="box-home slide-simuladores">
            <div class="slide">
                <div class="carousel slide" data-ride="carousel" data-interval="10000" id="simuladores">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" style="background-image: url('<?php if($imgPage[0]){ echo $imgPage[0]; } ?>');">
                            <div class="tit-box-destaque left">
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="box-container">
            <div class="container">
                <p><?php the_field('conteudo-argamassa'); ?></p>
            </div>
        </section>

        <?php $argamassas = get_field('itens-argamassa'); //var_dump($argamassas); ?>

        <section class="box-container bg-argamassa">
            <div class="container">
                <h3 class="h3-argamassa">SUMÁRIO</h3>
                <nav class="nav-argamassa">

                    <?php
                        foreach($argamassas as $row => $argamassa){
                            $cont_argamassa = $argamassa['conteudo-argamassa'];
                            //$argamassa = $r_argamassa[0];
                            //var_dump($cont_argamassa); echo '<br><br>'; ?>

                            <ol>
                                <li>
                                    <h4><?php echo $argamassa['titulo-principal']; ?></h4>
                                    <ul>
                                        <?php foreach($cont_argamassa as $row_cont => $cont_argamassa_item){ ?>
                                            <li><a href="#argamassa-<?php echo $row . '.' . $row_cont; ?>"><?php echo $cont_argamassa_item['titulo-conteudo']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>                        
                            </ol>

                        <?php }
                    ?>
                    <?php /*<h4>I. ARGAMASSAS</h4>
                    <ul>
                        <li><a href="#">O que são Argamassas</a></li>
                        <li><a href="#">O que são Argamassas piso sobre piso</a></li>
                    </ul>

                    <h4>II. ARGAMASSAS COLANTE</h4>
                    <ul>
                        <li><a href="#">O que são Argamassas</li>
                        <li><a href="#">O que são Argamassas piso sobre piso</a></li>
                    </ul>

                    <h4>III. CHAPISCO ROLADO E COLANTE CERAMFIX</h4>
                    <ul>
                        <li><a href="#">O que são Argamassas</a></li>
                        <li><a href="#">O que são Argamassas piso sobre piso</a></li>
                    </ul>

                    <h4>IV. O QUE É REJUNTE</h4>
                    <ul>
                        <li><a href="#">O que são Argamassas</a></li>
                        <li><a href="#">O que são Argamassas piso sobre piso</a></li>
                    </ul> */?>
                </nav>
            </div>
        </section>

        <section class="box-container contato-argamassa">
            <div class="container">
                <p><?php the_field('txt-cont-off-argamassa'); ?></p>

                <div class="row">
                    <form class="contato-home form-argamassa">
                        <fieldset class="col-6">
                            <span><input type="text" name="email" id="email" placeholder="E-mail*"></span>
                        </fieldset>
                        <fieldset class="col-12">
                            <p class="msg-form"></p>
                            <button class="enviar btn-baixar-conteudo">Baixe esse conteúdo <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

        <section class="box-home slide-simuladores">
            <div class="slide sub-item">
                <div class="carousel slide sub-item" data-ride="carousel" data-interval="10000" id="simuladores">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" style="background-image: url('<?php the_field('imagem_simuladores',30227); ?>');">
                            <div class="tit-box-destaque left">
                                <h2>I. ARGAMASSAS</h2>
                                <!--<?php the_field('subtitulo'); ?>-->
                                <!--<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php the_field('titulo_link_simuladores'); ?>"><?php the_field('titulo_link_simuladores'); ?></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:" class="seta" rel="#premios"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </section>

        <section class="box-container cont-flex-argamassa">

            <div class="container">
                <h4>O QUE SÃO ARGAMASSAS</h4>
            </div>

            <div class="container">
                <p>Lorem Ipsum is <a href="#">simply dummy text of</a> the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <p>dummy text of the:</p>

                <ul>
                    <li>simply dummy text</li>
                    <li>simply dummy text</li>
                    <li>simply dummy text</li>
                </ul>
            </div>

            <div class="container">
                <img src="https://ederton.com.br/preview/ceramfix/wp-content/uploads/2017/05/linha_especialista.jpg" alt="">
            </div>

            <div class="produtos">
                <div class="container">
                    <ul class="list-produto">

                        <?php
                            $query = array(
                                    'posts_per_page' => 4,
                                    'post_type' 	 => 'produto'
                                );
                            query_posts( $query ); 

                            while ( have_posts() ) : the_post();
                                get_template_part( 'content-produto_list', get_post_format() );
                            endwhile;
                            wp_reset_query();
                        ?>

                    </ul>
                </dv>
            </div>

            <div class="container">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                <ol>
                    <li>simply dummy text</li>
                    <li>simply dummy text</li>
                    <li>simply dummy text</li>
                </ol>
            </div>

            <img src="https://ederton.com.br/preview/ceramfix/wp-content/uploads/2017/10/img_cozinha.jpg" class="full" alt="">

        </section>

        <?php /*
		<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
		<?php if($imgPage){ ?>
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-page" style="max-width: 230px; margin: 0px auto;">
		<?php } ?>
		
		<?php /*
		<div class="container">
			<h2><?php the_title(); ?></h2>
		</div>
		*/ /*?>

		<div class="container" style="margin-bottom: 50px;">
			<div class="menu-ardex">
				<span class="item-menu-ardex solucoes-ardex">
					<?php echo $idioma_empresa[0]; ?>
					<ul class="submenu-menu-ardex">
						<?php if( have_rows('ico-solucoes-ardex','option') ):
							while ( have_rows('ico-solucoes-ardex','option') ) : the_row(); 

								$term = get_term( get_sub_field('categoria-solucoes-ardex','option'), 'categoria_solucoes_ardex' ); ?>

								<li>
									<a href="<?php echo get_term_link($term->term_id); ?>" title="<?php echo $term->name; ?>" class="<?php if(is_tax('categoria_produto',$term->slug)){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('icone-solucoes-ardex','option'); ?>');">
										<?php echo $term->name; ?>
									</a>
								</li>

							<?php endwhile;
						endif; ?>
					</ul>
				</span>
				<a class="item-menu-ardex" href="<?php echo get_home_url(); ?>/sobre-a-ardex"><?php echo $idioma_empresa[1]; ?></a>
			</div>
			
			<div class="conteudo">
				<p class="subtitulo"><?php the_field('titulo_page'); ?></p>	
				<p><?php the_field('conteudo_page'); ?></p>
			</div>
		</div>

        */ ?>

	<?php endwhile;	?>
</main>

<?php get_footer(); ?>
