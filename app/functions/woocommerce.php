<?php

/**
 * bounce back if WooCommerce is not installed
 *
 * @since 1.0
 */
// if (!class_exists('WooCommerce')) {
// 	return;
// }

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package catix-mindful-joy-gulp
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function catix_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'catix_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function catix_woocommerce_scripts()
{
	wp_enqueue_style('catix-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), CATIX_VERSION);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('catix-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'catix_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function catix_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'catix_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function catix_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'catix_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('catix_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function catix_woocommerce_wrapper_before()
	{
?>
<main id="primary" class="site-main">
    <?php
	}
}
add_action('woocommerce_before_main_content', 'catix_woocommerce_wrapper_before');

if (!function_exists('catix_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function catix_woocommerce_wrapper_after()
	{
		?>
</main><!-- #main -->
<?php
	}
}
add_action('woocommerce_after_main_content', 'catix_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'catix_woocommerce_header_cart' ) ) {
			catix_woocommerce_header_cart();
		}
	?>
*/

if (!function_exists('catix_woocommerce_cart_link_fragment')) {
/**
* Cart Fragments.
*
* Ensure cart contents update when products are added to the cart via AJAX.
*
* @param array $fragments Fragments to refresh via AJAX.
* @return array Fragments to refresh via AJAX.
*/
function catix_woocommerce_cart_link_fragment($fragments)
{
ob_start();
catix_woocommerce_cart_link();
$fragments['a.cart-contents'] = ob_get_clean();

return $fragments;
}
}
add_filter('woocommerce_add_to_cart_fragments', 'catix_woocommerce_cart_link_fragment');

if (!function_exists('catix_woocommerce_cart_link')) {
/**
* Cart Link.
*
* Displayed a link to the cart including the number of items present and the cart total.
*
* @return void
*/
function catix_woocommerce_cart_link()
{
?>
<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
    title="<?php esc_attr_e('View your shopping cart', 'catix'); ?>">
    <?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'catix'),
				WC()->cart->get_cart_contents_count()
			);
			?>
    <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span
        class="count"><?php echo esc_html($item_count_text); ?></span>
</a>
<?php
	}
}

if (!function_exists('catix_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function catix_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
<ul id="site-header-cart" class="site-header-cart">
    <li class="<?php echo esc_attr($class); ?>">
        <?php catix_woocommerce_cart_link(); ?>
    </li>
    <li>
        <?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
    </li>
</ul>
<?php
	}
}

/**
 * Woocommerce custom functions
 *
 * @since 1.0
 */
// Register Custom Taxonomy
function catix_custom_taxonomy_Item()
{

	$labels = array(
		'name'                       => 'Collections',
		'singular_name'              => 'Collection',
		'menu_name'                  => 'Collections',
		'all_items'                  => 'All Collections',
		'parent_item'                => 'Parent Collection',
		'parent_item_colon'          => 'Parent Collection:',
		'new_item_name'              => 'New Collection Name',
		'add_new_item'               => 'Add New Collection',
		'edit_item'                  => 'Edit Collection',
		'update_item'                => 'Update Collection',
		'separate_items_with_commas' => 'Separate Collection with commas',
		'search_items'               => 'Search Collections',
		'add_or_remove_items'        => 'Add or remove Collections',
		'choose_from_most_used'      => 'Choose from the most used Collections',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('item', 'product', $args);
}

add_action('init', 'catix_custom_taxonomy_item', 0);

/**
 * 
 * @ Hooked: woocommerce_before_shop_loop || woocommerce_output_all_notices || woocommerce_result_count
 */
// shop index
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// single product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

function catix_product_author_info() {
	include(get_stylesheet_directory() . "/woocommerce/single-product/author-information.php");
}
add_action('woocommerce_after_single_product_summary', 'catix_product_author_info', 10);

function catix_template_single_description() {
	echo get_the_content();
}
add_action('woocommerce_single_product_summary', 'catix_template_single_description', 35);
