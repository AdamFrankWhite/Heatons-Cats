<?php get_header(); ?>
<div style="background-image: url(<?php header_image(); ?>)" class="jumbotron">
    <div class="jumbo-content">
        <h1 class="display-4">Welcome to Heatons Cats</h1>
        <p class="lead">We are a registered cat adoption charity run by dedicated volunteers and workers who give their
            time, love and effort to help cats in need.

        </p>
        <p>
            It is our mission to care for and rehome the cats and kittens that we take in, helping them find their
            forever homes.
        </p>
        <p>
            We are so grateful to everyone who supports us and allow us to continue our care for all of our cats here at
            the Heatons. Shop Opening Hours Tues-Sat 10.30-4pm Closed Sunday and Monday
        </p>
        <p class="lead">
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
            <a class="btn btn-3 btn-primary btn-lg" href="<?php echo $donate_link; ?>" role="button">Donate</a>
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















<!-- Cat Slideshow -->
<script>
jQuery(document).ready(function() {
    //Perform Ajax request.
    jQuery.ajax({
        url: 'http://localhost/heatons/wp-json/wp/v2/posts?_embed',
        type: 'get',
        success: function(data) {
            const catPosts = data
            console.log(catPosts)
            const catGallery = document.getElementById('cat-gallery')
            // Check categories only cats/kitten
            let catGalleryData = catPosts.filter(post => post.categories.includes(2) || post
                    .categories.includes(3))
                .map(post => {
                        return {

                            name: post.title.rendered,
                            img_url: post.better_featured_image.source_url,
                            link: post.link
                        }
                    }

                )
            console.log(catGalleryData)

            function getGallery(numSlides = 4) {
                let galleryHTML = ""
                let slideView = catGalleryData.slice(0, numSlides)
                slideView.forEach(catPost => {
                    galleryHTML += `
                <a href="${catPost.link}">
                
                    <div class="card"> 
                        <div class="card-content">
                            <img src="${catPost.img_url}" alt=${catPost.name}/>
                            <h4>${catPost.name}</h4>
                        </div>
                    </div>
                </a>
                `
                })
                catGallery.innerHTML = galleryHTML
            }

            function slider(direction) {
                if (direction == "left") {
                    let lastCat = catGalleryData.shift()
                    catGalleryData.push(lastCat)
                    checkScreenWidth()
                } else {
                    let lastCat = catGalleryData.pop()
                    catGalleryData.unshift(lastCat)
                    checkScreenWidth()
                }

            }
            // Get screen width
            function checkScreenWidth() {
                let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                console.log(width)
                if (width > 1400) {
                    getGallery(4)
                } else if (width <= 1400 && width >= 1021) {
                    getGallery(3)
                } else if (width < 1021 && width >= 731) {
                    getGallery(2)
                } else if (width <= 730) {
                    getGallery(1)
                }
            }
            //On load
            checkScreenWidth()

            //Media queries
            window.addEventListener('resize', checkScreenWidth)
            //Button listens
            jQuery('#left').on('click', () => slider("left"))
            jQuery('#right').on('click', () => slider("right"))




        },
        error: function(xhr, ajaxOptions, thrownError) {
            var errorMsg = 'Ajax request failed: ' + xhr.responseText;
            $('#content').html(errorMsg);
        }
    });




});
</script>

<?php get_footer(); ?>