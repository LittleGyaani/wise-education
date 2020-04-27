<?php
/**
 * Top Bar / Socials
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer
if ( ! bauer_get_mod( 'top_bar_social', 'false' ) ) return false;

// Get content
$text = bauer_get_mod( 'top_bar_social_text', '' );
?>

<div class="top-bar-socials">
    <div class="inner">
    <?php
    // Top menu
    wp_nav_menu( array(
        'theme_location' => 'top',
        'fallback_cb'    => false,
        'container'      => false,
        'menu_class'     => 'top-bar-menu',
    ) );
    ?>
    
    <?php if ( $text ) : ?>
    <span class="text">
        <?php echo do_shortcode( $text ); ?>
    </span>
    <?php endif; ?>

    <span class="icons">
    <?php
    // Get social options array
    $profiles =  bauer_get_mod( 'top_bar_social_profiles' );
    $social_options = bauer_topbar_social_options();

    foreach ( $social_options as $key => $val ) :
        // Get URL from the theme mods
        $url = isset( $profiles[$key] ) ? $profiles[$key] : '';

        if ( $url ) :
            // Display link
            echo '<a href="'. esc_url( $url ) .'" title="'. esc_attr( $val['label'] ) .'"><span class="'. esc_attr( $val['icon_class'] ) .'" aria-hidden="true"></span><span class="screen-reader-text">'. $val['label'] .' '. esc_html__( 'Profile', 'bauer' ) .'</span></a>';
        endif;
    endforeach; ?>
    </span>
    </div>
</div><!-- /.top-bar-socials -->
