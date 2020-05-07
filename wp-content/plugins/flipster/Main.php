<?php
/*
Plugin Name: Flipster
Description: Display CSS3 3D transform-based jQuery plugin built to replicate the familiar 'cover flow' effect on your website.
Version: 1.1.0
Plugin URI: 
Author: Pixel Margin
Author URI: 
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

define( 'FLIPSTER_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'FLIPSTER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/**
 * Returns current plugin version.
 * 
 * @return string Plugin version
 */
function flipster_plugin_get_version() {
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );	
	return $plugin_folder[$plugin_file]['Version'];
}

//function for adding option values
function flipster_register_settings() {
   
   add_option( 'flipster-image-gallery', '');   
   
   register_setting( 'flipster_options_group', 'flipster-image-gallery' );   
   
}
add_action( 'admin_init', 'flipster_register_settings' );


//function for register option page
function flipster_register_options_page() {
  add_options_page('Flipster Settings', 'Flipster', 'manage_options', 'flipster', 'flipster_options_page');
}
add_action('admin_menu', 'flipster_register_options_page');



function flipster_options_page() {    
    
?>
  <div>
  
  	<div>      
  
      <div>        
              
 
    <h1>Flipster</h1>
    <p>v<?=flipster_plugin_get_version();?> <a href="http://pixelmargin.com/" target="_blank">pixelmargin.com</a></p>
    <p>Display CSS3 3D transform-based jQuery plugin built to replicate the familiar 'cover flow' effect on your website.</p> 
	<p>Shortcode: [flipster_image_gallery]</p>
	
   </div>
   </div>
   <br clear="all">
   	
      
      <div style="float:left;width:33%;min-width:500px;">
          <hr>
          <h2>Settings</h2> 
          <form method="post" action="options.php">
          <?php settings_fields( 'flipster_options_group' ); ?>           
          <div>
              <p>Please select the checkbox and click save changes to show Flipster gallery</p>
	          <div style="width:150px;float:left;"><strong>Post Types</strong></div>
	          <div style="float:left;">
	          <?php
			          // post and page defaults
				$defaults['post_types']['post'] = 'on';
				$defaults['post_types']['page'] = 'on';
			
				$settings = (array) get_option( 'flipster-image-gallery', $defaults );
			
			?>
					<?php foreach ( flipster_get_post_types() as $key => $label ) {
			
					$post_types = isset( $settings['post_types'][ $key ] ) ? esc_attr( $settings['post_types'][ $key ] ) : '';
			
			?>
					<p>
						<input type="checkbox" id="<?php echo $key; ?>" name="flipster-image-gallery[post_types][<?php echo $key; ?>]" <?php checked( $post_types, 'on' ); ?>/><label for="<?php echo $key; ?>"> <?php echo $label; ?></label>
					</p>
					<?php } ?>
				</div>	
          </div>
          <br clear="all">
          
          <?php  submit_button(); ?>
          </form>      
      </div>   
         
</div> 
<br clear="all"><hr>
      <p><a href="http://pixelmargin.com/" target="_blank">Visit the pixel margin website for further information</a>.
      <br>Flipster is written and developed by <a href="http://pixelmargin.com/" target="_blank">pixelmargin</a>.</p>
    <?
}

$flipster_code =  get_option('flipster_code');


//Add settings link to plugin page
function flipster_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=flipster">' . __( 'Settings' ) . '</a>';    
    array_unshift($links, $settings_link);
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'flipster_add_settings_link' );

//including custom functions and shortcodes required for the plugin
include_once("functions.php");
include_once("Shortcodes.php");