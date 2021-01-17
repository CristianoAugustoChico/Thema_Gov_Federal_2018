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

<?php
if( get_post_type() == 'eventos' ): // Se o post type foi post ?>
	<div id="content" class="internas span9">
		<section id="content-section">
			<h1 class="borderHeading">Eventos</h1>
			<div class="tile-list-1">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					$domsxe = simplexml_load_string(get_the_post_thumbnail());
					$thumbnailsrc = $domsxe->attributes()->src;
					$terms = get_the_terms($post->id, 'cat_eventos');
					$nome_taxonomy = $terms[0]->name;
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="tileItem">
							<div class="span8 tileContent">
								<h2 class="tileHeadline">
									<?php
									$_tp_link = get_post_meta($post->ID, '_tp_link', true ); ?>
										<a href="<?php echo $_tp_link; ?>" target="_blank" onClick="ga('send', 'event', 'Eventos', '<?php echo $nome_taxonomy ?>', '<?php the_title(); ?>');">
											<?php the_title(); ?>
										</a>
									<?php //}?>
								</h2>
								<span class="description">
									<!-- content -->
									<?php // Mostra os primeiros 150 caracteres
										//$excerpt = substr( $post->post_content, 0, 300 );
										// Imprime a variável?>
									<?php  the_content(); '...'; ?>
								</span>
								<!-- data de inicio do evento -->
								<span id="data">
									<?php
										$_tp_dataS = get_post_meta($post->ID, '_tp_dataS', true );
										if ( ! empty( $_tp_dataS) ) {
									?>
									<div class="span12 tileInfo">
								 		<?php echo '<strong> Data: '. $_tp_dataS . '</strong>' ?>
									</div>
									<?php }?>
								</span>
								<!-- categoria do evento -->
								<span class="keywords">
									<?php get_template_part( 'template-parts/eventos/eventos', 'category'); ?>
								</span> 
							</div>
							<!-- link da publicação na thumb -->
							<?php
								$_tp_link = get_post_meta($post->ID, '_tp_link', true );
								if ( ! empty( $_tp_link ) ) {
							?>
							<div class="span4 tileInfo">
								
								<a href="<?php echo $_tp_link; ?>" target="_blank" onClick="ga('send', 'event', 'Eventos', '<?php echo $nome_taxonomy ?>', '<?php the_title(); ?>');">
									<img src="<?php echo $thumbnailsrc;?> "  style="border-radius:5px; width:100%; height:150px" >
								</a>
							</div>
							<?php }?>
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
