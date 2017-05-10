<div class="detalhe-produto">
		
	<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<?php if($imgPage){ ?>
		<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-produto" alt="">
	<?php } ?>

	<div class="cont-detalhe-produto">
		<h2><?php the_title(); ?></h2>
		<p><?php the_field('descrição_produto'); ?></p>

		<div class="indicacao">
			<h2>Indicação de uso</h2>
			<ul>

				<?php if( have_rows('indicação_produto') ):
					while ( have_rows('indicação_produto') ) : the_row(); ?>

						<li>
							<a href="<?php the_sub_field('icone_indicacao'); ?>" data-toggle="lightbox">
								<img src="<?php the_sub_field('icone_indicacao'); ?>" alt="<?php the_sub_field('titulo_indicacao'); ?>">
							</a>
							<span><?php the_sub_field('titulo_indicacao'); ?></span>
						</li>

					<?php endwhile;
				endif; ?>

			</ul>
		</div>
	</div>

	<div class="link-prod<?php if(!get_field('ficha_tecnica')){ echo ' no-ficha'; } if(!((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao')))){ echo ' no-aplicacao'; } ?>">
		<div class="col-link">
			<?php if(get_field('ficha_tecnica')){ ?>
				<a href="<?php the_field('ficha_tecnica'); ?>" target="_blank" class="ficha-tecnica"><span class="box-link"><span><span>FICHA TÉCNICA</span></span></span></a>
			<?php } ?>
			<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="SIMULADOR DE CORES" class="simulador"><span class="box-link"><span><span>SIMULADOR DE CORES</span></span></span></a>
			<a href="<?php echo get_permalink(get_page_by_path('calculadora-consumo')); ?>" title="CALCULADORA DE CONSUMO" class="calculadora"><span class="box-link"><span><span>CALCULADORA DE CONSUMO</span></span></span></a>
		</div>
		<?php if((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao'))){ ?>
			<div class="col-link aplicacao">
				<h2>Aplicação</h2>
				<?php 
					if(get_field('video_youtube_aplicacao')){
						the_field('video_youtube_aplicacao');
					}else{ ?>
						<img src="<?php the_field('imagem_aplicacao'); ?>" alt="Aplicação">
					<?php }
				?>
			</div>
		<?php } ?>
	</div>

</div>

<script type="text/javascript">
	function heightAplicacao(){
		<?php if((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao'))){
			if(get_field('video_youtube_aplicacao')){ ?>
				var hAplicacao = (jQuery('.link-prod').width())/3.57;
				jQuery('.aplicacao iframe').height(hAplicacao);
			<?php }else{ ?>
				var hAplicacao = jQuery('.aplicacao img').height();
			<?php }
		} ?>
		jQuery('.col-link a').height(((hAplicacao)/3)-2);		
	}

	jQuery('document').ready(function(){
		heightAplicacao();
	});

	jQuery(window).resize(function(){
		heightAplicacao();
	});

	jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
	    event.preventDefault();
	    jQuery(this).ekkoLightbox();
	});
</script>