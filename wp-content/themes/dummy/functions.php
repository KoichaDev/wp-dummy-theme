<?php 
    require_once('lib/helpers.php');
    require_once('lib/enqueue-assets.php');
    
    function after_pagination() {
        echo 'hello world';
    }

    function after_pagination_2() {
        echo 'blleheheheh ekejijej';
    }

    add_action('_theme_name_after_pagination', 'after_pagination');
        add_action('_theme_name_after_pagination', 'after_pagination_2');