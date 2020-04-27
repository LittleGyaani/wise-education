<?php
/**
 * Footer Promotion
 *
 * @package bauer
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer or Metabox
if ( ! bauer_get_mod( 'promotion_box', false ) || ( is_page() && bauer_metabox('hide_footer_promo') ) )
	return false;

$html = '';


$subs_text = bauer_get_mod( 'promo_subs_text', 'Sign up today to receive our latest news, special offers and much more.' );
$heading = bauer_get_mod( 'promo_heading', 'Call us and get it done' );
$subheading = bauer_get_mod( 'promo_subheading', '' );
$button = bauer_get_mod( 'promo_button', 'Get A Quote' );
$button_url = bauer_get_mod( 'promo_button_url', '#' );
?>

<div class="footer-promotion" style="<?php echo bauer_element_bg_css('promo_background_img'); ?>">
	<?php
	if ( class_exists('MC4WP_MailChimp') ) {
		echo '<div class="bauer-subscribe">';
		echo '<div class="inner">';
		echo '<div class="heading-wrap"><div class="text">'. do_shortcode( $subs_text ) .'</div></div>';
		echo '<div class="form-wrap">';
		mc4wp_show_form(0);
		echo '</div></div></div>';
	} ?>
	<div class="bauer-container">
		<h5 class="promo-heading"><?php echo do_shortcode( $heading ); ?></h5>
		<div class="promo-sub-heading"><?php echo do_shortcode( $subheading ); ?></div>
		<div class="btn"><a href="<?php echo esc_url( $button_url ); ?>" class="promo-btn"><?php echo esc_html( $button ); ?></a></div>
	</div>
</div>