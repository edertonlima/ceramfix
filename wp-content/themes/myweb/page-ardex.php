<?php get_header(); ?>

<style>
	.menu-ardex {
		margin: 0 auto;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.menu-ardex .item-menu-ardex {
		background: #000000;
		color: #ffffff;
		line-height: 40px;
		padding: 0 30px;
		margin: 0 1px;
		position: relative;
	}
	.menu-ardex .item-menu-ardex:hover {
		text-decoration: none;
		background: #e55a24;
		transition: all .3s;
	}

	.solucoes-ardex {
		cursor: pointer;
	}
	.solucoes-ardex:hover .submenu-menu-ardex {
		display: block;
	}
	.submenu-menu-ardex {
		background-color: #005995;
		display: none;
		height: auto;
		width: 100%;
		z-index: 999;
		text-align: center;
		position: fixed;
		left: 0;
		border-top: 10px solid #ffffff;
	}
	.submenu-menu-ardex li {
		display: inline-block;
		padding: 0;
		height: 96px;
		max-width: 280px;
		margin: 0 15px;
	}
	.submenu-menu-ardex li a {
		font-size: 1.125rem;
		line-height: 1.25rem;
		color: #ffffff;
		font-weight: 300;

		padding: 0 20px 0 100px;
		display: table-cell;
		vertical-align: middle;
		height: 100px;

		box-sizing: content-box;
		text-align: left;
		background-position: left top;
		background-repeat: no-repeat;

		text-transform: uppercase;
		text-decoration: none;
		-moz-transition: all .2s ease 0s;
		-webkit-transition: all .2s ease 0s;
		-o-transition: all .2s ease 0s;
		cursor: pointer;
	}
</style>

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

<section class="box-container box-empresa">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
		<?php if($imgPage){ ?>
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-page" style="max-width: 230px; margin: 0px auto;">
		<?php } ?>
		
		<?php /*
		<div class="container">
			<h2><?php the_title(); ?></h2>
		</div>
		*/ ?>

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

	<?php endwhile;	?>

</section>

<?php get_footer(); ?>
