<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_theme_file_uri('/images/favicon/apple-touch-icon.png'); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_theme_file_uri('/images/favicon/favicon-32x32.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_theme_file_uri('/images/favicon/favicon-16x16.png'); ?>">
  <link rel="manifest" href="<?= get_theme_file_uri('/images/favicon/site.webmanifest'); ?>">
  <link rel="mask-icon" href="<?= get_theme_file_uri('/images/favicon/safari-pinned-tab.svg'); ?>" color="#5bbad5">
  <link rel="shortcut icon" href="<?= get_theme_file_uri('/images/favicon/favicon.ico'); ?>">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="<?= get_theme_file_uri('/images/favicon/browserconfig.xml'); ?>">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= get_theme_file_uri('/vendor/animate.css/animate.min.css'); ?>" rel="stylesheet">
  <link href="<?= get_theme_file_uri('/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?= get_theme_file_uri('/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?= get_theme_file_uri('/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?= get_theme_file_uri('/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
  <link href="<?= get_theme_file_uri('/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
  
  <!-- WP -->
  <?php wp_head(); ?>
  <!-- /WP -->
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top" <?php if ( is_admin_bar_showing() ) echo 'style="top: 32px;"'; ?>>
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <!-- Widget area: TopBar-Left -->
                <?php dynamic_sidebar( 'topbar-left' ); ?>
                <!-- /Widget area -->
            </div>
            <div class="d-flex social-links align-items-center">
                <a href="/" class="langbar">EN</a> | <a href="/" class="langbar">BE</a>
                <!-- Widget area: TopBar-Right -->
                <?php dynamic_sidebar( 'topbar-right' ); ?>
                <!-- /Widget area -->
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" <?php if ( is_admin_bar_showing() ) echo 'style="top: 72px;"'; ?>>
        <!-- Search -->
        <div class="top-search collapse bg-light" id="search-open" data-bs-parent="#search">
            <div class="container">
                <div class="row position-relative">
                    <div class="col-md-8 mx-auto py-5">
                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="input-group top-search-group">
                                <input class="form-control rounded-start border-end-0 mb-0" type="text" name="s" autofocus placeholder="?????????? ???? ??????????">
                                <button type="submit" class="btn btn-grad m-0">????????????</button>
                            </div>
                        </form>
                    </div>
                    <a class="position-absolute top-0 end-0 mt-3 me-3 text-end" data-bs-toggle="collapse" href="#search-open"><i class="fa fa-window-close"></i></a>
                </div>
            </div>
        </div>
        <!-- End Search -->

        <div class="container d-flex align-items-center">

            <!-- <h1 class="logo me-auto"><a href="index.html">Sailor</a></h1>-->
            <a href="<?= site_url(); ?>" class="logo me-auto">
                <img src="<?= get_theme_file_uri('/images/logo-be.svg'); ?>" alt="" class="img-fluid">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <!--<li><a href="<?= site_url(); ?>" <?= is_page('home') ? 'class="active"' : '' ?>>????????????????</a></li>-->
                    <li class="dropdown"><a href="#"><span>?????? ????</span> <i class="bi bi-chevron-down"></i></a>
<?php  wp_nav_menu(array( 'theme_location' => 'subMenuAbout', 'depth' => 1, 'container' => '' )); ?>
                    </li>
                    <li><a href="/news" <?= is_page('news') ? 'class="active"' : '' ?>>????????????</a></li>
                    <li><a href="/events" <?= is_page('events') ? 'class="active"' : '' ?>>????????????</a></li>
                    <li class="dropdown"><a href="#"><span>????????????????</span> <i class="bi bi-chevron-down"></i></a>
<?php  wp_nav_menu(array( 'theme_location' => 'subMenuPrograms', 'depth' => 1, 'container' => '' )); ?>
                    </li>
                    <li class="dropdown"><a href="#"><span>??????????????</span> <i class="bi bi-chevron-down"></i></a>
<?php  wp_nav_menu(array( 'theme_location' => 'subMenuCommunities', 'depth' => 1, 'container' => '' )); ?>
                    </li>
                    
                    <li class="d-none d-lg-flex"><a class="nav-link" data-bs-toggle="collapse" href="#search-open"><i class="bi bi-search"></i></a></li>
                    <li><a href="/become-volunteer" class="getstarted">??????????????????</a></li>
                </ul>

                <!--
                <ul>
                    <li><a href="/" class="active">????????????????</a></li>
                    <li class="dropdown"><a href="#"><span>?????? ????</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/about">?????? ????</a></li>
                            <li><a href="/belarusians-in-canada">???????? ????????????????</a></li>
                            <li><a href="/">???????????? ??????</a></li>
                            <li><a href="/">???????????? ?? ????????</a></li>
                        </ul>
                    </li>
                    <li><a href="/news.html">????????????</a></li>
                    <li class="dropdown"><a href="#"><span>????????????????</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/">???????????????? ?????? ????????????????</a></li>
                            <li><a href="/">???????????????? ?????? ????????????</a></li>
                            <li><a href="/">???????????????? ?? ????????????????????</a></li>
                            <li><a href="/">??????????-??????????</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>??????????????</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="https://www.belarusian.ca/be/ottawa-chapter/" target="_blank">?????????????? ?? ????????????</a></li>
                            <li><a href="https://www.belarusian.ca/be/toronto-chapter/" target="_blank">?????????????? ?? ??????????????</a></li>
                            <li><a href="https://www.facebook.com/groups/260880037671053" target="_blank">?????????????? ?? ??????????????</a></li>
                            <li><a href="#" target="_blank">?????????????? ?? ??????????????????</a></li>
                            <li><a href="https://www.facebook.com/groups/belbc/" target="_blank">???????????????? ?? ????</a></li>
                        </ul>
                    </li>
                    <li class="d-none d-lg-flex"><a class="nav-link" data-bs-toggle="collapse" href="#search-open"><i class="bi bi-search"></i></a></li>
                    <li><a href="/" class="getstarted">??????????????????</a></li>
                </ul>
                -->
                <a class="nav-link d-lg-none" style="padding-right:30px;" data-bs-toggle="collapse" href="#search-open"><i class="bi bi-search"></i></a>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->