<?php
/**
 * Accent color
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'Bauer_Accent_Color' ) ) {
	class Bauer_Accent_Color {
		// Main constructor
		public function __construct() {
			add_filter( 'bauer_custom_colors_css', array( 'Bauer_Accent_Color', 'generate' ), 1 );
		}

		// Generates arrays of elements to target
		private static function arrays( $return ) {
			// Color
			$texts = apply_filters( 'bauer_accent_texts', array(
				'.text-accent-color',
				'#top-bar .top-bar-content .content:before',
				'.top-bar-style-1 #top-bar .top-bar-socials .icons a:hover',
				'.top-bar-style-2 #top-bar .top-bar-socials .icons a:hover',
				'.sticky-post',
				'#site-logo .site-logo-text:hover',
				'#main-nav .sub-menu li a:hover',
				'.header-style-1 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-1 #site-header .header-search-trigger:hover',
				'.header-style-2 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-2 #site-header .header-search-trigger:hover',
				'.header-style-3 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-3 #site-header .header-search-trigger:hover',
				'.header-style-3 #site-header .header-button a',
				'.header-style-4 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-4 #site-header .header-search-trigger:hover',
				'.header-style-5 #site-header .nav-cart-trigger:hover',
				'.header-style-5 #site-header .header-search-trigger:hover',
				'.header-style-6 #site-header .nav-cart-trigger:hover',
				'.header-style-6 #site-header .header-search-trigger:hover',
				'#header-aside .aside-content .info-i span',
				'#featured-title #breadcrumbs a:hover',
				'.hentry .page-links span',
				'.hentry .page-links a span',
				'.hentry .post-title a:hover',
				'.hentry .post-meta a:hover',
				'.hentry .post-meta .item .inner:before',
				'.hentry .post-link a:hover',
				'.hentry .post-tags:before',
				'.hentry .post-tags a:hover',
				'.related-news .post-item h3 a:hover',
				'.related-news .related-post .slick-next:hover:before',
				'.related-news .related-post .slick-prev:hover:before',
				'.comment-reply a',
				'#cancel-comment-reply-link',
				'.widget.widget_archive ul li a:hover',
				'.widget.widget_categories ul li a:hover',
				'.widget.widget_meta ul li a:hover',
				'.widget.widget_nav_menu ul li a:hover',
				'.widget.widget_pages ul li a:hover',
				'.widget.widget_recent_entries ul li a:hover',
				'.widget.widget_recent_comments ul li a:hover',
				'.widget.widget_rss ul li a:hover',
				'#footer-widgets .widget.widget_archive ul li a:hover',
				'#footer-widgets .widget.widget_categories ul li a:hover',
				'#footer-widgets .widget.widget_meta ul li a:hover',
				'#footer-widgets .widget.widget_nav_menu ul li a:hover',
				'#footer-widgets .widget.widget_pages ul li a:hover',
				'#footer-widgets .widget.widget_recent_entries ul li a:hover',
				'#footer-widgets .widget.widget_recent_comments ul li a:hover',
				'#footer-widgets .widget.widget_rss ul li a:hover',
				'#sidebar .widget.widget_calendar caption',
				'#footer-widgets .widget.widget_calendar caption',
				'.widget.widget_nav_menu .menu > li.current-menu-item > a',
				'.widget.widget_nav_menu .menu > li.current-menu-item',
				'#sidebar .widget.widget_calendar tbody #today',
				'#sidebar .widget.widget_calendar tbody #today a',
				'#sidebar .widget.widget_twitter .timestamp a:hover',
				'#footer-widgets .widget.widget_twitter .timestamp a:hover',
				'#footer-widgets .widget.widget_mc4wp_form_widget .mc4wp-form .submit-wrap > button',
				'#sidebar .widget.widget_socials .socials a:hover',
				'#footer-widgets .widget.widget_socials .socials a:hover',
				'#sidebar .widget.widget_recent_posts h3 a:hover',
				'#footer-widgets .widget.widget_recent_posts h3 a:hover',
				'#sidebar .widget_information ul li.accent-icon i',
				'#footer-widgets .widget_information ul li.accent-icon i',

				// shortcodes
				'.bauer-accordions .accordion-item .accordion-heading:hover',
				'.bauer-accordions .accordion-item.style-1.active .accordion-heading',
				'.bauer-accordions .accordion-item.style-1.active .accordion-heading > .inner:before',
				'.bauer-step-box .number-box .number',
				'.bauer-links.accent',
				'.bauer-links:hover',
				'.bauer-button.outline.outline-accent',
				'.bauer-button.outline.outline-accent .icon',
				'.bauer-counter .icon.accent',
				'.bauer-counter .prefix.accent',
				'.bauer-counter .suffix.accent',
				'.bauer-counter .number.accent',
				'.bauer-divider.has-icon .icon-wrap > span.accent',
				'.bauer-single-heading .heading.accent',
				'.bauer-headings .heading.accent',
				'.bauer-image-box.style-1 .item .title a:hover',
				'.bauer-image-box.style-3 .item .title a:hover',
				'.bauer-icon.accent > .icon',
				'.bauer-progress .perc.accent',
				'#project-filter .cbp-filter-item:hover',
				'#project-filter .cbp-filter-item.cbp-filter-item-active',
				'.project-related-wrap .btn-wrap a',
				'.project-related-wrap .project-item .cat a',
				'.project-related-wrap .project-item h2 a:hover',
				'.wpb_row.row-has-scroll .scroll-btn:hover:before',
				'.bauer-team .socials li a:hover',
				'.bauer-team-grid .socials li a:hover',
				'.bauer-testimonials .name-pos .position',
				'.bauer-list .icon.accent',
				'.bauer-pricing .title.accent h3',
				'.owl-theme .owl-nav [class*="owl-"]:hover:after',
				'.et-tabs-style-line nav ul li.tab-current .iw-icon',

				 // Woocommerce
				'.woocommerce-page .woocommerce-MyAccount-content .woocommerce-info .button',
				'.products li .product-info .button',
				'.products li .product-info .added_to_cart',
				'.products li h2:hover',
				'.woo-single-post-class .woocommerce-grouped-product-list-item__label a:hover',
				'.woocommerce-page .shop_table.cart .product-name a:hover',
				'.woocommerce-page .shop_table.cart .product-remove a:after',
				'.product_list_widget .product-title:hover',
				'.widget_recent_reviews .product_list_widget a:hover',
				'.widget.widget_product_search .woocommerce-product-search .search-submit:hover:before',
				'.widget_shopping_cart_content ul li a:hover',
				'.widget_shopping_cart_content ul li a.remove',
				'.widget_shopping_cart_content .buttons a.checkout',

				 // Default Link
				 'a',
			) );

			// Background color
			$backgrounds = apply_filters( 'bauer_accent_backgrounds', array(
				'bg-accent',
				'blockquote:before',
				'button, input[type="button"], input[type="reset"], input[type="submit"]',
				'.tparrows.custom:hover',
				'.header-style-1 #site-header .header-button a',
				'.header-style-2 #site-header .header-button a',
				'.header-style-3 #site-header .header-button a:hover',
				'.header-style-5 #site-header .header-button a',
				'.header-style-6 #site-header .header-button a',
				'.cur-menu-1 #main-nav > ul > li > a:before',
				'.cur-menu-1 #main-nav > ul > li.current-menu-item > a:before',
				'.cur-menu-1 #main-nav > ul > li.current-menu-parent > a:before',
				'.cur-menu-2 #main-nav > ul > li > a span:before',
				'.cur-menu-2 #main-nav > ul > li.current-menu-item > a span:before',
				'.cur-menu-2 #main-nav > ul > li.current-menu-parent > a span:before',
				'#featured-title.center .main-title:before',
				'.post-media .slick-prev:hover',
				'.post-media .slick-next:hover',
				'.post-media .slick-dots li.slick-active button',
				'.comment-reply a:after',
				'#cancel-comment-reply-link:after',
				'.widget.widget_categories ul li > span',
				'.widget.widget_archive ul li > span',
				'.widget.widget_search .search-form .search-submit:before',
				'#sidebar .mc4wp-form .submit-wrap button:before',
				'#footer-widgets .widget.widget_mc4wp_form_widget .mc4wp-form .submit-wrap > button:hover',
				'#sidebar .widget.widget_recent_posts .recent-news .thumb.icon',
				'#footer-widgets .widget.widget_recent_posts .recent-news .thumb.icon',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',
				'#scroll-top:hover:before',
				'.bauer-pagination ul li a.page-numbers:hover',
				'.woocommerce-pagination .page-numbers li .page-numbers:hover',
				'.bauer-pagination ul li .page-numbers.current',
				'.woocommerce-pagination .page-numbers li .page-numbers.current',
				'.no-results-content .search-form .search-submit:before',
				'.footer-promotion .promo-btn',

				// shortcodes
				'.bauer-accordions .accordion-item.style-2.active .accordion-heading',
				'.bauer-step-box .number-box:hover .number',
				'.bauer-button.accent',
				'.bauer-button.outline.outline-accent:hover',
				'.bauer-content-box > .inner.accent',
				'.bauer-content-box > .inner.dark-accent',
				'.bauer-content-box > .inner.light-accent',
				'.bauer-tabs.style-2 .tab-title .item-title.active',
				'.bauer-tabs.style-3 .tab-title .item-title.active',
				'.bauer-single-heading .line.accent',
				'.bauer-headings .sep.accent',
				'.bauer-headings .heading > span',
				'.bauer-image-box.style-3.has-number:hover .number',
				'.bauer-images-grid .cbp-nav-next:hover:after',
				'.bauer-images-grid .cbp-nav-prev:hover:after',
				'.bauer-icon.accent-bg > .icon',
				'#project-filter .cbp-filter-item > span:after',
				'.project-box .project-image .icons a:hover',
				'.project-related-wrap .btn-wrap a:hover',
				'.bauer-progress .progress-animate:after',
				'.bauer-progress .progress-animate.accent',
				'.bauer-images-carousel.has-borders:after',
				'.bauer-images-carousel.has-borders:before',
				'.bauer-images-carousel.has-arrows.arrow-bottom .owl-nav',
				'.bauer-subscribe .mc4wp-form .email-wrap input:focus',
				'.bauer-video-icon.accent a',
				'.et-tabs-style-line nav ul li.tab-current:after',

				// woocemmerce
				'.woocommerce-page .wc-proceed-to-checkout .button',
				'.woocommerce-page #payment #place_order',
				'.widget_price_filter .price_slider_amount .button:hover',
			) );

			// Border color
			$borders = apply_filters( 'bauer_accent_borders', array(
				'.animsition-loading:after' => array( 'top' ),
				'.underline-solid:after, .underline-dotted:after, .underline-dashed:after' => array( 'bottom' ),
				'.header-style-3 #site-header .header-button a',
				'.widget.widget_search .search-form .search-field:focus',
				'#sidebar .mc4wp-form .email-wrap input:focus',
				'#footer-widgets .widget.widget_mc4wp_form_widget .mc4wp-form .submit-wrap > button',
				'.no-results-content .search-form .search-field:focus',

				// shortcodes
				'.bauer-step-box .number-box .number',
				'.bauer-button.outline.outline-accent',
				'.bauer-button.outline.outline-accent:hover',
				'.divider-icon-before.accent',
				'.divider-icon-after.accent',
				'.bauer-divider.has-icon .divider-double.accent',
				'.bauer-tabs.style-2 .tab-title .item-title.active > span' => array( 'top' ),
				'.bauer-icon-box.hover-style-1:hover > .hover' => array( 'bottom' ),
				'.bauer-icon-box.hover-style-2:hover > .hover' => array( 'bottom' ),
				'.bauer-image-box.style-2 .item .thumb:after' => array( 'bottom' ),
				'.bauer-team.style-1 .member-item .text-wrap' => array( 'bottom' ),
				'.bauer-team.style-2 .member-item .text-wrap' => array( 'bottom' ),
				'.bauer-testimonials.style-1:hover .inner' => array( 'bottom' ),
				'.bauer-testimonials-g3 .avatar-wrap img:hover',
				'.bauer-testimonials-g3 .avatar-wrap a.active img',
				'.bauer-video-icon.white a:after' => array( 'left' ),
				'.owl-theme .owl-dots .owl-dot span',
				'.owl-theme .owl-dots .owl-dot.active span',

				// woocommerce
				'.widget_price_filter .price_slider_amount .button:hover',
				'.widget_price_filter .ui-slider .ui-slider-handle',
				'.widget_shopping_cart_content .buttons a.checkout',
			) );

			// Gradient color
			$gradients = apply_filters( 'bauer_accent_gradient', array(
				'.bauer-progress .progress-animate.accent.gradient'
			) );
			$gradients2 = apply_filters( 'bauer_accent_gradient2', array(
				'.bauer-step-box:before'
			) );

			// Return array
			if ( 'texts' == $return ) {
				return $texts;
			} elseif ( 'backgrounds' == $return ) {
				return $backgrounds;
			} elseif ( 'borders' == $return ) {
				return $borders;
			} elseif ( 'gradients' == $return ) {
				return $gradients;
			} elseif ( 'gradients2' == $return ) {
				return $gradients2;
			}
		}

		// Generates the CSS output
		public static function generate( $output ) {

			// Get custom accent
			$default_accent = '#f35c27';
			$custom_accent  = bauer_get_mod( 'accent_color' );

			// Return if accent color is empty or equal to default
			if ( ! $custom_accent || ( $default_accent == $custom_accent ) )
				return $output;

			// Define css var
			$css = '';

			// Get arrays
			$texts       = self::arrays( 'texts' );
			$backgrounds = self::arrays( 'backgrounds' );
			$borders     = self::arrays( 'borders' );
			$gradients    = self::arrays( 'gradients' );
			$gradients2    = self::arrays( 'gradients2' );

			// Texts
			if ( ! empty( $texts ) )
				$css .= implode( ',', $texts ) .'{color:'. $custom_accent .';}';

			// Backgrounds
			if ( ! empty( $backgrounds ) )
				$css .= implode( ',', $backgrounds ) .'{background-color:'. $custom_accent .';}';

			// Borders
			if ( ! empty( $borders ) ) {
				foreach ( $borders as $key => $val ) {
					if ( is_array( $val ) ) {
						$css .= $key .'{';
						foreach ( $val as $key => $val ) {
							$css .= 'border-'. $val .'-color:'. $custom_accent .';';
						}
						$css .= '}'; 
					} else {
						$css .= $val .'{border-color:'. $custom_accent .';}';
					}
				}
			}

			// Gradients
			if ( ! empty( $gradients ) )
				$css .= implode( ',', $gradients ) .'{background: '. bauer_hex2rgba($custom_accent, 1) .';background: -moz-linear-gradient(left, '. bauer_hex2rgba($custom_accent, 1) .' 0%, '. bauer_hex2rgba($custom_accent, 0.3) .' 100%);background: -webkit-linear-gradient( left, '. bauer_hex2rgba($custom_accent, 1) .' 0%, '. bauer_hex2rgba($custom_accent, 0.3) .' 100% );background: linear-gradient(to right, '. bauer_hex2rgba($custom_accent, 1) .' 0%, '. bauer_hex2rgba($custom_accent, 0.3) .' 100%) !important;}';

			if ( ! empty( $gradients2 ) )
				$css .= implode( ',', $gradients2 ) .'{background: linear-gradient(45deg, #fff 0%, '. $custom_accent .' 10%, '. $custom_accent .' 90%, #fff 100%); background: -webkit-linear-gradient(45deg, #fff 0%, '. $custom_accent .' 10%, '. $custom_accent .' 90%, #fff 100%) !important;}';

			// Return CSS
			if ( ! empty( $css ) )
				$output .= '/*ACCENT COLOR*/'. $css;

			// Return output css
			return $output;
		}
	}
}

new Bauer_Accent_Color();