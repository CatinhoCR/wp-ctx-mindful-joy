<?php

/**
 * Enqueue scripts and styles.
 */
function catix_scripts()
{
	wp_enqueue_style('catix-style', get_stylesheet_uri(), array(), CATIX_VERSION);
	// wp_style_add_data('catix-style', 'rtl', 'replace');
	wp_enqueue_style('catix-styles', get_template_directory_uri() . '/dist/styles.css', array(), CATIX_VERSION);

	wp_enqueue_script('catix-bundle', get_template_directory_uri() . '/dist/bundle.js', array(), CATIX_VERSION, true);

	// wp_enqueue_script('catix-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CATIX_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		// wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'catix_scripts');

/**
 * Loads the admin styles & scripts.
 *
 * @since 1.0
 */
/*
add_action( 'admin_enqueue_scripts', 'catix_admin_scripts' );
function catix_admin_scripts( $hook ) {

	/* Get theme version in style.css. * /
	// $theme = wp_get_theme( get_template(), get_theme_root( get_template_directory() ) );

	if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
		// wp_enqueue_script( );
	}
	
	do_action( 'catix_admin_scripts' );
}
*/

/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0
 */
/*
add_action( 'wp_enqueue_scripts', 'catix_frontend_scripts', 99 );
function catix_frontend_scripts() {

}
*/