<?php
/**
 * Theme Front Page - Destaque
 *
 * Padrão Governo Federal - Brasil functions and definitions
 * Author:Cristiano Augusto Cunha Silva <cristianoaugustocs@gmail.com>
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage CCST-GOV
 * @since 1.1
 * 
 * Este thema foi desenvolvido para o Centro de Ciência do Sistema Terreste / INPE - BRASIL
 * 
 */
 ?>

<div class="row-fluid module">
	<div class="outstanding-header">
		<h2 class="outstanding-title">Serviços</h2>
	</div>
	<section class="module-section">
		<?php
			$args = array( 'post_type' => 'servico', 'cat_servico' => 'area01', 'posts_per_page' => 1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				$domsxe = simplexml_load_string(get_the_post_thumbnail());
				$thumbnailsrc = $domsxe->attributes()->src;

				$_tp_link = get_post_meta($post->ID, '_tp_link', true );
				if ( ! empty( $_tp_link ) ) {
				?>
					<div class="span4 no-margin">
						<h1>
							<a href=" <?php echo $_tp_link; ?> " target="_blank"  onClick="ga('send', 'event', 'banner-pós', '<?php echo $nome_taxonomy; ?>', '<?php the_title(); ?>');">
								<?php the_title(); ?>
							</a>
						</h1>
						<p>
							<?php // Mostra os primeiros 50 caracteres
								$excerpt = substr( $post->post_content, 0, 500 );
								// Imprime a variável
								echo $excerpt , '...';
							?>
						</p>
					</div>
					<div class="span8">
						<a href=" <?php echo $_tp_link; ?> " target="_blank"  onClick="ga('send', 'event', 'banner-pós', '<?php echo $nome_taxonomy; ?>', '<?php the_title(); ?>');">
							<img src="<?php echo $thumbnailsrc  ;?> "  style="border-radius:5px; width:100%; height:250px" alt="<?php the_title(); ?>" >
						</a>
					</div>
				<?php } ?>
		<?php endwhile; ?>
	</section>
</div>

<!-- 2 destaques-->
<div class="row-fluid">
	<div class="span12 module">
		<!-- modulo de 8 colunas -->
		<div class="span8 no-margin">
			<?php
				$args = array( 'post_type' => 'servico', 'cat_servico' => 'area02', 'posts_per_page' => 1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					$domsxe = simplexml_load_string(get_the_post_thumbnail());
					$thumbnailsrc = $domsxe->attributes()->src;

					$_tp_link = get_post_meta($post->ID, '_tp_link', true );
					if ( ! empty( $_tp_link ) ) {
					?>	
						<div>
							<a href=" <?php echo $_tp_link; ?> " target="_blank"  onClick="ga('send', 'event', 'banner-pós', '<?php echo $nome_taxonomy; ?>', '<?php the_title(); ?>');">
								<img src="<?php echo $thumbnailsrc  ;?> "  style="border-radius:5px; width:100%; height:200px" alt="<?php the_title(); ?>" >
							</a>
						</div>
						<div class="no-margin">
							<h1>
								<a href=" <?php echo $_tp_link; ?> " target="_blank"  onClick="ga('send', 'event', 'banner-observatorio', '<?php echo $nome_taxonomy; ?>', '<?php the_title(); ?>');">
									<?php the_title(); ?>
								</a>
							</h1>
							<p>
								<?php // Mostra os primeiros 50 caracteres
									$excerpt = substr( $post->post_content, 0, 500 );
									// Imprime a variável
									echo $excerpt , '...';
								?>
							</p>
						</div>

					<?php } ?>
			<?php endwhile; ?>
		</div>

		<!-- modulo de 4 colunas -->
		<div class="span4">
			<?php
				$args = array( 'post_type' => 'servico', 'cat_servico' => 'area03', 'posts_per_page' => 1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					$domsxe = simplexml_load_string(get_the_post_thumbnail());
					$thumbnailsrc = $domsxe->attributes()->src;

					$_tp_link = get_post_meta($post->ID, '_tp_link', true );
					if ( ! empty( $_tp_link ) ) {
					?>	
						<div>
							<a href=" <?php echo $_tp_link; ?> " target="_blank"  onClick="ga('send', 'event', 'banner-pos', '<?php echo $nome_taxonomy; ?>', '<?php the_title(); ?>');">
								<img src="<?php echo $thumbnailsrc  ;?> " style="border-radius:5px; width:100%; height:200px" alt="<?php the_title(); ?>" >
							</a>
						</div>
						<div class="no-margin">
							<h1>
								<a href=" <?php the_permalink(); ?> " target="_self"  onClick="ga('send', 'event', 'linhas de pesquisas', '<?php echo $nome_taxonomy; ?>', '<?php the_title(); ?>');">
									<?php the_title(); ?>
								</a>
							</h1>
							<p>
								<?php // Mostra os primeiros 50 caracteres
									$excerpt = substr( $post->post_excerpt, 0, 500 );
									// Imprime a variável
									echo $excerpt , '...';
								?>
							</p>
						</div>
					<?php } ?>
			<?php endwhile; ?>
		</div>

	</div>
</div>
