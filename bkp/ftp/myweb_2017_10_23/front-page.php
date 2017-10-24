<?php get_header(); ?>

<!-- slide -->
<section class="box-home slide-home">
	<div class="slide">
		<div class="controle-slide">
			<a class="left" href="#slide" role="button" data-slide="prev"></a>
			<a class="right" href="#slide" role="button" data-slide="next"></a>
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide_home','option') ):
					$slide = 0;
					while ( have_rows('slide_home','option') ) : the_row();

						if(get_sub_field('video','option')){
							$slide = $slide+1; ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video','option'); ?>" type="video/mp4">
								</video>

								<?php if(get_sub_field('youtube','option')){ ?>
									<a href="javascript:" class="play" target="" data-target="#lightbox"><i class="fa fa-youtube-play" aria-hidden="true" rel="<?php the_sub_field('youtube','option'); ?>"></i></a>
								<?php } ?>
							</div>

						<?php }else{
							if(get_sub_field('imagem','option')){
								$slide = $slide+1; ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem','option'); ?>');">

									<?php if((get_sub_field('titulo','option')) or (get_sub_field('subtitulo','option'))){ ?>
										<div class="tit-box-destaque right">
											
											<?php if(get_sub_field('subtitulo','option')){ ?>
												<span><?php the_sub_field('subtitulo','option'); ?></span>
											<?php } ?>

											<?php if(get_sub_field('titulo','option')){ ?>
												<h2><?php the_sub_field('titulo','option'); ?></h2>
											<?php } ?>

											<?php if(get_sub_field('titulo_link','option')){ ?>
												<a href="<?php the_sub_field('link','option'); ?>" title="<?php the_sub_field('titulo_link','option'); ?>"><?php the_sub_field('titulo_link','option'); ?></a>
											<?php } ?>
											
										</div>
									<?php } ?>

								</div>

							<?php }
						}

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>
	</div>
	<a href="javascript:" class="seta" rel=".slide-simuladores"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
</section>

<!-- simuladores -->
<section class="box-home slide-simuladores">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="10000" id="simuladores">
			<div class="carousel-inner" role="listbox">
				<div class="item active" style="background-image: url('<?php the_field('imagem_simuladores','option'); ?>');">
					<div class="tit-box-destaque left">
						<h2><?php the_field('titulo_simuladores','option'); ?></h2>
						<?php the_field('subtitulo','option'); ?>
						<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php the_field('titulo_link_simuladores','option'); ?>"><?php the_field('titulo_link_simuladores','option'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="javascript:" class="seta" rel="#premios"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
</section>

<!-- prêmios -->
<section class="box-home premios" id="premios">
	<div class="container">
		<h2>PRÊMIOS</h2>
		<p class="subtitulo"><?php the_field('texto_home_premios','option'); ?></p>

		<div>
			<?php if( have_rows('prêmios','option') ):
				while ( have_rows('prêmios','option') ) : the_row(); ?>

					<div class="item-premio">
						<span class="ico-item-premio">
							<img typeof="foaf:Image" src="<?php the_sub_field('imagem_premio','option'); ?>" width="200" height="100" alt="">
						</span>
						<p class="subtitulo"><?php the_sub_field('texto_premios','option'); ?></p>
					</div>

				<?php endwhile;
			endif; ?>
		</div>
	</div>
	<a href="#" class="seta" rel=".contato"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
</section>

<!-- contato -->
<section class="box-home contato">
	<div class="container">

		<div class="row">

			<div class="col-6 centrar-telefone">
				<div class="info-contato">
					<span>CENTRAL DE RELACIONAMENTO CERAMFIX</span>
					<h2>0800 7045049</h2>
					<a href="#">info@ceramfix.com.br</a>
				</div>
			</div>

			<div class="col-6 text-form-home">
				<p class="subtitulo"><?php the_field('texto_fale','option'); ?></p>
			</div>
			
		</div>
		
		<div class="row">
			<form action="javascript:" class="contato-home">
				<fieldset class="col-12">
					<span><input type="text" name="nome" id="nome" placeholder="Nome:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="email" id="email" placeholder="E-mail:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="telefone" id="telefone" placeholder="Telefone principal:"></span>
				</fieldset>
				<fieldset class="col-12">
					<label for="mensagem">Mensagem:</label>
					<textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
				</fieldset>
				<fieldset class="col-12">
					<p class="msg-form"></p>
					<button class="enviar">ENVIAR!</button>
				</fieldset>
			</form>
		</div>
	</div>
	<a href="#" class="seta" rel="body"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</section>

<?php get_footer(); ?>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden home-slide-play" data-dismiss="modal" aria-hidden="true"><span>×</span></button>
        <div class="modal-content">
            <div class="modal-body">
				<iframe src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
	    var lightbox = jQuery('#lightbox');
	    
	    jQuery('[data-target="#lightbox"]').on('click', function(event) {
	    	lightbox.show();

	        var img = jQuery(this).find('i'), 
	            css = {
	                'maxWidth': jQuery(window).width() - 100,
	                'maxHeight': jQuery(window).height() - 100
	            };

			var cod_video = img.attr('rel').split("&");
			cod_video = (cod_video[0]).split("=");
			src = 'https://www.youtube.com/embed/'+cod_video[1];
	    
	        lightbox.find('.close').addClass('hidden');
	        lightbox.find('iframe').attr('src', src);

	        lightbox.addClass('in');

	        var iframe = lightbox.find('iframe');	            
	        lightbox.find('.modal-dialog').css({'width': '80%', 'margin-top': '18.65vh'});
	        lightbox.find('.modal-content').css({'width': '100%'});
	        lightbox.find('.close').removeClass('hidden');
	        //lightbox.find('iframe').css({'width': (iframe.width()), 'top': '50%'});
	    });

	    lightbox.find('.close').on('click', function(event) {
	    	lightbox.removeClass('in');
	    	lightbox.find('iframe').attr('src', '');
			setTimeout(function(){
				lightbox.find('.close').addClass('hidden');
				lightbox.hide();
			}, 1000);
	    });


		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name'); ?>';

			if(email!=''){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.news form').trigger("reset");
					jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
			}
		});

	});
</script>