<?php 
    function _theme_name_assets() {
        wp_enqueue_style('_theme_name-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], '1.0.0', 'all');
        wp_enqueue_script('_theme_name-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], '1.0.0', true);
        
    }

    function _theme_name_admin_assets() {
        wp_enqueue_style('_theme_name-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', [], '1.0.0', 'all');
        wp_enqueue_script('_theme_name-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', [], '1.0.0', true);
    }

    function _theme_name_customize_preview_js() {
        wp_enqueue_script(
            '_theme_name-customize-preview', 
            get_template_directory_uri() . '/dist/assets/js/customize-preview.js', 
            ['customize-preview', 'jquery'], 
            '1.0.0', 
            true
        );
    }

    add_action('wp_enqueue_scripts', '_theme_name_assets');
    add_action('admin_enqueue_scripts', '_theme_name_admin_assets');
    add_action('customize_preview_init', '_theme_name_customize_preview_js');

