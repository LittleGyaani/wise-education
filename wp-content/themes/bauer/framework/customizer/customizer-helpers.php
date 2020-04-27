<?php

/* Top Bar
-------------------------------------------------------------- */
function bauer_cac_has_topbar() {
	$topbar_style = bauer_get_mod( 'top_bar_site_style', 'hide' );
	if ( is_page() && bauer_metabox('top_bar_style') )
		$topbar_style = bauer_metabox('top_bar_style');

	if ( 'hide' != $topbar_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_topbar_one() {
	$topbar_style = bauer_get_mod( 'top_bar_site_style', 'hide' );
	if ( is_page() && bauer_metabox('top_bar_style') )
		$topbar_style = bauer_metabox('top_bar_style');

	if ( 'style-1' == $topbar_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_topbar_two() {
	$topbar_style = bauer_get_mod( 'top_bar_site_style', 'hide' );
	if ( is_page() && bauer_metabox('top_bar_style') )
		$topbar_style = bauer_metabox('top_bar_style');

	if ( 'style-2' == $topbar_style ) { return true;
	} else { return false; }
}

/* Headers
-------------------------------------------------------------- */
function bauer_cac_has_header_one() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-1' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_header_two() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-2' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_header_three() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-3' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_header_four() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-4' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_header_five() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-5' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_has_header_six() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-6' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_header_has_normal() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-1' == $header_style || 'style-2' == $header_style || 'style-3' == $header_style || 'style-4' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_header_has_aside() {
	$header_style = bauer_get_mod( 'header_site_style', 'style-1' );
	if ( is_page() && bauer_metabox('header_style') )
		$header_style = bauer_metabox('header_style');

	if ( 'style-5' == $header_style || 'style-6' == $header_style ) { return true;
	} else { return false; }
}

function bauer_cac_header_search_icon() {
	return get_theme_mod( 'header_search_icon', true );
}

function bauer_cac_header_cart_icon() {
	if ( class_exists( 'woocommerce' ) && get_theme_mod( 'header_cart_icon', true ) ) {
		return true;	
	} else {
		return false;
	}
}

function bauer_cac_header_button() {
	return get_theme_mod( 'header_button', true );
}

function bauer_cac_has_header_fixed() {
	return get_theme_mod( 'header_fixed', true );
}

/* WooCommerce
-------------------------------------------------------------- */
function bauer_cac_has_woo() {
	if ( class_exists( 'woocommerce' ) ) { return true;	}
	else { return false; }
}

/* Scroll Top Button
-------------------------------------------------------------- */
function bauer_cac_has_scroll_top() {
	return get_theme_mod( 'scroll_top', true );
}

/* Layout
-------------------------------------------------------------- */
function bauer_cac_has_boxed_layout() {
	if ( 'boxed' == get_theme_mod( 'site_layout_style', 'full-width' ) ) {
		return true;
	} else {
		return false;
	}
}

/* Featured Title
-------------------------------------------------------------- */
function bauer_cac_has_featured_title() {
	return get_theme_mod( 'featured_title', true );
}

function bauer_cac_has_featured_title_center() {
	if ( bauer_cac_has_featured_title_heading()
		&& 'centered' == get_theme_mod( 'featured_title_style' ) ) {
		return true;
	} else {
		return false;
	}
}

function bauer_cac_has_featured_title_breadcrumbs() {
	if ( bauer_cac_has_featured_title() && get_theme_mod( 'featured_title_breadcrumbs' ) ) {
		return true;
	} else {
		return false;
	}
}

function bauer_cac_has_featured_title_heading() {
	if ( bauer_cac_has_featured_title() && get_theme_mod( 'featured_title_heading' ) ) {
		return true;
	} else {
		return false;
	}
}

/* Project Single
-------------------------------------------------------------- */
function bauer_cac_has_single_project() {
	if ( is_singular('project') ) {
		return true;
	} else {
		return false;
	}
}

function bauer_cac_has_related_project() {
	if ( bauer_get_mod( 'project_related', true ) && bauer_cac_has_single_project() ) {
		return true;
	};
}

/* Footer
-------------------------------------------------------------- */
function bauer_cac_has_footer_widgets() {
	return get_theme_mod( 'footer_widgets', true );
}

function bauer_cac_has_footer_promo() {
	return get_theme_mod( 'promotion_box', true );
}

/* Bottom Bar
-------------------------------------------------------------- */
function bauer_cac_has_bottombar() {
	return get_theme_mod( 'bottom_bar', true );
}