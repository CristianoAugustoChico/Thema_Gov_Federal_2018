<?php
/**
 * Theme select themes for type post/custom post
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

<?php // Chama a widget exclusiva de publicações 
	if( get_post_type() == 'publicacao' ): 
		dynamic_sidebar( 'sidebar-publicacao' ); ?>
		<!-- Menu principal -->
		<style> .sidebar-menu {display: none;} </style>
<?php endif; ?>


<?php // Chama a widget exclusiva de projetos 
	if( get_post_type() == 'projetos' ):
		dynamic_sidebar( 'sidebar-projetos' ); ?>
		<!-- Menu principal -->
		<style> .sidebar-menu {display: visible;} </style>
<?php endif; ?>