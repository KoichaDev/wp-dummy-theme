<?php 
    // We have to create a Template Name as a comment in order to get WP Admin Dashboard page to display option of the Page Attributes
    // This is required from WP that you need to have this comment below

    /**
     * Template Name:  Display Content on Page Only
     */


    get_header(); 
?>

<main role="main">
    <?php while(have_posts()) : the_post(); ?>
        <article <?php post_class() ?>>
            <?php the_content(); ?>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>