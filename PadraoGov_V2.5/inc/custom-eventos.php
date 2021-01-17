<?php
/**
 * Custom implement events section 
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
 * Esta custom adiciona a seção de eventos na área administrativa do wordpress
 * 
 */

add_action('init', 'type_post_eventos');
 
	function type_post_eventos() { 
		$labels = array(
			'name' 				 => _x('Eventos', 'post type general name'),
			'singular_name'	 	 => _x('Eventos', 'post type singular name'),
			'add_new' 			 => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' 		 => __('Novo Item'),
			'edit_item' 		 => __('Editar Item'),
			'new_item' 			 => __('Novo Item'),
			'view_item' 		 => __('Ver Item'),
			'search_items' 		 => __('Procurar Itens'),
			'not_found' 		 => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon'  => '',
			'menu_name' 		 => 'Eventos'
		);

		$args = array(
			'labels' 			=> $labels,
			'public' 			=> true,
			'public_queryable' 	=> true,
			'show_ui'	 		=> true,
			'query_var' 		=> true,
			'rewrite' 			=> true,
			'capability_type' 	=> 'post',
			'has_archive' 		=> true,
			'hierarchical' 		=> false,
			'menu_position' 	=> 5,
			'menu_icon' 		=> 'dashicons-money',
			//'taxonomies' 		=> array('category'),
			'supports' 			=> array('title','thumbnail','custom-fields')
		);

			register_post_type( 'eventos' , $args );
			flush_rewrite_rules();
	}


	register_taxonomy(
	"cat_eventos",
     "eventos",
	     array(
	     	"label" 		 	=> "Categoria do evento",
	        "singular_label" 	=> "Categoria - eventos",
	        "rewrite" 		 	=> true,
	        "hierarchical" 		=> true,
		)
);


// Cria a meta_box
function eventos_metabox() {
	
	// Tipos de post para a metabox
	$screens = array( 'eventos' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'eventos_meta_box',							// ID da Meta Box 
			'Informação complementar ( Obrigatório )',	// Título
			'eventos_metabox_callback',					// Função de callback
			$screen,									// Local onde ela vai aparecer
			'normal',									// Contexto
			'high'										// Prioridade
		);
		
	} // foreach
	
} // Cria a meta_box
add_action( 'add_meta_boxes', 'eventos_metabox', 1 );

// Essa é a função que vai exibir os dados para o usuário
function eventos_metabox_callback( $post ) {

	// Adiciona um campo nonce para verificação posterior
	wp_nonce_field( 'eventos_custom_metabox', 'eventos_custom_metabox_nonce' );

	// Configura os campos
	$_tp_dataS   = get_post_meta( $post->ID, '_tp_dataS', true);
	$_tp_link    = get_post_meta( $post->ID, '_tp_link',  true);

	echo '<strong>Data de início: <b>Ex:dd/mm/ano</b></strong><br>';
	echo '<textarea name="_tp_dataS" class="widefat" placeholder="Campo obrigatório">' . esc_html( $_tp_dataS ) . '</textarea>';
	echo '<br /><br />';
	echo '<strong>Link do site do evento: <b>Ex: http://www.ccst.inpe.br</b></strong><br>';
	echo '<textarea name="_tp_link" class="widefat" placeholder="Campo obrigatório">' . esc_html( $_tp_link ) . '</textarea>';
	
}

function eventos_save_custom_metabox_data( $post_id ) {

	// Verifica o campo nonce
	if ( ! isset( $_POST['eventos_custom_metabox_nonce'] ) ) {
		return;
	}

	// Verifica se o campo nonce é válido
	if ( ! wp_verify_nonce( $_POST['eventos_custom_metabox_nonce'], 'eventos_custom_metabox' ) ) {
		return;
	}

	// Se o formulário ainda não foi enviado (estiver fazendo autosave) 
	// não faremos nada
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Verifica as permissões do usuário (mínimo: editar post).
	if ( isset( $_POST['post_type'] ) && 'contato' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* Perfeito, agora vamos aos campos. */
	$_tp_dataS		= isset( $_POST['_tp_dataS']	) ? $_POST['_tp_dataS']	: null;
	$_tp_link		= isset( $_POST['_tp_link']		) ? $_POST['_tp_link']	: null;

	// Atualiza os dados no BD
	update_post_meta( $post_id, '_tp_dataS'   , $_tp_dataS    );
	update_post_meta( $post_id, '_tp_link'   , $_tp_link      );
}
add_action( 'save_post', 'eventos_save_custom_metabox_data' );
