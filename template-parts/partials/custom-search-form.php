<?php

/**
 * The template for displaying custom search form.
 *
 * Reference: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Catix-Mindful-Joy
 */
if (class_exists('WooCommerce')) {
    $taxonomy      = 'product_cat';
} else {
    $taxonomy      = 'category';
}
?>

<form role="search" method="get" class="searchform main" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-row align-items-center">
        <div class="col product-search-input">
            <label class="sr-only" for="product-search-keyword">
                <?php echo __("Search our website"); ?>
            </label>
            <div class="field-container mb-2">
                <input type="text" class="form-control" id="product-search-keyword" name="s"
                    placeholder="<?php esc_attr_e('Search', 'catix'); ?>">

                <!-- input-group-append -->
                <button class="btn btn-search btn-icon" type="submit">
                    <!-- btn-outline-secondary -->
                    <i class="fas fa-search"></i>
                </button>
                <!-- <div class="input-group-text"></div> -->

            </div>
        </div>
    </div>
</form>
<!-- <button class="">
    <i class="fas fa-search"></i>
</button> -->