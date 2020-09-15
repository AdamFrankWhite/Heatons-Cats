jQuery(document).ready(function() {
    //Perform Ajax request.
    jQuery.ajax({
        url: "http://heatonscats.org.uk/wp-json/wp/v2/posts?_embed",
        type: "get",
        success: function(data) {
            const catPosts = data;
            console.log(catPosts);
            const catGallery = document.getElementById("sidebar-gallery");
            // Check categories only cats/kitten
            let catGalleryData = catPosts
                .filter(
                    post =>
                        post.categories.includes(2) ||
                        post.categories.includes(3)
                )
                .map(post => {
                    return {
                        name: post.title.rendered,
                        img_url: post.better_featured_image.source_url,
                        link: post.link
                    };
                });
            console.log(catGalleryData);

            function getGallery(numSlides = 4) {
                let galleryHTML = "";
                let slideView = catGalleryData.slice(0, numSlides);
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
                `;
                });
                catGallery.innerHTML = galleryHTML;
            }

            function slider(direction) {
                if (direction == "left") {
                    let lastCat = catGalleryData.shift();
                    catGalleryData.push(lastCat);
                    getGallery(1);
                } else {
                    let lastCat = catGalleryData.pop();
                    catGalleryData.unshift(lastCat);
                    getGallery(1);
                }
            }

            //On load
            getGallery(1);

            //Button listens
            jQuery("#left").on("click", () => slider("left"));
            jQuery("#right").on("click", () => slider("right"));
        },
        error: function(xhr, ajaxOptions, thrownError) {
            var errorMsg = "Ajax request failed: " + xhr.responseText;
            $("#content").html(errorMsg);
        }
    });
});
