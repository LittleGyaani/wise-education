<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$inner_css = '';

extract( shortcode_atts( array(
	'margin' => '',
	'showcase' => 'style-1',
	'image_crop' => 'rectangle1',
	'items'			=> '8',
	'gap'			=> '0',
	'cat_slug'	=> '',
	'exclude_cat_slug' => '',
	'auto_scroll' => 'false',
	'column'		=> '3c',
	'column2'		=> '2c',
	'column3'		=> '1c',
	'show_bullets' => '',
	'show_arrows' => '',
	'bullet_show' => 'bullet-square',
	'bullet_between' => '50',
    'arrow_offset' => 'center',
    'arrow_offset_v' => '0'
), $atts ) );

$gap = intval( $gap );
$items = intval( $items );
$column = intval( $column );
$column2 = intval( $column2 );
$column3 = intval( $column3 );

if ( empty( $items ) ) return;

$cls = 'arrow-center '. $bullet_show .' ';
$cls .= 'offset'. $arrow_offset .' offset-v'. $arrow_offset_v;

if ( $margin ) $inner_css .= 'margin:'. $margin .';';

if ( $show_bullets ) $cls .= ' has-bullets'; 
if ( $show_arrows ) $cls .= ' has-arrows';

if ( $bullet_between == '45' ) $cls .= ' bullet45';
if ( $bullet_between == '40' ) $cls .= ' bullet40';
if ( $bullet_between == '35' ) $cls .= ' bullet35';
if ( $bullet_between == '30' ) $cls .= ' bullet30';
if ( $bullet_between == '25' ) $cls .= ' bullet25';
if ( $bullet_between == '20' ) $cls .= ' bullet20';
if ( $bullet_between == '15' ) $cls .= ' bullet15';
if ( $bullet_between == '10' ) $cls .= ' bullet10';

$query_args = array(
    'post_type' => 'project',
    'posts_per_page' => $items
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'project_category',
			'field'    => 'slug',
			'terms'    => $cat_slug,
			'category__not_in' => 144
		),
	);
}

if ( ! empty( $exclude_cat_slug ) ) {
	$query_args['tax_query'] = array(
	    array(
	        'taxonomy' => 'project_category',
	        'field' => 'slug',
	        'terms' => $exclude_cat_slug,
	        'operator' => 'NOT IN',
	    ),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { echo "Project item not found!"; return; }
ob_start(); ?>

<div class="bauer-project <?php echo esc_attr( $cls ); ?>" data-auto="<?php echo esc_attr( $auto_scroll ); ?>" data-column="<?php echo esc_attr( $column ); ?>" data-column2="<?php echo esc_attr( $column2 ); ?>" data-column3="<?php echo esc_attr( $column3 ); ?>" data-gap="<?php echo esc_html( $gap ); ?>">
<div style="<?php echo esc_attr( $inner_css ); ?>">

<?php if ( $query->have_posts() ) : ?>
	<?php wp_enqueue_script( 'bauer-owlcarousel' ); wp_enqueue_script( 'bauer-magnificpopup' ); ?>

	<div class="owl-carousel owl-theme">
	    <?php while ( $query->have_posts() ) : $query->the_post(); global $post; ?>
			<div class="project-box <?php echo esc_attr( $showcase ); ?>">

					<?php
						if ( has_post_thumbnail() ) {
					    	$img_size = 'bauer-rectangle1';
					    	if ( $image_crop == 'default' ) $img_size = 'bauer-'. bauer_metabox( 'image_crop' );
							if ( $image_crop == 'full' ) $img_size = 'full';
							if ( $image_crop == 'square' ) $img_size = 'bauer-square';
							if ( $image_crop == 'rectangle' ) $img_size = 'bauer-rectangle';
							if ( $image_crop == 'rectangle2' ) $img_size = 'bauer-rectangle2';
							if ( $image_crop == 'rectangle3' ) $img_size = 'bauer-rectangle3';
							if ( $image_crop == 'rectangle4' ) $img_size = 'bauer-rectangle4';
                    	}

                    	$icon_html = sprintf('<div class="icons"><a href="%1$s">next</a></div>', esc_url( get_the_permalink() ), bauer_get_image( array( 'size' => 'full', 'format' => 'src' ) )
                    	);

						$url_html = sprintf('<div class="url-wrap"><a href="%2$s" class="bauer-links link-style-2 accent" style=""><span class="text">%1$s</span></a></div>', esc_html__( 'View Project', 'bauer' ), esc_url( get_the_permalink() ) );

                    	$title_html = sprintf('<h2 class="project-title"><a href="%1$s">%2$s</a></h2>', esc_url( get_the_permalink() ), bauer_metabox( 'title' ) );
                    	$desc_html = sprintf('<div class="project-desc">%1$s</div>', bauer_metabox( 'desc' ) );

                    	if ( $showcase == 'style-1' )
                    	echo '<div class="project-image"><div class="inner"><div class="default">'. $title_html . $url_html .'</div>' . get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="hover-info">' . $title_html . $desc_html . $url_html .'</div></div></div>';

                    	if ( $showcase == 'style-2' )
                    	echo '<div class="project-image"><div class="inner">' . get_the_post_thumbnail( get_the_ID(), $img_size ) . $icon_html .'<div class="hover-info">' . $title_html . $desc_html .'</div></div></div>';

                    	if ( $showcase == 'style-3' )
                    	echo '<div class="project-image"><div class="inner">' . get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="hover-info">' . $title_html . $desc_html . $url_html .'</div></div></div>';
					?>

			</div><!-- /.project-box -->
		<?php endwhile; ?>
	</div><!-- /.owl-carousel -->

<?php endif; ?>
<?php wp_reset_postdata(); ?>

</div>
</div><!-- /.bauer-project -->

<?php
$return = ob_get_clean();
echo $return;