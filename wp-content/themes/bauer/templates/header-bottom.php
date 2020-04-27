<?php
/**
 * Header / Bottom
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get header style
$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
if ( is_page() && bauer_metabox('header_style') )
	$header_style = bauer_metabox('header_style');

if ( 'style-1' == $header_style || 'style-2' == $header_style
	|| 'style-3' == $header_style || 'style-4' == $header_style ) 
	return;
?>

<div class="site-navigation-wrap">
<div class="bauer-container inner">
	<?php
	// Get Header menu
	get_template_part( 'templates/header-menu' ); ?>
</div>
</div>