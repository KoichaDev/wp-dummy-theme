<?php 
    if(have_posts()) {
        while(have_posts()) {
            the_post();
            // We could use the code below, but using the get_post_format() will make sure WP will get whatever 
            // post format we have added on the post. It will be more flexible and WP understands it dynamically 
            // get_template_part('template-parts/post/content', 'aside';

            get_template_part('template-parts/post/content', get_post_format());
            the_posts_pagination();
            do_action('_theme_name_after_pagination');
        }
    } else {
        // 'none' is getting the content-none.php file
        get_template_part('template-parts/post/content', 'none');
    }
