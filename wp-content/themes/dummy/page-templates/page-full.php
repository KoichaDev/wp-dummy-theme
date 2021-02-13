<?php 
    // We have to create a Template Name as a comment in order to get WP Admin Dashboard page to display option of the Page Attributes
    // This is required from WP that you need to have this comment below

    /**
     * Template Name: Full Width Page
     */


    get_header(); 
?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12 o-row__column--span-12@medium">
            <main role="main">
                <?php get_template_part('loop', 'page'); ?>
            </main>
        </div>
    </div>
</div>
<?php get_footer(); ?>