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
?>
<section class="content-block" id="" style="background-color: <?php the_sub_field('section_background'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center content-block__title dark">
                <h2>
                    <?php the_sub_field('section_title'); ?>
                </h2>
                <p>
                    <?php the_sub_field('section_description'); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            if( have_rows('products_to_show') ):
                while( have_rows('products_to_show') ): the_row();
                    $post_object = get_sub_field('product_item');
                    if( $post_object ):
                        $post = $post_object;
                        setup_postdata( $post );
                            wc_get_template_part('content', 'product');
                        wp_reset_postdata();
                    endif;
                endwhile; 
            endif;
            ?>

        <?php
            
            /*
                    <?php if( have_rows('products_to_show') ): ?>

            

            <?php while( have_rows('products_to_show') ): the_row(); ?>
                <?php // var_dump(the_row()); ?>

                <?php 
                    $post = $postObject;
                    setup_postdata( $post );
                ?>
                
                <?php // echo '<pre>', var_dump($postObject) , '</pre>'; ?>
                <?php wc_get_template_part('content', 'product'); ?>
                <?php //the_sub_field('title'); ?>

            <?php endwhile; 
            // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata();
            ?>
                
            

        <?php endif; ?>
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
            */
        ?>
        </div>
    </div>
</section>