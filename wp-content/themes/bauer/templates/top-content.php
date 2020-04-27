<?php
/**
 * Top Bar / Content
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get top content
$custom = bauer_get_mod( 'top_bar_content_custom', '' );
$phone = bauer_get_mod( 'top_bar_content_phone', '(+1) 212-946-2707' );
$email = bauer_get_mod( 'top_bar_content_email', 'info@BauerX.com' );
$address = bauer_get_mod( 'top_bar_content_address', '112 W 34th St, New York' );
?>

<div class="top-bar-content">
    <?php
    // Top content
    if ( $custom ) : ?>
        <span class="custom content">
            <?php echo do_shortcode( $custom ); ?>
        </span>
    <?php endif;

    if ( $phone ) : ?>
        <span class="phone content">
            <?php echo do_shortcode( $phone ); ?>
        </span>
    <?php endif;

    if ( $email ) : ?>
        <span class="email content">
            <?php echo do_shortcode( $email ); ?>
        </span>
    <?php endif;

    if ( $address ) : ?>
        <span class="address content">
            <?php echo do_shortcode( $address ); ?>
        </span>
    <?php endif; ?>
</div><!-- /.top-bar-content -->

