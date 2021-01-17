<?php
/**
 * Theme Front Page - Notícia destaque e 3 ultimas notícias
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

<!-- cat: destaque-->
<div class="row-fluid">
	<div class="span12 module">
		<div class="outstanding-header">
			<h2 class="outstanding-title">Últimas notícias</h2>
		</div>
		<section class="module-section">
		<?php
			$lastposts = get_posts('numberposts=1&category_name=destaque'); // Post e nome categoria
			foreach($lastposts as $post) :  setup_postdata($post);
			$domsxe = simplexml_load_string(get_the_post_thumbnail());
			$thumbnailsrc = $domsxe->attributes()->src;
		?>
			<div class="span4 no-margin">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p>
					<?php // Mostra os primeiros 50 caracteres
						$excerpt = substr( $post->post_excerpt, 0, 100 );
						// Imprime a variável
						echo $excerpt , '...';
					?>
				</p>
			</div>
			<div class="span8">
				<a href="<?php the_permalink(); ?>"> <img src="<?php echo $thumbnailsrc;?> " style="border-radius:5px; width:100%; height:250px" alt="<?php the_title(); ?>"> </a>
			</div>
		<?php endforeach; ?>
		</section>
	</div>
</div>

<!-- 3 last news - cat:noticias-->
<div class="row-fluid">
	<div class="span12 module">
		<section class="module-section">
		<?php
			$lastposts = get_posts('category_name=noticias&posts_per_page=3'); // Post e nome categoria
			foreach($lastposts as $post) :  setup_postdata($post);
			$domsxe = simplexml_load_string(get_the_post_thumbnail());
			$thumbnailsrc = $domsxe->attributes()->src;
		?>
			<div class="span4">
				<a href="<?php the_permalink(); ?>" class="img-rounded">
					<img src="<?php echo $thumbnailsrc;?>" alt="<?php the_title();?>">
				</a>

				<h2><strong><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong></h2>
				<?php // Mostra os primeiros 50 caracteres
						$excerpt = substr( $post->post_excerpt, 0, 205 );
						// Imprime a variÃ¡vel?>
						<?php  echo $excerpt , '...'; ?>
			</div>
		<?php endforeach; ?>
		</section>
	</div>
</div>
<div class="row-fluid">
	<div class="span12 text-right">
		<a href="/noticias"><button type="button" class="btn btn-link">Ver Mais</button></a>
	</div>
</div>