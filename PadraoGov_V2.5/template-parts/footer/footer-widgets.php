<?php
/**
 * Theme footer widgets
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

 <div id="footer" class="row footer-menus">
	<div class="span3">
		<?php dynamic_sidebar( 'footer_area_1' ); ?>
	</div>
	<div class="span3">
		<?php dynamic_sidebar( 'footer_area_2' ); ?>
	</div>
	<div class="span3">
		<?php dynamic_sidebar( 'footer_area_3' ); ?>
	</div>
	<div class="span3">
		<?php dynamic_sidebar( 'footer_area_4' ); ?>
	</div>
	<span class="hide">Fim da navegação de rodapé</span>
</div>