jQuery(document).ready(function() {
    //Perform Ajax request.
    jQuery.ajax({
        url: "http://heatonscats.org.uk/wp-json/wp/v2/posts?_embed",
        type: "get",
        success: function(data) {
            const catPosts = data;
            console.log(catPosts);
            const catGallery = document.getElementById("cat-gallery");
            // Check categories only cats/kitten
            let catGalleryData = catPosts
                .filter(
                    post =>
                        post.categories.includes(2) ||
                        post.categories.includes(3)
                )
                .map(post => {
                    let name = post.title.rendered.split("&#8211;");
                    return {
                        name: name[0],
                        img_url: post.better_featured_image.source_url,
                        link: post.link,
                        age: name[1] ? name[1] : ""
                    };
                });

            function getGallery(numSlides = 4) {
                let galleryHTML = "";
                let slideView = catGalleryData.slice(0, numSlides);
                slideView.forEach(catPost => {
                    galleryHTML += `
                <a href="${catPost.link}">
                
                    <div class="card"> 
                        <div class="card-content">
                            <img src="${catPost.img_url}" alt=${catPost.name}/>
                            <h4>${catPost.name}</h4>
							<p>${catPost.age}</p>
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
                    checkScreenWidth();
                } else {
                    let lastCat = catGalleryData.pop();
                    catGalleryData.unshift(lastCat);
                    checkScreenWidth();
                }
            }
            // Get screen width
            function checkScreenWidth() {
                let width =
                    window.innerWidth > 0 ? window.innerWidth : screen.width;
                console.log(width);
                if (width > 1400) {
                    getGallery(4);
                } else if (width <= 1400 && width >= 1021) {
                    getGallery(3);
                } else if (width < 1021 && width >= 731) {
                    getGallery(2);
                } else if (width <= 730) {
                    getGallery(1);
                }
            }
            //On load
            checkScreenWidth();

            //Media queries
            window.addEventListener("resize", checkScreenWidth);
            //Button listens
            jQuery("#left").on("click", () => slider("left"));
            jQuery("#right").on("click", () => slider("right"));
        },
        error: function(xhr, ajaxOptions, thrownError) {
            var errorMsg = "Ajax request failed: " + xhr.responseText;
            jQuery("#content").html(errorMsg);
        }
    });
});
