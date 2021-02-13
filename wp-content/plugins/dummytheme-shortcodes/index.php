<?php
/*
    Plugin Name: _themename _pluginname
    Plugin URI: 
    Description: This is just a very simple dummy shortcodes plugin
    Version: 1.0.0
    Author: Khoi Hoang
    Author URI: koicha.dev
    License: GPL2
    License URI: https://gnu.org/licenses/gpl-2.0.html
    Text Domain: _themename-_pluginname
    Domain Path: /languages
*/

// Prevent direct access to your index.php file
// Read More: https://wordpress.stackexchange.com/questions/108418/what-are-the-differences-between-wpinc-and-abspath
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

include_once('includes/init.php');
include_once('includes/shortcodes/button/button.php');
include_once('includes/enqueue-assets.php');


