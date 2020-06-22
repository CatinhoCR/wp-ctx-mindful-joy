<?php

/**
 * Catix functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package catix-mindful-joy-gulp
 */

/* Define static constant */
define('CATIX_THEME_DIR', get_template_directory());
define('CATIX_THEME_URI', get_template_directory_uri());

if (!defined('CATIX_VERSION')) {
	// Replace the version number of the theme on each release.
	define('CATIX_VERSION', '1.0.0');
}

require_once(CATIX_THEME_DIR . '/app/setup.php');
require_once(CATIX_THEME_DIR . '/app/config/config-content.php');
require_once(CATIX_THEME_DIR . '/app/config/config-sidebars.php');

require_once(CATIX_THEME_DIR . '/app/functions/function-assets.php');
require_once(CATIX_THEME_DIR . '/app/functions/theme-options.php');
require_once(CATIX_THEME_DIR . '/app/options/book-authors.php');

require_once(CATIX_THEME_DIR . '/app/functions/template-tags.php');
require_once(CATIX_THEME_DIR . '/app/functions/template-functions.php');

require_once(CATIX_THEME_DIR . '/app/functions/custom-overrides.php');

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	
	require_once get_template_directory() . '/app/functions/woocommerce.php';
}
// require_once get_template_directory() . '/inc/woocommerce.php';