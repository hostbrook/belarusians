<?php

function theme_features(){
    // Register Menus
    register_nav_menu('subMenuAbout', 'Sub Menu About');
    register_nav_menu('subMenuPrograms', 'Sub Menu Programs');
    register_nav_menu('subMenuCommunities', 'Sub Menu Communities');
    register_nav_menu('footerMenuLeft', 'Footer Left Menu');
    register_nav_menu('footerMenuRight', 'Footer Right Menu');

    // Automatically create the page title:
    add_theme_support('title-tag');
    // Use featured images:
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_features');

/**
 * Customize Login Screen 
 */ 
add_filter('login_headerurl', 'BCAHeaderUrl');
function BCAHeaderUrl(){
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'BCALoginCSS');
function BCALoginCSS(){
    wp_enqueue_style('fpp_login_styles', get_theme_file_uri('/css/bca_admin.css'));
}

add_filter( 'login_display_language_dropdown', '__return_false' );

/**
 * Simple Count Post Views
 */
function hb_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    if ($count == '') $count = 0;
    return $count;
}
function hb_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function hb_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function hb_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo hb_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'hb_posts_column_views' );
add_action( 'manage_posts_custom_column', 'hb_posts_custom_column_views' );