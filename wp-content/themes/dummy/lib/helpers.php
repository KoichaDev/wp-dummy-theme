<?php
    if(!function_exists('_theme_name_post_meta')) {
        function _theme_name_post_meta() {
            // Translators: %s: Post Date
            printf(esc_html('Posted on %s', '_theme_name'), 
                '<a href="' . esc_url(get_permalink()) . '">
                    <time datetime="' . esc_attr(get_the_date("c")) .'">' . esc_html(get_the_date()) .'</time> 
                </a>'
                );
            // Translators: %s: Post Author
            printf(
                esc_html('By %s', '_theme_name'),
                '<a href="' . esc_url(get_author_posts_url(get_the_author_meta("ID"))) .'">
                    ' . esc_html(get_the_author()) .
                '</a>'
            );
        }
    }
    

    function _theme_name_read_more() {
        ?>
        <a 
            href="<?php echo esc_url(get_the_permalink()); ?>" 
            title="<?php the_title_attribute(['echo' => false]); ?>" 
            class="c-post__readmore">
         <?php // Translators: %s: Post Title ?>
            <?php printf(
                    wp_kses(
                    __('Read More <span class="u-screen-reader-text">About %s </span>', '_theme_name'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                get_the_title()
            )?>
        </a>
        <?php
    }

    function _theme_name_delete_post() {
        $url = add_query_arg([
            'action'    => '_theme_name_delete_post',
            'post'      => get_the_ID(),
            // nonce will create hash and the hash will contain information like current user ID and the current user session token
            // Session token is generated when logging into the WP. It's an unique token. If you log in with the same account
            // but in another browser. The token will be different. It also contains information about the time that this nonce
            // was generated as well. It also contains that you specified by on the action of the wp_create_nonce('action');
            'nonce'     => wp_create_nonce( '_theme_name_delete_post_' . get_the_ID() ), // the string can be arbiritary name
        ], home_url() );

        if(current_user_can('delete_post', get_the_ID())) {
            return "<a href='" . esc_url($url) . "'>" . esc_html__('Delete Post', '_theme_name') . "</a>";
        }
    }

    function _theme_name_meta($id, $key, $default = true ) {
        $value = get_post_meta( $id, $key , $default);
        
        if(!$value && $default) {
            return $default;
        }
        return $value;
    }