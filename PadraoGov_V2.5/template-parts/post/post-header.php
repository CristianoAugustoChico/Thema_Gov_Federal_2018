<?php
/**
 * Theme header-content - date post and social midia
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

<div class="content-header-options-1 row-fluid">
	<time class="documentByLine span7">
		<ul>
			<li class="documentAuthor">por <strong>CCST</strong></li>
			<li class="documentPublished"><strong>publicado</strong> <?php the_time('d/m/Y \\a\\t g:i') ?></li>
			<li class="documentModified"><strong>última modificação</strong> <?php the_modified_time('d/m/Y \\a\\t g:i' ) ?></li>
		</ul>
	</time>
	<div class="btns-social-like span5 hide">
		<!-- Cocial Icons -->
		<?php dynamic_sidebar( 'social-icons' ); ?>
	</div>
</div>