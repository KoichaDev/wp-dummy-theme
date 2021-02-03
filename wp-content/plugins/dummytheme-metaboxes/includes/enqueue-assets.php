<?php

function _themename__pluginname_admin_scripts() {
    global $page_now;

    // Using global variable of WP to check if visitor is not accessing the post.php
    if($page_now !== 'post.php') return;

    wp_enqueue_style(
        '_themename-_pluginname-admin-stylesheet', 
        plugins_url('_theme_name_metaboxes/dist/assets/css/admin.css'), 
        [], 
        '1.0.0', 
        'all'
    );
    wp_enqueue_script(
        '_themename-_pluginname-admin-scripts', 
        plugins_url('_themename_metaboxes/dist/assets/js/admin.js'), 
        ['jquery'], 
        '1.0.0', 
        true
    );
}

add_action('admin_enqueue_scripts', '_themename__pluginname_admin_scripts');
