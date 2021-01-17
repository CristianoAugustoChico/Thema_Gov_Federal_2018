<?php
/**
 * functions theme 
 *
 * Padrão Governo Federal - Brasil functions and definitions
 * Author:Cristiano Augusto Cunha Silva <sem@cristianoaugusto.com.br>
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

/**
* Enqueue scripts and styles.
*/
function CCSTGOV_scripts() {	
	// Theme stylesheet.
	wp_enqueue_style ( 'CCSTGOV-style', get_stylesheet_uri() );

	// Load the bootstrap stylesheet.
	wp_enqueue_style ( 'CCSTGOV-bootstrap', get_theme_file_uri( 'assets/bootstrap/css/bootstrap.min.css' ), array( 'CCSTGOV-style' ), '1.0' );

	// Load the standar wordpress stylesheet.
	wp_enqueue_style ( 'CCSTGOV-wordpress', get_theme_file_uri( 'assets/css/wordpress.css' ), array( 'CCSTGOV-style' ), '1.0' );

	// Load the font-awesome stylesheet.
	wp_enqueue_style ( 'CCSTGOV-font', get_theme_file_uri( 'assets/font-awesome/css/font-awesome.min.css' ), array( 'CCSTGOV-style' ), '1.0' );

	// Load the Internet Explorer 10 specific stylesheet.
	wp_enqueue_style ( 'CCSTGOV-ie', get_theme_file_uri( 'assets/css/ie.css' ), array( 'CCSTGOV-style' ), '1.0' );
	wp_style_add_data( 'CCSTGOV-ie', 'conditional', null );

	// Load the Internet Explorer 9 specific stylesheet.
	wp_enqueue_style ( 'CCSTGOV-ie8', get_theme_file_uri( 'assets/css/ie8.css' ), array( 'CCSTGOV-style' ), '1.0' );
	wp_style_add_data( 'CCSTGOV-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style ( 'CCSTGOV-ie7', get_theme_file_uri( 'assets/css/ie7.css' ), array( 'CCSTGOV-style' ), '1.0' );
	wp_style_add_data( 'CCSTGOV-ie7', 'conditional', 'lt IE 7' );

	// Load the Internet Explorer 8 specific Font.
	wp_enqueue_style ( 'CCSTGOV-font-ie7', get_theme_file_uri( 'assets/font-awesome/css/font-awesome-ie7.min.css' ), array( 'CCSTGOV-style' ), '1.0' );
	wp_style_add_data( 'CCSTGOV-font-ie7', 'conditional', 'lt IE 7' );

	// Load the principal scripts.
	wp_enqueue_script( 'jquery', get_theme_file_uri( 'assets/js/jquery.min.js' ) );

	wp_enqueue_script( 'jquery-noconflict', get_theme_file_uri( 'assets/js/jquery-noconflict.js' ) );

	wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/bootstrap/js/bootstrap.min.js' ) );

	wp_enqueue_script( 'jquery-cookie', get_theme_file_uri( 'assets/js/jquery.cookie.js' ) );

	// Load Social Icons
	wp_enqueue_script( 'template', get_theme_file_uri( 'assets/js/template.js' ) );

	//Não esta sendo utilizado no momento
	//wp_enqueue_script( 'jquery-jplayer-min', get_theme_file_uri( 'assets/jplayer/js/jquery.jplayer.min.js' ) );

}
add_action( 'wp_enqueue_scripts', 'CCSTGOV_scripts' );

/**
* This theme uses wp_nav_menu() in five locations.
*
*/
	register_nav_menus( array(
		'top'          => __( 'Menu de serviços' ),
	) );


/**
 * Register our sidebars and footer widgetized areas.
 * This theme uses 4 widgets in footer and 1 widgets in sidebar  
 */
function arphabet_widgets_init() {
	// Register widget in SidBar (Menu principal lateral esquerdo)
	register_sidebar( array(
		'name'          => 'Barra Esquerda - Menu Principal',
		'id'            => 'sidebar-menu',
		'before_widget' => '<nav class="span9 sobre">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '<i class="icon-chevron-down visible-phone visible-tablet pull-right"></i></h2>',
	) );

	// Register widget in contato page (lateral da página contato)
	register_sidebar( array(
		'name'          => 'Barra contato',
		'id'            => 'sidebar-contato',
		'before_widget' => '<nav class="span12 sobre">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2 style="font-size: .85em;">',
		'after_title'   => '</h2>',
	) );

	// Register widget in social icons (header da content)
	register_sidebar( array(
		'name'          => 'Social Icons - Header Posts',
		'id'            => 'social-icons',
		'before_widget' => '<nav class="span12 sobre">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2 style="font-size: .85em;">',
		'after_title'   => '</h2>',
	) );
	// Register widgets in footer 
	register_sidebar( array(
		'name'          => 'Footer Area 1',
		'id'            => 'footer_area_1',
		'before_widget' => '<nav class="row nav">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Area 2',
		'id'            => 'footer_area_2',
		'before_widget' => '<nav class="row nav">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Area 3',
		'id'            => 'footer_area_3',
		'before_widget' => '<nav class="row nav">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Area 4',
		'id'            => 'footer_area_4',
		'before_widget' => '<nav class="row nav">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	// Register widget in SidBar (Menu lateral - Publicação)
	register_sidebar( array(
		'name'          => 'Barra Esquerda - Menu Publicações',
		'id'            => 'sidebar-publicacao',
		'before_widget' => '<nav class="span9 sobre">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '<i class="icon-chevron-down visible-phone visible-tablet pull-right"></i></h2>',
	) );

	// Register widget in SidBar (Menu lateral - Projetos)
	register_sidebar( array(
		'name'          => 'Barra Esquerda - Menu Projetos',
		'id'            => 'sidebar-projetos',
		'before_widget' => '<nav class="span9 sobre">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h2>',
		'after_title'   => '<i class="icon-chevron-down visible-phone visible-tablet pull-right"></i></h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


/**
* Register thumbnails the theme 
*
*/

if ( function_exists( 'add_theme_support' ) ) { 
	 add_theme_support( 'post-thumbnails' );
	 set_post_thumbnail_size('full'); // default Post Thumbnail dimensions (cropped)
}

/** Register thumbnails from the list news**/
function thumbnail_noticia ( $tamanho = 'thumbnail' ) {
	global $post;
	$get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho, false, '' );
	$get_thumb_padrao   =  "  style=\"widht:100%; height: 300px; background-size: 100% 100% !important; border-radius: 5px; background: url('http://www.ccst.inpe.br/wp-content/uploads/2016/02/padrao.png' )\"  ";
	
	if ( has_post_thumbnail() ) {
		echo 'style="widht:100%; height: 300px; background-size: 100% 100% !important; border-radius: 5px; background: url('.$get_post_thumbnail[0].' )" ';
	}
	else {
		echo "$get_thumb_padrao";
	}
}


/**
* Register Bootstrap breadcrumbs
*
*/

function wp_custom_breadcrumbs() {

$showOnHome 	= 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
$delimiter 		= '&gt;'; // delimiter between crumbs
$home 			= 'Home'; // text for the 'Home' link
$showCurrent 	= 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
$before 		= '<span class="pathway">'; // tag before the current crumb
$after 			= '</span>'; // tag after the current crumb

global $post;
$homeLink = get_bloginfo('url');

if (is_home() || is_front_page()) {

	if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

} else {

	echo '<div id="crumbs"><a href="' . $homeLink . '" >' . $home . '</a> ' . $delimiter . ' ';

	if ( is_category() ) {
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
		echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
 
	} elseif ( is_search() ) {
		echo $before . 'Resultados para "' . get_search_query() . '"' . $after;
 
	} elseif ( is_day() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
	echo $before . get_the_time('d') . $after;

	} elseif ( is_month() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time('F') . $after;

	} elseif ( is_year() ) {
		echo $before . get_the_time('Y') . $after;

	} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
		$post_type = get_post_type_object(get_post_type());
		$slug = $post_type->rewrite;
		echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
		} else {
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
			echo $cats;
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
		}

	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;

	} elseif ( is_attachment() ) {
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

	} elseif ( is_page() && !$post->post_parent ) {
		if ($showCurrent == 1) echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
		echo $breadcrumbs[$i];
		if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
		}
	if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

	} elseif ( is_tag() ) {
		echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

	} elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata($author);
	echo $before . 'Articles posted by ' . $userdata->display_name . $after;

	} elseif ( is_404() ) {
		echo $before . 'Error 404' . $after;
	}

	if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo __('Page') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	}

	echo '</div>';

}
} // end Register Bootstrap breadcrumbs


