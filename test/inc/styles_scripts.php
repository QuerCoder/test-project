<?php
function add_theme_scripts() {
  wp_enqueue_style( 'Roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400&subset=cyrillic-ext', array(), '1.0', 'all');
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );