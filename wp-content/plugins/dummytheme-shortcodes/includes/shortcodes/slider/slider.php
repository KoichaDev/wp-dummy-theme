<?php 

function _theme_name_slider($atts = [], $content = null, $tag = '') {

    // Information about key-value: 
    // https://github.com/kenwheeler/slick/
    
    extract(shortcode_atts([
        'autoplay'  => false,
        'arrows'    => false,

    ], $atts, $tag));
    // boolval will convert anything to boolean
    $output = '<div data-slick=\'{"autoplay":' . ($autoplay ? 'true' : 'false') . ', "arrows": ' . ($arrows ? 'true' : 'false') . '}\'>';
    $output .= '</div>';

    return $output;
}

add_shortcode('_theme_name_slider', '_theme_name_slider');