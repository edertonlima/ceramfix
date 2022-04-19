<?php get_header(); ?>

<?php
	$idioma_single_produto = [];
	if($idioma == 'pt-br'){
		$idioma_single_produto = ['Calcule a quantidade e evite desperdício','ESCOLHA UM PRODUTO','DIMENSÕES DO REVESTIMENTO','LARGURA DA JUNTA','ESPESSURA DO REVESTIMENTO','ÁREA TOTAL A SER REVESTIDA','CALCULAR!','O seu consumo médio para rejuntar será de <span></span> Kg. <p>Obs: Para calculo do assentamento de pastilhas e revestimentos o consumo está disponível na página do produto.</p>','CENTRAL DE RELACIONAMENTO CERAMFIX'];
	}

	if($idioma == 'en'){
		$idioma_single_produto = ['Calculate quantity and avoid waste', 'CHOOSE A PRODUCT', 'COATING DIMENSIONS', 'BOARD WIDTH', 'COATING THICKNESS', 'TOTAL AREA TO BE COATED', 'CALCULATE!', 'Your Average consumption for grouting will be <span> </ span> Kg. <p> Note: To calculate the setting of tablets and coatings consumption is available on the product page. </ p> ',' CERAMFIX RELATIONSHIP CENTER '];
	}

	if($idioma == 'es'){
		$idioma_single_produto = ['Calcule la cantidad y evite desperdicio', 'ELEGIR UN PRODUCTO', 'DIMENSIONES DEL REVESTIMIENTO', 'ANCHO DE LA JUNTA', 'ESPESOR DEL REVESTIMIENTO', 'ÁREA TOTAL QUE SE REVESTIDA', 'CALCULAR!', 'Su El consumo medio para rejuntar será de <span> </ span> Kg. <p> Obs: Para calculo del asentamiento de pastillas y revestimientos el consumo está disponible en la página del producto. </ p> ',' CENTRAL DE RELACIÓN CERAMFIX '];
	}
?>

<section class="box-container box-calculadora-consumo">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
	
	<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
	if($imagem[0]){ ?>
		<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-page">
	<?php } ?>

	<div class="container">
		<p><?php echo $idioma_single_produto[0]; ?>:</p>
		
		<div class="passos-calculadora">
			<span class="passo first-passo">1</span>
			<div class="box-passos">
				<div class="bg-select">
					<span class="select selectboxproduto">
						<select name="produto" id="produto" class="select-produto">
							<option value="" selected="selected"><?php echo $idioma_single_produto[1]; ?></option>
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
					<span class="tit-campo"><?php echo $idioma_single_produto[2]; ?></span>
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
					<span class="tit-campo"><?php echo $idioma_single_produto[3]; ?></span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-3.png" alt="">
					<div class="campos">
						<input type="text" name="l">
						<span>mm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-4">
					<span class="passo">4</span>
					<span class="tit-campo"><?php echo $idioma_single_produto[4]; ?></span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-4.png" alt="">
					<div class="campos">
						<input type="text" name="e">
						<span>mm</span>
					</div>
				</div>

				<div class="item-passo num-passo passo-5">
					<span class="passo">5</span>
					<span class="tit-campo"><?php echo $idioma_single_produto[5]; ?></span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/passo-5.png" alt="">
					<div class="campos">
						<input type="text" name="m2">
						<span>m²</span>
					</div>
				</div>
			</div>
		</div>

		<button class="calcular"><?php echo $idioma_single_produto[6]; ?></button>

		<h2 id="resultado"><?php echo $idioma_single_produto[7]; ?></h2>

	</div>
</section>	

<section class="box-home contato calculadora-consumo">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="info-contato">
					<span><?php echo $idioma_single_produto[8]; ?></span>
					<h2><?php the_field('telefone','option'); ?></h2>
					<a href="<?php echo get_home_url(); ?>"><?php echo get_home_url(); ?></a>
					<?php /*<a href="mailto:<?php the_field('email','option'); ?>"><?php the_field('email','option'); ?></a>*/ ?>
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
	function formataValor(valor){
		valor = valor.replace(',', '.');
		var corte = valor.split('.');

		if(corte.length > 1){
			if(corte[1].length > 2){
				valor = corte[0]+'.'+corte[1].substring(0,2);
			}else{
				if(corte[1].length == 1){
					valor = valor+'0';
				}else{
					if(corte[1].length == 0){
						valor = corte[0];
					}
				}
			}
		}
		//alert(valor);
		return valor;
	}
	jQuery('.calcular').click(function(){
		if(jQuery('#produto').val()){          		
			cr = jQuery('#produto option:selected').attr('rel');
			cr = formataValor(cr);
		}else{
			form_cal = false;
			jQuery('.selectboxproduto').addClass('erro');
		}

		if(jQuery('input[name=a]').val()){          		
			a = jQuery('input[name=a]').val();
			a = formataValor(a);
		}else{
			form_cal = false;
			jQuery('input[name=a]').addClass('erro');
		}

		if(jQuery('input[name=b]').val()){          		
			b = jQuery('input[name=b]').val();
			b = formataValor(b);
		}else{
			form_cal = false;
			jQuery('input[name=b]').addClass('erro');
		}

		if(jQuery('input[name=e]').val()){          		
			e = jQuery('input[name=e]').val();
			e = formataValor(e);
		}else{
			form_cal = false;
			jQuery('input[name=e]').addClass('erro');
		}

		if(jQuery('input[name=l]').val()){          		
			l = jQuery('input[name=l]').val();
			l = formataValor(l);
		}else{
			form_cal = false;
			jQuery('input[name=l]').addClass('erro');
		}

		if(jQuery('input[name=m2]').val()){          		
			m2 = jQuery('input[name=m2]').val();
			m2 = formataValor(m2);
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