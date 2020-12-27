<?php 
    function dummy__theme_assets() {
        wp_enqueue_style('dummy-theme-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], 'all');
    }

    add_action('wp_enqueue_scripts', 'dummy__theme_assets');