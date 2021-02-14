<!-- It's mandatory to add the post_class() function -->
<article <?php post_class('c-post u-margin-bottom-20') ?>>
    <div class="c-post__inner">
        <?php if(get_the_post_thumbnail() !== '') : ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php endif; ?>

        <?php get_template_part('template-parts/post/header'); ?>

        <?php if(is_single()) : ?>
        <div class="c-post__content">
            <?php the_content(); ?>
        </div>
        <?php else : ?>
            <div class="c-post__excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>

        <?php if(is_single()) : ?>
            <?php get_template_part('template-parts/post/footer'); ?>
        <?php endif; ?>

        <?php 
        if(!is_single()) {
            _theme_name_read_more();
        } 
        ?>
    </div>
</article>