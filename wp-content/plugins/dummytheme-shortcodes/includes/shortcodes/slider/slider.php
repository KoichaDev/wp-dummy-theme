<?php 

function _theme_name_slider($atts = [], $content = null, $tag = '') {

    // Information about key-value: 
    // https://github.com/kenwheeler/slick/
    
    extract(shortcode_atts([
        'autoplay'  => false,
        'arrows'    => false,

    ], $atts, $tag));
    // boolval will convert anything to boolean
    $output = '<div class="_theme_name-slider" data-slick=\'{"autoplay":' . ($autoplay ? 'true' : 'false') . ', "arrows": ' . ($arrows ? 'true' : 'false') . '}\'>';
        
    if( !is_null($content) ) {
        $output .= do_shortcode($content);
    }
    
    $output .= '</div>';

    return $output;
}

function theme_name_slide($atts = [], $content = null, $tag = '') {
    // Information about key-value: 
    // https://github.com/kenwheeler/slick/
    
    extract(shortcode_atts([
        'image'  => null,
        'caption'    => '',

    ], $atts, $tag));

    $output = '<div class="_theme_name-slide">';

    if($image) {
        $output .= wp_get_attachment_image($image, 'large');
    }

    if($caption) {
        $output .= '<div class="_theme_name-caption">' . esc_html($caption) . '</div>';
    }

    $output .= '</div>';

    return $output;
}

add_shortcode('_theme_name_slider', '_theme_name_slider');
add_shortcode('_theme_name_slide', 'theme_name_slide');
