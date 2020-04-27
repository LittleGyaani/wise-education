<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( class_exists('MC4WP_MailChimp') ) {
	echo '<div class="bauer-subscribe clearfix">';
	echo '<div class="form-wrap">';
	mc4wp_show_form(0);
	echo '</div>';
	echo '</div>';
}