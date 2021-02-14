<?php 
if(have_posts()) {
        while(have_posts()) {
            the_post();
            get_template_part('template-parts/post/content', get_post_format() );

            if(get_theme_mod('_theme_name_display_author_info', true)) {
                get_template_part('template-parts/single/author');
            }

            get_template_part('template-parts/single/navigation');
            if( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    } else {
        // 'none' is getting the content-none.php file
        get_template_part('template-parts/post/content', 'none');
    }