<div class="col-6 item">
	<div class="info-item">

		<h3><?php the_field('nome_fantasia'); ?></h3>
		<span class=""><?php the_title(); ?></span>

		<?php if(get_field('telefone')){ echo '<p>'.get_field('telefone').'</p>'; } ?>
		<?php // if(get_field('fax')){ echo '<span>FAX: '.get_field('fax').'</span>'; } ?>
		<?php if(get_field('email')){ echo '<span>'.get_field('email').'</span>'; } ?>
		
		<?php if(get_field('endereco')){ 
			echo '<span>'.get_field('endereco');
			if(get_field('numero')){
				echo', '.get_field('numero');
			}
			echo '</span>';
		} ?>
		<?php if(get_field('complemento')){ echo '<span>'.get_field('complemento').'</span>'; } ?>
		<?php if(get_field('bairro')){ echo '<span>'.get_field('bairro').'</span>'; } ?>
	</div>
</div>