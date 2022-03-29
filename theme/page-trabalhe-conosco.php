<?php get_header(); ?>

<?php 
	$idioma_fale = [];
	if($idioma == 'pt-br'){
		$idioma_fale = ['Preencha o formulário abaixo e envie seu currículo para a equipe de RH da Ceramfix. Agradecemos o interesse!','Preenchimento obrigatório','Nome','E-mail','Telefone principal','Telefone secundário','Endereço','Estado','Cidade','Currículo','Apenas arquivo em PDF.','Mensagem','Enviado com sucesso! Obrigado.','Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde.','Não foi possível enviar o arquivo, tente novamente.','O arquivo enviado é muito grande, envie arquivos de até 2Mb.','Por favor, envie apenas arquivo em PDF.','ENVIAR!','ENVIANDO!'];
	}

	if($idioma == 'en'){
		$idioma_fale = ['Fill out the form below and send your resume to the Ceramfix HR team. Thank you for your interest!','Required field','Name','Email','Primary telephone','Secondary telephone','Address','State','City','Curriculum','in PDF.','Message','Successfully Sent! Thanks.','Sorry, we were unable to submit your form. <br> Please try again later.','The file could not be uploaded, please try again.','The uploaded file is very large, send files up to 2Mb.','Please send only file at PDF.','SEND!','SENDING!'];
	}

	if($idioma == 'es'){
		$idioma_fale = ['Rellene el formulario abajo y envíe su currículum para el equipo de RH de Ceramfix. ¡Agradecemos el interés! ',' Relleno obligatorio ',' Nombre ',' E-mail ',' Teléfono principal ',' Teléfono secundario ',' Dirección ',' Estado ',' Ciudad ',' Currículum ',' Sólo archivo en PDF. ',' Mensaje ',' Enviado con éxito! Gracias. ',' Lo sentimos, no fue posible enviar su formulario. Por favor, vuelva a intentarlo más tarde. ',' No se pudo enviar el archivo, vuelva a intentarlo. ',' El archivo enviado es muy grande, envíe archivos de hasta 2Mb. ',' Por favor, envíe sólo el archivo en PDF. ','¡ENVIAR!','¡ENVIANDO!'];
	}
?>

<section class="box-container box-matriz-filiais trabalhe_conosco">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
	
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	if($imagem[0]){ ?>
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-page">
	<?php } ?>
</section>	

<section class="box-container box-matriz-filiais contato trabalhe-conosco">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<p class="subtitulo"><?php echo $idioma_fale[0]; ?></p>
				<p class="mini">* <?php echo $idioma_fale[1]; ?></p>
			</div>
		</div>
		
		<div class="row">
			<form action="<?php echo get_template_directory_uri(); ?>/mail/trabalhe.php" class="contato-home" enctype="multipart/form-data" method="POST">
				<fieldset class="col-6">
					<span><input type="text" name="nome" id="nome" placeholder="<?php echo $idioma_fale[2]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="email" id="email" placeholder="<?php echo $idioma_fale[3]; ?>: *"></span>
				</fieldset>

				<fieldset class="col-6">
					<span><input type="text" name="tel_princ" id="tel_princ" class="mask-telefone" placeholder="<?php echo $idioma_fale[4]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6" style="clear: none;">
					<span><input type="text" name="tel_sec" id="tel_sec" class="mask-telefone" placeholder="<?php echo $idioma_fale[5]; ?>:"></span>
				</fieldset>

				<fieldset class="col-6">
					<span><input type="text" name="endereco" id="endereco" placeholder="<?php echo $idioma_fale[6]; ?>:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="estado" id="estado" placeholder="<?php echo $idioma_fale[7]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="cidade" id="cidade" placeholder="<?php echo $idioma_fale[8]; ?>: *"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="file" name="anexo" id="arquivo" placeholder="<?php echo $idioma_fale[9]; ?>:" style="margin-top: 11px;"></span>
					<div class="info-campo" style="color: #319b42;"><?php echo $idioma_fale[10]; ?> *</div>
				</fieldset>
				<fieldset class="col-12">
					<textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="<?php echo $idioma_fale[11]; ?>: *"></textarea>
				</fieldset>
				<fieldset class="col-12">
						<label id="label-politica" for="politica-privacidade">
							<input type="checkbox" value="aceito" name="politica-privacidade" id="politica-privacidade">
