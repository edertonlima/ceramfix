<?php get_header(); ?>

<!-- slide -->
<section class="box-home slide-home">
	<div class="slide">
		<div class="controle-slide">
			<a class="left" href="#slide" role="button" data-slide="prev"></a>
			<a class="right" href="#slide" role="button" data-slide="next"></a>
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="10000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide_home','option') ):
					$slide = 0;
					while ( have_rows('slide_home','option') ) : the_row();

						if(get_sub_field('video','option')){
							$slide = $slide+1; ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video','option'); ?>" type="video/mp4">
								</video>

								<?php if(get_sub_field('youtube','option')){ ?>
									<a href="<?php the_sub_field('youtube','option'); ?>" class="play" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
								<?php } ?>
							</div>

						<?php }else{
							if(get_sub_field('imagem','option')){
								$slide = $slide+1; ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem','option'); ?>');">

									<?php if((get_sub_field('titulo','option')) or (get_sub_field('subtitulo','option'))){ ?>
										<div class="tit-box-destaque right">
											
											<?php if(get_sub_field('subtitulo','option')){ ?>
												<span><?php the_sub_field('subtitulo','option'); ?></span>
											<?php } ?>

											<?php if(get_sub_field('titulo','option')){ ?>
												<h2><?php the_sub_field('titulo','option'); ?></h2>
											<?php } ?>

											<?php if(get_sub_field('titulo_link','option')){ ?>
												<a href="<?php the_sub_field('link','option'); ?>" title="<?php the_sub_field('titulo_link','option'); ?>"><?php the_sub_field('titulo_link','option'); ?></a>
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
				<div class="item active" style="background-image: url('<?php the_field('imagem_simuladores','option'); ?>');">
					<div class="tit-box-destaque left">
						<h2><?php the_field('titulo_simuladores','option'); ?></h2>
						<span>SIMULADOR DE CORES</span>
						<span class="menor">CALCULADORA DE CONSUMO</span>
						<a href="#" title="<?php the_field('titulo_link_simuladores','option'); ?>"><?php the_field('titulo_link_simuladores','option'); ?></a>
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
		<h2>PRÊMIOS</h2>
		<p class="subtitulo"><?php the_field('texto_home_premios','option'); ?></p>

		<div>
			<?php if( have_rows('prêmios','option') ):
				while ( have_rows('prêmios','option') ) : the_row(); ?>

					<div class="item-premio">
						<span class="ico-item-premio">
							<img typeof="foaf:Image" src="<?php the_sub_field('imagem_premio','option'); ?>" width="200" height="100" alt="">
						</span>
						<p class="subtitulo"><?php the_sub_field('texto_premios','option'); ?></p>
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
			<div class="col-6">
				<p class="subtitulo"><?php the_field('texto_fale','option'); ?></p>
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

<?php get_footer(); ?>