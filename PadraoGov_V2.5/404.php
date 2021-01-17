<?php
/**
 * Theme page error 404
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

<div id="content" class="internas span9">
	<section id="content-section">
		<!-- Título da página-->
		<h1 class="page-title"><?php _e( 'Solicitação não encontrada' ); ?></h1>
		
		<!-- header content -->
		<div class="subtitle"></div>
			<!-- header content -->
			<?php //get_template_part( 'template-parts/post/post', 'header'); ?>
		<!-- Content -->
		<h2><?php _e( 'Tem certeza que você digitou corretamente?' ); ?></h2>
		<p><?php _e( 'Você pode buscar novamente, ou se preferir pode utilizar o menu lateral.' ); ?></p>

		<?php get_search_form(); ?>
	</section>
	<div class="below-content"></div>
</div>

<?php get_footer(); ?>