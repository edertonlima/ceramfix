<?php 
	global $idioma;
	global $url_idioma;
	//$idioma = WPGlobus::Config()->language;
	if($idioma == 'en'){
		$url_idioma = explode('/en',home_url());
		$url_idioma = $url_idioma[0];
	}else{
		if($idioma == 'es'){
			$url_idioma = explode('/es',home_url());
			$url_idioma = $url_idioma[0];
		}else{
			$url_idioma = home_url();
		}
	}

	$idioma_single_produto = [];
	if($idioma == 'pt-br'){
		$idioma_single_produto = ['Indicação de uso','Aplicação','FICHA TÉCNICA','SIMULADOR DE CORES','CALCULADORA DE CONSUMO','ENCONTRAR LOJAS PERTO DE MIM','Veja outros produtos','Cores Disponíveis:'];
	}

	if($idioma == 'en'){
		$idioma_single_produto = ['Indication of use', 'Application', 'TECHNICAL SHEET', 'COLOR SIMULATOR', 'CONSUMER CALCULATOR', 'FIND SHOPS NEAR ME', 'See other products','Available Colors:'];
	}

	if($idioma == 'es'){
		$idioma_single_produto = ['Indicación de uso', 'Aplicación', 'FICHA TÉCNICA', 'SIMULADOR DE COLORES', 'CALCULADORA DE CONSUMO', 'ENCONTRAR TIENDAS CERCA DE MÍ', 'Vea otros productos','Colores Disponibles:'];
	}
?>

<div class="detalhe-produto">
		
	<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
	<?php if($imgPage){ ?>
		<a href="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="fancybox">
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="img-produto" alt="">
		</a>
	<?php } ?>

	<div class="cont-detalhe-produto">
		<h2 class="tit-det-produto" style="text-align: left;"><?php the_title(); ?></h2>
		<p><?php the_field('descrição_produto'); ?></p>

<style type="text/css">
	.produtos .cores-produto {
		margin: 30px 0 40px;
		display: block;
		overflow: hidden;
		width: 100%;
	}

	.produtos .cores-produto h2 {
		text-transform: none;
		font-size: 1.15rem;
		margin-top: 0;
	}

	.produtos .cores-produto ul {
		margin-top: 15px;
	}

	.produtos .cores-produto li {
		display: inline-block;
		/*cursor: pointer;*/
	}

	.produtos .cores-produto li .nome-cor {
		border: 1px solid #e6e7e8;
		width: 48px;
		height: 48px;
		display: block;
	}

	.produtos .cores-produto li:hover .nome-cor {
		/*display: block;*/
	}
