<?php 

// For more info: https://developer.wordpress.org/reference/functions/add_meta_box/

function _themename_add_meta_box() {
    add_meta_box( 
        '_themename_post_metabox', 
        'Post Settings', 
        '_themename_post_metabox_html', 
        ['post', 'pages'],  // array of post types
        'normal', // Could also be used for 'side' or 'advanced'
        'default'); // priority where meta box will display
}

function _themename_post_metabox_html($post) {
    $subtitle = get_post_meta($post->ID, '__themename_post_subtitle', true); // Will return first value in the array
    $layout = get_post_meta($post->ID, '__themename_post_layout', true);
    wp_nonce_field( '_themename_update_post_metabox', '_themename_update_post_nonce' );
    ?>
    <p>
        <label for="_themename_post_metabox_html"><?php esc_html_e( 'Post Subtitle', '_themename' ); ?></label>
        <br />
        <input class="widefat" type="text" name="_themename_post_subtitle_field" id="_themename_post_metabox_html" value="<?php echo esc_attr( $subtitle ); ?>" />
    </p>
    <p>
        <label for="_themename_post_layout_field"><?php esc_html_e( 'Layout', '_themename' ); ?></label>
        <select name="_themename_post_layout_field" id="_themename_post_layout_field" class="widefat">
            <option <?php selected( $layout, 'full' ); ?> value="full"><?php esc_html_e( 'Full Width', '_themename' ); ?></option>
            <option <?php selected( $layout, 'sidebar' ); ?> value="sidebar"><?php esc_html_e( 'Post With Sidebar', '_themename' ); ?></option>
        </select>
    </p>
    <?php
}

function _themename_save_post_metabox($post_id, $post) {
    // This will make if our post type is to saved is post, page or CPT
    // 'cap' is an object key which stands for capability. It contains all the capabilities and their names
    $edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;
    if( !current_user_can( $edit_cap, $post_id )) {
        return;
    }

    // This is to secure by saving our metaboxes of using nonce
    if( !isset( $_POST['_themename_update_post_nonce']) || !wp_verify_nonce( $_POST['_themename_update_post_nonce'], '_themename_update_post_metabox' )) {
        return;
    }
    
    if(array_key_exists('_themename_post_subtitle_field', $_POST)) {
        // We could use add_post_meta() but the problem it will create new meta key/value whole time. 
        // Instead, it's better to use update_post_meta, since it will update the same row instead of creating new rows all the time
        update_post_meta( 
            $post_id, 
            '__themename_post_subtitle', 
            sanitize_text_field($_POST['_themename_post_subtitle_field'])
        );
    }

    if(array_key_exists('_themename_post_layout_field', $_POST)) {
        update_post_meta( 
            $post_id, 
            '__themename_post_layout',  // reason we have double underscore is that when running prod. we will get _dummy_theme, and not __dummy_theme
            sanitize_text_field($_POST['_themename_post_layout_field'])  // remove unwanted HTML or any unwanted tags
        );
    }
}

add_action( 'add_meta_boxes', '_themename_add_meta_box' );
add_action( 'save_post', '_themename_save_post_metabox', 10, 2 );

