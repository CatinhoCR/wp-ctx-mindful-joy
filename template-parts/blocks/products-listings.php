<?php
// 'tax_query'             => array(
//     array(
//         'taxonomy'      => 'product_cat',
//         'field' => 'term_id', //This is optional, as it defaults to 'term_id'
//         'terms'         => 26,
//         'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
//     ),
//     array(
//         'taxonomy'      => 'product_visibility',
//         'field'         => 'slug',
//         'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
//         'operator'      => 'NOT IN'
//     )
// )
?>
<ul class="products">
    <?php
    // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'product',
        'post_status'           => 'publish',
        'posts_per_page' => 12,
        // 'paged' => $paged
        // 'offset' => 0,
        // 'orderby' => 'date'
        // 'order' => 'ASC'

    );
    $catix_products_query = new WP_Query($args);
    if ($catix_products_query->have_posts()) {
        while ($catix_products_query->have_posts()) : $catix_products_query->the_post();
            wc_get_template_part('content', 'product');
        endwhile;
        // if (function_exists('catix_pagination')) {
            // catix_pagination($catix_products_query->max_num_pages);
        // }
    } else {
        echo __('No products found');
    }
    wp_reset_postdata();
    ?>
</ul>
<!--/.products-->