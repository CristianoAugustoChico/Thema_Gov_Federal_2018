<?php
/**
 * Theme single Post
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

<?php
// Chama o content personalizado de acordo com o tipo de post

if( get_post_type() == 'projetos' ): // Se o post type for publicação
	include (get_template_part( 'template-parts/projetos/content' ));
endif;


if( get_post_type() == 'modelagem' ): // Se o post type for modelagem
	include (get_template_part( 'template-parts/linhas-pesquisas/content' ));
endif;


if( get_post_type() == 'diagnosticos' ): // Se o post type for diagnosticos
	include (get_template_part( 'template-parts/linhas-pesquisas/content' ));
endif;


if( get_post_type() == 'observacao' ): // Se o post type for observação
	include (get_template_part( 'template-parts/linhas-pesquisas/content' ));
endif;


if( get_post_type() == 'destaque' ): // Se o post type for observação
	include (get_template_part( 'template-parts/page/page', 'content') );
endif;


if( get_post_type() == 'servico' ): // Se o post type for observação
	include (get_template_part( 'template-parts/servico/content' ));
endif;

if( get_post_type() == 'publicacao' ): // Se o post type for publicação
include (get_template_part( 'template-parts/publicacao/publicacao', 'list' ));
endif;


// Get post standar wordpress
if( get_post_type() == 'post' ): // Se o post type foi post 
	if ( have_posts() ) : 
		// Start the Loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/post/content' );
		// End the loop.
		endwhile;
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );
	endif;			
 endif; ?>

<?php get_footer(); ?>