<?php
/**
 * Theme searchform
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

<form action="/" method="get" accept-charset="utf-8" id="searchform" role="search" class="pull-right">
	<fieldset>
		<legend class="hide">Busca</legend>
		<h2 class="hidden">Buscar no portal</h2>
		<div class="input-append">
			<label for="portal-searchbox-field" class="hide">Busca:</label>
			<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="Buscar no portal" class="searchField" title="Buscar no portal"  >
			<button type="submit" id="searchsubmit" class="btn searchButton"><span class="hide">Buscar</span><i class="icon-search"></i></button>
		</div>
	</fieldset>
</form>