<?php

/**
 * Template Name: Mindfulness
 *
 * The Template for main content Pages
 *
 * @author 		Catix
 * @version     1.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header(); ?>

<main class="main-content">

    <?php if (have_rows('mindful_flex_content')) : ?>
        <?php while (have_rows('mindful_flex_content')) : the_row(); ?>

            <?php if (get_row_layout() == 'simple_cta') : ?>
                <?php include(get_stylesheet_directory() . "/template-parts/blocks/simple-cta.php"); ?>
            <?php elseif (get_row_layout() == 'recent_products_grid') : ?>
                <?php include(get_stylesheet_directory() . "/template-parts/blocks/products-listings.php"); ?>
            <?php elseif (get_row_layout() == 'image') : ?>
                
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer();
