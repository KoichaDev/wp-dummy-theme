<?php 
    $previous_post = get_previous_post();
    $next_post = get_next_post();
?>

<?php if($previous_post || $next_post) : ?>
<nav class="c-post-navigation" role="navigation">
    <h2 class="u-screen-reader-text"><?php esc_attr_e( 'Post Navigation', '_theme_name'); ?></h2>
    <div class="c-post-navigation__links">
        <?php if($previous_post) : ?>
            <div class="c-post-navigation__post c-post-navigation__post--prev">
                <a href="<?php the_permalink( $previous_post -> ID); ?>" class="c-post-navigation__link">
                    <?php if(has_post_thumbnail( $previous_post -> ID)) : ?>
                        <div class="c-post-navigation__thumbnail">
                            <?php echo get_the_post_thumbnail( $previous_post -> ID, 'thumbnail' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="c-post-navigation__content">
                        <span class="c-post-navigation__subtitle">
                            <?php esc_html_e( 'Previous Post', '_theme_name'); ?>
                        </span>
                        <span class="c-post-navigation__title">
                            <?php echo esc_html( get_the_title( $previous_post -> ID )); ?>
                        </span>
                    </div>
                </a>
            </div>
        <?php endif; ?>

            <?php if($next_post) : ?>
            <div class="c-post-navigation__post c-post-navigation__post--prev">
                <a href="<?php the_permalink( $next_post -> ID); ?>" class="c-post-navigation__link">
                    <?php if(has_post_thumbnail( $next_post -> ID)) : ?>
                        <div class="c-post-navigation__thumbnail">
                            <?php echo get_the_post_thumbnail( $next_post -> ID, 'thumbnail' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="c-post-navigation__content">
                        <span class="c-post-navigation__subtitle">
                            <?php esc_html_e( 'Next Post', '_theme_name'); ?>
                        </span>
                        <span class="c-post-navigation__title">
                            <?php echo esc_html( get_the_title( $next_post -> ID )); ?>
                        </span>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<?php endif; ?>