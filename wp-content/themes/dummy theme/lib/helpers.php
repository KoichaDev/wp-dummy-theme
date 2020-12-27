<?php
    function dummy_theme_post_meta() {
        // Translators: %s: Post Date
        printf(esc_html('Posted on %s', 'dummy-theme'), 
            '<a href="' . esc_url(get_permalink()) . '">
                <time datetime="' . esc_attr(get_the_date("c")) .'">' . esc_html(get_the_date()) .'</time> 
            </a>'
            );
        // Translators: %s: Post Author
        printf(
            esc_html('By %s', 'dummy-theme'),
            '<a href="' . esc_url(get_author_posts_url(get_the_author_meta("ID"))) .'">
                ' . esc_html(get_the_author()) .
            '</a>'
        );

    ?>  
    <?php
    }

    function dummy_theme_read_more() {
        ?>
        <a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php the_title_attribute(['echo' => false]); ?>">
         <?php // Translators: %s: Post Title ?>
            <?php printf(
                    wp_kses(
                    __('Read More <span class="u-screen-reader-text">About %s </span>', 'dummy-theme'),
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