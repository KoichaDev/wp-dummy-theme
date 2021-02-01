<?php 

// For more info: https://developer.wordpress.org/reference/functions/add_meta_box/

function _theme_name_add_metabox() {
    add_meta_box(
        '_theme_name-_plugin_name_post_metabox', 
        __('Post Settings', '_theme_name-_plugin_name'),
        '_theme_name-_plugin_name_post_metabox_html',
        ['post', 'page'], // array of post types
        'side', // Could also be used for 'side' or 'advanced'
        'default' // priority where meta box will display
    ); 

    
}

function _theme_name_post_metabox_html($post) { 
        // var_dump(get_post_type_object( $post->post_type ));
        $subtitle = get_post_meta(
            $post->ID, 
            '__theme_name-_plugin_name_post_subtitle', 
            true // Will return first value in the array
        );
        $layout = get_post_meta($post->ID, '__theme_name-_plugin_name_post_layout', true);
        wp_nonce_field( '_theme_name-_plugin_name_update_post_metabox', '_theme_name-_plugin_name_update_post_nonce' );
    ?>
     <p>
        <label for="_theme_name-_plugin_name_post_metabox_html"><?php esc_html_e( 'Post Subtitle', '_theme_name-_plugin_name' ); ?></label>
        <br />
        <input 
            class="widefat" 
            type="text" 
            name="_theme_name-_plugin_name_post_subtitle_field" 
            id="_theme_name-_plugin_name_post_metabox_html" 
            value="<?php echo esc_attr( $subtitle ); ?>" 
        />
    </p>
    <p>
        <label for="_theme_name-_plugin_name_post_layout_field"><?php esc_html_e( 'Layout', '_theme_name-_plugin_name' ); ?></label>
        <select name="_theme_name-_plugin_name_post_layout_field" id="_theme_name-_plugin_name_post_layout_field" class="widefat">
            <option <?php selected( $layout, 'full' ); ?> value="full"><?php esc_html_e( 'Full Width', '_theme_name-_plugin_name' ); ?></option>
            <option <?php selected( $layout, 'sidebar' ); ?> value="sidebar"><?php esc_html_e( 'Post With Sidebar', '_theme_name-_plugin_name' ); ?></option>
        </select>
    </p>
    <?php 
}

function _theme_name_save_post_metabox($post_id, $post) {   
    // This will make if our post type is to saved is post, page or CPT
    // 'cap' is an object key which stands for capability. It contains all the capabilities and their names
    $edit_capability = get_post_type_object( $post->post_type ) -> cap -> edit_post; 

    if(!current_user_can( $edit_capability, $post_id )) {
        return;
    }

    // This is to secure by saving our metaboxes of using nonce
     if( !isset( $_POST['_theme_name-_plugin_name_update_post_nonce']) || !wp_verify_nonce( $_POST['_theme_name-_plugin_name_update_post_nonce'], '_theme_name-_plugin_name_update_post_metabox' )) {
        return;
    }

    if(array_key_exists('_theme_name-_plugin_name_post_subtitle_field', $_POST)) {
        // We could use add_post_meta() but the problem it will create new meta key/value whole time. 
        // Instead, it's better to use update_post_meta, since it will update the same row instead of creating new rows all the time
        update_post_meta( 
            $post_id, 
            '__theme_name-_plugin_name_post_subtitle',  // reason we have double underscore is that when running prod. we will get _dummy_theme, and not __dummy_theme
            sanitize_text_field( $_POST['_theme_name-_plugin_name_post_subtitle_field'] ) // remove unwanted HTML or any unwanted tags
        );
    }
    
    if(array_key_exists('_theme_name-_plugin_name_post_layout_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '__theme_name-_plugin_name_post_layout', 
            sanitize_text_field($_POST['_theme_name-_plugin_name_post_layout_field'])
        );
    }
}

add_action('add_meta_boxes', '_theme_name-_plugin_name_add_metabox' );
add_action('save_post', '_theme_name-_plugin_name_save_post_metabox', 10, 2 );