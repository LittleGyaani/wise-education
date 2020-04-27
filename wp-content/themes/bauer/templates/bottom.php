<?php
/**
 * Bottom Bar
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer
if ( ! bauer_get_mod( 'bottom_bar', true ) ) return false;

$css = bauer_element_bg_css('bottom_background_img');
$copyright = bauer_get_mod( 'bottom_copyright', '&copy; Bauer Construction. All rights reserved.' );

if ( is_page() && $bottom_bg = bauer_metabox('bottom_bg') )
    $css .= 'background-color:'. $bottom_bg .';';
?>

<div id="bottom" style="<?php echo esc_attr( $css ); ?>" >
    <div class="bauer-container">
        <div class="bottom-bar-inner-wrap">
            <div class="bottom-bar-copyright">
                <?php
                if ( $copyright ) : ?>
                    <div id="copyright">
                        <?php printf( '%s', do_shortcode( $copyright ) ); ?>
                    </div>
                <?php endif; ?>
            </div><!-- /.bottom-bar-copyright -->

            <div class="bottom-bar-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'bottom',
                    'fallback_cb'    => false,
                    'container'      => false,
                    'menu_class'     => 'bottom-nav',
                ) );
                ?>
            </div><!-- /.bottom-bar-menu -->
        </div>
    </div>
</div><!-- /#bottom -->