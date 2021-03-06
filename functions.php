<?php 
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
function burger_menu_script() {
     
    wp_enqueue_script( 'burger-menu-script', get_stylesheet_directory_uri() . '/js/burger-menu.js', array( 'jquery' ), null );
  
}

function cat_gallery_script() {
     
  wp_enqueue_script( 'cat-gallery-script', get_stylesheet_directory_uri() . '/js/cat-gallery.js', array( 'jquery' ), null );

}

function side_gallery_script() {
     
  wp_enqueue_script( 'side-gallery-script', get_stylesheet_directory_uri() . '/js/side-gallery.js', array( 'jquery' ), null );

}

add_action( 'wp_enqueue_scripts', 'burger_menu_script' ); 
add_action( 'wp_enqueue_scripts', 'cat_gallery_script' );
add_action( 'wp_enqueue_scripts', 'side_gallery_script' );
add_action('get_header', 'my_filter_head');

function my_filter_head() {
   remove_action('wp_head', '_admin_bar_bump_cb');
} 

// Auto add featured image
function wpsites_auto_set_featured_image() {
  global $post;
  $featured_image_exists = has_post_thumbnail($post->ID);
     if (!$featured_image_exists)  {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
        if ($attached_image) {
           foreach ($attached_image as $attachment_id => $attachment) {set_post_thumbnail($post->ID, $attachment_id);}
        }
     }
}
add_action('the_post', 'wpsites_auto_set_featured_image');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
  register_sidebar( array(
    'name' => 'Jumbotron Text',
    'id' => 'jumbotron-text',
    'description' => 'Appears in the main header area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
	register_sidebar( array(
    'name' => 'Footer Sidebar 1',
    'id' => 'footer-sidebar-1',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 2',
    'id' => 'footer-sidebar-2',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 3',
    'id' => 'footer-sidebar-3',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
      'name' => 'Sidebar Content 1',
      'id' => 'sidebar-content-1',
      'description' => 'Appears in the sidebar area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
      ) );
    register_sidebar( array(
      'name' => 'Sidebar Content 2',
      'id' => 'sidebar-content-2',
      'description' => 'Appears in the sidebar area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
      ) );
    register_sidebar( array(
      'name' => 'Sidebar Content 3',
      'id' => 'sidebar-content-3',
      'description' => 'Appears in the sidebar area',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
      ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


function excerpt_length( $length ) {
  return 60;
}
add_filter( 'excerpt_length', 'excerpt_length', 999 );


function your_themes_pagination(){
  global $wp_query; 
  echo paginate_links();
}


?>