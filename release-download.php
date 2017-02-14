<?php include "includes/head.php"; ?>

<body class="page release">
	<header class="header">
		<div class="container">
			<div class="row">
				<?php include "includes/header.php"; ?>
			</div>
		</div>
	</header>

	<section class="box-container box-release box-download">
		<div class="container">
			<h2>DOWNLOAD</h2>
		</div>

		<div class="container">

			<div class="tab">
				<div class="item" rel="anuncio">ANÚNCIOS</div>
				<div class="item" rel="catalogo">CATÁLOGOS</div>
				<div class="item active" rel="produtos">PRODUTOS</div>

				<!-- ANUNCIOS -->
				<div class="tab-content" id="anuncios">

					<p class="desc-donwload">Selecione a marca, a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.</p>

					<span class="select">
						<select name="marca-produto">
							<option selected="selected">ESCOLHA A MARCA</option>
							<option value="CERAMFIX">CERAMFIX</option>
						</select>
					</span>

					<span class="select">
						<select name="linha-produto">
							<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>
						</select>
					</span>

					<h3 class="tit-baixar">
						<span id="tit-produto"></span>
						<button id="baixar-produto">baixar</button>
					</h3>

					<div class="row list-download">

						<div class="col-12 item-download">
							<img src="assets/images/img-download.png" alt="">
							<h4><span>PORCELANATOS E PEDRAS NATURAIS</span></h4>
							<div class="mockups">
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="arteFinal">
										<span class="checkbox"></span>
										ARTE FINAL
									</label>
								</fieldset>
							</div>
							<div class="mockups">
								<h3>MOCKUPS</h3>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="tiff">
										<span class="checkbox"></span>
										TIFF
									</label>
								</fieldset>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="jpg">
										<span class="checkbox"></span>
										JPG
									</label>
								</fieldset>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="png">
										<span class="checkbox"></span>
										PNG
									</label>
								</fieldset>
							</div>
						</div>

					</div>

				</div>	

				<!-- CATÁLOGOS	 -->
				<div class="tab-content" id="catalogos">

					<p class="desc-donwload">Selecione a marca, a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.</p>

					<span class="select">
						<select name="marca-produto">
							<option selected="selected">ESCOLHA A MARCA</option>
							<option value="CERAMFIX">CERAMFIX</option>
						</select>
					</span>

					<span class="select">
						<select name="linha-produto">
							<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>
						</select>
					</span>

					<h3 class="tit-baixar">
						<span id="tit-produto"></span>
						<button id="baixar-produto">baixar</button>
					</h3>

					<div class="row list-download">

						<div class="col-12 item-download">
							<img src="assets/images/img-download.png" alt="">
							<h4><span>PORCELANATOS E PEDRAS NATURAIS</span></h4>
							<div class="mockups">
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="arteFinal">
										<span class="checkbox"></span>
										ARTE FINAL
									</label>
								</fieldset>
							</div>
							<div class="mockups">
								<h3>MOCKUPS</h3>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="tiff">
										<span class="checkbox"></span>
										TIFF
									</label>
								</fieldset>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="jpg">
										<span class="checkbox"></span>
										JPG
									</label>
								</fieldset>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="png">
										<span class="checkbox"></span>
										PNG
									</label>
								</fieldset>
							</div>
						</div>

					</div>

				</div>	

				<!-- PRODUTOS -->
				<div class="tab-content active" id="produtos">

					<p class="desc-donwload">Selecione a marca, a linha a que o produto e o tipo de material que deseja baixar.<br>Pode selecionar vários materiais juntos para baixar simultaneamente.</p>

					<span class="select">
						<select name="marca-produto">
							<option selected="selected">ESCOLHA A MARCA</option>
							<option value="CERAMFIX">CERAMFIX</option>
						</select>
					</span>

					<span class="select">
						<select name="linha-produto">
							<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>
						</select>
					</span>

					<h3 class="tit-baixar">
						<span id="tit-produto"></span>
						<button id="baixar-produto">baixar</button>
					</h3>

					<div class="row list-download">

						<div class="col-12 item-download">
							<img src="assets/images/img-download.png" alt="">
							<h4><span>PORCELANATOS E PEDRAS NATURAIS</span></h4>
							<div class="mockups">
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="arteFinal">
										<span class="checkbox"></span>
										ARTE FINAL
									</label>
								</fieldset>
							</div>
							<div class="mockups">
								<h3>MOCKUPS</h3>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="tiff">
										<span class="checkbox"></span>
										TIFF
									</label>
								</fieldset>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="jpg">
										<span class="checkbox"></span>
										JPG
									</label>
								</fieldset>
								<fieldset class="arteFinal">
									<label>
										<input type="checkbox" name="png">
										<span class="checkbox"></span>
										PNG
									</label>
								</fieldset>
							</div>
						</div>

					</div>

				</div>	

			</div>

		</div>
	</section>

	<?php include "includes/footer.php"; ?>

	<script type="text/javascript">
		marcaProduto = '';
		linhaProduto = '';
		jQuery(document).ready(function(){
			jQuery('select[name="marca-produto"]').change(function(){
				marcaProduto = jQuery(this).val();
				if(marcaProduto == 'ESCOLHA A MARCA'){
					marcaProduto == '';
					jQuery('select[name="linha-produto"]').html('<option selected="selected">ESCOLHA A LINHA DE PRODUTO</option>');
				}else{
					jQuery('select[name="linha-produto"]').append('<option value="ARGAMASSA COLANTE">ARGAMASSA COLANTE</option><option value="ARGAMASSA PARA REJUNTAMENTO">ARGAMASSA PARA REJUNTAMENTO</option><option value="ARGAMASSA PARA REVESTIMENTO">ARGAMASSA PARA REVESTIMENTO</option><option value="LINHA AUTOFUGANTE">LINHA AUTOFUGANTE</option><option value="IMPERMEABILIZANTE">IMPERMEABILIZANTE</option><option value="FAÇA FÁCIL">FAÇA FÁCIL</option><option value="LINHA TÉCNICA">LINHA TÉCNICA</option>');
				}
			});
			jQuery('select[name="linha-produto"]').change(function(){
				jQuery('#tit-produto').html('');
				linhaProduto = jQuery(this).val();
				if(linhaProduto == 'ESCOLHA A LINHA DE PRODUTO'){
					linhaProduto = '';
					jQuery('#baixar-produto').hide();
				}else{
					textProduto = marcaProduto+' | '+linhaProduto;
					jQuery('#tit-produto').html(textProduto);
					jQuery('#baixar-produto').show();
				}
			});

			jQuery('label').click(function(){
				if(jQuery('input[type="checkbox"]',this).is(':checked')){
					jQuery('input[type="checkbox"]',this).prop( "checked", false );
					jQuery('.checkbox',this).html('');
				}else{
					jQuery('input[type="checkbox"]',this).prop( "checked", true );
					jQuery('.checkbox',this).html('<i class="fa fa-check" aria-hidden="true"></i>');
				}
			});
		});
	</script>