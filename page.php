<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>

<div class="odb_category-content">
    <?php the_post_thumbnail(); ?>

    <div class="row">
        <section id="primary" class="site-content">
            <h1 class="odb_cat-title"><?php single_cat_title( '', true ); ?></h1>
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

<?php

get_footer(  );

?>