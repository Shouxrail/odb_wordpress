<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="https://github.com/Shouxrail/">
    <link rel="shortcut icon" href="images/logo.png">

    <?php
    
    wp_head();

    ?>
    <script src="https://kit.fontawesome.com/e9f45f6417.js" crossorigin="anonymous"></script>
</head>

<body>

    <header id="header-1">
        <div class="header-container row">
            <div class="custom-logo-link col-xl-2 col-sm-6">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                ?>
            </div>
            <div class="right col-xl-10 col-sm-6">
                <?php dynamic_sidebar( 'header_area_one' ); ?>
                <div class="nav-search row">
                    <?php

                    wp_nav_menu( array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul id="" class="navbar-nav flex-md-row justify-content-end col-xl-9">%3$s<li id="odb_search-nav" class=""><a href="http://orchidee.test/?s=">SEARCH</a></li></ul>'
                    ) );

                    ?>
                    <div class="search-container col-xl-3">
                        <?php get_search_form( array(
                            'placeholder' => 'SEARCH HERE'
                        ) ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bg-container"></div>
        <div class="header-bg"></div>
        <div class="header-bg2"></div>
    </header>

    <header id="header-2">
        <div class="header-container row">
            <div class="col-md-1 col-6">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                ?>
            </div>
            <div class="odb_nav-menu-mobile col-6 text-end">
                <i class="fa-sharp fa-solid fa-bars fa-2xl" style="color: #ffffff;" onclick="toggleMobileNavMenu()"></i>
            </div>
            <div class="odb_mobile-nav col-md-11 row" id="odb_mobile-nav">
                <div class="nav-search col-md-9 col-sm-10">
                    <?php

                wp_nav_menu( array(
                    'menu' => 'primary',
                    'container' => '',
                    'theme_location' => 'primary',
                    'items_wrap' => '<ul id="" class="navbar-nav flex-md-row justify-content-end">%3$s<li id="odb_search-nav" class=""><a href="http://orchidee.test/?s=">SEARCH</a></li></ul>'
                ) );

                ?>
                </div>
                <div class="lang-sosmed row col-md-3 col-sm-2">
                    <?php dynamic_sidebar( 'header_area_two' ); ?>
                </div>
            </div>
        </div>
        <div class="header-bg-container"></div>
        <div class="header-bg"></div>
    </header>