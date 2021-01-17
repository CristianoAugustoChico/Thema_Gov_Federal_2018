<?php
/**
 * Theme list secção Post
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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="tileItem">
		<div class="span10 tileContent">
			<div class="tileImage span12">
				<a href="<?php the_permalink() ?>"> <div  <?php thumbnail_noticia('full'); ?> > </div> </a>
			</div>
			<h2 class="tileHeadline">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h2>
			<span class="description">
				<!-- content -->
				<?php // Mostra os primeiros 150 caracteres
					$excerpt = substr( $post->post_excerpt, 0, 300 );
					// Imprime a variável?>
				<?php  echo $excerpt , '...'; ?>
			</span> 
			<!-- lista de categorias -->
			<span class="keywords">
				<?php get_template_part( 'template-parts/post/post', 'tags'); ?>
			</span>
		</div>
		<!-- data da publicação -->
		<div class="span2 tileInfo">
			<ul>
				<li><i class="icon-fixed-width icon-calendar"></i> <?php the_time('d/m/Y') ?></li>
				<li><i class="icon-fixed-width icon-time"></i><?php the_time('g:i A') ?></li>
			</ul>
		</div>
	</div>
</article>
