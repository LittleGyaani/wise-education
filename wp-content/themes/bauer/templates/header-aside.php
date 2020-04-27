<?php
/**
 * Header / Aside
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

$info_one = bauer_get_mod( 'aside_info_one', 'SO 9001<br />Certification' );
$info_two = bauer_get_mod( 'aside_info_two', '24/7<br />Service' );
$info_three = bauer_get_mod( 'aside_info_three', 'Qualified<br />Professionals' ); ?>

<?php if ( 'style-5' == $header_style || 'style-6' == $header_style ) : ?>
	<div id="header-aside">
        <div class="aside-content">
            <div class="inner">
                <?php
                    if ( $info_one )
                    printf('
                        <span class="info-one"><div class="info-wrap">
                            <div class="info-i"><span><i class="elegant-icon_box-checked"></i></span></div>
                            <div class="info-c">%1$s</div>
                        </div></span>',
                        do_shortcode( $info_one )
                    );
                    if ( $info_two )
                    printf('
                        <span class="info-two"><div class="info-wrap">
                            <div class="info-i"><span><i class="elegant-icon_clock_alt"></i></span></div>
                            <div class="info-c">%1$s</div>
                        </div></span>',
                        do_shortcode( $info_two )
                    );
                    if ( $info_three )
                    printf('
                        <span class="info-three"><div class="info-wrap">
                            <div class="info-i"><span><i class="elegant-icon_like"></i></span></div>
                            <div class="info-c">%1$s</div>
                        </div></span>',
                        do_shortcode( $info_three )
                    );
                ?>
            </div>
        </div>
	</div>
<?php else : ?>
    <?php get_template_part( 'templates/header-menu' ); ?>
<?php endif; ?>

