<!doctype html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        <?php 
            $siteName = get_bloginfo('name');
            $siteDescription = get_bloginfo('description');
            
            if ( is_front_page()) { 
                echo "$siteName | $siteDescription";
            
            } elseif (is_category()) {
                $cat = get_the_category();
                $categoryName = $cat[0]->cat_name; 
                echo ucfirst($categoryName) ." | " . $siteName;
                
            } elseif(is_single() || is_page()) {
                $postName = the_title();
                echo ucfirst($postName). " | " . $siteName; 
            } else {
                echo "$siteName | $siteDescription";
            }
            
            
        ?>
    </title>
    <script src="https://use.fontawesome.com/29ca1d87cd.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Merienda|Cooper|Martel" rel="stylesheet">
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <?php wp_head();?>
</head>


<body>
    <header>
        <div class="nav-cont">

            <a href="<?php echo get_bloginfo( 'wpurl' );?>">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
echo '<img class="header_logo" src="'.$image[0].'">';?>
            </a>
            <!-- &#9776; -->
            <a id="toggle-nav" href="#">menu</a>
            <div class=" blog-masthead">
                <div class="container">
                    <nav class="blog-nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>
                </div>
            </div>

        </div>
    </header>