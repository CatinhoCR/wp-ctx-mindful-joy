<?php

/**
 * bounce back if WooCommerce is not installed
 *
 * @since 1.0
 */
if (!class_exists('WooCommerce')) {
	return;
}

/**
 * Woocommerce custom functions
 *
 * @since 1.0
 */