<?php

/**
 * Custom Post Type for book-authors
 */
function catix_custom_book_authors()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Book Authors', 'Post Type General Name', 'catix'),
        'singular_name'       => _x('Book Author', 'Post Type Singular Name', 'catix'),
        'menu_name'           => __('Book Authors', 'catix'),
        'parent_item_colon'   => __('Parent Book Author', 'catix'),
        'all_items'           => __('All Book Authors', 'catix'),
        'view_item'           => __('View Book Author', 'catix'),
        'add_new_item'        => __('Add New Book Author', 'catix'),
        'add_new'             => __('Add New', 'catix'),
        'edit_item'           => __('Edit Book Author', 'catix'),
        'update_item'         => __('Update Book Author', 'catix'),
        'search_items'        => __('Search Book Author', 'catix'),
        'not_found'           => __('Not Found', 'catix'),
        'not_found_in_trash'  => __('Not found in Trash', 'catix'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label'               => __('book-authors', 'catix'),
        'description'         => __('Book Author news and reviews', 'catix'),
        'labels'              => $labels,
        'menu_icon' => 'dashicons-edit',
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    );

    // Registering Custom Post Type
    register_post_type('book-authors', $args);
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action('init', 'catix_custom_book_authors', 0);

/*add_action( 'init', 'my_cpt_init' );
function my_cpt_init() {
    register_post_type( ... );
}
 
add_action( 'after_switch_theme', 'my_rewrite_flush' );
function my_rewrite_flush() {
    my_cpt_init();
    flush_rewrite_rules();
}*/