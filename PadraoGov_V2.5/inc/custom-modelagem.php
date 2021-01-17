<?php
/**
 * Custom implement modelagem section 
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
 * Esta custom adiciona a seção de modelagem na área administrativa do wordpress
 * 
 */

add_action('init', 'type_post_modelagem');

	function type_post_modelagem() {
		$labels = array(
			'name' 				 => _x('Modelagem', 'post type general name'),
			'singular_name'	 	 => _x('Modelagem', 'post type singular name'),
			'add_new' 			 => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' 		 => __('Novo Item'),
			'edit_item' 		 => __('Editar Item'),
			'new_item' 			 => __('Novo Item'),
			'view_item' 		 => __('Ver Item'),
			'search_items' 		 => __('Procurar Itens'),
			'not_found' 		 => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon'  => '',
			'menu_name' 		 => 'Modelagem'
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
			'menu_position' 	=> 20,
			'menu_icon' 		=> 'dashicons-admin-page',
			'taxonomies' 		=> array('category'),
			'taxonomies' 		=> array('post_tag'),
			'supports' 			=> array('title','editor','excerpt','custom-fields')
		);

			register_post_type( 'modelagem' , $args );
			flush_rewrite_rules();
	}


	register_taxonomy(
	"cat_modelagem",
     "modelagem",
	     array(
	     	"label" 		 	=> "Categoria - modelagem", 
	        "singular_label" 	=> "Categoria - modelagem", 
	        "rewrite" 		 	=> true,
	        "hierarchical" 		=> true,
		)
);


// Cria a meta_box
function modelagem_metabox() {
	
	// Tipos de post para a metabox
	$screens = array( 'modelagem' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'modelagem_meta_box',						// ID da Meta Box 
			'Informação complementar',					// Título
			'modelagem_metabox_callback',				// Função de callback
			$screen,									// Local onde ela vai aparecer
			'normal',									// Contexto
			'high'										// Prioridade
		);
		
	} // foreach
	
} // Cria a meta_box
add_action( 'add_meta_boxes', 'modelagem_metabox', 1 );

// Essa é a função que vai exibir os dados para o usuário
function modelagem_metabox_callback( $post ) {

	// Adiciona um campo nonce para verificação posterior
	wp_nonce_field( 'modelagem_custom_metabox', 'modelagem_custom_metabox_nonce' );

	// Configura os campos
	$URL  = get_post_meta( $post->ID, 'URL', true);
	echo '<strong>Link para o site:</strong><br>';
	echo '<textarea name="URL" class="widefat" placeholder="Campo obrigatório">' . esc_html( $URL ) . '</textarea>';
	
}

function modelagem_save_custom_metabox_data( $post_id ) {

	// Verifica o campo nonce
	if ( ! isset( $_POST['modelagem_custom_metabox_nonce'] ) ) {
		return;
	}

	// Verifica se o campo nonce é válido
	if ( ! wp_verify_nonce( $_POST['modelagem_custom_metabox_nonce'], 'modelagem_custom_metabox' ) ) {
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
	$URL  = isset( $_POST['URL']  ) ? $_POST['URL']  : null;

	// Atualiza os dados no BD
	update_post_meta( $post_id, 'URLo' , $URL  );
}
add_action( 'save_post', 'modelagem_save_custom_metabox_data' );
