<?php 
// This is for the admin dashboard where we have a widget to display what we want to add on the sidebar widget
function _theme_name_sidebar_widgets() {
    register_sidebar([
        'id' => 'primary-sidebar',
        'name' => esc_html__('Primary Sidebar', '_theme_name'),
        'description' => esc_html__('This sidebar appears in the blog post page', '_theme_name'),
        // %1$s WP will create automatically an ID and %2$s WP will create a placeholder
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">', // This will be any HTMl print before the widget
        'after_widget' => '</section>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ]);
}

add_action('widgets_init', '_theme_name_sidebar_widgets');