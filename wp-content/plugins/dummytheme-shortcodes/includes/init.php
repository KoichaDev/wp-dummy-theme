<?php

function _themename__plugin_init() {
    include_once('shortcodes/button/button.php');
}

// This action will be called when WP is initialized. 
// Because plugins are loaded in an early stage in WP, so you have to wait for WP to load using the
// init() function and then you define your shortcodes
add_action('init', '_themename__plugin_init');