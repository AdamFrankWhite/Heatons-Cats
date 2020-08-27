jQuery(document).ready(function () {
  console.log("Boo");
  jQuery(".toggle-nav").click(function (e) {
    jQuery(".blog-nav").slideToggle(500);

    e.preventDefault();
  });
});
