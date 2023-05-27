<?php get_header(); ?>

<div class="odb_category-content odb_category-content-blog">
    <img src="<?php if(function_exists('rdv_category_image_url')){ echo rdv_category_image_url();} ?>" alt=""
        class="odb_category-image" />
    <main id="main" class="site-main" role="main">
        <?php
        $query = new WP_Query(array(
            'post_type' => 'post',    // Change 'post' to your desired post type
            'cat' => 'blog',
            'category__in' => 34,
            'posts_per_page' => 1,    // Set the number of posts you want to display
        ));
        ?>
        <div class="odb_cat-blog-recent">
            <div class="page-header">
                <h1 class="page-title">RECENT POST</h1>
            </div>

            <div class="row">
                <div class="odb_cat-blog-last col-md-8">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>">
                        <div class="entry-header">
                            <?php the_post_thumbnail( ) ?>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <a href="' . get_permalink() . '" class="read-more">>></a>
                        </div>

                        <div class="author">
                            <?php the_date( 'd F Y' ) ?> | <?php the_time( 'm:s' ) ?> WIB | <?php the_author( ) ?>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>
                <?php
                $query = new WP_Query(array(
                    'post_type' => 'post',    // Change 'post' to your desired post type
                    'cat' => 'blog',
                    'category__in' => 34,
                    'posts_per_page' => 2,    // Set the number of posts you want to display
                    'offset' => 1
                ));
                ?>
                <div class="odb_cat-blog-sidebar col-md-4">
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
        $query = new WP_Query(array(
            'post_type' => 'post',    // Change 'post' to your desired post type
            'cat' => 'blog',
            'category__in' => 34,
            'posts_per_page' => 6,    // Set the number of posts you want to display
            'offset' => 3, // Skip the three latest posts
        ));
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

            <div class="load-more">
                <button id="load-more-posts">LOAD MORE</button>
                <div class="loader" id="loader"></div>
            </div>

            <?php the_posts_navigation(); ?>

            <?php else : ?>
            <p><?php _e('No posts found in this category.', 'your-theme'); ?></p>
            <?php endif; ?>
        </div>
    </main>
</div>

<script>
(function() {
    var categoryPostsContainer = $('#category-posts');
    var loadMoreButton = $('#load-more-posts');
    var page = 2; // Starting page number for loading more posts
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var category = '<?php echo json_encode(get_query_var('cat')); ?>';

    loadMoreButton.on('click', function() {
        $('#loader').css('opacity', 1);
        var data = {
            action: 'load_more_posts',
            category: category,
            page: page
        };

        $.post(ajaxUrl, data, function(response) {
            if (response.success) {
                var posts = response.data;

                if (posts) {
                    categoryPostsContainer.append(posts);
                    page++;
                } else {
                    loadMoreButton.hide();
                }
            } else {
                console.log('Error loading more posts.');
            }
            $('#loader').css('opacity', 0);
        });
    });
})();
</script>

<?php get_footer(); ?>