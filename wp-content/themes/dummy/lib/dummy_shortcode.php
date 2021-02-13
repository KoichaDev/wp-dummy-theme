<?php

// $atts = attributes
function _theme_name_button($atts = [], $content = null) {
    // ! Have to define first a default attributes first for a shortcode
    // Common to use extract() function when creating shortcode. This function will convert the array to normal PHP variables
    // ! Attributes always have to be lowercase. You can't have uppercase, camelCase or Pascal Case
    extract(shortcode_atts([
        'color' => 'red',
        'text'  => 'Button'
    ], $atts, $tag));
    // do_shortcode() allows you to adding other shortcode inside your shortcode before outputting the content inside the shortcode tags:
    // Example: [_theme_name_button][_theme_name_icon icon="fas fa search" /] text[/_theme_name_button]
    return '<button style="background: ' . esc_attr($color) . '">' . do_shortcode($content) . '</button>';
}

function _theme_name_icon($atts) {
    // ! Have to define first a default attributes first for a shortcode
    // Common to use extract() function when creating shortcode. This function will convert the array to normal PHP variables
    // ! Attributes always have to be lowercase. You can't have uppercase, camelCase or Pascal Case
    extract(shortcode_atts([
        'icon' => '',
    ], $atts));

    return '<i class="fas fa-search"' . esc_attr($icon) . '" aria-hidden="true"></i>';
}

add_shortcode('_theme_name_button', '_theme_name_button');
add_shortcode('_theme_name_icon', '_theme_name_icon');