<?php
/**
 *  Theme Single Post
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
			<span class="documentCategory">linha de pesquisa</span>
				<?php
					if ( is_single() ) :
						the_title( '<h1 class="secondaryHeading">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="secondaryHeading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
			<div class="subtitle"></div>
			<!-- header content -->
			<?php //get_template_part( 'template-parts/post/post', 'header'); ?>

			<!-- Content -->
			<div class="entry-content">
				<div <?php //thumbnail_noticia( 'full' ); ?>> </div>
			</div>
				<p>
					<!-- Link do projeto -->
					<?php
						$URL = get_post_meta($post->ID, 'URL', true );
						if ( ! empty( $URL ) ) {
					?>
						<blockquote class="right">
							<a target="_blank" href="<?php echo $URL; ?>" title="<?php the_title(); ?>">
								<center>
									<button type="button" class="btn btn-lg btn-success"> Acesse o site do projeto <br />para maiores informações</button>
								</center>
							</a>
						</blockquote>
					<?php } // End ?>
					<!-- content -->
					<?php the_content(); ?>
				</p>
			<!-- lista de tags -->
			<div style="height: 50px"></div>
			<div class="below-content">
			</div>

		</section>
	</div>
</article>