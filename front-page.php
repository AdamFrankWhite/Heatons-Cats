<?php get_header(); ?>
<div style="background-image: url(<?php header_image(); ?>)" class="jumbotron">
    <div class="jumbo-content">
        <?php
            if(is_active_sidebar('jumbotron-text')){
                dynamic_sidebar('jumbotron-text');
            }
        ?>
        <!-- <p class="lead">We are a registered cat adoption charity run by dedicated volunteers and workers who give their
            time, love and effort to help cats in need.

        </p>
        <p>
            It is our mission to care for and rehome the cats and kittens that we take in, helping them find their
            forever homes.
        </p>
        <p>
            We are so grateful to everyone who supports us and allow us to continue our care for all of our cats here at
            the Heatons. Shop Opening Hours Tues-Sat 10.30-4pm Closed Sunday and Monday
        </p> -->
        <p class="btn-cont">
            <?php 
        $cats_id = get_cat_ID( 'cats' );
        $kittens_id = get_cat_ID( 'kittens' );
        $donate_id = get_cat_ID( 'donate' );
 
 // Get the URL of this category
 $cats_link = get_category_link( $cats_id );
 $kittens_link = get_category_link( $kittens_id );
 $donate_link = get_category_link( $donate_id );
 ?>
            <a class="btn btn-1 btn-primary btn-lg" href="<?php echo $cats_link; ?>" role="button">Cats</a>
            <a class="btn btn-2 btn-primary btn-lg" href="<?php echo $kittens_link; ?>" role="button">Kittens</a>
            <a class="btn btn-3 btn-primary btn-lg" href="<?php bloginfo('template_url');?>/donate"
                role="button">Donate</a>
        </p>
    </div>
</div>
<div class="features">

    <div class="card">

        <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-cat.svg">
        <h3>Adopt</h3>
        <p>Looking for a companion? After a friend for your other cat?</p>
        <a href="<?php bloginfo('template_url');?>/adoption-policy">Learn more</a>
    </div>

    <div class="card">
        <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-donate.svg">
        <h3>Donate</h3>
        <p>Every amount, no matter how small, all helps go towards caring for the cats.</p>
        <a href="<?php bloginfo('template_url');?>/about">Learn more</a>
    </div>


    <div class="card">
        <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-volunteering.svg">
        <h3>Volunteer</h3>
        <p>Want to help us raise money in our charity shop, or with our cats? </p>
        <a href="<?php bloginfo('template_url');?>/volunteer">Learn more</a>
    </div>

</div>
<hr>
<section class="cat-gallery-section">
    <h2>Cats available for adoption</h3>
        <div class="cat-gallery-cont">
            <i id="left" class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            <div id="cat-gallery"></div>
            <i id="right" class="fa fa-chevron-circle-right" aria-hidden="true"></i>
        </div>

</section>
<hr>

<section class="partners-notices">
    <div class="partners">
        <h3>Our Partners</h3>
        <?php
        $args  = array(
    'posts_per_page'  => 5,
    'category'        => 6,
    'orderby'         => 'post_date',
    'order'           => 'ASC',
    'post_type'       => 'post',
    'post_status'     => 'publish',
    'suppress_filters' => true ); 
$posts = get_posts($args);
    foreach ($posts as $post) :
    ?><div class="partner-card">
            <?php the_post_thumbnail();?>
            <div class="partner-card-content">
                <h4><?php the_title();?></h4>
                <p><?php the_content();?></p>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <div class="notices">
        <h3>Notices</h3>
        <?php
        $args  = array(
    'posts_per_page'  => 5,
    'category'        => 7,
    'orderby'         => 'post_date',
    'order'           => 'ASC',
    'post_type'       => 'post',
    'post_status'     => 'publish',
    'suppress_filters' => true ); 
$posts = get_posts($args);
    foreach ($posts as $post) :
    ?><div class="partner-card">
            <?php the_post_thumbnail();?>
            <div class="partner-card-content">
                <h4><?php the_title();?></h4>
                <p><?php the_content();?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

















<?php wp_footer(); get_footer();?>