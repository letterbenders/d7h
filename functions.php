<?php 

 	// Add custom menu
	add_action('init', 'register_custom_menu');
		function register_custom_menu() { 
			register_nav_menu('main_nav', __('Main nav')); 
		}

	// Add support for post thumbnails
	add_theme_support( 'post-thumbnails' );


	// Excerpt length
	function new_excerpt_length($length) {
		return 30; 
	} 

	add_filter('excerpt_length', 'new_excerpt_length'); 
	
	function new_excerpt_more($more) {        
		global $post; 	
		return '...';

	} 

		add_filter('excerpt_more', 'new_excerpt_more');

?>