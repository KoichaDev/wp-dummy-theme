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

// This will display how many footer we want on the column of the layout
$footer_layout = '3,3,3,3';
$columns = explode(',', $footer_layout);
// 3rd param: we add it as default value
$footer_background = _theme_name_sanitize_footer_background(get_theme_mod('_theme_name_footer_background', 'dark'));
$widgets_theme = '';

if($footer_background === 'light') {
    $widgets_theme = 'c-footer-widget--dark';
} else {
    $widgets_theme = 'c-footer-widget--dark';
}

foreach ($columns as $i => $column) {
    register_sidebar([
        'id' => 'footer-sidebar-' . ($i + 1),
        'name' => sprintf(esc_html__('Footer Widghets Column %s', '_theme_name'), $i + 1),
        'description' => esc_html__('Footer widgets', '_theme_name'),
        // %1$s WP will create automatically an ID and %2$s WP will create a placeholder
        'before_widget' => '<section id="%1$s" class="c-footer-widget ' . $widgets_theme .'%2$s">', // This will be any HTMl print before the widget
        'after_widget' => '</section>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ]);
}

add_action('widgets_init', '_theme_name_sidebar_widgets');