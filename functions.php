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
        'name'          => 'Sidebar area one',
        'id'            => 'sidebar_area_one',
        'description'   => 'This widget area discription',
        'before_widget' => '<section class="sidebar-area sidebar-area-one">',
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

function custom_breadcrumbs()
{
    // Set variables for later use
    $here_text        = __( 'You are currently here!' );
    $home_link        = home_url('/');
    $home_text        = __( 'Home' );
    $link_before      = '<span typeof="v:Breadcrumb">';
    $link_after       = '</span>';
    $link_attr        = ' rel="v:url" property="v:title"';
    $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter        = ' &raquo; ';              // Delimiter between crumbs
    $before           = '<span class="current">'; // Tag before the current crumb
    $after            = '</span>';                // Tag after the current crumb
    $page_addon       = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links   = '';

    /** 
     * Set our own $wp_the_query variable. Do not use the global variable version due to 
     * reliability
     */
    $wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if ( is_singular() ) 
    {
        /** 
         * Set our own $post variable. Do not use the global variable version due to 
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post( $queried_object );

        // Set variables 
        $title          = apply_filters( 'the_title', $post_object->post_title );
        $parent         = $post_object->post_parent;
        $post_type      = $post_object->post_type;
        $post_id        = $post_object->ID;
        $post_link      = $before . $title . $after;
        $parent_string  = '';
        $post_type_link = '';

        if ( 'post' === $post_type ) 
        {
            // Get the post categories
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                // Lets grab the first category
                $category  = $categories[0];

                $category_links = get_category_parents( $category, true, $delimiter );
                $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
                $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
            }
        }

        if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) )
        {
            $post_type_object = get_post_type_object( $post_type );
            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
        }

        // Get post parents if $parent !== 0
        if ( 0 !== $parent ) 
        {
            $parent_links = [];
            while ( $parent ) {
                $post_parent = get_post( $parent );

                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse( $parent_links );

            $parent_string = implode( $delimiter, $parent_links );
        }

        // Lets build the breadcrumb trail
        if ( $parent_string ) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ( $post_type_link )
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ( $category_links )
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if( is_archive() )
    {
        if (    is_category()
             || is_tag()
             || is_tax()
        ) {
            // Set the variables for this section
            $term_object        = get_term( $queried_object );
            $taxonomy           = $term_object->taxonomy;
            $term_id            = $term_object->term_id;
            $term_name          = $term_object->name;
            $term_parent        = $term_object->parent;
            $taxonomy_object    = get_taxonomy( $taxonomy );
            $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
            $parent_term_string = '';

            if ( 0 !== $term_parent )
            {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ( $term_parent ) {
                    $term = get_term( $term_parent, $taxonomy );

                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                    $term_parent = $term->parent;
                }

                $parent_term_links  = array_reverse( $parent_term_links );
                $parent_term_string = implode( $delimiter, $parent_term_links );
            }

            if ( $parent_term_string ) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif ( is_author() ) {

            $breadcrumb_trail = __( 'Author archive for ') .  $before . $queried_object->data->display_name . $after;

        } elseif ( is_date() ) {
            // Set default variables
            $year     = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day      = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ( $monthnum ) {
                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                $month_name = $date_time->format( 'F' );
            }

            if ( is_year() ) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif( is_month() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif( is_day() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif ( is_post_type_archive() ) {

            $post_type        = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object( $post_type );

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }   

    // Handle the search page
    if ( is_search() ) {
        $breadcrumb_trail = __( 'Search query for: ' ) . $before . get_search_query() . $after;
    }

    // Handle 404's
    if ( is_404() ) {
        $breadcrumb_trail = $before . __( 'Error 404' ) . $after;
    }

    // Handle paged pages
    if ( is_paged() ) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        $page_addon   = $before . sprintf( __( ' ( Page %s )' ), number_format_i18n( $current_page ) ) . $after;
    }

    $breadcrumb_output_link  = '';
    $breadcrumb_output_link .= '<div class="breadcrumb">';
    if (    is_home()
         || is_front_page()
    ) {
        // Do not show breadcrumbs on page one of home and frontpage
        if ( is_paged() ) {
            $breadcrumb_output_link .= $here_text . $delimiter;
            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else {
        $breadcrumb_output_link .= $here_text . $delimiter;
        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</div><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;
}
add_shortcode('custom_breadcrumbs','custom_breadcrumbs');

?>