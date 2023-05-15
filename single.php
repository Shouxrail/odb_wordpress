<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
 
get_header(); ?>

<div class="odb_category-content">
    <img src="<?php if(function_exists('rdv_category_image_url')){ echo rdv_category_image_url();} ?>"
        alt="<?php single_cat_title( '', true ); ?>" class="odb_category-image" />

    <div class="row">
        <sidebar class="col-md-4">
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

<?php get_footer(); ?>