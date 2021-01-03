<?php 
    if(have_posts()) {
        while(have_posts()) {
            the_post();
            get_template_part('template-parts/post/content');
            the_posts_pagination();
            do_action('_theme_name_after_pagination');
        }
    } else {
        // 'none' is getting the content-none.php file
        get_template_part('template-parts/post/content', 'none');
    }
