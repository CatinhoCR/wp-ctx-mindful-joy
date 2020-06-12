<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package catix-mindful-joy-gulp
 */

/**
 * Get site layout
 *
 * @return void
 * @author tokoo
 **/
function catix_get_site_layout() {
	// $global_layout 	= get_theme_mod( 'catix_global_layout', 'fullwidth' );
	// $get_layouts 	= catix_get_meta( '_layouts_details' );
    // $layout 		= ! empty( $get_layouts['theme_layouts'] ) ? $get_layouts['theme_layouts'] : $global_layout;
    $layout = 'fullwidth';
	return $layout;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function catix_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'catix_body_classes');

/**
 * Wrapper Class Handles
 *
 * @return void
 * @author tokoo
 **/
function catix_wrapper_class_handles()
{
    $get_layouts     = catix_get_site_layout();

    if (!empty($get_layouts)) {
        switch ($get_layouts) {
            case 'left-sidebar':
                echo esc_attr(' has-sidebar layout-left-sidebar');
                break;
            case 'right-sidebar':
                echo esc_attr(' has-sidebar layout-right-sidebar');
                break;
            default:
                echo 'no-sidebar';
                break;
        }
    }
}

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
function catix_is_has_sidebar() { 
	$get_layouts 	= catix_get_site_layout(); 
	if ( ! empty( $get_layouts ) && ( 'left-sidebar' == $get_layouts || 'right-sidebar' == $get_layouts ) ) {
		return true;
	} else {
		return false;
	}
}


/**
 * Wrapper Start
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
add_action('catix_before_main_content', 'catix_wrapper_start', 10);
function catix_wrapper_start()
{
    get_template_part('wrapper', 'start');
}

/**
 * Wrapper End
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
add_action('catix_after_main_content', 'catix_wrapper_end', 10);
function catix_wrapper_end()
{
    get_template_part('wrapper', 'end');
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function catix_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'catix_pingback_header');
