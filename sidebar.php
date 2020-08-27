<div class="col-sm-4 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset about-us">
        <h4>About Us</h4>
        <p class="text-justify"><?php the_author_meta( 'description' ); ?> </p>
    </div>
    <h4>Archives</h4>
    <ol class="list-unstyled">
        <?php wp_get_archives( 'type=monthly' ); ?>
    </ol>
</div>