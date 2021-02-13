<?php 

// $args is coming from the comments.php file of the function named wp_list_comments of list of different args from the array of the function
function _theme_name_comment_callback($comment, $args, $depth) {
   ?>
    <li  id="comment-<?php comment_ID(); ?>" <?php comment_class(['c-comment', $comment-> comment_parent ? 'c-comment--child' : '']); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="c-comment__body">
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
                <!-- 0 means the comment has not approved. Basically like boolean of true false. False is 0 and true is 1  -->
                <?php if($comment -> comment_approved === '0') : ?>
                    <p class="c-comment__awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', '_theme_name'); ?></p>
                <?php endif; ?>
                <?php 
                    comment_text(); 
                    comment_reply_link([
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'add_below' => 'div-comment',
                        'before'    => '<div class="c-comment__reply-link">',
                        'after'     => '</div>'
                    ]);
                ?>
            </div>
        </article>
   <?php 
   // We don't use </li> as closing tag, because WP automatically close it for us
   // This is because if you have comment that has children or has replies, the replies will also be inside the <li>. 
   // WP will check that if the comment has replies. It will then add the replies and then close the </li> for us
}