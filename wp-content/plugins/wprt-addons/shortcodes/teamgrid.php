<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $item_css = $row_css = $content_css = '';
$thumb_css = $heading_css = $desc_css = $button_css = '';
$name_css = $position_css = $content_css = '';

extract( shortcode_atts( array(
	'alignment' => 'text-center',
	'image_crop' => 'full',
	'content_padding' => '',
	'content_background' => '',
	'items'		=> '3',
	'cat_slug' => '',
	'gapv'		=> '30',
	'gaph'		=> '40',
	'column'		=> '3c',
	'name_font_family' => 'Default',
	'name_font_weight' => 'Default',
	'name_color' => '',
	'name_font_size' => '',
	'name_line_height' => '',
	'position_font_family' => 'Default',
	'position_font_weight' => 'Default',
	'position_color' => '',
	'position_font_size' => '',
	'position_line_height' => '',
	'name_top_margin' => '',
	'name_bottom_margin' => '',
	'position_top_margin' => '',
	'position_bottom_margin' => '',
), $atts ) );

$items = intval( $items );
$column = intval( $column );
$gapv = intval( $gapv );
$gaph = intval( $gaph );

$name_line_height = intval( $name_line_height );
$name_font_size = intval( $name_font_size );
$position_line_height = intval( $position_line_height );
$position_font_size = intval( $position_font_size );

$name_top_margin = intval( $name_top_margin );
$name_bottom_margin = intval( $name_bottom_margin );
$position_top_margin = intval( $position_top_margin );
$position_bottom_margin = intval( $position_bottom_margin );

if ( empty( $items ) ) return;

$cls = $alignment .' col-'. $column;

$css = 'margin:-'. $gaph/2 .'px -'. $gapv/2 .'px;';
$item_css = 'padding:0 '. $gapv/2 .'px;';
$row_css = 'padding:'. $gaph/2 .'px 0;';

if ( $name_font_weight != 'Default' ) $name_css .= 'font-weight:'. $name_font_weight .';';
if ( $name_color ) $name_css .= 'color:'. $name_color .';';
if ( $name_font_size ) $name_css .= 'font-size:'. $name_font_size .'px;';
if ( $name_line_height ) $name_css .= 'line-height:'. $name_line_height .'px;';
if ( $name_top_margin ) $name_css .= 'margin-top:'. $name_top_margin .'px;';
if ( $name_bottom_margin ) $name_css .= 'margin-bottom:'. $name_bottom_margin .'px;';
if ( $name_font_family != 'Default' ) {
	bauer_enqueue_google_font( $name_font_family );
	$name_css .= 'font-family:'. $name_font_family .';';
}

if ( $position_font_weight != 'Default' ) $position_css .= 'font-weight:'. $position_font_weight .';';
if ( $position_color ) $position_css .= 'color:'. $position_color .';';
if ( $position_font_size ) $position_css .= 'font-size:'. $position_font_size .'px;';
if ( $position_line_height ) $position_css .= 'line-height:'. $position_line_height .'px;';
if ( $position_top_margin ) $position_css .= 'margin-top:'. $position_top_margin .'px;';
if ( $position_bottom_margin ) $position_css .= 'margin-bottom:'. $position_bottom_margin .'px;';
if ( $position_font_family != 'Default' ) {
	bauer_enqueue_google_font( $position_font_family );
	$position_css .= 'font-family:'. $position_font_family .';';
}

if ( $content_background ) $content_css .= 'background-color: '. $content_background .';';
if ( $content_padding ) $content_css .= 'padding:'. $content_padding .';';

$query_args = array(
    'post_type' => 'member',
    'posts_per_page' => $items
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'member_category',
			'field'    => 'slug',
			'terms'    => $cat_slug
		),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { echo "Member post not found!"; return; }
ob_start(); ?>

