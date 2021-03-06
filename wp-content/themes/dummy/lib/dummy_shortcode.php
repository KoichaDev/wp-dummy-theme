<?php

function _theme_name_icon($atts) {
    // ! Have to define first a default attributes first for a shortcode
    // Common to use extract() function when creating shortcode. This function will convert the array to normal PHP variables
    // ! Attributes always have to be lowercase. You can't have uppercase, camelCase or Pascal Case
    extract(shortcode_atts([
        'icon' => '',
    ], $atts));

    return '<i class="fas fa-search"' . esc_attr($icon) . '" aria-hidden="true"></i>';
}

add_shortcode('_theme_name_icon', '_theme_name_icon');