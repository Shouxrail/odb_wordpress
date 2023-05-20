<?php get_header(); ?>

<div class="odb_category-content odb_category-content-blog">
    <img src="<?php if(function_exists('rdv_category_image_url')){ echo rdv_category_image_url();} ?>" alt=""
        class="odb_category-image" />
    <main id="main" class="site-main" role="main">

        <?php
        $args = array(
            'post_type' => 'post',    // Change 'post' to your desired post type
            'posts_per_page' => 6,    // Set the number of posts you want to display
            'offset' => 3, // Skip the three latest posts
        );
        
        $query = new WP_Query($args);
        ?>

        <?php if ($query->have_posts()) : ?>
        <div class="page-header">
            <h1 class="page-title">BLOG ARCHIVE</h1>
            <div class="category-description"><?php echo category_description(); ?></div>
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
            <button id="load-more-posts">Load More</button>
        </div>

        <?php the_posts_navigation(); ?>

        <?php else : ?>
        <p><?php _e('No posts found in this category.', 'your-theme'); ?></p>
        <?php endif; ?>

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
        });
    });
})();
</script>

<?php get_footer(); ?>