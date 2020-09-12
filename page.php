<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>
<section class="page-cont">
    <div class="category-content" role="main">
        <div class="adoption-heading">
            <hr>
            <?php the_post_thumbnail() ?>
            <h1><?php the_title();?></h1>


            <hr>

        </div>
        <?php the_content(); ?>


    </div>
    <?php get_sidebar(); ?>
</section>



<?php wp_footer(); get_footer(); ?>