<?php
/**
 * Theme index/loop
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

get_header(); ?>

<?php
if( get_post_type() == 'post' ): // Se o post type foi post ?>
	<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading">Últimas notícias</h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : 
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

<div id="content" class="span9">
	<?php
		if ( function_exists('wp_bootstrap_pagination') )
		wp_bootstrap_pagination();
	?>
</div>

<?php get_footer(); ?>