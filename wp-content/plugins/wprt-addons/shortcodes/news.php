<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$item_css = $content_css = $heading_css ='';

extract( shortcode_atts( array(
	'thumb' => 'featured-image',
	'image_crop' => 'standard',
	'alignment' => '',
	'content_padding' => '',
	'content_background' => '#ffffff',
	'link_text' => 'Read more',
	'column'		=> '3c',
	'column2'		=> '2c',
	'column3'		=> '1c',
	'items'		=> '3',
	'gap'		=> '30',
	'auto_scroll' => 'false',
	'show_bullets' => '',
	'show_arrows' => '',
	'bullet_show' => 'bullet-circle',
	'bullet_between' => '50',
	'arrow_position' => 'center',
    'arrow_offset' => 'center',
    'arrow_offset_v' => '0',
    'arrow_offset_s' => '50',
	'cat_slug' => '',
	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_color' => '',
	'heading_font_size' => '',
	'heading_line_height' => '',
	'heading_top_margin' => '',
	'heading_bottom_margin' => ''
), $atts ) );

$gap = intval( $gap );
$items = intval( $items );
$column = intval( $column );
$column2 = intval( $column2 );
$column3 = intval( $column3 );

$heading_line_height = intval( $heading_line_height );
$heading_font_size = intval( $heading_font_size );
$heading_top_margin = intval( $heading_top_margin );
$heading_bottom_margin = intval( $heading_bottom_margin );

if ( empty( $items ) ) return;

$cls = $alignment .' arrow-'. $arrow_position .' offset'. $arrow_offset .' offset-v'. $arrow_offset_v .' '. $bullet_show;
if ( $show_bullets ) $cls .= ' has-bullets'; 
if ( $show_arrows ) $cls .= ' has-arrows';
if ( $arrow_offset_s ) $cls .= ' arrow'.$arrow_offset_s;

if ( $content_padding ) $content_css .= 'padding:'. $content_padding .';';
if ( $content_background ) $item_css .= 'background-color:'. $content_background .';';

if ( $bullet_between == '45' ) $cls .= ' bullet45';
if ( $bullet_between == '40' ) $cls .= ' bullet40';
if ( $bullet_between == '35' ) $cls .= ' bullet35';
if ( $bullet_between == '30' ) $cls .= ' bullet30';
if ( $bullet_between == '25' ) $cls .= ' bullet25';
if ( $bullet_between == '20' ) $cls .= ' bullet20';
if ( $bullet_between == '15' ) $cls .= ' bullet15';
if ( $bullet_between == '10' ) $cls .= ' bullet10';

if ( $heading_font_weight != 'Default' ) $heading_css .= 'font-weight:'. $heading_font_weight .';';
if ( $heading_color ) $heading_css .= 'color:'. $heading_color .';';
if ( $heading_font_size ) $heading_css .= 'font-size:'. $heading_font_size .'px;';
if ( $heading_line_height ) $heading_css .= 'line-height:'. $heading_line_height .'px;';
if ( $heading_top_margin ) $heading_css .= 'margin-top:'. $heading_top_margin .'px;';
if ( $heading_bottom_margin ) $heading_css .= 'margin-bottom:'. $heading_bottom_margin .'px;';
if ( $heading_font_family != 'Default' ) {
	bauer_enqueue_google_font( $heading_font_family );
	$heading_css .= 'font-family:'. $heading_font_family .';';
}

$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => $items
);

if ( ! empty( $cat_slug ) )
	$query_args['category_name'] = $cat_slug;

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { return; }
ob_start(); ?>

<div class="bauer-news <?php echo esc_attr( $cls ); ?>" data-auto="<?php echo esc_attr( $auto_scroll ); ?>" data-column="<?php echo esc_attr( $column ); ?>" data-column2="<?php echo esc_attr( $column2 ); ?>" data-column3="<?php echo esc_attr( $column3 ); ?>" data-gap="<?php echo esc_html( $gap ); ?>">
<?php if ( $query->have_posts() ) : ?>
	<?php wp_enqueue_script( 'bauer-owlcarousel' ); ?>

	<div class="owl-carousel owl-theme">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<div class="news-item clearfix">
			<div class="inner" style="<?php echo esc_attr( $item_css ); ?>">
				<div class="thumb-wrap">
					<?php
					$img_size = 'bauer-post-standard';

					if ( $image_crop == 'full' ) $img_size = 'full';
					if ( $image_crop == 'related' ) $img_size = 'bauer-post-related';

					if ( $thumb == 'element-thumbnail'  ) {
						$images = bauer_metabox( 'element_thumbnail', "type=image&size=$img_size" );

						foreach ( $images as $image ) {
							echo '<img src="'. $image['url'] .'" alt="%s">';
						}
					}

					if ( $thumb == 'featured-image' && has_post_thumbnail() )
						echo get_the_post_thumbnail( get_the_ID(), $img_size );
					?>
				</div><!-- /.thumb-wrap -->

                <div class="text-wrap" style="<?php echo esc_attr( $content_css ); ?>">
					<div class="meta">
                        <span class="date"><?php echo get_the_date(); ?></span>
                    </div>

					<?php echo '<h3 class="title" style="'. esc_attr( $heading_css ) .'"><span><a href="'. esc_url( get_the_permalink() ) .'">'. get_the_title() .'</a></span></h3>';

					if ( $link_text ) echo '<div class="url-wrap"><a href="'. esc_url( get_permalink() ) .'" class="bauer-links link-style-2 accent"><span class="text">'. esc_html( $link_text ) .'</span></a></div>';
					?>
                </div><!-- /.text-wrap -->
	        </div>
	    </div><!-- /.news-item -->
	    
	<?php endwhile; ?>
	</div><!-- /.owl-carousel -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>
</div><!-- /.bauer-news -->
<?php
$return = ob_get_clean();
echo $return;