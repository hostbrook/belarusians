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

// Customize Login Screen
add_filter('login_headerurl', 'BCAHeaderUrl');
function BCAHeaderUrl(){
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'BCALoginCSS');
function BCALoginCSS(){
    wp_enqueue_style('fpp_login_styles', get_theme_file_uri('/assets/css/bca_admin.css'));
}