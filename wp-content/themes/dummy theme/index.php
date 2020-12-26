<?php get_header(); ?>

<?php if(have_posts()) : 
    while(have_posts()) : the_post();  ?>
        <h2>
            <a 
                href="<?php the_permalink(); ?>" 
                title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <div>
           <?php dummy_theme_post_meta(); ?>
        </div>
        
        <div>
            <?php the_excerpt(); ?>
        </div>
            <?php dummy_theme_read_more(); ?>
    <?php endwhile;?>
    <?php the_posts_pagination(); ?>
<?php else : ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>


<?php get_footer(); ?>