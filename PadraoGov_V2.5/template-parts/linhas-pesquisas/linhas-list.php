<?php
/**
 *  Theme list custom post modelagem, diagnosticos, observação
 *
 * Padrão Governo Federal - Brasil functions and definitions
 * Author:Cristiano Augusto Cunha Silva <cristianoaugustocs@gmail.com>
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage CCST-GOV
 * @since 1.2
 * 
 * Este thema foi desenvolvido para o Centro de Ciência do Sistema Terreste / INPE - BRASIL
 * 
 */
?>

<div id="content" class="internas span9">
		<div style="height: 50px"></div>
		<section id="content-section">
			<h1 class="borderHeading">Conheça nossas linhas de pesquisas:</h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<div class="tileItem">
							<div class="span12 tileContent">
								<h2 class="tileHeadline">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<span class="description">
									<!-- content -->
									<?php // Mostra os primeiros 150 caracteres
										$excerpt = substr( $post->post_excerpt, 0, 500 );
										// Imprime a variável?>
									<?php  echo $excerpt , '...'; ?>
								</span> 
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



<?php
	if ( function_exists('wp_bootstrap_pagination') )
	wp_bootstrap_pagination();
?>