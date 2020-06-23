<?php

/**
 * This block will show a number of products or posts, based on parameters selected on dashboard.
 */

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
            if( have_rows('posts_to_show') ):
                while( have_rows('posts_to_show') ): the_row();
                    $post_object = get_sub_field('blog_item');
                    if( $post_object ):
                        $post = $post_object;
                        setup_postdata( $post );
                            // wc_get_template_part('content', 'product');
                            get_template_part('/template-parts/blocks/blog', 'post-layout');
                        wp_reset_postdata();
                    endif;
                endwhile; 
            endif;
            ?>
        </div>
    </div>
</section>