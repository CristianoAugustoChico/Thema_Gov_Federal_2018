<?php
/**
 * Theme list Publicação
 *
 * Padrão Governo Federal - Brasil functions and definitions
 * Author:Cristiano Augusto Cunha Silva <sem@cristianoaugusto.com.br>
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
if( get_post_type() == 'publicacao' ): // Se o post type foi post ?>
	<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading">Publicações</h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="tileItem">
								<div class="span10 tileContent">
									<h2 class="tileHeadline">
										<?php the_title(); ?>
									</h2>
									<span class="description">
										<!-- content -->
										<?php // Mostra os primeiros 150 caracteres
											$excerpt = substr( $post->post_excerpt, 0, 300 );
											// Imprime a variável?>
										<?php  echo $excerpt , '...'; ?>
									</span> 
									<!-- lista de categorias -->
									<span class="keywords">
										<?php //get_template_part( 'template-parts/post/post', 'tags'); ?>
										<!-- botão download de arquivo -->
										<div class="text-right">
											<?php
												$upload_file = get_post_meta($post->ID, 'upload_file', true );
												if ( ! empty( $upload_file ) ) {
											?>
													<a href=" <?php echo $upload_file; ?> " target="_blank"  onClick="ga('send', 'event', 'Publicação', 'Download', '<?php the_title(); ?>');">

														<button type="button" class="btn btn-lg btn-success"><i class="icon-download-alt icon-light"></i> DOWNLOAD </button>
													</a>
													<div class="space"></div>
											<?php } ?>
										</div>	
									</span>
								</div>
								<!-- data da publicação -->
								<div class="span2 tileInfo">
									<ul>
										<li class="hide">por Portal Padrão</li>
										<li class="hide">publicado</li>
										<li><i class="icon-fixed-width icon-calendar"></i> <?php the_time('d/m/Y') ?></li>
										<li><i class="icon-fixed-width icon-time"></i><?php the_time('g:i A') ?></li>
										
									</ul>
								</div>
							</div>
						</article>
				<?php
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
