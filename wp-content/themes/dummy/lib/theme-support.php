<?php 
    function _theme_name_theme_support() {
        // This is to add title tag, altso <title></title>
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', [
            'search-form', 
            'comment-list', 
            'comment-form', 
            'gallery', 
            'caption'
        ]);
        // This will act like selective refresh. it only refresh once, but after that, it won't refresh again when choosing different widgets
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('custom-logo', [
            'height'      => 200,
            'width'       => 600,
            'flex-height' => true,
            'flex-width'  => true
        ]);

        // More info: https://wordpress.org/support/article/post-formats/#supported-formats
        add_theme_support( 'post-formats', [
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'
        ]);
    }

    // after_setup_theme action is to add features that are not supported by WP default
    add_action('after_setup_theme', '_theme_name_theme_support');