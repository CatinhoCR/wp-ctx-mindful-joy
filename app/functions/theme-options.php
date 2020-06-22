<?php

/**
 * ACF Options Pages
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Shop Settings',
        'menu_title'    => 'Shop Listings',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'theme-general-settings',
    ));
}

/**
 * ACF Custom Gutenberg Blocks
 * The core provided categories are [ common | formatting | layout | widgets | embed ]. 
 * Plugins and Themes can also register custom block categories.
 * Reference: https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
 * Dashicons: https://developer.wordpress.org/resource/dashicons
 */

add_action('acf/init', 'caix_acf_init_block_types');
function caix_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a author block.
        acf_register_block_type(array(
            'name'              => 'author-info',
            'title'             => __('Author Info'),
            'description'       => __('Author Information Block for linking to author pages from products or posts.'),
            'render_template'   => 'template-parts/blocks/author-info.php',
            'category'          => 'widget',
            'icon'              => 'edit',
            'keywords'          => array('author box', 'author link'),
        ));

        // register a cta block.
        acf_register_block_type(array(
            'name'              => 'simple-cta',
            'title'             => __('Simple CTA'),
            'description'       => __('Smple block holding a background image, title and call to action. Used for announcing something.'),
            'render_template'   => 'template-parts/blocks/simple-cta.php',
            'category'          => 'layout',
            'icon'              => 'tag',
            'keywords'          => array('call to action'),
        ));
    }
}