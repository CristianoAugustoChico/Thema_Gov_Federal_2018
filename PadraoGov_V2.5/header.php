<?php
/**
 * Theme header/menu/logo
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
 ?>
<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="pt-br" dir="ltr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="keywords"	content="" />
	<meta name="author"		content="Cristiano Augusto - Centro de Ciência do Sistema Terrestre" />
	<meta name="viewport"	content="width=device-width, initial-scale=1.0" />
	<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
	<!-- chamada de fontes externas --><link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,800,700' rel='stylesheet' type='text/css' />

	<!-- O charset padrão -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/img/favicon.ico" type="image/x-icon">

	<!-- O título do blog -->
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5V3SDH3');</script>
<!-- End Google Tag Manager -->

</head>

<!-- Início do body -->
<body <?php body_class(); ?> >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5V3SDH3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- topo padrão governo federal -->
<a class="hide" id="topo" href="#accessibility">Ir direto para menu de acessibilidade.</a>
	<noscript>
		<div class="error minor-font">
			Seu navegador de internet está sem suporte à JavaScript. Por esse motivo algumas funcionalidades do site podem não estar acessíveis.
		</div>
	</noscript>
	<!--[if lt IE 7]><center><strong>Atenção, a versão de seu navegador não é compatível com este sítio. Atualize seu navegador.</strong></center><![endif]-->
	<!-- barra do governo -->
	<div id="barra-brasil">
		<a href="http://brasil.gov.br" title="Acesse para conhecer todos os serviços e informações do Governo Brasileiro na Internet.">Portal do Governo Brasileiro</a>
	</div>
	<!-- fim barra do governo -->
	<div class="layout">
		<header>
			<div class="container"> 
				<div class="row-fluid accessibility-language-actions-container">
					<!-- accessibility -->
					<?php get_template_part( 'template-parts/header/header', 'accessibility' ); ?>
				</div>
				<!-- fim .row-fluid -->
				<div class="row-fluid">
					<div id="logo" class="span8">
						<!-- logo -->
						<?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
					</div>
					<!-- fim .span8 -->
					<div class="span4">
						<div id="portal-searchbox" class="row">
							<?php get_search_form(); ?>
						</div>
						<!-- fim div#portal-searchbox.row -->
						<div id="social-icons" class="row">
							<?php get_template_part('template-parts/header/header', 'social' ); ?>
						</div>
						<!-- fim div#social-icons.row -->
					</div>
					<!-- fim .span4 -->
				</div>
				<!-- fim .row-fluid -->
			</div>
			<!-- fim div.container -->

			<!-- Menu principal -->
			<?php get_template_part('template-parts/header/header', 'nav' ); ?>
		</header>
	</div>

<div class="layout">
	<main> 
		<div class="container">
			<!-- migalha -->
			<?php get_template_part('template-parts/header/header', 'breadcrumbs'); ?>
			<div class="row-fluid">
				<?php get_sidebar(); ?> <!-- menu principal -->
