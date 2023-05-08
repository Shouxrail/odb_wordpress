<?php

function orchidee_theme_support()
{
    //dynamic doc title
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
		'height'               => 70,
		'flex-height'          => true,
		'flex-width'           => true,
	) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'widgets' );
    add_theme_support( 'widgets-block-editor' );
    add_theme_support( 'html5', array( 'navigation-widgets' ) );
    add_theme_support( 'starter-content', array(
        // Place widgets in the desired locations (such as sidebar or footer).
        // Example widgets: archives, calendar, categories, meta, recent-comments, recent-posts, 
        //                  search, text_business_info, text_about
        'widgets'     => array( 
            'sidebar-1' => array( 'search', 'categories', 'meta'), 
            'header-1' => array( 'search', 'categories', 'meta'), 
        ),
        // Specify pages to create, and optionally add custom thumbnails to them.
        // Note: For thumbnails, use attachment symbolic references in {{double-curly-braces}}.
        // Post options: post_type, post_title, post_excerpt, post_name (slug), post_content, 
        //               menu_order, comment_status, thumbnail (featured image ID), and template
        'posts'       => array( 'home', 'about', 'blog' => array( 'thumbnail' => '{{image-cafe}}' ), ),
        // Create custom image attachments used as post thumbnails for pages.
        // Note: You can reference these attachment IDs in the posts section above. Example: {{image-cafe}}
        'attachments' => array( 'image-cafe' => array( 'post_title' => 'Cafe', 'file' => 'assets/images/cafe.jpg' ), ),
        // Assign options defaults, such as front page settings.
        // The 'show_on_front' value can be 'page' to show a specified page, or 'posts' to show your latest posts.
        // Note: Use page ID symbolic references from the posts section above wrapped in {{double-curly-braces}}.
        'options'     => array( 'show_on_front'  => 'page', 'page_on_front' => '{{home}}', 'page_for_posts' => '{{blog}}', ),
        // Set the theme mods.
        'theme_mods'  => array( 'panel_1' => '{{about}}' ),
        // Set up nav menus.
        'nav_menus'   => array( 'top' => array( 'name' => 'Top Menu', 'items' => array( 'link_home', 'page_about', 'page_blog' )), ),
    ) );
}

add_action( 'after_setup_theme', 'orchidee_theme_support' );

add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {

    // $html = str_replace( 'custom-logo', 'custom-logo col-md-', $html );
    $html = str_replace( 'custom-logo-link', 'custom-logo-link col-xl-2', $html );

    return $html;
}

function orchidee_menus()
{
    $menus = array(
        'primary' => "Nav Menus",
        'footer' => "Footer Menus"
    );
    
    register_nav_menus( $menus );
}

add_action( 'init', 'orchidee_menus' );

function orchidee_reqister_styles()
{
    $style_version = wp_get_theme()->get('Version');
    wp_enqueue_style( 'orchidee_style', get_template_directory_uri(  ) . "/style.css", array('orchidee_bootstrap'), $style_version );
    wp_enqueue_style( 'orchidee_main-style', get_template_directory_uri(  ) . "/assets/css/main.css", array('orchidee_bootstrap'), $style_version );
    wp_enqueue_style( 'orchidee_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", array(), '5.0.2' );
}

add_action( 'wp_enqueue_scripts', 'orchidee_reqister_styles' );

function orchidee_reqister_scripts()
{
    $style_version = wp_get_theme()->get('Version');
    wp_enqueue_script( 'orchidee_jquery', "https://code.jquery.com/jquery-3.6.4.min.js", array(), '3.6.4', true );
    wp_enqueue_script( 'orchidee_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js", array(), '5.0.2', true );
    // wp_enqueue_script( 'orchidee_fontawesome', "https://use.fontawesome.com/releases/v5.15.4/js/all.js", array(), '5.15.4', false ); 
    wp_enqueue_script( 'orchidee_main', get_template_directory_uri() . "/assets/js/main.js", array(), $style_version, true );
    wp_enqueue_script( 'orchidee_body', get_template_directory_uri() . "/assets/js/body.js", array(), $style_version, true );
}

add_action( 'wp_enqueue_scripts', 'orchidee_reqister_scripts' );


function register_widget_areas() {
    register_sidebar( array(
        'name'          => 'Header area one',
        'id'            => 'header_area_one',
        'description'   => 'This widget area discription',
        'before_widget' => '<section class="header-area header-area-one">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar( array(
    'name'          => 'Header area two',
    'id'            => 'header_area_two',
    'description'   => 'This widget area discription',
    'before_widget' => '<section class="header-area header-area-two">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
    ));

    register_sidebar( array(
      'name'          => 'Footer area one',
      'id'            => 'footer_area_one',
      'description'   => 'This widget area discription',
      'before_widget' => '<section class="footer-area footer-area-one">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>',
    ));    
}

add_action( 'widgets_init', 'register_widget_areas' );

?>