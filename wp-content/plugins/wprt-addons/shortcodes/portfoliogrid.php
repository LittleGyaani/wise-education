<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $inner_css = $filter_css = $filter_wrap_css  = $filter_data = '';

extract( shortcode_atts( array(
	'margin' => '',
	'style' => 'style-1',
	'showcase' => 'masonry',
	'image_crop' => 'rectangle1',
	'items'			=> '8',
	'cat_slug'	=> '',
	'exclude_cat_slug' => '',
	'pagination' => 'false',
	'gapv'			=> '0',
	'gaph'			=> '0',
	'rounded' 	=> '',
	'show_filter'	=> 'true',
	'filter_by_default' => '',
	'filter_cat_slug' => '',
	'filter_button_all' => 'All',
	'bottom_filter' => '',
	'filter_align' => 'style-1',
	'filter_counter' => 'true',
	'column'		=> '4c',
	'column2'		=> '3c',
	'column3'		=> '2c',
	'column4'		=> '1c',
	'filter_font_family' => 'Default',
	'filter_font_weight' => 'Default',
	'filter_font_size' => '',
	'filter_line_height' => '',
	'filter_letter_spacing' => '',
	'filter_text_tranform' => 'capitalize'
), $atts ) );

$gapv = intval( $gapv );
$gaph = intval( $gaph );
$items = intval( $items );
$column = intval( $column );
$column2 = intval( $column2 );
$column3 = intval( $column3 );
$column4 = intval( $column4 );
$bottom_filter = intval( $bottom_filter );
$filter_font_size = intval( $filter_font_size );
$filter_line_height = intval( $filter_line_height );
$filter_letter_spacing = intval( $filter_letter_spacing );

if ( empty( $items ) ) return;

if ( empty( $gapv ) ) $gapv = 0;
if ( empty( $gaph ) ) $gaph = 0;

$cls = $style;
if ( $rounded ) $cls .= ' rounded'; 

if ( $margin ) $inner_css .= 'margin:'. $margin .';';

if ( $bottom_filter ) $filter_wrap_css = 'margin-bottom:'. $bottom_filter . 'px;';
if ( $filter_text_tranform ) $filter_css .= 'text-transform:'. $filter_text_tranform .';';
if ( $filter_font_weight != 'Default' ) $filter_css .= 'font-weight:'. $filter_font_weight .';';
if ( $filter_font_size ) $filter_css .= 'font-size:'. $filter_font_size .'px;';
if ( $filter_line_height ) $filter_css .= 'line-height:'. $filter_line_height .'px;';
if ( $filter_letter_spacing ) $filter_css .= 'letter-spacing:'. $filter_letter_spacing .'px;';
if ( $filter_font_family != 'Default' ) {
	bauer_enqueue_google_font( $filter_font_family );
	$filter_css .= 'font-family:'. $filter_font_family .';';
}

if ( ! empty( $filter_cat_slug ) && $filter_by_default  )
	$filter_data = strtolower( $filter_cat_slug );

if ( get_query_var('paged') ) {
   $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
   $paged = get_query_var('page');
} else {
   $paged = 1;
}

$query_args = array(
    'post_type' => 'project',
    'posts_per_page' => $items,
    'paged'     => $paged
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'project_category',
			'field'    => 'slug',
			'terms'    => $cat_slug
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

<div class="bauer-project-grid" data-layout="<?php echo esc_attr( $showcase ); ?>" data-column="<?php echo esc_attr( $column ); ?>" data-column2="<?php echo esc_attr( $column2 ); ?>" data-column3="<?php echo esc_attr( $column3 ); ?>" data-column4="<?php echo esc_attr( $column4 ); ?>" data-gaph="<?php echo esc_attr( $gaph ); ?>" data-gapv="<?php echo esc_attr( $gapv ); ?>" data-filter="<?php echo esc_attr( $filter_data ); ?>">
<div style="<?php echo esc_attr( $inner_css ); ?>">

	<?php if ( $query->have_posts() ) :
		$terms = get_terms("project_category");
	    if ( count( $terms ) > 0 && $show_filter == 'true' ) {
	        echo '<div id="project-filter" style="'. $filter_wrap_css .'" class="cbp-l-filters-alignCenter clearfix '. $filter_align .'"><div class="inner">';
	        	if ( ! empty( $filter_button_all ) )
	        		echo '<div data-filter="*" class="cbp-filter-item button-all" style="'. $filter_css .'"><span>'. esc_html( $filter_button_all ) .'</span><div class="cbp-filter-counter"></div></div>';

		        foreach ( $terms as $term ) {
		            $termname = strtolower( $term->name );
		            $termname = str_replace( ' ', '-', $termname );
		            echo '<div data-filter=".'. esc_attr( $termname ) .'" class="cbp-filter-item" title="'. esc_attr( $term->name ) .'" style="'. $filter_css .'"><span>'. $term->name . '</span><div class="cbp-filter-counter"></div></div>';
		        }
	        echo '</div></div>';
	    } ?>

		<div id="portfolio" class="cbp">
		    <?php while ( $query->have_posts() ) : $query->the_post();
				wp_enqueue_script( 'bauer-cubeportfolio' ); wp_enqueue_script( 'bauer-magnificpopup' );
				
			    global $post;
				$term_list = '';
			    $terms = get_the_terms( $post->ID, 'project_category' );

			    if ( $terms ) {
			        foreach ( $terms as $term ) {
			            $term_list .= $term->slug .' ';
			        }
			    } ?>

	            <div class="cbp-item <?php echo esc_attr( $term_list ); ?>">
					<div class="project-box <?php echo esc_attr( $cls ); ?>">
						<div class="inner">
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

	                    	if ( $style == 'style-1' )
	                    	echo '<div class="project-image"><div class="inner"><div class="default">'. $title_html . $url_html .'</div>' . get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="hover-info">' . $title_html . $desc_html . $url_html .'</div></div></div>';

	                    	if ( $style == 'style-2' )
	                    	echo '<div class="project-image"><div class="inner">' . get_the_post_thumbnail( get_the_ID(), $img_size ) . $icon_html .'<div class="hover-info">' . $title_html . $desc_html .'</div></div></div>';

	                    	if ( $style == 'style-3' )
	                    	echo '<div class="project-image"><div class="inner">' . get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="hover-info">' . $title_html . $desc_html . $url_html .'</div></div></div>';
							?>
		                </div>
					</div><!-- /.project-box -->
	            </div><!-- /.cbp-item -->
			<?php endwhile; ?>
		</div><!-- /#portfolio -->

		<?php if ( 'true' == $pagination ) {
			echo '<div class="project-nav">';
			bauer_pagination($query);
			echo '</div>';
		}
		?>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

</div>
</div><!-- /.bauer-project -->

<?php
$return = ob_get_clean();
echo $return;