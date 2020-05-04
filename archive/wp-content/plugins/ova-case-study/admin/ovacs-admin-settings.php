<?php 

if( !defined( 'ABSPATH' ) ) exit();


if( !class_exists( 'OVACS_Admin_Settings' ) ){

	/**
	 * Make Admin Class
	 */
	class OVACS_Admin_Settings{

		/**
		 * Construct Admin
		 */
		public function __construct(){

			add_action( 'admin_enqueue_scripts', array( $this, 'ovacs_load_media' ) );
			add_action( 'admin_init', array( $this, 'register_options' ) );

		}


		public function ovacs_load_media() {
			wp_enqueue_media();
		}

		public function print_options_section(){
			return true;
		}

		public function register_options(){

			register_setting(
				'ovacs_options_group', // Option group
				'ovacs_options', // Name Option
				array( $this, 'settings_callback' ) // Call Back
			);

			/**
			 * General Settings
			 */
			add_settings_section(
				'ovacs_general_section_id', // ID
				esc_html__('General Setting', 'ova-case-study'), // Title
				array( $this, 'print_options_section' ),
				'ovacs_general_settings' // Page
			);

			add_settings_field(
				'ovacs_case_study_post_type_rewrite_slug', // ID
				esc_html__('Rewrite Slug','ova-case-study'),
				array( $this, 'ovacs_case_study_post_type_rewrite_slug' ),
				'ovacs_general_settings', // Page
				'ovacs_general_section_id' // Section ID
			);

			add_settings_field(
				'archive_case_study_orderby', // ID
				esc_html__('Orderby','ova-case-study'),
				array( $this, 'archive_case_study_orderby' ),
				'ovacs_general_settings', // Page
				'ovacs_general_section_id' // Section ID
			);

			add_settings_field(
				'archive_case_study_order', // ID
				esc_html__('Order','ova-case-study'),
				array( $this, 'archive_case_study_order' ),
				'ovacs_general_settings', // Page
				'ovacs_general_section_id' // Section ID
			);

		}

		public function settings_callback( $input ){

			$new_input = array();

			if( isset( $input['ovacs_case_study_post_type_rewrite_slug'] ) )
				$new_input['ovacs_case_study_post_type_rewrite_slug'] = sanitize_text_field( $input['ovacs_case_study_post_type_rewrite_slug'] ) ? sanitize_text_field( $input['ovacs_case_study_post_type_rewrite_slug'] ) : 'case_study';

			if( isset( $input['archive_case_study_orderby'] ) )
				$new_input['archive_case_study_orderby'] = sanitize_text_field( $input['archive_case_study_orderby'] ) ? sanitize_text_field( $input['archive_case_study_orderby'] ) : 'date';

			if( isset( $input['archive_case_study_order'] ) )
				$new_input['archive_case_study_order'] = sanitize_text_field( $input['archive_case_study_order'] ) ? sanitize_text_field( $input['archive_case_study_order'] ) : 'ASC';

			return $new_input;
		}


		public static function create_admin_setting_page() { ?>
			<div class="wrap">
				<h1><?php esc_html_e( "Case Study Settings", "ovacs" ); ?></h1>

				<form method="post" action="options.php">
					<div id="tabs">
						<?php settings_fields( 'ovacs_options_group' ); // Options group ?>

						<!-- Menu Tab -->
						<ul>
							<li><a href="#ovacs_general_settings"><?php esc_html_e( 'General Settings', 'ova-case-study' ); ?></a></li>
						</ul>

						<!-- General Tab Content -->  
						<div id="ovacs_general_settings" class="ovacs_admin_settings">
							<?php do_settings_sections( 'ovacs_general_settings' ); // Page ?>
						</div>

					</div>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php }

		/***** General Settings *****/
		public function ovacs_case_study_post_type_rewrite_slug(){
			$ovacs_case_study_post_type_rewrite_slug = esc_attr( OVACS_Settings::ovacs_case_study_post_type_rewrite_slug() );
			printf(
				'<input type="text"  id="ovacs_case_study_post_type_rewrite_slug" name="ovacs_options[ovacs_case_study_post_type_rewrite_slug]" value="%s" />',
				isset( $ovacs_case_study_post_type_rewrite_slug ) ? $ovacs_case_study_post_type_rewrite_slug : 'case_study'
			);
			echo '<span >'.esc_html__(' Name should only contain lowercase letters and the underscore character, and not be more than 32 characters long and  without any spaces', 'ova-case-study').'<span>';
		}

		public function archive_case_study_orderby(){
			$archive_case_study_orderby = OVACS_Settings::archive_case_study_orderby();
			$archive_case_study_orderby = isset( $archive_case_study_orderby ) ? $archive_case_study_orderby : 'date';
			
			$title              = ( 'title' == $archive_case_study_orderby) ? 'selected' : '';
			// $artist_custom_sort = ( 'artist_custom_sort' == $archive_case_study_orderby) ? 'selected' : '';
			$date               = ( 'date' == $archive_case_study_orderby) ? 'selected' : '';
			$id                 = ( 'ID' == $archive_case_study_orderby) ? 'selected' : '';

			?>
			<select name="ovacs_options[archive_case_study_orderby]" id="archive_case_study_orderby">
				<option <?php echo esc_attr($title) ?> value="title"><?php echo esc_html__('Title', 'ova-case-study') ?></option>
				<option <?php echo esc_attr($date) ?> value="date"><?php echo esc_html__('Date', 'ova-case-study') ?></option>
				<option <?php echo esc_attr($id) ?> value="ID"><?php echo esc_html__('ID', 'ova-case-study') ?></option>
				<!-- <option <?php echo esc_attr($artist_custom_sort) ?> value="artist_custom_sort"><?php echo esc_html__('Custom Sort', 'ova-case-study') ?></option> -->
			</select>
			<?php
		}

		public function archive_case_study_order(){
			$archive_case_study_order = OVACS_Settings::archive_case_study_order(); 	
			$archive_case_study_order = isset( $archive_case_study_order ) ? $archive_case_study_order : 'ASC';

			$asc_selected  = ('ASC' == $archive_case_study_order) ? 'selected' : '';
			$desc_selected = ('DESC' == $archive_case_study_order) ? 'selected' : '';

			?>
			<select name="ovacs_options[archive_case_study_order]" id="archive_case_study_order">
				<option <?php echo esc_attr($asc_selected) ?> value="ASC"><?php echo esc_html__('Increase', 'ova-case-study') ?></option>
				<option <?php echo esc_attr($desc_selected) ?> value="DESC"><?php echo esc_html__('Decrease', 'ova-case-study') ?></option>
			</select>
			<?php
		}

	}
	new OVACS_Admin_Settings();
}
