<?php
/**
 * WooCommerce theme integration.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_before_main_content', 'goldenbee_wc_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'goldenbee_wc_wrapper_end', 10 );

/**
 * Open WC content wrapper.
 */
function goldenbee_wc_wrapper_start() {
	echo '<main class="py-8"><div class="container-site">';
}

/**
 * Close WC content wrapper.
 */
function goldenbee_wc_wrapper_end() {
	echo '</div></main>';
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'goldenbee_add_to_cart_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'goldenbee_add_to_cart_text' );

/**
 * @return string
 */
function goldenbee_add_to_cart_text() {
	if ( is_product() ) {
		return __( 'ADD TO CART', 'goldenbee' );
	}

	return __( 'Xem ngay', 'goldenbee' );
}

/**
 * Contact price HTML.
 *
 * @return string
 */
function goldenbee_contact_price_html() {
	return '<span class="price gb-contact-price"><span class="gb-contact-price__label">' . esc_html__( 'Giá:', 'goldenbee' ) . '</span> <span class="gb-contact-price__value">' . esc_html__( 'Liên hệ', 'goldenbee' ) . '</span></span>';
}

add_filter( 'woocommerce_get_price_html', 'goldenbee_price_html', 10, 2 );

/**
 * Show contact price when empty.
 *
 * @param string     $price   Price HTML.
 * @param WC_Product $product Product.
 * @return string
 */
function goldenbee_price_html( $price, $product ) {
	if ( ! $product ) {
		return $price;
	}

	if ( $product->is_type( 'variable' ) ) {
		$prices = $product->get_variation_prices( true );
		$min    = current( $prices['price'] );
		if ( '' === $min || false === $min ) {
			return goldenbee_contact_price_html();
		}
	}

	if ( '' === $product->get_price() ) {
		return goldenbee_contact_price_html();
	}

	return $price;
}

add_filter( 'woocommerce_output_related_products_args', 'goldenbee_related_products_args' );

/**
 * Related products carousel source size.
 *
 * @param array $args Related product args.
 * @return array
 */
function goldenbee_related_products_args( $args ) {
	$args['posts_per_page'] = 8;
	$args['columns']        = 4;

	return $args;
}

add_action( 'pre_get_posts', 'goldenbee_filter_products_by_color' );

/**
 * Filter shop by ?filter_mau=slug
 *
 * @param WP_Query $query Query.
 */
function goldenbee_filter_products_by_color( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! ( is_shop() || is_product_taxonomy() ) ) {
		return;
	}

	if ( empty( $_GET['filter_mau'] ) ) {
		return;
	}

	$color = sanitize_title( wp_unslash( $_GET['filter_mau'] ) );
	$tax_query = $query->get( 'tax_query' ) ?: array();

	$tax_query[] = array(
		'taxonomy' => 'pa_mau',
		'field'    => 'slug',
		'terms'    => $color,
	);

	$query->set( 'tax_query', $tax_query );
}

add_action( 'woocommerce_before_shop_loop', 'goldenbee_shop_color_filters', 15 );

/**
 * Color filter links on shop.
 */
function goldenbee_shop_color_filters() {
	if ( ! is_shop() && ! is_product_category() ) {
		return;
	}

	$labels = goldenbee_color_labels();
	$current = isset( $_GET['filter_mau'] ) ? sanitize_title( wp_unslash( $_GET['filter_mau'] ) ) : '';

	echo '<div class="mb-6 flex flex-wrap gap-2">';
	echo '<span class="mr-2 self-center text-sm font-semibold">' . esc_html__( 'Lọc màu:', 'goldenbee' ) . '</span>';
	echo '<a href="' . esc_url( remove_query_arg( 'filter_mau' ) ) . '" class="rounded-full border px-3 py-1 text-xs ' . ( '' === $current ? 'border-brand bg-brand text-white' : 'border-gray-300' ) . '">' . esc_html__( 'Tất cả', 'goldenbee' ) . '</a>';

	foreach ( $labels as $slug => $label ) {
		$url = add_query_arg( 'filter_mau', $slug );
		$active = $current === $slug ? 'border-brand bg-brand text-white' : 'border-gray-300';
		echo '<a href="' . esc_url( $url ) . '" class="rounded-full border px-3 py-1 text-xs ' . esc_attr( $active ) . '">' . esc_html( $label ) . '</a>';
	}
	echo '</div>';
}
