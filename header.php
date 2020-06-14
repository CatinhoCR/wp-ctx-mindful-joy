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
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link sr-only" href="#primary"><?php esc_html_e('Skip to content', 'catix'); ?></a>
        <header class="site-header is-sticky">
            <div class="container">
                <nav class="navbar main-site-nav">

                    <!-- <i class="fas fa-camera camera"></i> -->
                    <!-- Brand Logo -->
                    <?php the_custom_logo(); ?>
                    <!-- hamburger menu for mobile-->

                    <!-- Big search for blog and products -->
                    <?php // get_template_part('custom-search-form'); 
					?>
                    <!-- user menu (account, cart, etc) -->
                    <!-- another menu list for main site nav, on a dif block below this -->
                    <!-- Collapsible content -->
                    <div>
                        <!-- 
							TODO
						 -->
                        <i class="fas fa-shopping-cart"></i>
                        <?php catix_woocommerce_cart_link(); ?>
                    </div>
                </nav>
            </div>
            <div class="container">
                <nav class="navbar main-site-nav navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarToggleContent">
                        <?php
						wp_nav_menu(
							array(
								'theme_location' => 'catix-primary',
								'menu_id'        => 'primary-menu',
								'menu_class'	 => 'navbar-nav',
								'container'		 => '',
								'walker'		 => new Catix_Custom_Megamenu()
							)
						);
						?>
                        <!-- Links -->
                        <!-- <ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Features</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Pricing</a>
							</li>
						</ul> -->
                        <!-- Links -->
                    </div>
                </nav>
            </div>
        </header>