Li e concordo com a <a style="color: #319b42" href="https://www.ceramfix.com.br/politica-de-privacidade" title="Política de Privacidade">Política de Privacidade</a> da Ceramfix, que pode usar as informações aqui fornecidas por mim para entrar em contato comigo, via e-mail, telefone ou WhatsApp, para ações de natureza comercial. Também estou ciente que posso revogar meu consentimento sobre o tratamento dos meus dados pessoais a qualquer momento enviando um e-mail para <a style="color: #319b42" href="mailto:dpo@ceramfix.com.br" title="dpo@ceramfix.com.br">dpo@ceramfix.com.br</a>
						</label>

				</fieldset>
                <fieldset class="col-12">
                	<div style="overflow:hidden;display: flex;justify-content: center;" class="g-recaptcha" data-sitekey="6LfOteMcAAAAAC8HnFEU-wZ33hZCrz6h4KIcC6CL"></div>
                </fieldset>
				<fieldset class="col-12">
					<p class="msg-form">
						<?php 
							if($_GET['form']){
								if($_GET['form'] == 'success'){
									echo $idioma_fale[12];
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error'){
									echo $idioma_fale[13];
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error-upload'){
									echo $idioma_fale[14];
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error-size'){
									echo $idioma_fale[15];
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error-extensao'){
									echo $idioma_fale[16];
								}
							}
						?>
					</p>
					<input type="hidden" name="para" value="<?php the_field('email_rh', 'option'); ?>">
					<input type="hidden" name="nome_site" value="<?php bloginfo('name'); ?>">
                    <input type="hidden" name="subject" value="<?php the_title(); ?>">
					<button class="enviar" type="submit"><?php echo $idioma_fale[17]; ?></button>
				</fieldset>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery('.contato-home').submit(function() {
		
		jQuery('.msg-form').html('');
		var nome = jQuery('#nome').val();
		var email = jQuery('#email').val();
		var tel_princ = jQuery('#tel_princ').val();
		var endereco = jQuery('#endereco').val();
		var estado = jQuery('#estado').val();
		var cidade = jQuery('#cidade').val();
		var anexo = jQuery('#arquivo').val();
		var mensagem = jQuery('#mensagem').val();
        
		if(!jQuery('#politica-privacidade').is(':checked')){
			jQuery('#label-politica').css('border-bottom','2px solid red');
			jQuery('#label-politica').css('padding-bottom','10px');
		}

		if(nome == ''){
			jQuery('#nome').parent().addClass('erro');
		}

		if(email == ''){
			jQuery('#email').parent().addClass('erro');
		}

		if(tel_princ == ''){
			jQuery('#tel_princ').parent().addClass('erro');
		}

		if(endereco == ''){
			jQuery('#endereco').parent().addClass('erro');
		}

		if(cidade == ''){
			jQuery('#cidade').parent().addClass('erro');
		}

		if(estado == ''){
			jQuery('#estado').parent().addClass('erro');
		}

		if(anexo == ''){
			jQuery('#arquivo').parent().addClass('erro');
		}else{
			if((anexo.split('.').pop()) != 'pdf'){
				jQuery('#arquivo').parent().addClass('erro');
				jQuery('.msg-form').html('Somente arquivos do tipo PDF são aceitos');
			}
		}

		if(mensagem == ''){
			jQuery('#mensagem').addClass('erro');
		}

		if((nome == '') || (email == '') || (tel_princ == '') || (endereco == '') || (cidade == '') || (estado == '') || (anexo == '') || (mensagem == '')){
			jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.');
			return false;
		}else{
            if(!jQuery('#politica-privacidade').is(':checked')){
            	jQuery('.msg-form').html('Você precisa confirmar a política de privacidade.');
                return false;
            }else{
                response = grecaptcha.getResponse();
                if(response.length == 0){
                	jQuery('.msg-form').html('Você precisa confirmar que não é um robô.');
                    return false;
                }else{ 
					return true;
                }
            }
		}

	});

	jQuery(document).ready(function(){
		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
        
		jQuery('#politica-privacidade').change(function(){
			if(jQuery(this).is(':checked')){
				jQuery('#label-politica').css('border','none');
				jQuery('#label-politica').css('padding-bottom','0px');
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

<script src="https://www.google.com/recaptcha/api.js" async defer></script>