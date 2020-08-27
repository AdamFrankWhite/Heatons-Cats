<div class="blog-post">
    <a href="#">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
    </a>
    <p class="blog-post-meta"><?php echo get_the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>

    <?php the_content(); ?>

</div><!-- /.blog-post -->