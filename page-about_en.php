<?php
/**
 * Template to show page "About - EN"
 */
get_header();

while(have_posts()) {
    the_post(); 
    the_content(); 
}

get_footer();
?>