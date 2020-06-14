<?php

/**
 * The template for displaying custom search form.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Catix-Mindful-Joy
 */
if (class_exists('WooCommerce')) {
    $taxonomy      = 'product_cat';
} else {
    $taxonomy      = 'category';
}
?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-row align-items-center">
        <div class="col-auto product-search-input">
            <?php
            $category = get_term_by('slug', get_query_var($taxonomy), $taxonomy);
            $cat_args = array(
                'taxonomy'            => $taxonomy,
                'class'               => 'custom-select btn btn-outline-secondary',
                'show_option_all'     => esc_html__('All Categories', 'catix'),
                'hide_empty'          => 1,
                'orderby'             => 'ID',
                'order'                => 'ASC',
                'name'                => $taxonomy,
                'value_field'         => 'slug'
                // ,
                // 'id'                => 'product-category-mobile'
            );
            $category = get_term_by('slug', get_query_var($taxonomy), $taxonomy);
            if ($category) {
                $cat_args['selected'] = $category->term_id;
            }
            if (class_exists('Catix_Custom_CategoryDropdown')) {
                // $cat_args['walker'] = new Catix_Custom_CategoryDropdown;
            }
            // if ( class_exists( 'Tokoo_Megamenus_Walker' ) )
            // $menu_args['walker'] = new Tokoo_Megamenus_Walker;

            // wp_nav_menu( $menu_args );
            // wp_dropdown_categories($cat_args);
            ?>
            <label class="sr-only" for="product-search-keyword">
                <?php echo __("Search our website"); ?>
            </label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <?php //wp_dropdown_categories($cat_args); ?>
                    <!-- <select class="custom-select btn btn-outline-secondary" id="inputGroupSelect04">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> -->
                    <!--
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                     -->
                </div>
                <input type="text" class="form-control" id="product-search-keyword" name="s" placeholder="<?php esc_attr_e('Search', 'catix'); ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <!-- <div class="input-group-text"></div> -->
                </div>
            </div>
        </div>
    </div>
</form>
<!-- <button class="">
    <i class="fas fa-search"></i>
</button> -->