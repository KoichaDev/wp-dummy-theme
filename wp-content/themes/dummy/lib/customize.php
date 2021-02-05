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

        /************************ SINGLE SETTINGS ************************/

        $wp_customize -> add_section('_theme_name_single_blog_options', [
            'title'       => esc_html('Single Blog Options', '_theme_name'),
            'description' => esc_html('You can change single options here', '_theme_name'),
            'active_callback'    => '_theme_name_show_single_blog_section'
        ]); 

        $wp_customize -> add_setting( '_theme_name_display_author_info', [
            'default'           => true,
            'transport'         => 'postMessage',
            'sanitize_callback' => '_theme_name_sanitize_checkbox',
        ]);

        $wp_customize -> add_control('_theme_name_display_author_info', [
            'type'          => 'checkbox',
            'label'         => esc_html__( 'Show Author Info', '_theme_name'),
            'section'       => '_theme_name_single_blog_options'
        ]);

        function _theme_name_show_single_blog_section() {
            global $post;
            return is_single() && $post -> post_type === 'post';
        }

        function _theme_name_sanitize_checkbox( $checked ) {
            return (isset($checked) && $checked === true    ) ? true : false;

        }

        /************************ GENERAL SETTINGS ************************/

        $wp_customize -> add_section('_theme_name_general_options', [
            'title'       => esc_html('General Options', '_theme_name'),
            'description' => esc_html('You can change general options here', '_theme_name'),
            'priority'    => 30
        ]);

        $wp_customize -> add_setting('_theme_name_accent_colour', [
            'default'           => '#20dda',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        ]);
        
        // https://developer.wordpress.org/themes/customize-api/customizer-objects/#core-custom-controls

        $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, '_theme_name_accent_colour', array(
        'label' => __( 'Accent Color', '_theme_name' ),
        'section' => '_theme_name_general_options',
        ) ) );

        /************************ FOOTER SETTINGS ************************/

        $wp_customize -> selective_refresh -> add_partial('_theme_name_footer_partial', [
            'settings' => [ // You put DOM ID of the settings here and if we have ID from the add_partial. We don't need to use 'setting' key
                '_theme_name_footer_background',
                '_theme_name_footer_layout'
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

        $wp_customize -> add_setting('_theme_name_footer_layout', [
            'default'           => '3,3,3,3',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
            'validate_callback' => '_theme_name_valider_footer_layout',// This will happen before saving to the WP database
        ]);

        $wp_customize -> add_control('_theme_name_footer_layout', [
            'type' => 'text', // This is the most important one
            'label' => esc_html__('Footer Layout', '_theme_name' ),
            'section' => '_theme_name_footer_options' 
        ]);
    }

    function _theme_name_valider_footer_layout($validity, $value) {
        // Checking string matches number, number, number and number and should not be greater than 12, which is maximum of the grid system
        $numbers = '/^([1-9]|1[012])(,([1-9]|1[012]))*$/';
        if(!preg_match($numbers, $value)) {
            // This will display an error message on the WP customize 
            $validity -> add('invalid_footer_layout', esc_html__('Footer layout is invalid!', '_theme_name'));
        }
        return $validity;
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