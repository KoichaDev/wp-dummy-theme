<?php if( post_password_required() ) return; ?>

<div id="comments" class="c-comments">
    <?php if( have_comments() ) : ?>
        <h2 class="c-comments__title">
            <!-- %1$s use these numbers if you want multiple placeholders -->
            <?php 
                // Translators: 1 is the number of comment and 2 is posts title 
                printf(
                esc_html__( _n(
                    '%1$s Reply to "%2$s"', 
                    '%1$s Replies to "%2$s"',
                    get_comments_number(),
                    '_theme_name'
                    ) ),
                    number_format_i18n( get_comments_number()),
                    get_the_title() 
                ); ?>
        </h2>
        <ul class="c-comments__list">
            <?php wp_list_comments([
                'avatar_size'       => 200,
                'reply_text'        => 'hello',
                'callback'          => '_theme_name_comment_callback'
            ]); ?>
        </ul>
        <?php the_comments_pagination(); ?>
    <?php endif; ?>
                
    <?php if(! comments_open() && get_comments_number() ) : ?>
        <p class="c-comments__closed"><?php esc_html_e('Comments are closed for this post', '_theme_nameg'); ?></p>
    <?php else : comment_form(); endif; ?>

</div>

