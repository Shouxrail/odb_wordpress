<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>

<content>
    <div class="odb_search-container">
        <?php get_search_form(); ?>

        <div id="primary">
            <main id="main" class="site-main" role="main">

                <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php endwhile; ?>

                <?php the_posts_pagination(); ?>

                <?php else : ?>
                <p><?php _e('No search results found.', 'your-theme'); ?></p>
                <?php endif; ?>

            </main>
        </div>
    </div>
</content>

<?php

get_footer(  );

?>