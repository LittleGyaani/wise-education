<?php 

if( !defined( 'ABSPATH' ) ) exit();


if( !class_exists( 'OVAPO_Admin_Settings' ) ){

	/**
	 * Make Admin Class
	 */
	class OVAPO_Admin_Settings{

		/**
		 * Construct Admin
		 */
		public function __construct(){

			add_action( 'admin_enqueue_scripts', array( $this, 'ovapo_load_media' ) );
			add_action( 'admin_init', array( $this, 'register_options' ) );

		}


		public function ovapo_load_media() {
			wp_enqueue_media();
		}

		public function print_options_section(){
			return true;
		}

		public function register_options(){

			register_setting(
				'ovapo_options_group', // Option group
				'ovapo_options', // Name Option
				array( $this, 'settings_callback' ) // Call Back
			);

			/**
			 * General Settings
			 */
			add_settings_section(
				'ovapo_general_section_id', // ID
				esc_html__('General Setting', 'ova-portfolio'), // Title
				array( $this, 'print_options_section' ),
				'ovapo_general_settings' // Page
			);

			add_settings_field(
				'ovapo_portfolio_post_type_rewrite_slug', // ID
				esc_html__('Rewrite Slug','ova-portfolio'),
				array( $this, 'ovapo_portfolio_post_type_rewrite_slug' ),
				'ovapo_general_settings', // Page
				'ovapo_general_section_id' // Section ID
			);

			add_settings_field(
				'archive_portfolio_orderby', // ID
				esc_html__('Orderby','ova-portfolio'),
				array( $this, 'archive_portfolio_orderby' ),
				'ovapo_general_settings', // Page
				'ovapo_general_section_id' // Section ID
			);

			add_settings_field(
				'archive_portfolio_order', // ID
				esc_html__('Order','ova-portfolio'),
				array( $this, 'archive_portfolio_order' ),
				'ovapo_general_settings', // Page
				'ovapo_general_section_id' // Section ID
			);

			add_settings_field(
				'archive_portfolio_type', // ID
				esc_html__('Archive Template Type','ova-portfolio'),
				array( $this, 'archive_portfolio_type' ),
				'ovapo_general_settings', // Page
				'ovapo_general_section_id' // Section ID
			);

		}

		public function settings_callback( $input ){

			$new_input = array();

			if( isset( $input['ovapo_portfolio_post_type_rewrite_slug'] ) )
				$new_input['ovapo_portfolio_post_type_rewrite_slug'] = sanitize_text_field( $input['ovapo_portfolio_post_type_rewrite_slug'] ) ? sanitize_text_field( $input['ovapo_portfolio_post_type_rewrite_slug'] ) : 'portfolio';

			if( isset( $input['archive_portfolio_orderby'] ) )
				$new_input['archive_portfolio_orderby'] = sanitize_text_field( $input['archive_portfolio_orderby'] ) ? sanitize_text_field( $input['archive_portfolio_orderby'] ) : 'date';

			if( isset( $input['archive_portfolio_order'] ) )
				$new_input['archive_portfolio_order'] = sanitize_text_field( $input['archive_portfolio_order'] ) ? sanitize_text_field( $input['archive_portfolio_order'] ) : 'ASC';

			if( isset( $input['archive_portfolio_type'] ) )
				$new_input['archive_portfolio_type'] = sanitize_text_field( $input['archive_portfolio_type'] ) ? sanitize_text_field( $input['archive_portfolio_type'] ) : 'type1';

			return $new_input;
		}


		public static function create_admin_setting_page() { ?>
			<div class="wrap">
				<h1><?php esc_html_e( "Portfolio Settings", "ova-portfolio" ); ?></h1>

				<form method="post" action="options.php">
					<div id="tabs">
						<?php settings_fields( 'ovapo_options_group' ); // Options group ?>

						<!-- Menu Tab -->
						<ul>
							<li><a href="#ovapo_general_settings"><?php esc_html_e( 'General Settings', 'ova-portfolio' ); ?></a></li>
						</ul>

						<!-- General Tab Content -->  
						<div id="ovapo_general_settings" class="ovapo_admin_settings">
							<?php do_settings_sections( 'ovapo_general_settings' ); // Page ?>
						</div>

					</div>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php }

		/***** General Settings *****/
		public function ovapo_portfolio_post_type_rewrite_slug(){
			$ovapo_portfolio_post_type_rewrite_slug = esc_attr( OVAPO_Settings::ovapo_portfolio_post_type_rewrite_slug() );
			printf(
				'<input type="text"  id="ovapo_portfolio_post_type_rewrite_slug" name="ovapo_options[ovapo_portfolio_post_type_rewrite_slug]" value="%s" />',
				isset( $ovapo_portfolio_post_type_rewrite_slug ) ? $ovapo_portfolio_post_type_rewrite_slug : 'portfolio'
			);
			echo '<span >'.esc_html__(' Name should only contain lowercase letters and the underscore character, and not be more than 32 characters long and  without any spaces', 'ova-portfolio').'<span>';
		}

		public function archive_portfolio_orderby(){
			$archive_portfolio_orderby = OVAPO_Settings::archive_portfolio_orderby();
			$archive_portfolio_orderby = isset( $archive_portfolio_orderby ) ? $archive_portfolio_orderby : 'date';
			
			$title = ( 'title' == $archive_portfolio_orderby) ? 'selected' : '';
			$date  = ( 'date' == $archive_portfolio_orderby) ? 'selected' : '';
			$id    = ( 'ID' == $archive_portfolio_orderby) ? 'selected' : '';

			?>
			<select name="ovapo_options[archive_portfolio_orderby]" id="archive_portfolio_orderby">
				<option <?php echo esc_attr($title) ?> value="title"><?php echo esc_html__('Title', 'ova-portfolio') ?></option>
				<option <?php echo esc_attr($date) ?> value="date"><?php echo esc_html__('Date', 'ova-portfolio') ?></option>
				<option <?php echo esc_attr($id) ?> value="ID"><?php echo esc_html__('ID', 'ova-portfolio') ?></option>
			</select>
			<?php
		}

		public function archive_portfolio_order(){
			$archive_portfolio_order = OVAPO_Settings::archive_portfolio_order(); 	
			$archive_portfolio_order = isset( $archive_portfolio_order ) ? $archive_portfolio_order : 'ASC';

			$asc_selected  = ('ASC' == $archive_portfolio_order) ? 'selected' : '';
			$desc_selected = ('DESC' == $archive_portfolio_order) ? 'selected' : '';

			?>
			<select name="ovapo_options[archive_portfolio_order]" id="archive_portfolio_order">
				<option <?php echo esc_attr($asc_selected) ?> value  ="ASC"><?php echo esc_html__('Increase', 'ova-portfolio') ?></option>
				<option <?php echo esc_attr($desc_selected) ?> value ="DESC"><?php echo esc_html__('Decrease', 'ova-portfolio') ?></option>
			</select>
			<?php
		}

		public function archive_portfolio_type(){
			$archive_portfolio_type = OVAPO_Settings::archive_portfolio_type();
			$archive_portfolio_type = isset( $archive_portfolio_type ) ? $archive_portfolio_type : 'type1';

			$type1 = ( 'type1' == $archive_portfolio_type ) ? 'selected' : '';
			$type2 = ( 'type2' == $archive_portfolio_type ) ? 'selected' : '';

			?>
			<select name="ovapo_options[archive_portfolio_type]" id="archive_portfolio_type">
				<option <?php echo esc_attr($type1) ?> value="type1"><?php echo esc_html__('type1','ova-portfolio');?></option>
				<option <?php echo esc_attr($type2) ?> value="type2"><?php echo esc_html__('type2','ova-portfolio');?></option>
			</select>
			<?php 
		}

	}
	new OVAPO_Admin_Settings();
}
