jQuery(document).ready(function() {
    jQuery("#toggle-nav").click(function(e) {
        console.log("boo");
        jQuery(".blog-nav ul").slideToggle();

        e.preventDefault();
    });
});
