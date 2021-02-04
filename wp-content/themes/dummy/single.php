<?php get_header(); ?>
<?php 
    $layout = _theme_name_meta( get_the_id(), '__themename_post_layout', 'full');
    $sidebar = is_active_sidebar( 'primary-sidebar' );

    if($layout === 'sidebar' && !$sidebar) {
        $layout = 'full';
    }
?>
<div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout; ?>">
    <div class="o-row">
        <div class="
            o-row__column 
            o-row__column--span-12
            o-row__column--span-<?php echo $layout ==='sidebar' ? '8' : '12' ?>@medium
        ">
            <main role="main">
                <?php if(have_posts()) {
                        while(have_posts()) {
                            the_post();
                            get_template_part('template-parts/post/content');
                        }
                    } else {
                        // 'none' is getting the content-none.php file
                        get_template_part('template-parts/post/content', 'none');
                    }
                ?>
            </main>
        </div>
        <?php if($layout === 'sidebar') : ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
            <?php get_sidebar(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>