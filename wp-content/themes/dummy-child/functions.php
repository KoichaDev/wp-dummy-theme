<?php 
    function dummy_theme_child_scripts() {
        // get_stylesheet_directory_uri() will reference the active theme, even if it's inside a child theme 
        // ! get_template_directory_uri() will always reference the parent theme even if you are using a child theme

        wp_enqueue_style(
            'dummy_theme_child_style_sheet', 
            get_stylesheet_directory_uri() . '/bundle.css',
            ['_theme_name-stylesheet'], // if empty array. The functions.php of the child theme will run first. If not, it will run after the parent theme
            '1.0.0',
            'all'
        );
    }

    function _theme_name_post_meta() {
        echo 'uoppppp';
    }

    add_action('wp_enqueue_scripts', 'dummy_theme_child_scripts');