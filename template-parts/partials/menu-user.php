<?php

/**
 * The Template for displaying menu user
 *
 * @author 		tokoo
 * @version     1.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<?php if (class_exists('WooCommerce')) : ?>
<div class="dropdown--menu hover user">
    <?php
        if (is_user_logged_in()) :
            $current_user = wp_get_current_user();
            if (($current_user instanceof WP_User)) {
                echo '<button class="dropdown--menu__btn btn">';
                echo get_avatar($current_user->user_email, 30);
                if (!empty($current_user->user_login)) {
                    echo '<span class="user-name sr-only">';
                    echo esc_attr($current_user->user_login);
                    echo '</span>';
                }
                echo '</button>';
            }
        ?>
    <div class="dropdown--menu__content">
        <ul>
            <li class="menu-item"><a
                    href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><?php esc_html_e('My Account', 'catix'); ?></a>
            </li>
            <li class="menu-item"><a
                    href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>"><?php esc_html_e('My Orders', 'catix'); ?></a>
            </li>
            <?php if (class_exists('YITH_WCWL')) : ?>
            <?php $wishlist_page_id = get_option('yith_wcwl_wishlist_page_id'); ?>
            <li class="menu-item"><a
                    href="<?php echo esc_url(get_permalink($wishlist_page_id)); ?>"><?php esc_html_e('My Wishlist', 'catix'); ?></a>
            </li>
            <?php endif; ?>
            <li class="menu-item"><a
                    href="<?php echo wp_logout_url(home_url()); ?>"><?php esc_html_e('Logout', 'catix'); ?></a></li>
        </ul>
    </div>
    <?php
        else : ?>
    <button class="dropdown--menu__btn btn">
        Login
    </button>
    <!-- href="/my-account/">'. __("Create Account") -->
    <?php endif; ?>
</div>
<?php
endif;