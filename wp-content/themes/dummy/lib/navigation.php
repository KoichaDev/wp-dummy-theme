<?php 

    function _theme_name_register_menus() {
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', '_theme_name'),
            'footer-menu' => esc_html__('Footer Menu', '_theme_name') 
 
        ]);
    }

    add_action('init', '_theme_name_register_menus');

    // $attribute is the HTML attribute and 
    // an array for the link of the anchor tag and can modify it and return it like any field
    // ! URL: https://www.w3.org/WAI/tutorials/menus/flyout/#use-button-as-toggle
    function _theme_name_aria_has_dropdown($attribute, $item, $args) {
        if($args -> theme_location === 'main-menu') {
            if(in_array('menu-item-has-children', $item -> classes)) {
                $attribute['aria-haspopup'] = 'true';
                $attribute['aria-expanded'] = 'false';
            }
            return $attribute;
        }
    }

    add_filter('nav_menu_link_attributes', '_theme_name_aria_has_dropdown', 10 , 3);

    // $dir is acronym for direction of the arrow 
    function _theme_name_submenu_button($dir = 'down', $title) {
        $button = '<button class="menu-button">';
        // The span class will be used for screen reader
        $button .= '<span class="u-screen-reader-text menu-button-show">' . 
                        sprintf( esc_html__('Show %s submenu', '_theme_name'), $title ) . 
                    '</span>'; 
        $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-hide">' . 
                        sprintf( esc_html__('Hide %s submenu', '_theme_name'), $title ) . 
                    '</span>';
        $button .= ' <i class="fa fa-angle-' . $dir . '" aria-hidden="true"></i>';
        $button .='</button>';
        return $button;
    }


    // $depth is how deep level nested for sub pages on navbar menu
    // $item is navigation for post object
    function _theme_name_dropdown_icon($title, $item, $args, $depth) {
        // main-menu is theme_location from the header.php of wp_nav_menus
        if($args -> theme_location === 'main-menu') {
            // Checking the class name exist on the navbar 
            if(in_array('menu-item-has-children', $item -> classes)) {
                // Checking if the navbar menu has zero, which means first page navbar
                if($depth === 0) {
                    $title .= _theme_name_submenu_button('down', $title);
                } else {
                    $title .= _theme_name_submenu_button('right', $title);
                }
            }
        }
        return $title;
    }

    add_filter('nav_menu_item_title', '_theme_name_dropdown_icon', 10 ,4);