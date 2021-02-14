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