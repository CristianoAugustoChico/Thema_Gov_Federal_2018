<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div id="content" class="internas span6">
	<section id="content-section">
			<h1 class="page-title"><?php printf( __( 'Resultados: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
						get_template_part( 'template-parts/post/post', 'search' );
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

<?php get_footer(); ?>