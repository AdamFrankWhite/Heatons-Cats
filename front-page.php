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
<section class="cat-gallery-section">
    <h2>Cats available for adoption</h3>
        <div class="cat-gallery-cont">
            <i id="left" class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            <div id="cat-gallery"></div>
            <i id="right" class="fa fa-chevron-circle-right" aria-hidden="true"></i>
        </div>



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
            checkScreenWidth()

            // setInterval(slider, 3000)
            jQuery('#left').on('click', () => slider("left"))
            jQuery('#right').on('click', () => slider("right"))

            //Media queries
            function myFunction(w) {
                if (x.matches) { // If media query matches
                    getGallery(4)
                }
            }

            function myFunction2(x) {
                if (x.matches) { // If media query matches
                    getGallery(3)
                }
            }

            function myFunction3(y) {
                if (y.matches) { // If media query matches
                    getGallery(2)
                }
            }

            function myFunction4(z) {
                if (z.matches) { // If media query matches
                    getGallery(1)
                }
            }
            var w = window.matchMedia("(min-width: 1400px)")
            myFunction(w) // Call listener function at run time
            w.addListener(myFunction) // Attach listener function on state changes
            var x = window.matchMedia("(min-width: 1021px) and (max-width: 1399px)")
            myFunction(x) // Call listener function at run time
            x.addListener(myFunction2) // Attach listener function on state changes
            var y = window.matchMedia("(min-width: 731px) and (max-width: 1020px)")
            myFunction(y) // Call listener function at run time
            y.addListener(myFunction3) // Attach listener function on state changes
            var z = window.matchMedia("(min-width: 1px) and (max-width: 730px)")
            myFunction(z) // Call listener function at run time
            z.addListener(myFunction4) // Attach listener function on state changes


        },
        error: function(xhr, ajaxOptions, thrownError) {
            var errorMsg = 'Ajax request failed: ' + xhr.responseText;
            $('#content').html(errorMsg);
        }
    });




});
</script>

<?php get_footer(); ?>