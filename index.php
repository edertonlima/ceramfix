<?php include "includes/head.php"; ?>

<body class="home">
	<header class="header">
		<div class="container">
			<div class="row">
				<?php include "includes/header.php"; ?>
			</div>
		</div>
	</header>

	<!-- slide -->
	<section class="box-home slide-home">
		<div class="slide">
			<div class="controle-slide">
				<a class="left" href="#slide" role="button" data-slide="prev"></a>
				<a class="right" href="#slide" role="button" data-slide="next"></a>
			</div>
			<div class="carousel slide" data-ride="carousel" data-interval="10000" id="slide">
				<ol class="carousel-indicators">
					<li data-target="#slide" data-slide-to="0" class="active"></li>
					<li data-target="#slide" data-slide-to="1"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active" style="background-image: url('assets/images/slide_home1.jpg');">
						<div class="tit-box-destaque right">
							<span>SUA OBRA<br>COM QUALIDADE</span>
							<h2>CERAMFIX</h2>
							<a href="#" title="conheça os produtos">conheça os produtos</a>
						</div>
					</div>
					<div class="item video" style="background-image: url('assets/images/slide_home1.jpg');">
						<a href="#" class="play"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
		<a href="#" class="seta" rel="#simuladores"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
	</section>

	<!-- simuladores -->
	<section class="box-home slide-simuladores">
		<div class="slide">
			<div class="carousel slide" data-ride="carousel" data-interval="10000" id="simuladores">
				<div class="carousel-inner" role="listbox">
					<div class="item active" style="background-image: url('assets/images/slide_simuladores.jpg');">
						<div class="tit-box-destaque left">
							<h2>ACERTE SUA OBRA</h2>
							<span>SIMULADOR DE CORES</span>
							<span class="menor">CALCULADORA DE CONSUMO</span>
							<a href="#" title="imagine agora seu ambiente">imagine agora seu ambiente</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="#" class="seta" rel=".premios"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
	</section>

	<!-- prêmios -->
	<section class="box-home premios">
		<div class="container">
			<h2>PRÊMIOS</h2>
			<p class="subtitulo">Qualidade reconhecida pela Anamaco e pela Revista Revenda.<br>Pode contar conosco.</p>

			<div class="item-premio left">
				<span class="ico-item-premio"></span>
				<p class="subtitulo">Prêmio Top of Mind<br>2 vezes</p>
			</div>

			<div class="item-premio right">
				<span class="ico-item-premio"></span>
				<p class="subtitulo">Prêmio Anamaco/Ibope<br>Menção Honrosa</br>8 vezes</p>
			</div>
		</div>
		<a href="#" class="seta" rel=".contato"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
	</section>

	<!-- contato -->
	<section class="box-home contato">
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
		<a href="#" class="seta" rel="body"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	</section>
	

	<?php include "includes/footer.php"; ?>