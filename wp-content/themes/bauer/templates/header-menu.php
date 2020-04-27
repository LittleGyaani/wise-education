<?php
/**
 * Header / Menu
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define & get variables
$logo_size = $menu = '';
$menu_logo_url = home_url( '/' );
$menu_logo = bauer_get_mod( 'mobile_menu_logo' );
$menu_logo_width = bauer_get_mod( 'mobile_menu_logo_width' );
$btn_text = bauer_get_mod( 'header_button_text' );
$btn_url = bauer_get_mod( 'header_button_url' );

if ( $menu_logo_width )
	$logo_size .= 'max-width:'. intval( $menu_logo_width ) .'px;';

if ( bauer_get_mod( 'header_button', false ) )
	echo '<div class="header-button"><a href="'. esc_url( $btn_url ) .'">'. esc_html( $btn_text ) .'</a></div>';

if ( bauer_get_mod( 'header_cart_icon', false ) )
	echo bauer_header_cart();

if ( bauer_get_mod( 'header_search_icon', false ) ) {
	echo '<div class="header-search-wrap"><a href="#" class="header-search-trigger"><span class="basicui-search"></span></a></div>';
} ?>

<ul class="nav-extend">
	<?php if ( $menu_logo ) : ?>
		<li class="ext menu-logo"><span class="menu-logo-inner" style="<?php echo esc_attr( $logo_size ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $menu_logo ); ?>"/></a></span></li>
	<?php endif; ?>

	<?php if ( bauer_get_mod( 'header_search_icon', false ) ) : ?>
	<li class="ext"><?php get_search_form(); ?></li>
	<?php endif; ?>

	<?php if ( class_exists( 'woocommerce' ) && bauer_get_mod( 'header_cart_icon', false ) ) : ?>
	<li class="ext"><a class="cart-info" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr__( 'View your shopping cart', 'bauer' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'bauer' ), WC()->cart->get_cart_contents_count() ); ?> <?php echo WC()->cart->get_cart_total(); ?></a></li>
	<?php endif; ?>
</ul>

<?php if ( is_page_template( 'templates/page-onepage.php' ) ) {
	$menu = 'onepage'; } else { $menu = 'primary'; }
?>

<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'onepage' ) ) : ?>
	<div class="mobile-button"><span></span></div>

	<nav id="main-nav" class="main-nav">
		<?php
		wp_nav_menu( array(
			'theme_location' => $menu,
			'link_before' => '<span>',
			'link_after'=>'</span>',
			'fallback_cb' => false,
			'container' => false
		) );
		?>
	</nav>
<?php endif; ?>
