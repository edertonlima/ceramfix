<?php global $idioma; ?>

<div class="col-6 item">
	<div class="img-item">
		<?php $imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
		<?php if($imgPage){ ?>
			<img src="<?php if($imgPage[0]){ echo $imgPage[0]; } ?>" class="" alt="">
		<?php }else{ ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-matriz-off.png" class="" alt="">
		<?php } ?>
	</div>
	<div class="info-item">
		<h3><?php if(get_field('cidade')){ the_field('cidade'); } if(get_field('estado')){ echo ' - '.get_field('estado'); } ?></h3>
		<?php if(get_field('telefone')){ echo '<p>'.get_field('telefone').'</p>'; } ?>
		<?php if(get_field('email')){ echo '<span>'.get_field('email').'</span>'; } ?>
		
		<span>

			<?php
				if($idioma == 'en'){
					echo 'Service: from ';
				}

				if($idioma == 'pt-br'){
					echo 'Atendimento: das ';
				}

				if($idioma == 'es'){
					echo 'Atención: de las ';
				}
			?>

			
			<?php echo get_field('atendimento_abertura'); ?>
			 
			<?php
				if($idioma == 'en'){
					echo ' to ';
				}

				if($idioma == 'pt-br'){
					echo ' às ';
				}

				if($idioma == 'es'){
					echo ' a las ';
				}
			?>

			 <?php echo get_field('atendimento_fechamento'); ?>
		</span>
		
		<?php if(get_field('endereco')){ echo '<span>'.get_field('endereco').'</span>'; } ?>
		<?php if(get_field('pais')){ echo '<span>'.get_field('pais').'</span>'; } ?>
	</div>
</div>