<div class="bauer-team-grid <?php echo esc_attr( $cls ); ?>" style="<?php echo esc_attr( $css ); ?>">
<?php $i = 0; if ( $query->have_posts() ) : ?>
	<div class="team-wrap clearfix">
    <?php while ( $query->have_posts() ) : $query->the_post();
    	if ( $i == 0 ) { echo '<div class="team-row clearfix" style="'. $row_css .'">'; } ?>
    	<div class="member-item clearfix" style="<?php echo esc_attr( $item_css ); ?>">
    		<div class="inner">
    			<?php
    			$socials_html = '';

	        	if ( bauer_metabox( 'facebook' )
    			|| bauer_metabox( 'twitter' )
    			|| bauer_metabox( 'linkedin' )
    			|| bauer_metabox( 'google_plus' )
    			|| bauer_metabox( 'instagram' ) ) :

	        	$socials_html .= '<ul class="socials clearfix">';
	        	if ( bauer_metabox( 'facebook' ) )
        		$socials_html .= '<li class="facebook"><a target="_blank" href="'. esc_url( bauer_metabox( 'facebook' ) ) .'"><i class="fab fa-facebook-f"></i></a></li>';

        		if ( bauer_metabox( 'twitter' ) )
        		$socials_html .= '<li class="twitter"><a target="_blank" href="'. esc_url( bauer_metabox( 'twitter' ) ) .'"><i class="fab fa-twitter"></i></a></li>';

        		if ( bauer_metabox( 'linkedin' ) )
        		$socials_html .= '<li class="linkedin"><a target="_blank" href="'. esc_url( bauer_metabox( 'linkedin' ) ) .'"><i class="fab fa-linkedin-in"></i></a></li>';

        		if ( bauer_metabox( 'google_plus' ) )
        		$socials_html .= '<li class="google-plus"><a target="_blank" href="'. esc_url( bauer_metabox( 'google_plus' ) ) .'"><i class="fab fa-google-plus-g"></i></a></li>';

        		if ( bauer_metabox( 'instagram' ) )
        		$socials_html .= '<li class="instagram"><a target="_blank" href="'. esc_url( bauer_metabox( 'instagram' ) ) .'"><i class="fab fa-instagram"></i></a></li>';
	        	$socials_html .= '</ul>';

	        	endif; ?>

	            <?php if ( has_post_thumbnail() ) : ?>
    				<div class="thumb">
	    				<?php
				    	$img_size = 'full';
						if ( $image_crop == 'square' ) $img_size = 'bauer-square';
						if ( $image_crop == 'rectangle' ) $img_size = 'bauer-rectangle';
						if ( $image_crop == 'rectangle2' ) $img_size = 'bauer-rectangle2';

    					echo get_the_post_thumbnail( get_the_ID(), $img_size ); ?>
    				</div><!-- /.thumb -->
         		<?php endif; ?>

             	<?php if ( bauer_metabox( 'name' ) || bauer_metabox( 'position' ) || bauer_metabox( 'text' ) ) : ?>
             		<div class="text-wrap" style="<?php echo esc_attr($content_css); ?>">
				        <?php if ( bauer_metabox( 'name' ) ) : ?>
				        	<h4 class="name" style="<?php echo esc_attr( $name_css ); ?>">
				        	<?php echo esc_html( bauer_metabox( 'name' ) ); ?></h4>
				        <?php endif; ?>

				        <?php if ( bauer_metabox( 'position' ) ) : ?>
				        	<h5 class="position" style="<?php echo esc_attr( $position_css ); ?>">
				        	<?php echo bauer_metabox( 'position' ); ?></h5>
				        <?php endif; ?>

				        <?php echo $socials_html; ?>
			        </div>
		        <?php endif; ?>
    		</div><!-- /.inner -->
        </div><!-- /.member-item -->
		<?php
		$i++;
		if ( $i == $column ) { $i = 0; echo '</div>'; }
		?>
	<?php endwhile; ?>
	<?php
	if ( $i > 0 ) echo '</div>';
	?>
	</div><!-- /.team-wrap -->
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div><!-- /.bauer-team-grid -->

<?php
$return = ob_get_clean();
echo $return;