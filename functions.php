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
 * Widget areas in side bars
 */
function bca_register_sidebars() {

	// Register the right sidebar at the front page
	register_sidebar(
		array(
			'id'            => 'front-page-right',
			'name'          => __( 'Front Page right sidebar' ),
			'description'   => __( 'The right sidebar for the front page widgets.' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<div class="section-title"><h2>',
			'after_title'   => '</h2></div>'
		)
	);

	// Register the widget area at the top-left of front page
	register_sidebar(
		array(
			'id'            => 'front-page-top-left',
			'name'          => __( 'Front Page Top-Left' ),
			'description'   => __( 'Widget area at the top-left of front page' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)
	);
    
	// Register the widget area at the top-right of front page
	register_sidebar(
		array(
			'id'            => 'front-page-top-right',
			'name'          => __( 'Front Page Top-Right' ),
			'description'   => __( 'Widget area at the top-right of front page' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)
	);

	// Register the left footer widget area "footer-info"
	register_sidebar(
		array(
			'id'            => 'footer-info',
			'name'          => __( 'Footer-Info (Left)' ),
			'description'   => __( 'Footer left widget area "footer-info"' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);

	// Register the right footer widget area "footer-newsletter"
	register_sidebar(
		array(
			'id'            => 'footer-newsletter',
			'name'          => __( 'Footer-Newsletter (Right)' ),
			'description'   => __( 'Footer right widget area "footer-newsletter"' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);

	// Register the left copyright widget area
	register_sidebar(
		array(
			'id'            => 'copyright-left',
			'name'          => __( 'Copyright Left' ),
			'description'   => __( 'Footer Copyright Left widget area' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)
	);

	// Register the right copyright widget area
	register_sidebar(
		array(
			'id'            => 'copyright-right',
			'name'          => __( 'Copyright Right' ),
			'description'   => __( 'Footer Copyright Right widget area' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)
	);
}
add_action( 'widgets_init', 'bca_register_sidebars' );
add_filter('use_widgets_block_editor', '__return_false');


/**
 * Connect theme CSS and JS
 */
function bca_files(){
    wp_enqueue_style('bca_main_styles', get_theme_file_uri('/css/bca_main.css'), [], '221031'); //rand(10,100000)
    wp_enqueue_script('bca_main_js', get_theme_file_uri('/js/bca_main.js'), [], '221029', true);
}
add_action('wp_enqueue_scripts', 'bca_files');


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


/**
 * Add DKIM signature
 */

add_action( 'phpmailer_init', 'phpmailer_config' );
function phpmailer_config( $phpmailer ) {

// DKIM settings
$phpmailer->Encoding = 'quoted-printable';
$phpmailer->DKIM_domain = 'belarusians.ca';
$phpmailer->DKIM_selector = 'default';
$phpmailer->DKIM_identity = $phpmailer->From;
$phpmailer->DKIM_private_string =
'-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEArUJMeTHseZhOdiq4rZVD+38ZojOLjNeArqcgAM/dog4CtRxZ
jSUngajhRG84qWEHEjhoFyGspqR5b6oI8LrCyQtXNUt5WKRmMLhzHsfvvhKVd8vw
KNcBD/o9kAY7mQ4qjRLQdLIJhiuw+AF6X13oa0T/927pY59428BfsOuGx32bjgFg
VYKEk/VE2aKikn4FryoSMWsmz7ZTQIKypeW84qDsN+eDhe/nqDYGq768wUzANT21
kUN8jCXnjU7qjbo3TFVC5Lm5v+EnsgQMAvGt4AIXZtOPLQVEro95Ynhv1wa+C7R9
/JDvYKT6vxSIraT0lpvyscL8+s/veRamcTivwwIDAQABAoIBAQCRGz3BIzbSf+T2
wsD5YFIXiFOHrXPq+XIk1IPRKkaNOv65gIzf0YZM6YwBLMVf1ot9jxBejy1yQ74Q
72+dbk1E4+KeGCABRW7wzwpbdUgtAJN+SadSDQAuyX5V6WJwxZSNonxDv/iKDn2g
uFwtExFdBeT67kE51o36PhvmqNuwpvjqleTjAhonmhVCreuGeoTta18RvfMGym0b
FkpqRG9eVpGRC65zYAmaIBreJxZ/AOO12o2qZVqP3mjNDpkXvoOCmcTd7WOV8k15
6pWUMRa/PCqd6ThNwnJOfiUS4Uhrv5b1GLEeEOJ5+lb9bwoAeEdemsQj/eyeTGe1
gta8QWnBAoGBAOCAkImZCpZ6i2hNrdxt4T0/kZJqKUwHbCozVtWrmedqJ6FnvKFs
zK2vBhmEMoHxrVjX6REXWyXK+k2zxfFVTCf9nLicn53FDXNyW+H8P6+at5b2uMIw
hK0BKloZa1LnI69dGP+iCjgwo85t5sGhM9mrnr5AoYxnicLf8BTmVxnFAoGBAMWR
O8h6itLHWAp0u6g8PYI24SmjOjh9J427VFvWS5CnWQR7Ls2nyi0NoFzNF/FaF3ZV
KtYUGvxlo3t/pwTB9w44YiohEBCyJwGwfThSjrgoxVNHwIztAT7B87aelCsXn+Hs
NjLp8g+HoPo1KpvOTl48DxCNoKwIDpaObh0h2KPnAoGBAIJNXJbgguqwGbXiUCT+
iZrZCI7omyuLq1YbEi1WOi+8x1/BLBStZ2bvjSTGO+J7+Vb1ikrnOXoIA5uR2jOm
hFs5sfrcvS//LT1yhK33kKdFr4Upkjbzni4j3QcKdeZaTbX83QOSc0gFwy2PUD3W
aJfQKoTWUm2Bss2u2FPpFWjZAoGAHfGmOvt/wPSfvm3050nCFNNWiyYHM/qcHRow
bf7r0w/aKRi2fksZFH0FOiuHnngGKFQ+OtYvROPuxFATs1/mnwwirLn4Il+uE855
HCk/ImBjj/zHDVT6pFVnJ92fHWzmOarAiDT3EC2BU4rtW1IIhLXbnqmomYpbE6yg
ud+gYy8CgYAOnBBKtk76+hBKl1WXjoydh8BPYAUL1aR2CMb2sSiqh682aaVCpolR
DHeKRuwLvdFherHi5/zf2IyBadSp0wOi6xkpnRGO0WqM9fRocD3lMfns1wf/SET0
94Z7thbe/1ly894IcSTppMu87nQg/8bw/zxOqL0Dgi8Z5SVBieWupA==
-----END RSA PRIVATE KEY-----';
}