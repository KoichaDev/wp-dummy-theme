<?php 

    function _theme_name_register_menus() {
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', '_theme_name'),
            'footer-menu' => esc_html__('Footer Menu', '_theme_name') 
 
        ]);
    }

    add_action('init', '_theme_name_register_menus');

    // $depth is how deep level nested for sub pages on navbar menu
    // $item is navigation for post object
    function _theme_name_dropdown_icon($title, $item, $args, $depth) {
        // main-menu is theme_location from the header.php of wp_nav_menus
        if($args -> theme_location === 'main-menu') {
            // Checking the class name exist on the navbar 
            if(in_array('menu-item-has-children', $item -> classes)) {
                // Checking if the navbar menu has zero, which means first page navbar
                if($depth === 0) {
                    $title .= ' <i class="fa fa-angle-down" aria-hidden="true"></i>';
                } else {
                    $title .= ' <i class="fa fa-angle-right aria-hidden="true"></i>';
                }
            }
        }
        return $title;
    }

    add_filter('nav_menu_item_title', '_theme_name_dropdown_icon', 10 ,4);