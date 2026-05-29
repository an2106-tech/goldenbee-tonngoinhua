<?php
/**
 * Theme helpers.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get theme option from Customizer with fallback.
 *
 * @param string $key     Setting key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function goldenbee_get_option( $key, $default = '' ) {
	return get_theme_mod( 'goldenbee_' . $key, $default );
}

/**
 * Format price or contact label.
 *
 * @param WC_Product $product Product.
 * @return string
 */
function goldenbee_format_price( $product ) {
	if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
		return __( 'Giá: Liên hệ', 'goldenbee' );
	}

	$price = $product->get_price();

	if ( '' === $price || null === $price ) {
		return __( 'Giá: Liên hệ', 'goldenbee' );
	}

	return wc_price( $price );
}

/**
 * Product catalog data.
 *
 * @return array
 */
function goldenbee_get_product_catalog() {
	static $catalog = null;
	if ( null === $catalog ) {
		$catalog = require get_template_directory() . '/inc/data/product-catalog.php';
	}
	return $catalog;
}

/**
 * Get product category link by slug.
 *
 * @param string $slug Category slug.
 * @return string
 */
function goldenbee_category_link( $slug ) {
	if ( ! taxonomy_exists( 'product_cat' ) ) {
		return home_url( '/shop/' );
	}
	$term = get_term_by( 'slug', $slug, 'product_cat' );
	if ( $term && ! is_wp_error( $term ) ) {
		return get_term_link( $term );
	}
	return wc_get_page_permalink( 'shop' ) ?: home_url( '/shop/' );
}

/**
 * Get product link by slug.
 *
 * @param string $slug Product slug.
 * @return string
 */
function goldenbee_product_link( $slug ) {
	$post = get_page_by_path( $slug, OBJECT, 'product' );
	if ( $post ) {
		return get_permalink( $post );
	}
	return goldenbee_category_link( '' );
}

/**
 * Color term labels.
 *
 * @return array
 */
/**
 * Get ACF option field with fallback.
 *
 * @param string $name    Field name.
 * @param mixed  $default Default.
 * @return mixed
 */
/**
 * Post ID trang chủ (nơi lưu field ACF – bản free không có Options Page).
 *
 * @return int
 */
function goldenbee_acf_post_id() {
	$front_id = (int) get_option( 'page_on_front' );
	if ( $front_id > 0 ) {
		return $front_id;
	}

	$page = get_page_by_path( 'trang-chu' );
	return $page ? (int) $page->ID : 0;
}

/**
 * Link sửa nội dung trang chủ (ACF fields).
 *
 * @return string
 */
function goldenbee_acf_home_admin_url() {
	$post_id = goldenbee_acf_post_id();
	if ( $post_id ) {
		return get_edit_post_link( $post_id, 'raw' );
	}

	return admin_url( 'options-reading.php' );
}

function goldenbee_get_option_field( $name, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$post_id = goldenbee_acf_post_id();
		if ( ! $post_id ) {
			return $default;
		}
		$value = get_field( $name, $post_id );
		if ( null !== $value && false !== $value && '' !== $value ) {
			return $value;
		}
	}
	return $default;
}

/**
 * Hero slides từ ACF groups slide_1..slide_3 (bản free).
 *
 * @return array
 */
function goldenbee_get_hero_slides_for_display() {
	$gradients = array( 'from-brand-dark to-brand', 'from-brand to-brand-light', 'from-gray-800 to-brand-dark' );
	$slides    = array();

	for ( $i = 1; $i <= 3; $i++ ) {
		$group = goldenbee_get_option_field( 'slide_' . $i, null );
		if ( ! is_array( $group ) ) {
			continue;
		}

		$image = $group['slide_image'] ?? null;
		$title = $group['slide_title'] ?? '';
		$desc  = $group['slide_description'] ?? '';

		$has_image = is_array( $image ) && ! empty( $image['url'] );
		if ( ! $title && ! $has_image ) {
			continue;
		}

		$slides[] = array(
			'slide_title'       => $title,
			'slide_description' => $desc,
			'slide_button_text' => $group['slide_button_text'] ?? __( 'Xem sản phẩm', 'goldenbee' ),
			'slide_button_url'  => $group['slide_button_url'] ?? ( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#' ),
			'slide_image'       => $image,
			'gradient'          => $gradients[ ( count( $slides ) ) % count( $gradients ) ],
		);
	}

	if ( ! empty( $slides ) ) {
		return $slides;
	}

	return goldenbee_default_hero_slides();
}

/**
 * Default hero slides when ACF empty.
 *
 * @return array
 */
function goldenbee_default_hero_slides() {
	$shop = class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
	return array(
		array(
			'slide_title'       => __( 'Tôn nhựa Green BM cho công trình công nghiệp', 'goldenbee' ),
			'slide_description' => __( 'Giải pháp tấm lợp bền vững, thân thiện môi trường', 'goldenbee' ),
			'slide_button_text' => __( 'Xem sản phẩm', 'goldenbee' ),
			'slide_button_url'  => $shop,
			'slide_image'       => null,
			'gradient'          => 'from-brand-dark to-brand',
		),
		array(
			'slide_title'       => __( 'Ngói nhựa ASA/PVC độc quyền', 'goldenbee' ),
			'slide_description' => __( 'Chống ăn mòn, nhẹ, dễ thi công', 'goldenbee' ),
			'slide_button_text' => __( 'Xem sản phẩm', 'goldenbee' ),
			'slide_button_url'  => $shop,
			'slide_image'       => null,
			'gradient'          => 'from-brand to-brand-light',
		),
		array(
			'slide_title'       => __( 'Tôn lấy sáng FRP & Xà gồ nhựa', 'goldenbee' ),
			'slide_description' => __( 'Hệ vật liệu xanh đồng bộ cho mái và kết cấu', 'goldenbee' ),
			'slide_button_text' => __( 'Xem sản phẩm', 'goldenbee' ),
			'slide_button_url'  => $shop,
			'slide_image'       => null,
			'gradient'          => 'from-gray-800 to-brand-dark',
		),
	);
}

/**
 * Default media quotes.
 *
 * @return array
 */
function goldenbee_default_media_quotes() {
	return array(
		array(
			'quote_source' => 'Báo xây dựng',
			'quote_text'   => __( 'Vật liệu xây dựng xanh, thân thiện môi trường cho điều kiện khí hậu Việt Nam.', 'goldenbee' ),
		),
		array(
			'quote_source' => 'HTV tin tức',
			'quote_text'   => __( 'Biến nhựa thành vật liệu xây dựng bền vững với công nghệ tiên tiến.', 'goldenbee' ),
		),
		array(
			'quote_source' => 'Nhịp Sống Khỏe',
			'quote_text'   => __( 'Góp phần bảo vệ môi trường sạch – đẹp, giảm ô nhiễm.', 'goldenbee' ),
		),
		array(
			'quote_source' => 'Nhịp Sống Kinh Doanh',
			'quote_text'   => __( 'Định hướng vật liệu xây dựng chính hãng, bảo vệ môi trường.', 'goldenbee' ),
		),
	);
}

function goldenbee_color_labels() {
	return array(
		'xanh-duong'      => 'Xanh dương',
		'trang-sua'       => 'Trắng sữa',
		'nau-socola'      => 'Nâu socola',
		'xam-long-chuot'  => 'Xám lông chuột',
		'do-do'           => 'Đỏ đô',
		'xanh-tim'        => 'Xanh tím',
		'do-ngoi'         => 'Đỏ ngói',
		'trang'           => 'Trắng',
		'xanh'            => 'Xanh',
	);
}
