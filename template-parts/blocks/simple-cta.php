<?php
$background = get_sub_field('section_background');
?>
<section class="content-block " id="" style="background: linear-gradient(rgba(0, 0, 0, 0.80), rgba(0, 0, 0, 0.70), rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.50)), transparent url(<?php the_sub_field('section_background'); ?>) center center/cover no-repeat fixed;">
    <div class="container">
        <div class="row">
            <div class="col-12 content-block__title text-center">
                <h2>
                    <?php the_sub_field('section_title'); ?>
                </h2>
                <p>
                    <?php the_sub_field('section_description'); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <?php get_template_part('/template-parts/partials/content', 'search-form');  ?>
            </div>
        </div>
    </div>
</section>