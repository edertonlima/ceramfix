<?php get_header(); ?>

<?php 
	$idioma_front_page = [];
	if($idioma == 'pt'){
		$idioma_front_page = ['PRÊMIOS','CENTRAL DE RELACIONAMENTO CERAMFIX','Você também pode enviar suas críticas, sugestões ou dúvidas preenchendo os campos abaixo:','Nome','E-mail','Telefone principal','Mensagem','Enviar!','ENVIANDO!','Enviado com sucesso! Obrigado.','Por favor, digite um e-mail válido.','Estado','Cidade','Campos obrigatórios não podem estar vazios.'];
	}

	if($idioma == 'en'){
		$idioma_front_page = ['AWARDS','CENTRAL RELATIONSHIP CERAMFIX','You can also send your criticisms, suggestions or questions by filling out the fields below:','Name','Email','Primary Phone','Message','TO SEND!','SENDING!','Sent with success! Thank you.','Please, type a valid email.','State','City','Required fields can not be empty.'];
	}

	if($idioma == 'es'){
		$idioma_front_page = ['PREMIOS','CENTRAL DE RELACIÓN CERAMFIX','Usted también puede enviar sus críticas, sugerencias o dudas rellenando los campos abajo:','Nombre','E-mail','Teléfono de línea directa','Mensaje','¡ENVIAR!','¡ENVIANDO!','¡Enviado con éxito! Gracias.','Por favor, introduzca un e-mail válido.','Estado','Ciudad','Los campos obligatorios no pueden estar vacíos.'];
	}
?>

<!-- slide -->
<section class="box-home slide-home">
	<div class="slide">
		<div class="controle-slide">
			<a class="left" href="#slide" role="button" data-slide="prev"></a>
			<a class="right" href="#slide" role="button" data-slide="next"></a>
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="1000000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide_home') ):
					$slide = 0;
					while ( have_rows('slide_home') ) : the_row();

						if(get_sub_field('video')){
							$slide = $slide+1; ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video'); ?>" type="video/mp4">
								</video>

								<?php if(get_sub_field('youtube')){ ?>
									<a href="javascript:" class="play" target="" data-target="#lightbox"><i class="fa fa-youtube-play" aria-hidden="true" rel="<?php the_sub_field('youtube'); ?>"></i></a>
								<?php } ?>
							</div>

						<?php }else{
							if(get_sub_field('imagem')){
								$slide = $slide+1; ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<?php if((get_sub_field('titulo')) or (get_sub_field('subtitulo'))){ ?>
										<div class="tit-box-destaque right">
											
											<?php if(get_sub_field('subtitulo')){ ?>
												<span><?php the_sub_field('subtitulo'); ?></span>
											<?php } ?>

											<?php if(get_sub_field('titulo')){ ?>
												<h2><?php the_sub_field('titulo'); ?></h2>
											<?php } ?>

											<?php if(get_sub_field('titulo_link')){ ?>
												<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('titulo_link'); ?>"><?php the_sub_field('titulo_link'); ?></a>
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
				<div class="item active" style="background-image: url('<?php the_field('imagem_simuladores'); ?>');">
					<div class="tit-box-destaque left">
						<h2><?php the_field('titulo_simuladores'); ?></h2>
						<?php the_field('subtitulo'); ?>
						<a href="<?php echo get_permalink(get_page_by_path('simulador-cores')); ?>" title="<?php the_field('titulo_link_simuladores'); ?>"><?php the_field('titulo_link_simuladores'); ?></a>
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
		<h2><?php echo $idioma_front_page[0]; ?></h2>
		<p class="subtitulo"><?php the_field('texto_home_premios',49); ?></p>

		<div>
			<?php if( have_rows('prêmios',49) ):
				while ( have_rows('prêmios',49) ) : the_row(); ?>

					<div class="item-premio">
						<span class="ico-item-premio">
							<img typeof="foaf:Image" src="<?php the_sub_field('imagem_premio',49); ?>" width="200" height="100" alt="">
						</span>
						<p class="subtitulo"><?php the_sub_field('texto_premios',49); ?></p>
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
					<span><?php echo $idioma_front_page[1]; ?></span>
					<h2><?php the_field('telefone','option'); ?></h2>
					<a href="mailto:<?php the_field('telefone','option'); ?>"><?php the_field('email','option'); ?></a>
				</div>
			</div>

			<div class="col-6 text-form-home">
				<p class="subtitulo"><?php echo $idioma_front_page[2]; ?></p>
			</div>
			
		</div>
		
		<div class="row">
			<form action="javascript:" class="contato-home">
				<fieldset class="col-12">
					<span><input type="text" name="nome" id="nome" placeholder="<?php echo $idioma_front_page[3]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="email" id="email" placeholder="<?php echo $idioma_front_page[4]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" class="mask-telefone" name="telefone" id="telefone" placeholder="<?php echo $idioma_front_page[5]; ?>: *"></span>
				</fieldset>

				<fieldset class="col-6">
					<span><input type="text" name="cidade" id="cidade" placeholder="<?php echo $idioma_front_page[12]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="estado" id="estado" placeholder="<?php echo $idioma_front_page[11]; ?>: *"></span>
				</fieldset>

				<fieldset class="col-12">
					<textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="<?php echo $idioma_front_page[6]; ?>: *"></textarea>
				</fieldset>
				<fieldset class="col-12">
					<p class="msg-form"></p>
					<button class="enviar"><?php echo $idioma_front_page[7]; ?></button>
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
			jQuery('.enviar').html('<?php echo $idioma_front_page[8]; ?>').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var cidade = jQuery('#cidade').val();
			var estado = jQuery('#estado').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name'); ?>';

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(telefone == ''){
				jQuery('#tel_princ').parent().addClass('erro');
			}

			if(cidade == ''){
				jQuery('#cidade').parent().addClass('erro');
			}

			if(estado == ''){
				jQuery('#estado').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem').addClass('erro');
			}

			if((nome == '') || (email == '') || (telefone == '') || (cidade == '') || (estado == '') || (mensagem == '')){
				jQuery('.msg-form').html('<?php echo $idioma_front_page[13]; ?>');

				jQuery('.enviar').html('<?php echo $idioma_front_page[7]; ?>').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, cidade:cidade, estado:estado, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = '<?php echo $idioma_front_page[9]; ?>';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.contato-home').trigger("reset");
					jQuery('.enviar').html('<?php echo $idioma_front_page[7]; ?>').prop( "disabled", false );
				});
			}
		});

	});

	jQuery(document).ready(function(){
		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).hasClass('erro')){
				jQuery(this).removeClass('erro');
			}
		});
	})
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
<script type="text/javascript">
	jQuery(function(jQuery){
	   jQuery(".mask-telefone").mask("(99) 9999-9999?9");
	});
</script>