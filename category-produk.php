<?php
/**
* A Simple Category Template
*/

get_header(); ?>
<div class="odb_category-content">
    <img src="<?php if(function_exists('rdv_category_image_url')){ echo rdv_category_image_url();} ?>" alt=""
        class="odb_category-image" />

    <div class="row">
        <section id="primary" class="site-content">
            <div id="content" role="main">
                <?php
                $main_category = get_category( get_query_var('cat') );
    $categories = get_categories( array(
        'child_of'=>$main_category->term_id
    ) );

    $subcategories = array();

    foreach ( $categories as $category ) {
        $subcategories[] = $category->cat_ID;
    }
?>

                <?php
    $new_loop = new WP_Query( array(
    'post_type' => 'post',
    'category__in' => $subcategories,
    'posts_per_page' => 5
    ) );
    $i = 1;
?>

                <?php if ( $new_loop->have_posts() ) : while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
                <?php if ($i == 1) { ?>
                <div class="row">
                    <div class="odb_post-thumbnail col-lg-6">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="odb_post-content col-lg-6">
                        <h3 class="odb_post-title"><a href="<?php the_permalink() ?>" rel="bookmark"
                                title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                        <br>
                        <br>
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php } else { ?>

                <?php } ?>
                <?php $i++; ?>
                <?php endwhile; else: ?>
                No posts found
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php

get_footer(  );

?>