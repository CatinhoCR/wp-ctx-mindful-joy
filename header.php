<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package catix-mindful-joy-gulp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <!--  -->
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- //TODO  Page Preloder - mover a wp_body_open -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <div id="page" class="site">
        <a class="skip-link sr-only" href="#primary"><?php esc_html_e('Skip to content', 'catix'); ?></a>
        <header class="main-site-header is-sticky">
            <nav class="navbar navbar-nav menu-top">
                <div class="container">
                    <!-- Brand Logo -->
                    <?php the_custom_logo(); ?>

                    <!-- Search -->
                    <?php // get_template_part('template-parts/partials/custom', 'search-form');  ?>

                    <!-- //TODO Mobile for search and cart -->
                    <!-- user menu -->
                    <?php get_template_part('template-parts/partials/menu', 'user'); ?>
                    <!-- cart -->
                    <div class="dropdown--menu hover cart">
                        <button class="dropdown--menu__btn btn">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
                            <span class="sr-only"><?php esc_html_e('Lista de deseos', 'catix'); ?></span>
                        </button>
                        <div class="dropdown--menu__content">
                            <?php catix_woocommerce_cart_link(); ?>
                            <?php the_widget('WC_Widget_Cart'); ?>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="navbar menu-bottom navbar-expand-lg">
                <div class="container">
                    <!-- hamburger menu for mobile-->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="navbarToggleContent">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'catix-primary',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'navbar-nav',
                                'container'         => '',
                                'walker'         => new Catix_Custom_Megamenu()
                            )
                        );
                        ?>
                    </div>
                </div>
            </nav>
            <!-- //TODO Create toggle search form option and the other one too -->
            <!-- <div class="widget dropdown--menu click">
                <button class="dropdown--menu__btn btn">
                    <i class="fas fa-search"></i>
                    <span
                        class="sr-only"><?php esc_html_e('Buscar productos o artículos en nuestro sitio web', 'catix'); ?></span>
                </button>
                <div class="dropdown--menu__content">
                    <?php get_search_form(); ?>
                    <?php // get_template_part('custom-search-form'); 
                    ?>
                </div>
            </div> -->
        </header>