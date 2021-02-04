<!-- It's mandatory to add the post_class() function -->
<article <?php post_class('c-post u-margin-bottom-20') ?>>
    <div class="c-post__inner">
        <?php if(get_the_post_thumbnail() !== '') : ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php endif; ?>

        <header class="c-post__header">
            <!-- Determines whether the query is for an existing single post. (WordPress Snippets) -->
            <?php if(is_single()) : ?>
            <h1 class="c-post__single-title">
                <a 
                    href="<?php the_permalink(); ?>" 
                    title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
            <?php else : ?>
            <h2 class="c-post__title">
                <a 
                    href="<?php the_permalink(); ?>" 
                    title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php endif; ?>
            <div class="c-post__meta">
                <?php _theme_name_post_meta(); ?>
            </div>
        </header>
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
            <footer class="c-post__footer">
                <?php if(has_category()) : ?>
                    <div class="c-post__cats">
                        <?php 
                            // translators of esc_html() which is used between categories
                            $category_list = get_the_category_list( esc_html__(', ', '_theme_name' ) );
                            // translators of esc_html which is %s is the categorie list
                            printf( esc_html__('Posted in %s', '_theme_name'), $category_list );
                        ?>
                    </div>                
                <?php endif; ?>

                <?php if(has_tag()) : ?>
                    <div class="c-post__tags">
                        <?php 
                            $tag_list = get_the_tag_list( '<ul><li>','</li><li>','</li></ul>' );
                            echo $tag_list;
                        ?>
                    </div>
                <?php endif; ?>
            </footer>
        <?php endif; ?>

        <?php 
        if(!is_single()) {
            _theme_name_read_more();
        } 
        ?>
    </div>
</article>