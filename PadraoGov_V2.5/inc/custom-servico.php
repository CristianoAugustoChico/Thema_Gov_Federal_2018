<?php 
/**
 * Custom implement servico section 
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
 * Esta custom adiciona a seção de publicações na área administrativa do wordpress
 * 
 */

add_action('init', 'type_post_servico');
	function type_post_servico() { 
		$labels = array(
			'name' 				 => _x('Servico', 'post type general name'),
			'singular_name' 	 => _x('Servico', 'post type singular name'),
			'add_new' 			 => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' 		 => __('Novo Item'),
			'edit_item' 		 => __('Editar Item'),
			'new_item' 			 => __('Novo Item'),
			'view_item' 		 => __('Ver Item'),
			'search_items'		 => __('Procurar Itens'),
			'not_found' 		 => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon'  => '',
			'menu_name' 		 => 'Servico'
		);

		$args = array(
			'labels' 			 => $labels,
			'public' 			 => true,
			'public_queryable' 	 => true,
			'show_ui' 			 => true,
			'query_var' 		 => true,
			'rewrite' 			 => true,
			'capability_type'	 => 'post',
			'has_archive' 		 => true,
			'hierarchical' 		 => false,
			'menu_position' 	 => 5,
			'menu_icon' 		 => 'dashicons-megaphone',
			'taxonomies' 		 => array('categorie'),
			'taxonomies' 		 => array('post_tag'),
			'supports' 			 => array('editor','title','thumbnail','excerpt','custom-fields')
		);
 
		register_post_type( 'servico' , $args );
		flush_rewrite_rules();
	}

register_taxonomy(
	"cat_servico",
     "servico",
	     array(
	     	"label" 		 	=> "Área do servico", 
	        "singular_label" 	=> "Categoria", 
	        "rewrite" 		 	=> true,
	        "hierarchical" 		=> true,
		)
);



// Cria a meta_box
function servico_metabox() {
	
	// Tipos de post para a metabox
	$screens = array( 'servico' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'servico_meta_box',							// ID da Meta Box 
			'Informação complementar ( Obrigatório )',	// Título
			'servico_metabox_callback',				// Função de callback
			$screen,									// Local onde ela vai aparecer
			'normal',									// Contexto
			'high'										// Prioridade
		);
		
	} // foreach
	
} // Cria a meta_box
add_action( 'add_meta_boxes', 'servico_metabox', 1 );

// Essa é a função que vai exibir os dados para o usuário
function servico_metabox_callback( $post ) {

	// Adiciona um campo nonce para verificação posterior
	wp_nonce_field( 'servico_custom_metabox', 'servico_custom_metabox_nonce' );

	// Configura os campos	
	$_tp_link    = get_post_meta( $post->ID, '_tp_link', true);
	
	echo '<strong>Link para a publicação (Obrigatório):</strong><br>';
	echo '<textarea name="_tp_link" class="widefat" placeholder="Campo obrigatório">' . esc_html( $_tp_link ) . '</textarea>';
	
}

function servico_save_custom_metabox_data( $post_id ) {

	// Verifica o campo nonce
	if ( ! isset( $_POST['servico_custom_metabox_nonce'] ) ) {
		return;
	}

	// Verifica se o campo nonce é válido
	if ( ! wp_verify_nonce( $_POST['servico_custom_metabox_nonce'], 'servico_custom_metabox' ) ) {
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
	$_tp_link    = isset( $_POST['_tp_link']    ) ? $_POST['_tp_link']    : null;
	

	// Atualiza os dados no BD
	update_post_meta( $post_id, '_tp_link'   , $_tp_link    );
	
}
add_action( 'save_post', 'servico_save_custom_metabox_data' );
