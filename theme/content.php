<article class="post">
	<header>
		<?php
			if(get_field('video_release')){

				the_field('video_release');
			
			}else{

				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
				if($imagem[0]){ ?>
					<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="img-release">
				<?php }

			}
		?>
		<h2><?php the_title(); ?></h2>
		<div class="date"><?php the_date(); ?></div>
	</header>

	<p><?php the_field('conteudo_release'); ?></p>

	<?php 
		$images = get_field('galeria_release');
		if( $images ): ?>
		    <div class="row sub-conteudo galeria">
		        <?php foreach( $images as $image ): ?>
					<div class="col-6 item">
						<div class="img-item">
							<a href="<?php echo $image['url']; ?>" title="<?php echo $image['caption']; ?>">
								<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['caption']; ?>">
							</a>
						</div>
						<div class="info-item">
							<p class="mini"><?php echo $image['caption']; ?></p>
						</div>
					</div>
		        <?php endforeach; ?>
		    </ul>
		<?php endif; 
	?>

	</div>
</article>