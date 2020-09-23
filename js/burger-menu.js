jQuery(document).ready(function() {
    jQuery("#toggle-nav").click(function(e) {
        jQuery(".blog-nav ul").slideToggle();

        e.preventDefault();
    });
});
