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
            <p>
                Posted on 
                <a href="<?php echo get_permalink(); ?>">
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> 
                </a>
                By 
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php echo get_the_author(); ?>
                </a>
            </p> 
        </div>
        
        <div>
            <?php the_excerpt(); ?>
        </div>
        <a href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            Read More <span class="u-screen-reader-text">About <?php the_title(); ?></span>
        </a>
    <?php endwhile;?>
    <?php the_posts_pagination(); ?>
<?php else : ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>


<?php get_footer(); ?>