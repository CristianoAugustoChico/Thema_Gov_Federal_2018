<?php
/**
 * Theme list secção Post Educacional
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

<?php
if( get_post_type() == 'educacional' ): // Se o post type foi post ?>
	<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading">Educacional</h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- Link do projeto -->
						<?php
							$_tp_link = get_post_meta($post->ID, '_tp_link', true );
							if ( ! empty( $_tp_link ) ) {
						?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="tileItem">
								<div class="span10 tileContent">
									<h2 class="tileHeadline">
										<a href="<?php echo $_tp_link; ?>" target="_blanck"><?php the_title(); ?></a>
									</h2>
									<span class="description">
										<!-- content -->
										<?php // Mostra os primeiros 150 caracteres
											$excerpt = substr( $post->post_content, 0, 1000 );
											// Imprime a variável?>
										<?php  echo $excerpt , '...'; ?>
									</span> 
								</div>
								<!-- data da publicação -->
								<div class="span2 tileInfo">
									<ul>
										<li class="hide">por Portal Padrão</li>
										<li class="hide">publicado</li>
										<li><i class="icon-fixed-width icon-calendar"></i> <?php the_time('d/m/Y') ?></li>
										<li><i class="icon-fixed-width icon-time"></i><?php the_time('g:i A') ?></li>
										<!-- <li><i class="icon-fixed-width"></i> Artigo</li> -->
									</ul>
								</div>
							</div>
						</article>
				<?php } // End
				// End the loop.
				endwhile;
				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );
				endif;
				?>
			</div>
		</section>
	</div>
<?php endif; ?>
