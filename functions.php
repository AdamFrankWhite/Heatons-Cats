<?php 
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
function burger_menu_script() {
     
    wp_enqueue_script( 'burger-menu-script', get_stylesheet_directory_uri() . '/js/burger-menu.js', array( 'jquery' ), null );
  
}
add_action( 'wp_enqueue_scripts', 'burger_menu_script' ); 

add_action('get_header', 'my_filter_head');

function my_filter_head() {
   remove_action('wp_head', '_admin_bar_bump_cb');
} 


function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

?>