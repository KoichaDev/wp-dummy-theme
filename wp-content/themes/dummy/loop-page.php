<?php 
if(have_posts()) {
    while(have_posts()) {
        the_post();
        get_template_part('template-parts/page/content');
        if( comments_open() || get_comments_number() ) {
            comments_template();
        }
    }
} else {
    // 'none' is getting the content-none.php file
    get_template_part('template-parts/post/content', 'none');
}