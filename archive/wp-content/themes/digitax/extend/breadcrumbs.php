<?php function digitax_breadcrumbs_header(){
    
    if( get_post_meta(  digitax_get_current_id() ,'digitax_met_show_breadcrumbs', true ) != 'no' ){
        digitax_breadcrumbs();
    }
    
}



function digitax_breadcrumbs() {
	$html = '<div id="breadcrumbs">';
	       
	        	$separator = '<li class="li_separator"><span class="separator"></span></li>';
		        $home = esc_html__('Home', 'digitax');
		        $before = '<li>';
		        $after = '</li>'; 
			

				$html .= '<ul class="breadcrumb">';
					global $post;
			        global $wp_query;
			        
			        $homeLink = home_url('/');
			        $type=get_post_type();

			        
			        $html .= '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $separator . ' ';	
			        
			        
			        if ( is_category() ) {
				        
				        $cat_obj = $wp_query->get_queried_object();
				        $thisCat = $cat_obj->term_id;
				        $thisCat = get_category($thisCat);
				        $parentCat = get_category($thisCat->parent);
				        if ($thisCat->parent != 0) $html .=  get_category_parents($parentCat, TRUE, ' ');
				        $html .= $before . '' . single_cat_title('', false) . '' . $after;



			        } elseif ( is_day() ) {

				        $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
				        $html .= '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>' . $separator . ' ';
				        $html .= $before  . esc_html__('Archive by date', 'digitax').' ' . get_the_time('d') . '"' . $after;

			        } elseif ( is_month() ) {

				        $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
				        $html .= $before . esc_html__('Archive by month', 'digitax').' ' . get_the_time('F') . '"' . $after;

			        } elseif ( is_year() ) {

			        	$html .= $before . esc_html__('Archive by year', 'digitax').' ' . get_the_time('Y') . '"' . $after;

			        } elseif ( is_single() && !is_attachment() ) {

				        if ( get_post_type() != 'post' ) {
					        $post_type = get_post_type_object(get_post_type());
					        $slug = $post_type->rewrite;
					        $html .= '<li><a href="' . $homeLink .  $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>' . $separator . ' ';
					        $html .= $before . get_the_title() . $after;
				        } else {
					        $cat = get_the_category(); $cat = $cat[0];
					        $html .= ' ' . get_category_parents($cat, TRUE, ' ' . $separator . ' ') . ' ';
					        $html .= '<li>' . get_the_title() . '</li>';
				        }
			        }elseif ( is_search()) {
			            $html .= $before . esc_html__('Search results for', 'digitax').' ' . get_search_query() . '"' . $after;
			        }elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

				        $post_type = get_post_type_object(get_post_type());

				        $html .= $post_type ? $before . $post_type->labels->singular_name . $after : '';

			        } elseif ( is_attachment() ) {

				        $parent_id  = $post->post_parent;
				        $breadcrumbs = array();
				        while ($parent_id) {
					        $page = get_page($parent_id);
					        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					        $parent_id    = $page->post_parent;
				        }
				        $breadcrumbs = array_reverse($breadcrumbs);
				        foreach ($breadcrumbs as $crumb) $html .= ' ' . $crumb . ' ' . $separator . ' ';
				        $html .= $before . '' . get_the_title() . '' . $after;

			        }elseif ( is_page() && !$post->post_parent ) {

			        	$html .= $before . '' . get_the_title() . '' . $after;

			        } elseif ( is_page() && $post->post_parent ) {

				        $parent_id  = $post->post_parent;
				        $breadcrumbs = array();
				        while ($parent_id) {
					        $page = get_page($parent_id);
					        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					        $parent_id    = $page->post_parent;
				        }
				        $breadcrumbs = array_reverse($breadcrumbs);
				        foreach ($breadcrumbs as $crumb) $html .= ' ' . $crumb . ' ' . $separator . ' ';
			        	$html .= $before . '' . get_the_title() . '' . $after;

			        }elseif ( is_tag() ) {
			        	$html .= $before . esc_html__('Archive by tag', 'digitax').' ' . single_tag_title('', false) . '"' . $after;
			        } elseif ( is_author() ) {
			        global $author;
			        $userdata = get_userdata($author);
			        	$html .= $before . esc_html__('Articles posted by', 'digitax').' ' . $userdata->display_name . '"' . $after;
			        } elseif ( is_home() ){
			        	$html .= $before . esc_html__('Blog', 'digitax').'&nbsp;' . $after;
			        }elseif ( is_404() ) {
			        	$html .= $before . esc_html__('You got it Error 404 not Found', 'digitax').'&nbsp;' . $after;
			        }
			        if ( get_query_var('paged') ) {
				        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $html .= ' ';
				        
				        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $html .= '';
			        }
					$html .= '</ul>';
	      
	$html .= '</div>';

	$args = array(
	    'a' => array(
	        'href' => array(),
	        'title' => array()
	    ),
	    'div'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'ul'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'li'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'span'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'br' => array(),
	    'em' => array(),
	    'strong' => array(),
	);
	echo wp_kses( $html, $args );

}