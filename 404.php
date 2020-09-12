<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

 
get_header(); ?>
<section class="page-cont">

    <div class="category-content" role="main">
        <div class="adoption-heading">
            <h3 style="text-transform: lowercase;">
                Hmmm...page not found
            </h3>
            <hr>
            <img style="width: 60%; border-radius: 10px;"
                src="<?php bloginfo('template_url'); ?>/images/lost-page.jpg" />



            <?php echo category_description(); ?>
        </div>

    </div>

    <?php get_sidebar(); ?>
</section>


<?php get_footer(); get_footer(); ?>