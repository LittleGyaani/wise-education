<?php
if (!class_exists('WPBakeryShortCode_woo_reviews_link')) {
class WPBakeryShortCode_woo_reviews_link extends WPBakeryShortCode {
    protected function getFontsData( $fontsString ) {   
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();      
        $fieldSettings = array();
        $fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
        return $fontsData;
         
    }
     
    // Build the inline style starting from the data
    protected function googleFontsStyles( $fontsData ) {
         
        // Inline styles
        $fontFamily = explode( ':', $fontsData['values']['font_family'] );
        $styles[] = 'font-family:' . $fontFamily[0];
        $fontStyles = explode( ':', $fontsData['values']['font_style'] );
        $styles[] = 'font-weight:' . $fontStyles[1];
        $styles[] = 'font-style:' . $fontStyles[2];
         
        $inline_style = '';     
        foreach( $styles as $attribute ){           
            $inline_style .= $attribute.'; ';       
        }   
         
        return $inline_style;
         
    }
     
    // Enqueue right google font from Googleapis
    protected function enqueueGoogleFonts( $fontsData ) {
         
        // Get extra subsets for settings (latin/cyrillic/etc)
        $settings = get_option( 'wpb_js_google_fonts_subsets' );
        if ( is_array( $settings ) && ! empty( $settings ) ) {
            $subsets = '&subset=' . implode( ',', $settings );
        } else {
            $subsets = '';
        }
         
        // We also need to enqueue font from googleapis
        if ( isset( $fontsData['values']['font_family'] ) ) {
            wp_enqueue_style( 
                'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), 
                '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
            );
        }
         
    }
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'review_style' => '0',
            'default_font' => '',
            'font_size' => '',
            'color' => '',
            'fontfamily' => '',
            'line_height' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        global $product;

        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'woo_reviews_link', $atts );
        $extra_class .= ' '.$css_class;
        $content = '';

        $style = $text_font_inline_style = '';
        if (isset($font_size) && $font_size!='') $style .= 'font-size:'.$font_size.';';
        if (isset($color) && $color!='') $style .= 'color:'.$color.';';
        if (isset($line_height) && $line_height!='') $style .= 'line-height:'.$line_height.';';
        if (isset($text_align)) $style .= 'text-align:'.$text_align.';';
        if ($default_font!='yes') {
            if (isset($fontfamily) && $fontfamily!='') {
                $text_font_data = $this->getFontsData( $fontfamily );
                $text_font_inline_style = $this->googleFontsStyles( $text_font_data );   
                $this->enqueueGoogleFonts( $text_font_data );
            }
            if ($text_font_inline_style!='')  $style .= $text_font_inline_style;
        }
        if ($style!='') $style = 'style="'.$style.'"';

        if ($review_style == '0') { $content = '<a href="#reviews" class="'.$extra_class.' woocommerce-review-link" '.$style.'>Reviews</a>'; }
        if ($review_style == '1') {
            $review_count = $product->get_review_count();
            $content = '<a href="#reviews" class="'.$extra_class.' woocommerce-review-link" '.$style.'>('.$review_count.') Reviews</a>'; 
        }

        return $content;
    }
}
}

vc_map( array(
    "name" => esc_html__('Single Reviews Link', 'themetonaddon'),
    "description" => esc_html__("Woocommerce Single Reviews Link", 'themetonaddon'),
    "base" => 'woo_reviews_link',
    "icon" => "mungu-vc-icon mungu-vc-icon69",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => array(esc_html__('Themeton', 'themetonaddon'),esc_html__( 'WooCommerce', 'themetonaddon' )),
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "review_style",
            "heading" => esc_html__("Style", 'themetonaddon'),
            "value" => array(
                "Show Text" => "0",
                "Show Text & Review Count" => "1"
            ),
            "std" => '0',
            "admin_label" => true
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__( "Use theme default font family?", 'themetonaddon' ),
            "param_name" => "default_font",
            "value" => array( esc_html__( 'Yes', 'themetonaddon' ) => 'yes' ),
            "description" => esc_html__( "Use font family from the theme..", 'themetonaddon' ),
        ),
        array(
            "type" => "google_fonts",
            "param_name" => "fontfamily",
            "value" => "",
            "description" => esc_html__("WooCommerce Reviews Link font family", 'themetonaddon'),
            'dependency' => array(
                'element' => 'default_font',
                'value_not_equal_to' => 'yes',
            ),
        ),
        array(
            "type" => "colorpicker",
            "param_name" => "color",
            "heading" => esc_html__("Font Color", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("font color.", 'themetonaddon'),
        ),
        array(
            "type" => "textfield",
            "param_name" => "font_size",
            "heading" => esc_html__("Font Size", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("WooCommerce Reviews Link font size example:53px", 'themetonaddon'),
        ),
        array(
            "type" => "textfield",
            "param_name" => "line_height",
            "heading" => esc_html__("Line Height", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("WooCommerce Reviews Link font line height", 'themetonaddon'),
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));