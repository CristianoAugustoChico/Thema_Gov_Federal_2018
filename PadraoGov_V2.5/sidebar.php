<?php
/**
 * Theme sidebar - menu principal lateral
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
<div id="navigation" class="span3">
	<a href="#" class="visible-phone visible-tablet mainmenu-toggle btn"><i class="icon-list"></i>&nbsp;Menu</a>
	<section id="navigation-section">

			<?php include 'conditions.php' ?>

			<!-- menu principal -->
			<div class="sidebar-menu">
				<?php dynamic_sidebar( 'sidebar-menu' ); ?>
			</div>

			<!-- central de conteúdos -->
			<nav class="span9 central-conteudos">
				<h2>Central de Conteúdos <i class="icon-chevron-down visible-phone visible-tablet pull-right"></i></h2>
				<ul>
					<li><a href="http://www.ccst.inpe.br/publicacao/" class="publicacoes" title="Publicações" onClick="ga('send', 'event', 'Central-Conteudo', 'Publicacoes', 'Lista-geral');">
						<span class="icon-li icon-stack">
						 	<i class="icon-circle icon-stack-base"><span class="hide">&nbsp;</span></i>
						 	<i class="icon-file-text icon-light"><span class="hide">&nbsp;</span></i>
						</span>
						Publicações</a>
					</li>
					<li><a href="http://www.ccst.inpe.br/educacional/" class="educacional" title="Educacional" target="_blank" onClick="ga('send', 'event', 'Central-Conteudo', 'Educacional', 'Lista-geral');">
						<span class="icon-li icon-stack">
						 	<i class="icon-circle icon-stack-base"><span class="hide">&nbsp;</span></i>
						 	<i class="icon-book icon-light"><span class="hide">&nbsp;</span></i>
						</span>
						Educacional</a>
					</li>
					<li><a href="https://twitter.com/ccst_inpe/" class="twitter" title="Twitter" target="_blank" onClick="ga('send', 'event', 'Header', 'Twitter', 'Perfil');">
						<span class="icon-li icon-stack">
						 	<i class="icon-circle icon-stack-base"><span class="hide">&nbsp;</span></i>
						 	<i class="icon-twitter icon-light"><span class="hide">&nbsp;</span></i>
						</span>
						Twitter</a>
					</li>
					<li><a href="https://www.youtube.com/user/CCSTvideosWeb/" class="videos" title="Vídeos" target="_blank" onClick="ga('send', 'event', 'Central-Conteudo', 'Youtube', 'Videos');">
						<span class="icon-li icon-stack">
						 	<i class="icon-circle icon-stack-base"><span class="hide">&nbsp;</span></i>
						 	<i class="icon-play icon-light"><span class="hide">&nbsp;</span></i>
						</span>
						Vídeos</a>
					</li>
					<li><a href="https://pt-br.facebook.com/ccstinpe/" class="facebook" title="Facebook" target="_blank" onClick="ga('send', 'event', 'Central-Conteudo', 'Facebook', 'Perfil');">
						<span class="icon-li icon-stack">
						 	<i class="icon-circle icon-stack-base"><span class="hide">&nbsp;</span></i>
						 	<i class="icon-facebook icon-light"><span class="hide">&nbsp;</span></i>
						</span>
						Facebook</a>
					</li>
				</ul>
			</nav>
	</section>
</div>