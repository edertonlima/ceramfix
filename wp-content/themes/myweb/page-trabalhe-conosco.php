<?php get_header(); ?>

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
				<p class="subtitulo">Preencha o formulário abaixo e envie seu currículo para a equipe de RH da Ceramfix. Agradecemos o interesse!</p>
				<p class="mini">* Preenchimento obrigatório</p>
			</div>
		</div>
		
		<div class="row">
			<form action="<?php echo get_template_directory_uri(); ?>/mail_trabalhe.php" class="contato-home" enctype="multipart/form-data" method="POST">
				<fieldset class="col-6">
					<span><input type="text" name="nome" id="nome" placeholder="Nome:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="email" id="email" placeholder="E-mail:"></span>
				</fieldset>

				<fieldset class="col-6">
					<span><input type="text" name="tel_princ" id="tel_princ" placeholder="Telefone principal:"></span>
				</fieldset>
				<fieldset class="col-6" style="clear: none;">
					<span><input type="text" name="tel_sec" id="tel_sec" placeholder="Telefone secundário:"></span>
				</fieldset>

				<fieldset class="col-6">
					<span><input type="text" name="endereco" id="endereco" placeholder="Endereço:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="estado" id="estado" placeholder="Estado:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="cidade" id="cidade" placeholder="Cidade:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="file" name="arquivo" id="arquivo" placeholder="Currículo:" style="margin-top: 11px;"></span>
					<div class="info-campo" style="color: #319b42;">Apenas arquivo em PDF.</div>
				</fieldset>
				<fieldset class="col-12">
					<label for="mensagem">Mensagem:</label>
					<textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
				</fieldset>
				<fieldset class="col-12">
					<p class="msg-form">
						<?php 
							if($_GET['form']){
								if($_GET['form'] == 'success'){
									echo 'Enviado com sucesso! Obrigado.';
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error'){
									echo 'Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde.';
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error-upload'){
									echo 'Não foi possível enviar o arquivo, tente novamente.';
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error-size'){
									echo 'O arquivo enviado é muito grande, envie arquivos de até 2Mb.';
								}
							}

							if($_GET['form']){
								if($_GET['form'] == 'error-extensao'){
									echo 'Por favor, envie apenas arquivo em PDF.';
								}
							}
						?>
					</p>
					<input type="hidden" name="para" value="<?php the_field('email', 'option'); ?>">
					<input type="hidden" name="nome_site" value="<?php bloginfo('name'); ?>">
					<button class="enviar" type="submit">ENVIAR!</button>
				</fieldset>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<?php /*
<script type="text/javascript">
	jQuery(".enviar").click(function(){
		jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
		jQuery('.msg-form').removeClass('erro ok').html('');
		var nome = jQuery('#nome').val();
		var email = jQuery('#email').val();
		var tel_princ = jQuery('#tel_princ').val();
		var tel_sec = jQuery('#tel_sec').val();
		var endereco = jQuery('#endereco').val();
		var estado = jQuery('#estado').val();
		var cidade = jQuery('#cidade').val();
		var mensagem = jQuery('#mensagem').val();
		var para = '<?php the_field('email', 'option'); ?>';
		var nome_site = '<?php bloginfo('name'); ?>';

	    var form;
	    $('#curriculo').change(function (event) {
	        form = new FormData();
	        form.append('curriculo', event.target.files[0]); // para apenas 1 arquivo
	        //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção
	    });

		if(email!=''){
			jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail_trabalhe.php", { nome:nome, email:email, tel_princ:tel_princ, tel_sec:tel_sec, endereco:endereco, estado:estado, cidade:cidade, mensagem:mensagem, para:para, nome_site:nome_site, form:form }, function(result){		
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
</script>
*/ ?>