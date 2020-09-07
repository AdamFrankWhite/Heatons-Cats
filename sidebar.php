<div class="col-sm-4 col-sm-offset-1 blog-sidebar">



    <div class="sidebar-module sidebar-module-inset adopt-side-widget">
        <img class="icon" src="<?php bloginfo('template_url');?>/images/icons/icons8-cat-caregivers.svg" />
        <?php
            if(is_active_sidebar('sidebar-content-1')){
                dynamic_sidebar('sidebar-content-1');
            }
        ?>
        <img class="icon" src="<?php bloginfo('template_url');?>/images/icons/icons8-phone-60.png" />
        <p class="phone-num">0161 975 0784</p>
        <img class="icon" src="<?php bloginfo('template_url');?>/images/icons/icons8-email-52.png" />
        <a href="mailto:purrs@heatonscats.org.uk">
            <p class="email-text">purrs@heatonscats.org.uk</p>
        </a>
    </div>
    <!-- Check if page is not cat/kittens/single post -->
    <?php 
    if (!is_category("cats") && !is_category("kittens") && !is_single()) {
       
        echo '<div class="sidebar-module sidebar-module-inset adopt-side-widget no-padding">';
        echo '<img class="icon icon-padding" src="';
        echo bloginfo('template_url');
        echo'/images/icons/icons8-cat-footprint.svg" />
                <h2>Cats and kittens for adoption</h2>
                <div class="cat-gallery-cont">
                    <i id="left" class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    <div id="sidebar-gallery"></div>
                    <i id="right" class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                </div>
                </div>';
        };
        ?>
    <div class="donate-info-tablet">
        <div class="sidebar-module sidebar-module-inset adopt-side-widget">
            <img class="icon icon-padding" src="<?php bloginfo('template_url');?>/images/icons/icons8-cat-pot.svg" />
            <?php
            if(is_active_sidebar('sidebar-content-2')){
                dynamic_sidebar('sidebar-content-2');
            }
        ?>

        </div>

        <div class="sidebar-module sidebar-module-inset adopt-side-widget">

            <img class="icon icon-padding" src="<?php bloginfo('template_url');?>/images/icons/icons8-donate.svg" />
            <h2>Donate</h2>
            <a class="just-giving"
                href="//widgets.justgiving.com/Button/Redirect?p=eyJJZCI6IjY4NmNhMTE5LWE5NDItNGM2Ni04NTYzLWFhMjc0NjJiMmFhOCIsIkNoYXJpdHlJZCI6MjM2NTcxNCwiU2l6ZSI6InMiLCJSZWZlcmVuY2UiOiJ3ZWJsaW5rIiwiVHlwZSI6IkRvbmF0ZSJ9"><img
                    src="//widgets.justgiving.com/Button?p=eyJJZCI6IjY4NmNhMTE5LWE5NDItNGM2Ni04NTYzLWFhMjc0NjJiMmFhOCIsIkNoYXJpdHlJZCI6MjM2NTcxNCwiU2l6ZSI6InMiLCJSZWZlcmVuY2UiOiJ3ZWJsaW5rIiwiVHlwZSI6IkRvbmF0ZSJ9" /></a>
            <div class="paypal-btn" align="center">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd"
                        type="hidden" value="_s-xclick" />
                    <input name="hosted_button_id" type="hidden" value="KSRRZPGV9FFR4" />
                    <input alt="PayPal – The safer, easier way to pay online." name="submit"
                        src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png"
                        type="image" />
                </form>
            </div>
        </div>
    </div>

    <div class="sidebar-module sidebar-module-inset adopt-side-widget">
        <!-- <h3>Facebook</h3> -->
        <?php
            if(is_active_sidebar('sidebar-content-3')){
                dynamic_sidebar('sidebar-content-3');
            }
        ?>
    </div>
</div>

<script>
jQuery(document).ready(function() {
    //Perform Ajax request.
    jQuery.ajax({
        url: 'http://localhost/heatons/wp-json/wp/v2/posts?_embed',
        type: 'get',
        success: function(data) {
            const catPosts = data
            console.log(catPosts)
            const catGallery = document.getElementById('sidebar-gallery')
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
                            <h4 style='text-align: center;'>${catPost.name}</h4>
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
                    getGallery(1)
                } else {
                    let lastCat = catGalleryData.pop()
                    catGalleryData.unshift(lastCat)
                    getGallery(1)
                }

            }

            //On load
            getGallery(1)

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