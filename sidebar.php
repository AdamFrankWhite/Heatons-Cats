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
        <p class="email-text">purrs@heatonscats.org.uk</p>
    </div>
    <div class="sidebar-module sidebar-module-inset adopt-side-widget">
        <img class="icon" src="<?php bloginfo('template_url');?>/images/icons/icons8-cat-pot.svg" />
        <?php
            if(is_active_sidebar('sidebar-content-2')){
                dynamic_sidebar('sidebar-content-2');
            }
        ?>
    </div>
</div>