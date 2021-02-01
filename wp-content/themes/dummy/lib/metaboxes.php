<?php 

// For more info: https://developer.wordpress.org/reference/functions/add_meta_box/

function _theme_name_add_metabox() {
    add_meta_box(
        '_theme_name_post_metabox', 
        __('Post Settings', '_theme_name'),
        '_theme_name_post_metabox_html',
        ['post', 'page'], // array of post types
        'side', // Could also be used for 'side' or 'advanced'
        'default' // priority where meta box will display
    ); 

    
}

function _theme_name_post_metabox_html($post) { 
        $subtitle = get_post_meta(
            $post->ID, 
            '__theme_name_post_subtitle', 
            true // Will return first value in the array
        );
    ?>
     <p>
        <label for="_theme_name_post_metabox_html"><?php esc_html_e( 'Post Subtitle', '_theme_name' ); ?></label>
        <br />
        <input 
            class="widefat" 
            type="text" 
            name="_theme_name_post_subtitle_field" 
            id="_theme_name_post_metabox_html" 
            value="<?php echo esc_attr( $subtitle ); ?>" 
        />
    </p>
    <?php 
}

function _theme_name_save_post_metabox($post_id, $post) {   
    if(array_key_exists('_theme_name_post_subtitle_field', $_POST)) {
        // We could use add_post_meta() but the problem it will create new meta key/value whole time. 
        // Instead, it's better to use update_post_meta, since it will update the same row instead of creating new rows all the time
        update_post_meta( 
            $post_id, 
            '__theme_name_post_subtitle',  // reason we have double underscore is that when running prod. we will get _dummy_theme, and not __dummy_theme
            sanitize_text_field( $_POST['_theme_name_post_subtitle_field'] ) // remove unwanted HTML or any unwanted tags
        );
    }   
}

add_action('add_meta_boxes', '_theme_name_add_metabox' );
add_action('save_post', '_theme_name_save_post_metabox', 10, 2 );