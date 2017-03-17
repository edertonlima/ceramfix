<?php include "includes/head.php"; ?>

<body class="home">
	<header class="header">
		<div class="container">
			<div class="row">
				<?php include "includes/header.php"; ?>
			</div>
		</div>
	</header>

	<section class="produtos">
		<div class="container">
			<img src="assets/images/img-produto-detalhe.jpg" class="img-produto" alt="ARGAMASSA COLANTE">
			<div class="detalhe-produto">
				<h2>ARGA PORCELANATOS E PEDRAS NATURAIS</h2>
				<p>Indicada para assentamento de pedras naturais, mármores e granitos. É produzida com matérias primas selecionadas, garante excelente aderência, flexibilidade e resistência mecânica, além de oferecer uma massa leve, macia e de ótimo rendimento.</p>

				<div class="indicacao">
					<h2>Indicação de uso</h2>
					<ul>
						<li>
							<img src="assets/images/icon/produtos/ico-secagem-rapida.png">
							<span>SECAGEM RÁPIDA</span>
						</li>
						<li>
							<img src="assets/images/icon/produtos/ico-piso-paredes.png">
							<span>PISO E PAREDES</span>
						</li>
						<li>
							<img src="assets/images/icon/produtos/ico-porcelanato.png">
							<span>PORCELANATO, CERÂMICAS, PASTILHAS E PEDRAS NATURAIS</span>
						</li>
						<li>
							<img src="assets/images/icon/produtos/ico-interno-externo.png">
							<span>INTERNO EXTERNO</span>
						</li>
						<li>
							<img src="assets/images/icon/produtos/ico-piscinas.png">
							<span>PISCINAS E SAUNAS</span>
						</li>
						<li>
							<img src="assets/images/icon/produtos/ico-placas.png">
							<span>PLACAS ATÉ 80cm x 80cm </span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="produtos">
		<div class="container">
			<h2 class="outros-produtos">Veja outros produtos:</h2>

			<div class="slide-produtos list-produto">

				<div class="item active">
					<a href="javascript:" title="ARGA FIX AC I">
						<img src="assets/images/img-produto.jpg" alt="ARGA FIX AC I">
						<div class="cont-list-prod">
							<h3>ARGA FIX AC I</h3>
							<p>Argamassa colante tipo AC I.</p>
						</div>
					</a>
				</div>
				<div class="item">
					<a href="javascript:" title="ARGA FIX AC I">
						<img src="assets/images/img-produto2.jpg" alt="ARGA FIX AC I">
						<div class="cont-list-prod">
							<h3>GRANDES FORMATOS AC III </h3>
							<p></p>
						</div>
					</a>
				</div>
				<div class="item">
					<a href="javascript:" title="ARGA FIX AC I">
						<img src="assets/images/img-produto3.jpg" alt="ARGA FIX AC I">
						<div class="cont-list-prod">
							<h3>ARGA FLEX AC II</h3>
							<p>Argamassa colante tipo AC II.</p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</section>

	<?php include "includes/footer.php"; ?>

	<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript">
		jQuery.noConflict();
		var owl = jQuery('.slide-produtos');
		owl.owlCarousel({
			margin: 0,
			loop: false,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		})
	</script>