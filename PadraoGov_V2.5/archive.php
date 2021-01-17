<?php
/**
 * Theme select themes for type post/custom post
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

get_header(); ?>

<!-- Get custom posts -->
<?php

if( get_post_type() == 'publicacao' ): // Se o post type for publicação
	include (get_template_part( 'template-parts/publicacao/publicacao', 'list' ));
endif; 


if( get_post_type() == 'educacional' ): // Se o post type for educacional
	include (get_template_part( 'template-parts/educacional/educacional', 'list' ));
endif; 


if( get_post_type() == 'projetos' ): // Se o post type for projetos
	include (get_template_part( 'template-parts/projetos/projetos', 'list' ));
endif; 


if( get_post_type() == 'modelagem' ): // Se o post type for modelagem
	include (get_template_part( 'template-parts/linhas-pesquisas/linhas', 'modelagem' ));
endif; 


if( get_post_type() == 'diagnosticos' ): // Se o post type for diagnosticos
	include (get_template_part( 'template-parts/linhas-pesquisas/linhas', 'diagnosticos' ));
endif; 


if( get_post_type() == 'observacao' ): // Se o post type for observação
	include (get_template_part( 'template-parts/linhas-pesquisas/linhas', 'observacao' ));
endif; 


if( get_post_type() == 'servico' ): // Se o post type for observação
	include (get_template_part( 'template-parts/servico/content' ));
endif; 


// fim da chamada de custom post


// Get post standar wordpress
if( get_post_type() == 'post' ): // Se o post type foi post ?>
	<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading">Últimas notícias</h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : ?>
					<?php
					// Start the Loop.

					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/post', 'list' );
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

<div id="paginacao">
	<div id="content" class="span9">
		<?php
			if ( function_exists('wp_bootstrap_pagination') )
			wp_bootstrap_pagination();
		?>
	</div>
</div>

<?php get_footer(); ?>