/**
* Register Bootstrap pagination
*
*/

function wp_bootstrap_pagination( $args = array() ) {
	
	$defaults = array(
		'range'           => 4,
		'custom_query'    => FALSE,
		'previous_string' => __( 'Previous', 'text-domain' ),
		'next_string'     => __( 'Next', 'text-domain' ),
		'before_output'   => '<div class="post-nav"><ul class="pager">',
		'after_output'    => '</ul></div>'
	);
	
	$args = wp_parse_args( 
		$args, 
		apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
	);
	
	$args['range'] = (int) $args['range'] - 1;
	if ( !$args['custom_query'] )
		$args['custom_query'] = @$GLOBALS['wp_query'];
	$count = (int) $args['custom_query']->max_num_pages;
	$page  = intval( get_query_var( 'paged' ) );
	$ceil  = ceil( $args['range'] / 2 );
	
	if ( $count <= 1 )
		return FALSE;
	
	if ( !$page )
		$page = 1;
	
	if ( $count > $args['range'] ) {
		if ( $page <= $args['range'] ) {
			$min = 1;
			$max = $args['range'] + 1;
		} elseif ( $page >= ($count - $ceil) ) {
			$min = $count - $args['range'];
			$max = $count;
		} elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
			$min = $page - $ceil;
			$max = $page + $ceil;
		}
	} else {
		$min = 1;
		$max = $count;
	}
	
	$echo = '';
	$previous = intval($page) - 1;
	$previous = esc_attr( get_pagenum_link($previous) );
	
	$firstpage = esc_attr( get_pagenum_link(1) );
	if ( $firstpage && (1 != $page) )
		//$echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( '<<', 'text-domain' ) . '</a></li>';
	if ( $previous && (1 != $page) )
		$echo .= '<li><a href="' . $previous . '" title="' . __( '<', 'text-domain') . '"> <b> < </b> </a></li>';
	
	if ( !empty($min) && !empty($max) ) {
		for( $i = $min; $i <= $max; $i++ ) {
			if ($page == $i) {
				$echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
			} else {
				$echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
			}
		}
	}
	
	$next = intval($page) + 1;
	$next = esc_attr( get_pagenum_link($next) );
	if ($next && ($count != $page) )
		$echo .= '<li><a href="' . $next . '" title="' . __( '>', 'text-domain') . '"> <b> > </b> </a></li>';
	
	$lastpage = esc_attr( get_pagenum_link($count) );
	if ( $lastpage ) {
		//$echo .= '<li class="next"><a href="' . $lastpage . '">' . __( '>>', 'text-domain' ) . '</a></li>';
	}
	if ( isset($echo) )
		echo $args['before_output'] . $echo . $args['after_output'];
}
// End Register Bootstrap pagination


