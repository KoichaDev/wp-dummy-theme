<?php get_header(); ?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row">
        <div class="
            o-row__column 
            o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> 
            @medium"
        >
            <main role="main">
                <!-- 1st and 2nd param will give like loop-index.php. If loop-index.php is not found, then it will fallback to loop.php -->
                <?php get_template_part( 'loop', 'index'); ?>
            </main>
        </div>
        <?php if(is_active_sidebar('primary-sidebar')) : ?>
            <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>