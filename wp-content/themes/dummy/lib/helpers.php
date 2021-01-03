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
        <a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php the_title_attribute(['echo' => false]); ?>">
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