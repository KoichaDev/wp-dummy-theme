<?php 

// For more info: https://developer.wordpress.org/reference/functions/add_meta_box/

function _themename_add_metabox() {
    add_meta_box(
        '_themename-_pluginname_post_metabox', 
        __('Post Settings', '_themename-_pluginname'),
        '_themename-_pluginname_post_metabox_html',
        ['post', 'page'], // array of post types
        'side', // Could also be used for 'side' or 'advanced'
        'default' // priority where meta box will display
    ); 

    
}

function _themename_post_metabox_html($post) { 
        // var_dump(get_post_type_object( $post->post_type ));
        $subtitle = get_post_meta(
            $post->ID, 
            '_themename-_pluginname_post_subtitle', 
            true // Will return first value in the array
        );
        $layout = get_post_meta($post->ID, '_themename-_pluginname_post_layout', true);
        wp_nonce_field( '_themename-_pluginname_update_post_metabox', '_themename-_pluginname_update_post_nonce' );
    ?>
     <p>
        <label for="_themename-_pluginname_post_metabox_html"><?php esc_html_e( 'Post Subtitle', '_themename-_pluginname' ); ?></label>
        <br />
        <input 
            class="widefat" 
            type="text" 
            name="_themename-_pluginname_post_subtitle_field" 
            id="_themename-_pluginname_post_metabox_html" 
            value="<?php echo esc_attr( $subtitle ); ?>" 
        />
    </p>
    <p>
        <label for="_themename-_pluginname_post_layout_field"><?php esc_html_e( 'Layout', '_themename-_pluginname' ); ?></label>
        <select name="_themename-_pluginname_post_layout_field" id="_themename-_pluginname_post_layout_field" class="widefat">
            <option <?php selected( $layout, 'full' ); ?> value="full"><?php esc_html_e( 'Full Width', '_themename-_pluginname' ); ?></option>
            <option <?php selected( $layout, 'sidebar' ); ?> value="sidebar"><?php esc_html_e( 'Post With Sidebar', '_themename-_pluginname' ); ?></option>
        </select>
    </p>
    <?php 
}

function _themename_save_post_metabox($post_id, $post) {   
    // This will make if our post type is to saved is post, page or CPT
    // 'cap' is an object key which stands for capability. It contains all the capabilities and their names
    $edit_capability = get_post_type_object( $post->post_type ) -> cap -> edit_post; 

    if(!current_user_can( $edit_capability, $post_id )) {
        return;
    }

    // This is to secure by saving our metaboxes of using nonce
     if( !isset( $_POST['_themename-_pluginname_update_post_nonce']) || !wp_verify_nonce( $_POST['_themename-_pluginname_update_post_nonce'], '_themename-_pluginname_update_post_metabox' )) {
        return;
    }

    if(array_key_exists('_themename-_pluginname_post_subtitle_field', $_POST)) {
        // We could use add_post_meta() but the problem it will create new meta key/value whole time. 
        // Instead, it's better to use update_post_meta, since it will update the same row instead of creating new rows all the time
        update_post_meta( 
            $post_id, 
            '_themename-_pluginname_post_subtitle',  // reason we have double underscore is that when running prod. we will get _dummy_theme, and not __dummy_theme
            sanitize_text_field( $_POST['_themename-_pluginname_post_subtitle_field'] ) // remove unwanted HTML or any unwanted tags
        );
    }
    
    if(array_key_exists('_themename-_pluginname_post_layout_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '_themename-_pluginname_post_layout', 
            sanitize_text_field($_POST['_themename-_pluginname_post_layout_field'])
        );
    }
}

add_action('add_meta_boxes', '_themename-_pluginname_add_metabox' );
add_action('save_post', '_themename-_pluginname_save_post_metabox', 10, 2 );