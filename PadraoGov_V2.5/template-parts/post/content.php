<?php
/**
 * Theme Single Post
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
			<!-- Título da página-->
			<span class="documentCategory">Notícia</span>
				<?php
					if ( is_single() ) :
						the_title( '<h1 class="secondaryHeading">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="secondaryHeading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
			<div class="subtitle"></div>
			<!-- header content -->
			<?php get_template_part( 'template-parts/post/post', 'header'); ?>

			<!-- Content -->
			<div class="entry-content">
				<div <?php thumbnail_noticia( 'large' ); ?>> </div>
				<!-- data de publicação -->
				<?php
					$Origem = get_post_meta($post->ID, 'Origem', true);
					$URL = get_post_meta($post->ID, 'URL', true );
					if ( ! empty( $Origem ) ) {
				?>
					<strong>Publicado em: <a href=" <?php echo $URL; ?> " target="_blank"> <?php echo $Origem ?></a></strong>
				<?php } ?>
			</div>

				<p><?php the_content(); ?></p>

			<!-- lista de tags -->
			<div class="below-content">
				<?php get_template_part( 'template-parts/post/post', 'tags'); ?>
			</div>

		</section>
	</div>
</article>