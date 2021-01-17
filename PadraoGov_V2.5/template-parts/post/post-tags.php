<?php
/**
 * Theme list tags Post
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

<?php
$categoria = get_the_tags($post->id, true );
	if ( ! empty( $categoria ) ) {
		$categoria = get_the_tags($post->id);

		printf('assunto(s): ');
			foreach ($categoria as $category ) {
				printf( '<span> <a href="%1$s" class="link-categoria" rel="tag" class="line">%2$s</a>, </span>',
				esc_url( get_category_link( $category->term_id ) ),
				esc_html( $category->name )
				);
			}
	}
?>