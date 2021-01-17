<?php
/**
 * Template Name: Página inicial
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


<div id="content" class="span9">
	<section id="content-section">
		<!--  Banner rotativo  -->
		<?php get_template_part( 'template-parts/frontpage/frontpage', 'slider' ); ?>

		<!-- 4 ultimas notícias/ 1 destaque e 3 últimas corridas -->
		<?php get_template_part( 'template-parts/frontpage/frontpage', 'news' ); ?>

		<!--  Destaque  -->
		<?php get_template_part( 'template-parts/frontpage/frontpage', 'servico' ); ?>

		<!--  Owl projeto e parceiros  -->
		<?php get_template_part( 'template-parts/frontpage/frontpage', 'owl' ); ?>
	</section>
</div>

<?php get_footer(); ?>