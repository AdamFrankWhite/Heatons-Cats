<?php
/**
* A Simple Category Template
*/
 
get_header(); ?>
<section class="page-cont">
    <div id="content" role="main">
        <img src="<?php bloginfo('template_url');?>/images/icons/icons8-cat-cage.svg" />
        <h2><?php the_title();?></h2>

        <?php the_content(); ?>
    </div>
    <?php get_sidebar(); ?>
</section>



<?php get_footer(); ?>