<?php
/**
 * Theme footer
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

			</div><!-- fim .row-fluid -->
		</div><!-- fim .container -->
	</main>
</div><!-- fim .layout -->


<?php wp_footer(); ?>

<!-- Padrão Governo Federal -->
<footer>
	<div class="footer-atalhos">
		<div class="container">
			<div class="pull-right voltar-ao-topo"><a href="#portal-siteactions"><i class="icon-chevron-up"></i>&nbsp;Voltar para o topo</a></div>
		</div>
	</div>
	<div class="container container-menus">
		<!-- Widgets footes de menu -->
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
	</div>
	<!-- fim .container -->
	<div class="footer-logos">
		<div class="container">
			<a href="http://www.acessoainformacao.gov.br/" class="logo-acesso pull-left"><img src="<?php bloginfo('template_directory');?>/assets/img/acesso-a-informacao.png" alt="Acesso a Informação"></a>
			<!-- separador para fins de acessibilidade --><span class="hide">&nbsp;</span><!-- fim separador para fins de acessibilidade -->
			<a href="http://www.brasil.gov.br/" class="brasil pull-right"><img src="<?php bloginfo('template_directory');?>/assets/img/brasil.png" alt="Brasil - Governo Federal"></a>
		</div>
	</div>
	<div class="footer-ferramenta">
		<div class="container">
			<div class="pull-left">2018 &copy; CCST - Centro de Ciência do Sistema Terrestre</div>
			<!-- separador para fins de acessibilidade --><span class="hide">&nbsp;</span><!-- fim separador para fins de acessibilidade -->
			<div class="pull-right">Desenvolvido: Web CCST</div>
		</div>
	</div>
	<div class="footer-atalhos visible-phone">
		<div class="container">
			<span class="hide">Fim do conteúdo da página</span>
			<div class="pull-right voltar-ao-topo"><a href="#portal-siteactions"><i class="icon-chevron-up"></i>&nbsp;Voltar para o topo</a></div>
		</div>
	</div>
</footer>
</div><!-- fim div#wrapper -->

<!-- Inclui todos os script do site -->
<?php get_template_part( 'template-parts/footer/footer', 'scripts' ); ?>

</body>
</html>