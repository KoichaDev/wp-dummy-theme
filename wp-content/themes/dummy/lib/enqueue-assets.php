<?php 
    function dummy_theme_assets() {
        wp_enqueue_style('dummy-theme-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], '1.0.0', 'all');
        wp_enqueue_script('dummy-theme-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', [], '1.0.0', true);
        
    }

    function dummy_theme_admin_assets() {
        wp_enqueue_style('dummy-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', [], '1.0.0', 'all');
        wp_enqueue_script('dummy-theme-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', [], '1.0.0', true);

    }

    add_action('wp_enqueue_scripts', 'dummy_theme_assets');
    add_action('admin_enqueue_scripts', 'dummy_theme_admin_assets');

