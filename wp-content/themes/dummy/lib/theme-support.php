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
    }

    // after_setup_theme action is to add features that are not supported by WP default
    add_action('after_setup_theme', '_theme_name_theme_support');