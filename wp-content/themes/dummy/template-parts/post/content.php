<!-- It's mandatory to add the post_class() function -->
<article <?php post_class('c-post u-margin-bottom-20') ?>>
    <h2 class="c-post__title">
        <a 
            href="<?php the_permalink(); ?>" 
            title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
    <div class="c-post__meta">
        <?php _theme_name_post_meta(); ?>
    </div>
    <div class="c-post__excerpt">
        <?php the_excerpt(); ?>
    </div>
        <?php _theme_name_read_more(); ?>
        <?php echo _theme_name_delete_post(); ?>
</article>