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
            <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }
            ?>
            <div class="right col-xl-10">
                <div class="lang-sosmed row">
                    <div class="col-xl-8"></div>
                    <div class="lang text-end col-xl-1">
                        <b>ID</b> | ENG
                    </div>
                    <div class="sosmed text-end col-xl-3">
                        <a href=""><i class="fa-brands fa-youtube"></i></a>
                        <a href=""><i class="fa-brands fa-tiktok"></i></a>
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="nav-search row">
                    <?php

                    wp_nav_menu( array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul id="" class="navbar-nav flex-md-row justify-content-end col-xl-9">%3$s<li id="odb_search-nav" class=""><a href="'.get_search_link().'">SEARCH</a></li></ul>'
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
        <div class="header-bg-container">
        </div>
        <div class="header-bg"></div>
        <div class="header-bg2"></div>
    </header>

    <header id="header-2" class="sticky-top">
        <div class="header-container">
            <a href="index.html" class="logo-container">
                <img src="assets/img/LOGO.png" alt="Orchidee de Beauty" style="height: 45px;">
            </a>
            <div class="nav-search">
                <nav>
                    <a href="">BERANDA</a>
                    <a href="">TREATMENT</a>
                    <a href="">PRODUK</a>
                    <a href="">TENTANG KAMI</a>
                    <a href="">BLOG</a>
                    <a href="">HUBUNGI KAMI</a>
                    <a href="">SEARCH</a>
                </nav>
            </div>
            <div class="lang-sosmed">
                <div class="lang">
                    <b>ID</b> | ENG
                </div>
                <div class="sosmed">
                    <a href=""><img src="assets/icons/YOUTUBE_1_.svg" alt=""></a>
                    <a href=""><img src="assets/icons/TIKTOK_1_.svg" alt=""></a>
                    <a href=""><img src="assets/icons/FB.svg" alt=""></a>
                    <a href=""><img src="assets/icons/INSTAGRAM_1_.svg" alt=""></a>
                    <a href=""><img src="assets/icons/WA.svg" alt=""></a>
                </div>
            </div>
        </div>
        <div class="header-bg-container">
        </div>
        <img src="assets/img/GRADIENT.png" class="header-bg" />
    </header>