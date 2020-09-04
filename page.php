<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>
<section class="page-cont">
    <div class="category-content" role="main">
        <div class="adoption-heading">
            <hr>
            <img src="<?php bloginfo('template_url');?>/images/icons/icons8-cat-cage.svg" />
            <h1><?php the_title();?></h1>


            <hr>

        </div>
        <?php the_content(); ?>


    </div>
    <?php get_sidebar(); ?>
</section>



<?php get_footer(); ?>