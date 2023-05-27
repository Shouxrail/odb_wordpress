<?php get_header(); ?>

<?php if ( has_category( 'promo' ) ) : ?>

<div class="odb_category-content odb_category-content-promo">
    <?php the_post_thumbnail(); ?>

    <div class="row">
        <section id="primary" class="site-content">
            <div class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div id="content" role="main">
                <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                <div>
                    <?php the_content(); ?>
                </div>

                <?php endwhile; else: ?>

                <p>Sorry, no posts matched your criteria.</p>

                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php elseif ( has_category( 'blog' ) ) : ?>

<div class="odb_category-content odb_category-content-blog odb_category-content-blog-single">
    <main id="main" class="site-main" role="main">
        <div class="odb_cat-blog-recent">
            <div class="page-header">
                <h1 class="page-title">RECENT POST</h1>
            </div>
            <?php $post_id = ''; ?>
            <div class="row">
                <div class="odb_cat-blog-last col-md-8">
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php $post_id = get_the_ID(  ); ?>
                    <article id="post-<?php the_ID(); ?>">
                        <div class="entry-header">
                            <?php the_post_thumbnail( ) ?>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="author">
                            <?php the_date( 'd F Y' ) ?> | <?php the_time( 'm:s' ) ?> WIB | <?php the_author( ) ?>
                        </div>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                    </article>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                    <?php endif; ?>
                </div>

                <?php
                $args = array(
                    'post_type' => 'post',
                    'cat' => 'blog',
                    'category__in' => 34,
                    'posts_per_page' => 3,
                    'orderby'   => 'meta_value',
                    'order' => 'ASC',
                    'post__not_in' => array( $post_id )
                );
                
                $query = new WP_Query($args);
                ?>
                <div class="odb_cat-blog-sidebar col-md-4">
                    <div class="odb_blog-content-sidebar-header">
                        MOST POPULAR
                    </div>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>">
                        <div class="author">
                            <?php echo get_the_date( 'd F Y' ) ?> | <?php the_time( 'm:s' ) ?> WIB |
                            <?php the_author( ) ?>
                        </div>
                        <div class="entry-header">
                            <?php the_post_thumbnail( ) ?>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>

                    </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php
        $args = array(
            'post_type' => 'post',
            'cat' => 'blog',
            'category__in' => 34,
            'posts_per_page' => 3,
            'orderby'   => 'meta_value',
            'order' => 'ASC',
            'post__not_in' => array( $post_id )
        );
        
        $query = new WP_Query($args);
        ?>

        <div class="odb_cat-blog-archive">
            <?php if ($query->have_posts()) : ?>
            <div class="page-header">
                <h1 class="page-title">BLOG ARCHIVE</h1>
            </div>

            <div id="category-posts" class="row">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" class="col-md-4">
                    <div class="entry-header">
                        <?php the_post_thumbnail( ) ?>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_navigation(); ?>

            <?php else : ?>
            <p><?php _e('No posts found in this category.', 'your-theme'); ?></p>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php else : ?>

<div class="odb_category-content">
    <img src="<?php if(function_exists('rdv_category_image_url')){ echo rdv_category_image_url();} ?>"
        alt="<?php single_cat_title( '', true ); ?>" class="odb_category-image" />

    <div class="row">
        <sidebar class="col-md-4">
            <?php dynamic_sidebar( 'sidebar_area_one' ); ?>
        </sidebar>

        <section id="primary" class="site-content col-md-8">
            <h1 class="odb_cat-title"><?php the_title(); ?></h1>
            <div id="content" role="main">
                <?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

                <?php
 
// The Loop
while ( have_posts() ) : the_post(); ?>
                <div class="odb_post-container">

                    <breadcrumbs><?php the_category( ' / ', '', get_the_ID(  ) ) ?></breadcrumbs>
                    <?php the_post_thumbnail(); ?>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                    <small class="odb_post-date"><?php the_time('d F Y') ?> | <?php the_author_posts_link() ?></small>
                </div>

                <?php endwhile; 
 
else: ?>
                <p>Sorry, no posts matched your criteria.</p>


                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php endif; ?>

<?php get_footer(); ?>