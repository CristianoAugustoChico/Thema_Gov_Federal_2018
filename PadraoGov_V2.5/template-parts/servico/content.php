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
			<span class="documentCategory">
				<?php
					the_title();
				?>
			</span>
				
			<div class="subtitle"></div>
			<!-- header content -->
			<?php //get_template_part( 'template-parts/post/post', 'header'); ?>

			<!-- Content -->
			<div class="entry-content">
				<div <?php //thumbnail_noticia( 'full' ); ?>> </div>
			</div>
				<p>
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