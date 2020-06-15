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

    <?php while (have_posts()) : the_post(); ?>

    <?php the_content(); ?>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>