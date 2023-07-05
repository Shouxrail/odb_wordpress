<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>

<content>
    <div class="odb_search-container">
        <div class="container">
            <form role="search" method="get" id="searchform" class="searchform" action="http://orchidee.test/">
                <label class="screen-reader-text" for="s">Search for:</label>
                <div class="d-flex">
                    <input type="text" value="" name="s" id="s" style="flex: 1">
                    <input type="submit" id="searchsubmit" value="Search" style="min-width: 100px">
                </div>
            </form>
        </div>

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