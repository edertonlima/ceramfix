<div class="detalhe-produto">
		
	<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<?php if($imgPage){ ?>
		<a href="#" data-toggle="modal" data-target="#lightbox">
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-produto" alt="">
		</a>
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
							<img src="<?php the_sub_field('icone_indicacao'); ?>" alt="<?php the_sub_field('titulo_indicacao'); ?>">
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

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true"><span>×</span></button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>


<?php
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'lojas',
	'meta_key'		=> 'uf',
	'meta_value'	=> 'Melbourne'
);
    
?>
<section class="lojas">
	<div class="container">
		
		<div class="mapa-select" style="background-image: url('<?php the_field('imagem_busca','options'); ?>');">

			<div class="bg-select-">
				<span class="select selectboxproduto">
					<select name="produto" id="produto" class="select-produto">
						<option value="" selected="selected">UF</option>
						<?php
							//foreach ($uf_cidades as $uf => $cidades){ ?>
								
								<option value="<?php //echo $uf; ?>" selected="selected"><?php //echo $uf; ?></option>

								<?php 
									//$cidades = array_unique($cidades);
									//$cidades = arraytolower($cidades);

									//foreach ($cidades as $cidade){ ?>
										<script type="text/javascript">
											//var <?php //echo strtolower($uf); ?> = <?php //echo json_encode($cidades); ?>;
										</script>
									<?php //}

							//}
						?>
					</select>
				</span>
			</div>
			
		</div>

	</div>
</section>


<?php if( have_rows('produto') ): ?>

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


<script type="text/javascript">
	function heightAplicacao(){
		<?php if((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao'))){
			if(get_field('video_youtube_aplicacao')){ ?>
				var hAplicacao = (jQuery('.link-prod').width())/3.57;
				jQuery('.aplicacao iframe').height(hAplicacao);
			<?php }else{ ?>
				var hAplicacao = jQuery('.aplicacao img').height();
			<?php } ?>
			jQuery('.col-link a').height(((hAplicacao)/3)-2);
		<?php } ?>
	}

	jQuery('document').ready(function(){
		heightAplicacao();
	});

	jQuery(window).resize(function(){
		heightAplicacao();
	});


	jQuery(document).ready(function() {
	    var lightbox = jQuery('#lightbox');
	    
	    jQuery('[data-target="#lightbox"]').on('click', function(event) {
	        var img = jQuery(this).find('img'), 
	            src = img.attr('src'),
	            alt = img.attr('alt'),
	            css = {
	                'maxWidth': jQuery(window).width() - 100,
	                'maxHeight': jQuery(window).height() - 100
	            };
	    
	        lightbox.find('.close').addClass('hidden');
	        lightbox.find('img').attr('src', src);
	        lightbox.find('img').attr('alt', alt);
	        lightbox.find('img').css(css);
	    });
	    
	    lightbox.on('shown.bs.modal', function (e) {
	        var img = lightbox.find('img');
	            
	        lightbox.find('.modal-dialog').css({'width': img.width()});
	        lightbox.find('.close').removeClass('hidden');
	    });
	});
</script>

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