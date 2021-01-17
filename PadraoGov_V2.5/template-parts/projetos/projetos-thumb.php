	<?php
/**
 * Theme list projects Post
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

<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading">Projetos e parceiros</h1>
			<div class="tile-list-1">

			<?php
				$lastposts = get_posts('post_type=projetos&posts_per_page=100'); // Post e nome categoria
				foreach($lastposts as $post) :  setup_postdata($post);
				$domsxe = simplexml_load_string(get_the_post_thumbnail());
				$thumbnailsrc = $domsxe->attributes()->src;
			?>
				<div class="span4 no-margin">
					<a href="<?php the_permalink(); ?>" class="img-rounded">
						<img src="<?php echo $thumbnailsrc;?>" alt="<?php the_title();?>">
					</a>
					<br /><br />
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>

<style>
#paginacao { 
	display: none !important;
	background-color: #000 }

</style>