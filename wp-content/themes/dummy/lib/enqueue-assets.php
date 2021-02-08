<?php 
    function _theme_name_assets() {
        wp_enqueue_style('_theme_name-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', [], '1.0.0', 'all');
        
        include(get_template_directory() . '/lib/inline-css.php');
        wp_add_inline_style('_theme_name-stylesheet', $inline_styles);

        wp_enqueue_script('_theme_name-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], '1.0.0', true);

        // 1. Determines whether the query is for an existing single post of any post type (post, attachment, page, custom post types). 
        // 2. We use is_singular() because pages can also have comments, not only posts. If using is_singular() for page, it will return false
        if(is_singular() && comments_open() && get_option( 'thread_comments')) {  // 'thread_comments make sure to load comments only if it needed

        }
        // WP will get the comment reply for JS
        wp_enqueue_script( 'comment-reply' );
        
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

        include(get_template_directory() . '/lib/inline-css.php');

        // Handler for JS file that we want PHP variable to be available. This will be used as internal serving
        // JavaScript as an object
        wp_localize_script('_theme_name-customize-preview', '_theme_name', ['inline-css' => $inline_styles_selectors]);
    }

    add_action('wp_enqueue_scripts', '_theme_name_assets');
    add_action('admin_enqueue_scripts', '_theme_name_admin_assets');
    add_action('customize_preview_init', '_theme_name_customize_preview_js');

