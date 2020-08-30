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
        <a href="http://www.facebook.com/sharer.php?u=https://www.quittingweedthebook.com" target="_blank">
            <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
        </a>
        <a href="https://twitter.com/share?url=https://www.quittingweedthebook.com&amp;text=Quitting%20Weed%20The%20Complete%20Guide;hashtags=cannabis-addiction"
            target="_blank">
            <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
        </a>
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.quittingweedthebook.com"
            target="_blank">
            <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
        </a>
        <a
            href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
            <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
        </a>
        <a href="http://reddit.com/submit?url=https%3A%2F%2Fwww.quittingweedthebook.com" target="_blank">
            <li><i class="fa fa-reddit" aria-hidden="true"></i></li>
        </a>
    </ul>
</footer>

</body>

</html>