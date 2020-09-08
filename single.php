<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>
<section class="page-cont">
    <div>
        <h1><?php the_title();?></h1>
        <?php the_post_thumbnail(); ?>
        <p><?php the_content(); ?></p>
    </div>



    <?php get_sidebar(); ?>
</section>


<?php get_footer(); ?>