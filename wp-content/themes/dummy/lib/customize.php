<?php 
    // https://developer.wordpress.org/themes/customize-api/customizer-objects
    // Customize API is about customizing our own WP Theme customizer. 
    // WP Comes already off as default WP Core of site identity, menus, widgets, Homepage settings and additional CSS
    // But we can expand it more further by creating our own customize menu


    // https://developer.wordpress.org/themes/customize-api/customizer-objects/#settings
    function _theme_name_customize_register( $wp_customize ) {

        $wp_customize -> get_setting('blogname') -> transport = 'postMessage';

        $wp_customize -> selective_refresh -> add_partial('blogname', [
            // 'settings' => [] // You put DOM ID of the settings here and if we have ID from the add_partial. We don't need to use 'setting' key
            'selectors' => '.c-header__blogname', 
            'container_inclusive' => false,
            'render_callback' => function() {
                bloginfo('name');
            }
        ]);

        $wp_customize -> selective_refresh -> add_partial('_theme_name_footer_partial', [
            'settings' => [ // You put DOM ID of the settings here and if we have ID from the add_partial. We don't need to use 'setting' key
                '_theme_name_footer_background'
            ], 
            'selectors' => '#footer', 
            'container_inclusive' => false, // partial will replace the whole .c-site-info, and we do not put content inside of it
            'render_callback' => function() {
                get_template_part('template-parts/footer/widget');
                get_template_part('template-parts/footer/info');
            }
        ]);

        $wp_customize -> add_section('_theme_name_footer_options', [
            'title' => esc_html('Footer Options', '_theme_name'),
            'description' => esc_html('You can change footer options here', '_theme_name'),
            'priority' => 30
        ]);

        $wp_customize -> add_setting('_theme_name_site_info', [
            'default' => '',
            'sanitize_callback' => '_theme_name_sanitize_site_info',
            'transport' => 'postMessage',
        ]); 

        // https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
        $wp_customize -> add_control('_theme_name_site_info', [
            'type' => 'text', // This is the most important one
            'label' => esc_html__('Site info', '_theme_name' ),
            'section' => '_theme_name_footer_options' 
        ]);
        
        $wp_customize -> add_setting('_theme_name_footer_background', [
            'default'           => 'dark',
            'transport'         => 'postMessage',
            'sanitize_callback' => '_theme_name_sanitize_footer_background'
        ]);

        $wp_customize -> add_control('_theme_name_footer_background', [
            'type' => 'select',
            'label' => esc_html__('Footer background', '_theme_name'),
            'choices' => [
                'light' => esc_html__('Light', '_theme_name'),
                'dark' => esc_html__('Dark', '_theme_name'),
            ],
            'section' => '_theme_name_footer_options'
        ]);

    }

    function _theme_name_sanitize_footer_background($input) {
        $valid = ['light', 'dark'];

        // 3rd param: check for value on type 
        if(in_array($input, $valid, true)) {
            return $input;
        } 
        return 'dark';
    }


    function _theme_name_sanitize_site_info( $input ) {
        $allowed_once = ['a' => [
            'href' => [],
            'title' => [], 
        ]];
        // This function takes a string input and an array of allowed HTML. 
        // It removes any HTML except for that allowed once
        return wp_kses($input, $allowed_once);
    }

    add_action('customize_register', '_theme_name_customize_register');