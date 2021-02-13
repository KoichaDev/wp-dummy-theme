<?php 

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

function _theme_name_register_required_plugins() {
    $plugins = [
        [
            'name'                  => '_theme_name metaboxes',
            'slug'                  => '_theme_name-metaboxes',
            'source'                => get_template_directory_uri() . '/lib/plugins/dummytheme-metaboxes.zip',
            'required'              => true,
            'version'               => '1.0.0',
            'force_activation'      => false, // Theme Forest will reject your theme if you set it to 'true'. Set it to false instead
            'force_deactivation'    => false
        ],
        [
            'name'                  => '_theme_name shortcodes',
            'slug'                  => '_theme_name-shortcodes',
            'source'                => get_template_directory_uri() . '/lib/plugins/dummytheme-shortcodes.zip',
            'required'              => true,
            'version'               => '1.0.0',
            'force_activation'      => false, // Theme Forest will reject your theme if you set it to 'true'. Set it to false instead
            'force_deactivation'    => false
        ]
    ];

    $config = [];

    tgmpa($plugins, $config);
}


add_action('tgmpa_register', '_theme_name_register_required_plugins');