<?php
    function _theme_name_handle_delete_post() {
        if(isset($_GET['action']) && $_GET['action'] === '_theme_name_delete_post') {

            // the action from the wp_verify_nonc(nonce, 'action')e is from the inside of the function _theme_name_delete_post from helpers.php
            if(!isset($_GET['nonce']) || !wp_verify_nonce($_GET['nonce'], '_theme_name_delete_post_' . $_GET['post'])) {
                return;
            }

            $post_id = isset($_GET['post']) ? $_GET['post'] : null;
            $post = get_post((int) $post_id);

            // Determine if av variable is empty or not
            if(empty($post)) {
                return;
            } 

            if(!current_user_can('delete_post', $post_id)) {
                return;
            }

            wp_trash_post( $post_id );
            // Performs a safe (local url) redirect. NOT external url
            wp_safe_redirect( home_url() );
            die;
        }
    }

    add_action( 'init', '_theme_name_handle_delete_post' );
