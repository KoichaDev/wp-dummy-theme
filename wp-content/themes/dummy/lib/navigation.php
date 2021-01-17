<?php 

    function _theme_name_register_menus() {
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', '_theme_name'),
            'footer-menu' => esc_html__('Footer Menu', '_theme_name') 
 
        ]);
    }

    add_action('init', '_theme_name_register_menus');