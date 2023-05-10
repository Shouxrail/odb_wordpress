<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>

<div class="odb_category-content">
    <img src="<?php if(function_exists('rdv_category_image_url')){ echo rdv_category_image_url();} ?>"
        alt="<?php single_cat_title( '', true ); ?>" class="odb_category-image" />

    <div class="row">
        <sidebar class="col-md-4">
            <?php dynamic_sidebar( 'sidebar_area_one' ); ?>
        </sidebar>

        <section id="primary" class="site-content col-md-8">
            <h1 class="odb_cat-title"><?php single_cat_title( '', true ); ?></h1>
            <breadcrumbs><?php echo do_shortcode('[custom_breadcrumbs]'); ?></breadcrumbs>
            <div id="content" role="main">
                <?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

                <?php
 
// The Loop
while ( have_posts() ) : the_post(); ?>
                <h2 class="odb_post-title"><a href="<?php the_permalink() ?>" rel="bookmark"
                        title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <small class=""><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

                <div class="entry">
                    <?php the_post_thumbnail(); ?>
                    <?php the_excerpt(); ?>
                </div>

                <?php endwhile; 
 
else: ?>
                <p>Sorry, no posts matched your criteria.</p>


                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php

get_footer(  );

?>