<?php
    function dummy_theme_post_meta() {
    ?>  
        <p>
            Posted on 
            <a href="<?php echo get_permalink(); ?>">
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> 
            </a>
            By 
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author(); ?>
            </a>
        </p> 
    <?php
    }

    function dummy_theme_read_more() {
        ?>
        <a href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(['echo' => false]); ?>">
            Read More <span class="u-screen-reader-text">About <?php the_title(); ?></span>
        </a>
        <?php
    }