/**
* Adiciona a meta box para upload do arquivo
*
*/

add_action( 'add_meta_boxes', 'my_meta_box' );

function my_meta_box()
{
	add_meta_box( 'my_meta_uploader', 'Upload de arquivo', 'my_meta_uploader_setup', '', 'normal', 'high' );
}

/*
 * Adiciona os campos para a meta box de upload
 */
function my_meta_uploader_setup()
{
	global $post;

	// Procura o valor da chave 'upload_file'
	$meta = get_post_meta( $post->ID, 'upload_file', true );
	?>

	<p>
		1- Clique no botão para fazer o upload de um documento. 2 - Clique no boão<b> URL do arquivo</b>. 3 - Após o término do upload, clique em <b>Inserir no post</b>.
	</p>

	<p>
		<input id="upload_file" type="text" size="80" name="upload_file" style="width: 85%;" value="<?php if( ! empty( $meta ) ) echo $meta; ?>" />
		<input id="upload_file_button" type="button" class="button" value="Fazer upload" />
	</p>

	<?php
}


/*
 * Salva os dados da nossa custom meta box
 */
add_action( 'save_post', 'my_meta_uploader_save' );

function my_meta_uploader_save( $post_id ) {

	if ( ! current_user_can( 'edit_post', $post_id ) ) return $post_id;

	// Recebe o valor que foi enviado pelo media uploader
	$arquivo = $_POST['upload_file'];

	// Adiciona a chave upload_file ou atualiza seu valor
	add_post_meta( $post_id, 'upload_file', $arquivo, true ) or update_post_meta( $post_id, 'upload_file', $arquivo );

	return $post_id;
}


/*
 * Adiciona o script que replica o uploader padrão do WordPress
 */
add_action( 'admin_head', 'my_meta_uploader_script' );

/*
 * O novo media uploader, baseado no post e nas discussões do site abaixo
 * http://www.webmaster-source.com/2010/01/08/using-the-wordpress-uploader-in-your-plugin-or-theme/
 */
function my_meta_uploader_script() { ?>
	<script type="text/javascript">
		jQuery(document).ready(function() {

			var formfield;
			var header_clicked = false;

			jQuery( '#upload_file_button' ).click( function() {
				formfield = jQuery( '#upload_file' ).attr( 'name' );
				tb_show( '', 'media-upload.php?TB_iframe=true' );
				header_clicked = true;

				return false;
			});

			// Guarda o uploader original
			window.original_send_to_editor = window.send_to_editor;

			// Sobrescreve a função nativa e preenche o campo com a URL
			window.send_to_editor = function( html ) {
				if ( header_clicked ) {
					fileurl = jQuery( html ).attr( 'href' );
					jQuery( '#upload_file' ).val( fileurl );
					header_clicked = false;
					tb_remove();
				}
				else
				{
					window.original_send_to_editor( html );
				}
			}

		});
  </script>
<?php
}

/**
* Register Custom Posts
*
*/

require get_parent_theme_file_path( '/inc/custom-publicacao.php' );

require get_parent_theme_file_path( '/inc/custom-educacional.php' );

require get_parent_theme_file_path( '/inc/custom-servico.php' );

require get_parent_theme_file_path( '/inc/custom-projetos.php' );

require get_parent_theme_file_path( '/inc/custom-modelagem.php' );

require get_parent_theme_file_path( '/inc/custom-diagnosticos.php' );

require get_parent_theme_file_path( '/inc/custom-observacao.php' );

require get_parent_theme_file_path( '/inc/custom-eventos.php' );
