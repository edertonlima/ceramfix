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
			<form action="#" class="contato-home">
				<fieldset class="col-12">
					<span><input type="text" name="nome" id="nome" placeholder="Nome:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="email" id="email" placeholder="E-mail:"></span>
				</fieldset>
				<fieldset class="col-6"></fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="" id="" placeholder="Telefone principal:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="" id="" placeholder="Telefone secundário:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="" id="" placeholder="Endereço:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="" id="" placeholder="Estado:"></span>
				</fieldset>
				<fieldset class="col-6">
					<span><input type="text" name="" id="" placeholder="Cidade:"></span>
				</fieldset>
				<fieldset class="col-6"></fieldset>
				<fieldset class="col-12">
					<label for="mensagem">Mensagem:</label>
					<textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
				</fieldset>
				<fieldset class="col-12">
					<button class="enviar">ENVIAR!</button>
				</fieldset>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>