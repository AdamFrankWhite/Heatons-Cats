<footer>
    <img class="cat-1" src="<?php bloginfo('template_url');?>/images/cat-5.svg" />
    <img class="cat-2" src="<?php bloginfo('template_url');?>/images/cat-3.svg" />
    <img class="cat-3" src="<?php bloginfo('template_url');?>/images/cat-1.svg" />
    <div class="footer-content">
        <ul class="footer-desc">
            <?php
if(is_active_sidebar('footer-sidebar-1')){
dynamic_sidebar('footer-sidebar-1');
}
?>
        </ul>
        <ul class="links-col-1">
            <!-- <h4>About</h3>
                <li>One</li>
                <li>Two</li>
                <li>Three</li> -->
            <?php
if(is_active_sidebar('footer-sidebar-2')){
dynamic_sidebar('footer-sidebar-2');
}
?>
        </ul>
        <ul class="links-col-2">
            <!-- <h4>Quick Links</h3>
                <li>One</li>
                <li>Two</li>
                <li>Three</li> -->
            <?php
if(is_active_sidebar('footer-sidebar-3')){
dynamic_sidebar('footer-sidebar-3');
}
?>
        </ul>

    </div>
    <!-- <a target="_blank" href="https://icons8.com/icons/set/cat-cage--v2">Cat Cage</a>, <a target="_blank"
        href="https://icons8.com/icons/set/cat-footprint">Cat Footprint</a> and other icons by <a target="_blank"
        href="https://icons8.com">Icons8</a> -->

    <hr>
    <ul class="social-media">
        <a href="https://www.facebook.com/heatonscats/" target="_blank">
            <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
        </a>
        <a href="https://twitter.com/HeatonsCats" target="_blank">
            <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
        </a>

    </ul>
    <div class="designed-by">
        <p>Powered by Wordpress | Web Design by <a href="http://adamwhite.tech" target="_blank">Adam White</p></a>

    </div>
</footer>
<script src="<?php get_stylesheet_directory_uri() . '/js/burger-menu.js' ?>"></script>
</body>

</html>