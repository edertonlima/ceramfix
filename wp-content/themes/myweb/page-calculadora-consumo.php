<?php get_header(); ?>

<section class="box-container box-calculadora-consumo">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
	
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	if($imagem[0]){ ?>
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-page">
	<?php } ?>

	<div class="container">
		<p>Calcule a quantidade e evite desperdício:</p>
		
		<div class="passos-calculadora">
			<span class="passo first-passo">1</span>
			<div class="box-passos">
				<div class="bg-select">
					<span class="select selectboxproduto">
						<select name="produto" id="produto" class="select-produto">
							<option value="" selected="selected">ESCOLHA UM PRODUTO</option>
    <?php
        $getPosts = array(
            'post_type'   => 'produto',
            'post_status' => 'any',
            'orderby'     => date,
            'order'       => 'DESC',
            'nopaging' => true
        );
        $posts = new WP_Query( $getPosts );
        if(count($posts) > 0){ 
        	while($posts->have_posts()) : $posts->the_post(); 

        		if(get_field('cr')){ ?>

					<option value="<?php echo $post->ID; ?>" rel="<?php the_field('cr'); ?>"><?php echo mb_strtoupper(get_the_title(), 'UTF-8'); ?></option>

        		<?php }

        	endwhile;
        }
    ?>
						</select>
					</span>
				</div>
			</div>
		</div>

		<div class="passos-calculadora">
			<span class="passo">2</span>
			<div class="box-passos">
				<div class="item-passo num-passo passo-2">
					<span class="tit-campo">DIMENSÕES DO REVESTIMENTO</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-2.png" alt="">
					<div class="campos">
						<input type="text" name="a">
						<span>cm</span>
						<span class="label">X</span>
						<input type="text" name="b">
						<span>cm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-3">
					<span class="passo">3</span>
					<span class="tit-campo">LARGURA DA JUNTA</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-3.png" alt="">
					<div class="campos">
						<input type="text" name="l">
						<span>mm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-4">
					<span class="passo">4</span>
					<span class="tit-campo">ESPESSURA DO REVESTIMENTO</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-4.png" alt="">
					<div class="campos">
						<input type="text" name="e">
						<span>mm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-5">
					<span class="passo">5</span>
					<span class="tit-campo">ÁREA TOTAL A SER REVESTIDA</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-5.png" alt="">
					<div class="campos">
						<input type="text" name="m2">
						<span>m²</span>
					</div>
				</div>
			</div>
		</div>

		<button class="calcular">CALCULAR!</button>

		<h2 id="resultado">O seu consumo médio será de <span></span> Kg.</h2>

	</div>
</section>	

<section class="box-home contato calculadora-consumo">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="info-contato">
					<span>CENTRAL DE RELACIONAMENTO CERAMFIX</span>
					<h2>0800 7045049</h2>
					<a href="#">www.ceramfix.com.br</a>
					<a href="#">info@ceramfix.com.br</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery.noConflict();

	jQuery('document').ready(function(){
		jQuery('input').keypress(function(){
			jQuery(this).removeClass('erro');
			jQuery('#resultado span').html('');
			jQuery('#resultado').hide();
		});

        jQuery('select').change(function(){
        	jQuery('.selectboxproduto').removeClass('erro');
        });

		jQuery('input').click(function(){
			jQuery('#resultado span').html('');
			jQuery('#resultado').hide();
		});
	});

	form_cal = true;
	jQuery('.calcular').click(function(){
		if(jQuery('#produto').val()){          		
			cr = jQuery('#produto option:selected').attr('rel');
		}else{
			form_cal = false;
			jQuery('.selectboxproduto').addClass('erro');
		}

		if(jQuery('input[name=a]').val()){          		
			a = jQuery('input[name=a]').val();
		}else{
			form_cal = false;
			jQuery('input[name=a]').addClass('erro');
		}

		if(jQuery('input[name=b]').val()){          		
			b = jQuery('input[name=b]').val();
		}else{
			form_cal = false;
			jQuery('input[name=b]').addClass('erro');
		}

		if(jQuery('input[name=e]').val()){          		
			e = jQuery('input[name=e]').val();
		}else{
			form_cal = false;
			jQuery('input[name=e]').addClass('erro');
		}

		if(jQuery('input[name=l]').val()){          		
			l = jQuery('input[name=l]').val();
		}else{
			form_cal = false;
			jQuery('input[name=l]').addClass('erro');
		}

		if(jQuery('input[name=m2]').val()){          		
			m2 = jQuery('input[name=m2]').val();
		}else{
			form_cal = false;
			jQuery('input[name=m2]').addClass('erro');
		}

		if(form_cal){
			a = a;
			b = b;
			e = e/10;
			l = l;
			var consumo = ((parseInt(a)+parseInt(b))*e)*l;
			consumo = consumo*cr;
			consumo = consumo/(a*b);
			consumo = consumo*m2;

			consumo = consumo.toFixed(2);
			consumo = consumo.replace('.', ',');

			jQuery('#resultado span').html(consumo);
			jQuery('#resultado').show();
		}
	});
</script>