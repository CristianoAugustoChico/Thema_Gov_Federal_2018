<?php
/**
 *  Theme list Post modelagem
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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div id="content" class="internas span9" >
		<section id="content-section">
			<span class="documentCategory">Área Temática</span>
			<!-- Título da página-->
		<?php query_posts('page_id=12828'); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php
					if ( is_single() ) :
						the_title( '<h1 class="secondaryHeading">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="secondaryHeading">', esc_url( get_permalink() ) ), '</h2>' );
					endif;
				?>
			<div class="subtitle"></div>
			<!-- Content -->
			<p><?php the_content(); ?></p>
			<?php endwhile; endif; wp_reset_query(); ?>
		</section>
	</div>
</article>


<?php get_template_part( 'template-parts/linhas-pesquisas/linhas', 'list' ); ?>