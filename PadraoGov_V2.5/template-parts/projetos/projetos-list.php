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


<?php //chama a categoria do curstom post
	global $post;
	$terms = get_the_terms($post->id, 'cat_projetos');
	$nome_taxonomy = $terms[0]->name;
?>

<?php
if( get_post_type() == 'projetos' ): // Se o post type foi post ?>
	<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading"><?php echo $nome_taxonomy; ?></h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					$domsxe = simplexml_load_string(get_the_post_thumbnail());
					$thumbnailsrc = $domsxe->attributes()->src;
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="tileItem">
							<div class="span8 tileContent">
								<h2 class="tileHeadline">
									
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<span class="description">
									<!-- content -->
									<?php // Mostra os primeiros 150 caracteres
										$excerpt = substr( $post->post_excerpt, 0, 300 );
										// Imprime a variável?>
									<?php  echo $excerpt , '...'; ?>
								</span> 
							</div>
							<!-- data da publicação -->
							<div class="span4 tileInfo">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnailsrc  ;?> "  style="border-radius:5px; width:100%; height:150px" ></a>
							</div>
						</div>
					</article>
				<?php 
				// End the loop.
				endwhile;
				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );
				endif;
				?>
			</div>
		</section>
	</div>
<?php endif; ?>
