<?php
/**
 * Custom implement publication section 
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

add_action('init', 'type_post_publicacao');
	function type_post_publicacao() { 
		$labels = array(
			'name' 				 => _x('Publicações', 'post type general name'),
			'singular_name' 	 => _x('Publicações', 'post type singular name'),
			'add_new' 			 => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' 		 => __('Novo Item'),
			'edit_item' 		 => __('Editar Item'),
			'new_item' 			 => __('Novo Item'),
			'view_item' 		 => __('Ver Item'),
			'search_items'		 => __('Procurar Itens'),
			'not_found'			 => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon'  => '',
			'menu_name' 		 => 'Publicações'
		);

		$args = array(
			'labels' 			 => $labels,
			'public' 			 => true,
			'public_queryable' 	 => true,
			'show_ui' 			 => true,
			'query_var' 		 => true,
			'rewrite' 			 => true,
			'capability_type' 	 => 'post',
			'has_archive' 		 => true,
			'hierarchical' 		 => false,
			'menu_position' 	 => 5,
			'menu_icon' 		 => 'dashicons-media-document',
			'taxonomies' 		 => array('category'),
			'taxonomies' 		 => array('post_tag'),
			'supports' 			 => array('editor','title', 'tags','custom-fields','excerpt')
		);

		register_post_type( 'publicacao' , $args );
		flush_rewrite_rules();
	}


register_taxonomy(
	"cat_publicacao",
	 "publicacao",
	 array(
		"label" 				 => "Categoria - Publicações", 
		"singular_label" 	 	 => "Categoria", 
		"rewrite" 			 	 => true,
		"hierarchical" 		 	 => true,
	)
);


// Cria a meta_box
function publicacao_metabox() {
	
	// Tipos de post para a metabox
	$screens = array( 'publicacao' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'publicacao_meta_box',						// ID da Meta Box 
			'Informação complementar ( Obrigatório )',	// Título
			'publicacao_metabox_callback',				// Função de callback
			$screen,									// Local onde ela vai aparecer
			'normal',									// Contexto
			'high'										// Prioridade
		);
		
	} // foreach
	
} // Cria a meta_box
add_action( 'add_meta_boxes', 'publicacao_metabox', 1 );

// Essa é a função que vai exibir os dados para o usuário
function publicacao_metabox_callback( $post ) {

	// Adiciona um campo nonce para verificação posterior
	wp_nonce_field( 'publicacao_custom_metabox', 'publicacao_custom_metabox_nonce' );

	// Configura os campos
	
	$_tp_autores = get_post_meta( $post->ID, '_tp_autores', true );
	$_tp_revista = get_post_meta( $post->ID, '_tp_revista', true );
	$_tp_doi     = get_post_meta( $post->ID, '_tp_doi', true );
	$_tp_link    = get_post_meta( $post->ID, '_tp_link', true);
	$_tp_edicao  = get_post_meta( $post->ID, '_tp_edicao', true);

	
	echo '<strong>Autores:</strong><br>';
	echo '<textarea name="_tp_autores" class="widefat" placeholder="Campo obrigatório">' . esc_html( $_tp_autores ). '</textarea>';
	echo '<br /><br />';
	echo '<strong>Revista científica:</strong><br>';
	echo '<textarea name="_tp_revista" class="widefat" placeholder="Campo obrigatório para Artigos">' . esc_html( $_tp_revista ) . '</textarea>';
	echo '<br /><br />';
	echo '<strong>DOI: (Digital Object Identifier)</strong><br>';
	echo '<textarea name="_tp_doi" class="widefat">' . esc_html( $_tp_doi ) . '</textarea>';
	echo '<br /><br />';
	echo '<strong>Edição:</strong><br>';
	echo '<textarea name="_tp_edicao" class="widefat" placeholder="Campo obrigatório para Livros e Capítulos de livros">' . esc_html( $_tp_edicao ) . '</textarea>';
	echo '<br /><br />';
	echo '<strong>Link da publicação:</strong><br>';
	echo '<textarea name="_tp_link" class="widefat" placeholder="Campo obrigatório">' . esc_html( $_tp_link ) . '</textarea>';
	
}

function publicacao_save_custom_metabox_data( $post_id ) {

	// Verifica o campo nonce
	if ( ! isset( $_POST['publicacao_custom_metabox_nonce'] ) ) {
		return;
	}

	// Verifica se o campo nonce é válido
	if ( ! wp_verify_nonce( $_POST['publicacao_custom_metabox_nonce'], 'publicacao_custom_metabox' ) ) {
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
	$_tp_autores = isset( $_POST['_tp_autores'] ) ? $_POST['_tp_autores'] : null;
	$_tp_revista = isset( $_POST['_tp_revista'] ) ? $_POST['_tp_revista'] : null;
	$_tp_doi     = isset( $_POST['_tp_doi']     ) ? $_POST['_tp_doi']     : null;
	$_tp_link    = isset( $_POST['_tp_link']    ) ? $_POST['_tp_link']    : null;
	$_tp_edicao  = isset( $_POST['_tp_edicao']  ) ? $_POST['_tp_edicao']  : null;

	// Atualiza os dados no BD
	update_post_meta( $post_id, '_tp_autores', $_tp_autores );
	update_post_meta( $post_id, '_tp_revista', $_tp_revista );
	update_post_meta( $post_id, '_tp_doi'    , $_tp_doi     );
	update_post_meta( $post_id, '_tp_link'   , $_tp_link    );
	update_post_meta( $post_id, '_tp_edicao' , $_tp_edicao  );
}
add_action( 'save_post', 'publicacao_save_custom_metabox_data' );
