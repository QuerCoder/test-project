<?php
require_once('inc/styles_scripts.php');
require_once('inc/customizer.php');
require_once('inc/shortcodes.php');

/**
 * Enable thumbnails
 */
add_theme_support('post-thumbnails');

/**
 * Register Menus
 */
function register_my_menus() {
  register_nav_menus ( 
    array('header-menu' => 'Header Menu')
  );
}
add_action( 'init', 'register_my_menus' );
/**
 * Register Post Types
 */
function register_my_post_types(){
	register_post_type('news', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'News',
			'singular_name'      => 'New',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new',
			'edit_item'          => 'Edit new',
			'new_item'           => 'Add new',
			'view_item'          => 'See new', 
			'search_items'       => 'Search news',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in the trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'News',
		),
		'description'         => '',
		'public'              => true,
		'hierarchical'        => true,
		'supports'            => array('title','editor', 'thumbnail'),
		'taxonomies'          => array(),
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}
add_action('init', 'register_my_post_types');

/**
 * Register widgets
 */
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => "sidebar-$i",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="b-widget %2$s" id="%1$s">',
		'after_widget'  => "\n</div>\n",
		'before_title'  => '<h4 class="b-widget__title">',
		'after_title'   => "</h4>\n",
	) );
	register_sidebar( array(
		'name'          => 'Search Widget',
		'id'            => "search-$i",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<div class="px-2">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );

/**
 * Add class to menu links
 * @param string $menu
 * @return menu with added class
 */
function add_navclass($menu) {
   return preg_replace('~<a ~', '<a class="nav-link" ', $menu);
}
add_filter('wp_nav_menu','add_navclass');