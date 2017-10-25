<?php get_header(); ?>

<?php
	$idioma_single_produto = [];
	if($idioma == 'pt'){
		$idioma_single_produto = ['CENTRAL DE RELACIONAMENTO CERAMFIX','Nome','E-mail','Telefone principal','Mensagem','ENVIAR!','ENVIANDO!','Enviado com sucesso! Obrigado.','Você também pode enviar suas críticas, sugestões ou dúvidas preenchendo os campos abaixo:'];
	}

	if($idioma == 'en'){
		$idioma_single_produto = ['CERAMFIX RELATIONSHIP CENTER', 'Name', 'Email', 'Home Phone', 'Message', 'SEND!', 'SENDING!', 'Successfully Sent! Thank you.','You can also send your criticisms, suggestions or questions by filling out the fields below:'];
	}

	if($idioma == 'es'){
		$idioma_single_produto = ['CENTRAL DE RELACIÓN CERAMFIX', 'Nombre', 'E-mail', 'Teléfono principal', 'Mensaje', 'ENVIAR!', 'ENVIANDO!', 'Enviado con éxito! Gracias. ','Usted también puede enviar sus críticas, sugerencias o dudas rellenando los campos abajo:'];
	}
?>

<section class="box-container box-matriz-filiais">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
	
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	if($imagem[0]){ ?>
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-page">
	<?php } ?>
</section>	

	<!-- contato -->
<section class="contato">
	<div class="container">

		<div class="row">
			<div class="col-6 centrar-telefone">
				<div class="info-contato">
					<span><?php echo $idioma_single_produto[0]; ?></span>
					<h2><?php the_field('telefone','option'); ?></h2>
					<a href="mailto:<?php the_field('telefone','option'); ?>"><?php the_field('email','option'); ?></a>
				</div>
			</div>

			<div class="col-6 text-form-home">
				<p class="subtitulo"><?php echo $idioma_single_produto[8]; ?></p>
			</div>
		</div>
		
		<div class="row">
			<form action="javascript:" class="contato-home">
				<fieldset class="col-12">
					<span><input type="text" name="nome" id="nome" placeholder="<?php echo $idioma_single_produto[1]; ?>:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="email" id="email" placeholder="<?php echo $idioma_single_produto[2]; ?>:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="telefone" id="telefone" placeholder="<?php echo $idioma_single_produto[3]; ?>:"></span>
				</fieldset>
				<fieldset class="col-12">
					<textarea name="mensagem" id="mensagem" cols="30" rows="10" placeholder="<?php echo $idioma_single_produto[4]; ?>:"></textarea>
				</fieldset>
				<fieldset class="col-12">
					<p class="msg-form"></p>
					<button class="enviar"><?php echo $idioma_single_produto[5]; ?></button>
				</fieldset>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('<?php echo $idioma_single_produto[6]; ?>').prop( "disabled", true );
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
						resultado = <?php echo $idioma_single_produto[7]; ?>;
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.news form').trigger("reset");
					jQuery('.enviar').html('<?php echo $idioma_single_produto[5]; ?>').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('<?php echo $idioma_single_produto[5]; ?>').prop( "disabled", false );
			}
		});
</script>