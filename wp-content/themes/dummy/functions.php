<?php 
    require_once('lib/helpers.php');
    require_once('lib/enqueue-assets.php');
    require_once('lib/sidebars.php');
    
    function after_pagination() {
        echo 'hello world';
    }

    function after_pagination_2() {
        echo 'blleheheheh ekejijej';
    }

    add_action('_theme_name_after_pagination', 'after_pagination');
    add_action('_theme_name_after_pagination', 'after_pagination_2');

    add_action('pre_get_posts', 'function_to_add');

    function function_to_add($query) {
        if($query -> is_main_query()) {
            $query -> set('posts_per_page', 2);
        }
    }

    function _theme_name_no_posts_text($text) {
        return esc_html__('No Posts!', 'dummy-child-theme');
    }

    add_filter('_theme_name_no_posts_text', '_theme_name_no_posts_text');

    function filter_title($title) {
        return 'Filtered ' . $title;
    }

    add_filter('the_title', 'filter_title'); 