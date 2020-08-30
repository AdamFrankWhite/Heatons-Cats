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
        <p class="lead">
            <a class="btn btn-1 btn-primary btn-lg" href="#" role="button">Cats</a>
            <a class="btn btn-2 btn-primary btn-lg" href="#" role="button">Kittens</a>
            <a class="btn btn-3 btn-primary btn-lg" href="#" role="button">Donate</a>
        </p>
    </div>
</div>
<div class="features">

    <div class="card">

        <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-cat.svg">
        <h3>Adopt</h3>
        <p>Looking for a companion? After a friend for your other cat?</p>
        <a href="">Learn more</a>
    </div>

    <div class="card">
        <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-donate.svg">
        <h3>Donate</h3>
        <p>Every amount, no matter how small, all helps go towards caring for the cats.</p>
        <a href="">Learn more</a>
    </div>


    <div class="card">
        <img src="<?php bloginfo('template_url'); ?>/images/icons/icons8-volunteering.svg">
        <h3>Volunteer</h3>
        <p>Want to help us raise money in our charity shop, or with our cats? </p>
        <a href="">Learn more</a>
    </div>

</div>
<hr>
<section class="cat-carousel">
    <h2>Cats available for adoption</h3>
        <!-- Plugin shortcode -->
        <?php post_carousel_id('13'); ?>
        <div id="cat-gallery"></div>



</section>
<hr>


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
            let galleryHTML = ""
            catGalleryData.forEach(catPost => {
                galleryHTML += `
                <a href="${catPost.link}">
                    <div class="card"> 
                        <img src="${catPost.img_url}" alt=${catPost.name}/>
                        <h4>${catPost.name}</h4>
                        </div>
                        </a>
                `
            })
            catGallery.innerHTML = galleryHTML

        },
        error: function(xhr, ajaxOptions, thrownError) {
            var errorMsg = 'Ajax request failed: ' + xhr.responseText;
            $('#content').html(errorMsg);
        }
    });
});
</script>
<?php get_footer(); ?>