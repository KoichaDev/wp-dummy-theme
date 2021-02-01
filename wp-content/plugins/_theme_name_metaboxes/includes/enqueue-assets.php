<?php

function _theme_name__plugin_name_admin_scripts() {
    global $page_now;

    // Using global variable of WP to check if visitor is not accessing the post.php
    if($page_now !== 'post.php') return;

    wp_enqueue_style(
        '_theme_name-_plugin_name-admin-stylesheet', 
        plugins_url('_theme_name_metaboxes/dist/assets/css/admin.css'), 
        [], 
        '1.0.0', 
        'all'
    );
    wp_enqueue_script(
        '_theme_name-_plugin_name-admin-scripts', 
        plugins_url('_theme_name_metaboxes/dist/assets/js/admin.js'), 
        ['jquery'], 
        '1.0.0', 
        true
    );
}

add_action('admin_enqueue_scripts', '_theme_name__plugin_name_admin_scripts');
