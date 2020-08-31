<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>
<section class="page-cont">

    <div class="category-content" role="main">
        <div class="adoption-heading">
            <hr>
            <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-cat-footprint.svg" />
            <h1>Cats available for adoption</h1>
            <hr>
        </div>

        <?php 
            $args = array ( 'category' => the_category_ID($echo = false), 'posts_per_page' => 5);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ) :	setup_postdata($post);
        ?>
        <div class="cat-card">
            <?php the_post_thumbnail() ?>
            <div class="cat-card-content">

                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>

                <?php the_excerpt(400); ?>
            </div>

        </div>
        <?php endforeach; ?>
    </div>

    <?php get_sidebar(); ?>
</section>


<?php get_footer(); ?>