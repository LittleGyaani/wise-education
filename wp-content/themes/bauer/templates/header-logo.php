<?php
/**
 * Header / Logo
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define variables
$logo_url = home_url( '/' );
$logo_title = get_bloginfo( 'name' );

// Get logo size
$logo_size = '';

// Get header style
$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
if ( is_page() && bauer_metabox('header_style') )
	$header_style = bauer_metabox('header_style');

switch ( $header_style ) {
    case "style-2":
		$logo_img = bauer_get_mod( 'custom_logotwo' );
		$logo_width = bauer_get_mod( 'logotwo_width' );
        break;
    case "style-3":
		$logo_img = bauer_get_mod( 'custom_logothree' );
		$logo_width = bauer_get_mod( 'logothree_width' );
        break;
    case "style-4":
		$logo_img = bauer_get_mod( 'custom_logofour' );
		$logo_width = bauer_get_mod( 'logofour_width' );
        break;
    case "style-5":
		$logo_img = bauer_get_mod( 'custom_logofive' );
		$logo_width = bauer_get_mod( 'logofive_width' );
        break;
    case "style-6":
		$logo_img = bauer_get_mod( 'custom_logosix' );
		$logo_width = bauer_get_mod( 'logosix_width' );
        break;
    default:
		$logo_img = bauer_get_mod( 'custom_logo' );
		$logo_width = bauer_get_mod( 'logo_width' );
} 

if ( $logo_width ) $logo_size .= 'max-width:'. intval( $logo_width ) .'px;';
?>

<div id="site-logo">
	<div id="site-logo-inner" style="<?php echo esc_attr( $logo_size ); ?>">
		<?php if ( $logo_img ) : ?>
			<a href="<?php echo esc_url( $logo_url ); ?>" title="<?php echo esc_attr( $logo_title ); ?>" rel="home" class="main-logo"><img src="<?php echo esc_url( $logo_img ); ?>" alt="<?php echo esc_attr( $logo_title ); ?>" /></a>
		<?php else : ?>
			<a href="<?php echo esc_url( $logo_url ); ?>" title="<?php echo esc_attr( $logo_title ); ?>" rel="home" class="site-logo-text"><?php echo esc_html( $logo_title ); ?></a>
		<?php endif; ?>
	</div>
</div><!-- #site-logo -->