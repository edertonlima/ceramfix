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
	<section class="produtos">
		<div class="container">
			<h2>PRODUTOS</h2>
			<h4>Conheça as linhas de produtos<br>com o padrão de qualidade Ceramfix.</h4>
			<div class="slide slide-produto">
				<div class="controle-slide">
					<a class="left" href="#slide" role="button" data-slide="prev"></a>
					<a class="right" href="#slide" role="button" data-slide="next"></a>
				</div>
				<div class="carousel slide" data-ride="carousel" data-interval="10000" id="slide">
					<ol class="carousel-indicators">
						<li data-target="#slide" data-slide-to="0" class="active"></li>
						<li data-target="#slide" data-slide-to="1"></li>
						<li data-target="#slide" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="assets/images/slide-produto-linha-1.jpg">
						</div>
						<div class="item">
							<img src="assets/images/slide-produto-linha-2.jpg">
						</div>
						<div class="item">
							<img src="assets/images/slide-produto-linha-3.jpg">
						</div>
					</div>
				</div>
			</div>

			<ul class="list-linha">
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="ARGAMASSA COLANTE">ARGAMASSA COLANTE</a></li>
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="IMPERMEABILIZANTE">IMPERMEABILIZANTE</a></li>
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="ARGAMASSA PARA REJUNTAMENTO">ARGAMASSA PARA REJUNTAMENTO</a></li>
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="FAÇA FÁCIL">FAÇA FÁCIL</a></li>
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="ARGAMASSA PARA REVESTIMENTO">ARGAMASSA PARA REVESTIMENTO</a></li>
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="LINHA TÉCNICA">LINHA TÉCNICA</a></li>
				<li style="background-image: url('assets/images/produto-linha-1.jpg');"><a href="javascript:" title="LINHA AUTOFUGANTE">LINHA AUTOFUGANTE</a></li>
			</ul>
		</div>
	</section>	

	<?php include "includes/footer.php"; ?>