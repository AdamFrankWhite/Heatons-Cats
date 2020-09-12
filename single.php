<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>
<section class="page-cont">
    <div class="single-post">
        <h1><?php the_title();?></h1>
        <hr>
        <?php the_post_thumbnail(); ?>



        <?php the_content(); ?>
    </div>



    <?php get_sidebar(); ?>
</section>


<?php wp_footer(); get_footer();?>