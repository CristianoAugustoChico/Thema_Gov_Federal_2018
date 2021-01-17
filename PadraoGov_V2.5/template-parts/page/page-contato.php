<?php
/**
 * Theme single page
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
 ?>

<div id="content" class="internas span6">
	<section id="content-section">
		<!-- Título da página-->
		<?php the_title( '<h1 class="secondaryHeading">', '</h1>' ); ?>
		<!-- header content -->
		<div class="subtitle"></div>
		<!-- header content -->
		<?php get_template_part( 'template-parts/post/post', 'header'); ?>
		<div class="row-fluid">
			<div class="span12 module">

				<div class="span7">
					<!-- Content -->
					<p><?php the_content(); ?></p>
				</div>
				
				<div  id="navigation" class="span5">
					<!-- widget contato -->
					<?php dynamic_sidebar( 'sidebar-contato' ); ?>
				</div>
			</div>
		</div>
		<?php edit_post_link( __( 'Edit', 'governofederalazul' ), '<footer class=""><span class="">', '</span></footer><!-- .entry-footer -->' ); ?>
	</section>
	<div class="below-content"></div>
</div>