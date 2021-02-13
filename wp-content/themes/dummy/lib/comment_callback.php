<?php 

// $args is coming from the comments.php file of the function named wp_list_comments of list of different args from the array of the function
function _theme_name_comment_callback($comment, $args, $depth) {
   ?>
    <li <?php comment_class(['c-comment', $comment-> comment_parent ? 'c-comment--child' : '']); ?>>
        <article id="comment-<?php comment_ID(); ?>" class="c-comment__body">
            <?php echo get_avatar( $comment, 100, false, false, ['class' => 'c-comment__avatar'] ) ?>
            <?php edit_comment_link( 
                esc_html__('Edit Comment', '_theme_name'),
                '<span class="c-comment__edit-link">',
                '</span>' 
                ); 
            ?>

            <div class="c-comment__content">
                <div class="c-comment__author"><?php echo get_comment_author_link($comment); ?></div>
                <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>" class="c-comment__time">
                    <!-- Format for comment_time() and the format for the 'datetime' attribute is 'c' -->
                    <time datetime="<?php comment_time('c'); ?>">
                        <!-- Determines the difference between two timestamps. -->
                        <!-- U is the timestamp -->
                        <?php 
                            printf(esc_html__( '%s ago', '_theme_name'), human_time_diff( get_comment_time( 'U' ), current_time( 'U' )));
                        ?>
                    </time>
                </a>
            </div>
        </article>
   <?php 
   // We don't use </li> as closing tag, because WP automatically close it for us
   // This is because if you have comment that has children or has replies, the replies will also be inside the <li>. 
   // WP will check that if the comment has replies. It will then add the replies and then close the </li> for us
}