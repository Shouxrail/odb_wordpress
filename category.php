<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>

<?php single_cat_title( '', true ); ?>

<?php get_sidebar(); ?>

<section id="primary" class="site-content">
    <div id="content" role="main">

        <?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

        <?php
 
// The Loop
while ( have_posts() ) : the_post(); ?>
        <h2><a href="<?php the_permalink() ?>" rel="bookmark"
                title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

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

<?php

get_footer(  );

?>