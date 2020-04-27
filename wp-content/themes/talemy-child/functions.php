<?php

function talemy_child_enqueue_styles() {
    wp_enqueue_style( 'talemy-child', get_stylesheet_directory_uri() . '/style.css', array( 'talemy' ) );
}
add_action( 'wp_enqueue_scripts', 'talemy_child_enqueue_styles', 100 );