</style>
		
		<?php if( have_rows('cores') ): ?>
			<div class="cores-produto">
				<h2><?php echo $idioma_single_produto[7]; ?></h2>
				<ul>
													    
				    <?php while ( have_rows('cores') ) : the_row(); ?>

				    	<li style="background-color: <?php the_sub_field('hexa'); ?>"><a class="nome-cor" title="<?php the_sub_field('nome'); ?>"></a></li>

					<?php endwhile; ?>

				</ul>
			</div>
		<?php endif; ?>

		<div class="indicacao">
			<h2><?php echo $idioma_single_produto[0]; ?></h2>
			<ul>

				<?php if( have_rows('indicação_produto') ):
					while ( have_rows('indicação_produto') ) : the_row(); //echo get_sub_field('icone_indicacao'); ?>

						<li>
							<img src="<?php the_sub_field('icone_indicacao'); ?>" alt="<?php //the_sub_field('titulo_indicacao'); ?>">
							<span><?php the_sub_field('titulo_indicacao'); ?></span>
						</li>

					<?php endwhile;
				endif; ?>

			</ul>
		</div>
	</div>

	<div class="link-prod<?php if((!get_field('ficha_tecnica')) and (!get_field('simulacao_cores')) and (!get_field('cr'))){ echo ' no-button'; } if(!((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao')))){ echo ' no-aplicacao'; } ?>">

		<?php if((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao'))){ ?>
			<div class="col-link aplicacao">
				<h2><?php echo $idioma_single_produto[1]; ?></h2>
				<?php 
					if(get_field('video_youtube_aplicacao')){
						the_field('video_youtube_aplicacao');
					}else{ ?>
						<img src="<?php the_field('imagem_aplicacao'); ?>" alt="<?php echo $idioma_single_produto[1]; ?>">
					<?php }
				?>
			</div>
		<?php } ?>

		<div class="col-link">
			<?php if(get_field('ficha_tecnica')){ ?>
				<a href="<?php the_field('ficha_tecnica'); ?>" target="_blank" title="<?php echo $idioma_single_produto[2]; ?>" class="ficha-tecnica"><span class="box-link"><span><span><?php echo $idioma_single_produto[2]; ?></span></span></span></a>
			<?php } ?>
			<?php if(get_field('simulacao_cores')){ ?>
				<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')) . '?prod=' . $post->ID; ?>" title="<?php echo $idioma_single_produto[3]; ?>" class="simulador"><span class="box-link"><span><span><?php echo $idioma_single_produto[3] ?></span></span></span></a>
			<?php } ?>
			<?php if(get_field('cr')){ ?>
				<a href="<?php echo get_permalink(get_page_by_path('calculadora-consumo')); ?>" title="<?php echo $idioma_single_produto[4]; ?>" class="calculadora"><span class="box-link"><span><span><?php echo $idioma_single_produto[4]; ?></span></span></span></a>
			<?php } ?>
		</div>
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

<section class="lojas" style="display: none;">
	<div class="container">
		
		<div class="mapa-select" style="background-image: url('<?php the_field('imagem_busca','options'); ?>');">

			<h3><?php echo $idioma_single_produto[5]; ?></h3>

			<div class="bg-select">
				<span class="select selectboxproduto">
					<select name="produto" id="estados" class="select-produto"></select>
				</span>

				<span class="select selectboxproduto">
					<select name="cidades" id="cidades" class="select-produto" disabled></select>
				</span>
			</div>
			
		</div>

	</div>
</section>


<?php if( have_rows('produto') ): ?>

	<section class="produtos">
		<div class="container">
			<h2 class="outros-produtos"><?php echo $idioma_single_produto[6]; ?>:</h2>

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
										<h3><?php echo get_the_title($outros_pro->ID);// echo $outros_pro->post_title; ?></h3>
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
		if(jQuery(window).width() > '750'){
			<?php if((get_field('video_youtube_aplicacao')) or (get_field('imagem_aplicacao'))){
				if(get_field('video_youtube_aplicacao')){ ?>
					var hAplicacao = (jQuery('.link-prod').width())/3.57;
					jQuery('.aplicacao iframe').height(hAplicacao);
				<?php }else{ ?>
					var hAplicacao = jQuery('.aplicacao img').height();
				<?php } ?>
				jQuery('.col-link a').height(((hAplicacao)/3)-2);
			<?php } ?>
		}else{
			jQuery('.col-link a').height('10vh');
		}
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
	                'maxWidth': jQuery(window).width() - ((jQuery(window).width())*0.2),
	                'maxHeight': jQuery(window).height() - ((jQuery(window).height())*0.2)
	            };
	    
	        lightbox.find('.close').addClass('hidden');
	        lightbox.find('img').attr('src', src);
	        lightbox.find('img').attr('alt', alt);
	        lightbox.find('img').css(css);

	        //topModal = '-'+parseInt(((jQuery(window).height())-(jQuery(window).height()))/2)+'px';
	        topModal = '-'+parseInt((img.height())/1.25)+'px';
	        lightbox.find('.modal-dialog').css({'width': img.width(), 'margin-top': topModal, 'top': '50%'});
	    });
	    
	    lightbox.on('shown.bs.modal', function (e) {
	        var img = lightbox.find('img');
	        //topModal = '-'+parseInt(((jQuery(window).height())-(jQuery(window).height()))/2)+'px';
	        lightbox.find('.modal-dialog').css({'width': img.width(), 'margin-top': topModal, 'top': '50%'});
	        lightbox.find('.close').removeClass('hidden');
	    });
	});

	jQuery(document).ready(function () {
	
		jQuery.getJSON('<?php echo get_template_directory_uri(); ?>/estados_cidades.json', function (data) {
			var items = [];
			var options = '<option value="Estado">Estado</option>';	
			jQuery.each(data, function (key, val) {
				options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
			});			

			jQuery("#estados").html(options);

			var str = "Estado";	
			jQuery("#estados").change(function () {	
				var options_cidades = '<option value="Cidade">Cidade</option>';
				str = jQuery('#estados option:selected').val();

				if(str != 'Estado'){
					jQuery.each(data, function (key, val) {
						if(val.sigla == str) {							
							jQuery.each(val.cidades, function (key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});							
						}
					});
					jQuery("#cidades").html(options_cidades).prop('disabled', false);
				}else{
					options_cidades += '<option value="Cidades">Cidades</option>';
					jQuery("#cidades").html(options_cidades).prop('disabled', true);
				}
			}).change();		
		});

		var str_cidade = "Cidade";	
		jQuery("#cidades").change(function () {	
			jQuery("#cidades option:selected").each(function () {
				str_cidade = jQuery('#cidades option:selected').text();
				str = jQuery('#estados option:selected').val();
			});

			if(str_cidade != 'Cidade'){
				var url = '<?php echo get_home_url(); ?>/lojas/?estado='+str.toLowerCase()+'&cidade='+str_cidade.toLowerCase();
				window.location.replace(url);				
			}
		}).change();
	
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

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();	
	});
</script>