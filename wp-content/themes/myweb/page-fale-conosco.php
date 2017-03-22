<?php get_header(); ?>

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
			<div class="col-6">
				<p class="subtitulo">Você também pode enviar suas críticas, sugestões ou dúvidas preenchendo todos os campos abaixo:</p>
			</div>

			<div class="col-6">
				<div class="info-contato">
					<span>CENTRAL DE RELACIONAMENTO CERAMFIX</span>
					<h2>0800 704549</h2>
					<a href="#">info@ceramfix.com.br</a>
				</div>
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
				<fieldset class="col-6">
					<span><input type="text" name="" id="" placeholder="Telefone principal:"></span>
				</fieldset>
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
	<a href="javascript:" class="seta" rel="body"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</section>

<?php get_footer(); ?>