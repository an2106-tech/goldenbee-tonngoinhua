<?php
/**
 * Register Custom Post Types
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'goldenbee_register_custom_post_types' );

function goldenbee_register_custom_post_types() {
	// 1. Công trình
	register_post_type( 'cong-trinh', array(
		'labels' => array(
			'name'          => __( 'Công trình', 'goldenbee' ),
			'singular_name' => __( 'Công trình', 'goldenbee' ),
			'add_new_item'  => __( 'Thêm công trình', 'goldenbee' ),
			'all_items'     => __( 'Tất cả Công trình', 'goldenbee' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'cong-trinh' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-building',
		'show_in_rest' => true,
	) );

	// 2. Tư vấn & Hướng dẫn
	register_post_type( 'tu-van', array(
		'labels' => array(
			'name'          => __( 'Tư vấn & Hướng dẫn', 'goldenbee' ),
			'singular_name' => __( 'Tư vấn & Hướng dẫn', 'goldenbee' ),
			'add_new_item'  => __( 'Thêm bài viết', 'goldenbee' ),
			'all_items'     => __( 'Tất cả bài viết', 'goldenbee' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'tu-van' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-welcome-learn-more',
		'show_in_rest' => true,
	) );

	// 3. Tin tức
	register_post_type( 'tin-tuc', array(
		'labels' => array(
			'name'          => __( 'Tin tức', 'goldenbee' ),
			'singular_name' => __( 'Tin tức', 'goldenbee' ),
			'add_new_item'  => __( 'Thêm tin tức', 'goldenbee' ),
			'all_items'     => __( 'Tất cả tin tức', 'goldenbee' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'tin-tuc' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-media-document',
		'show_in_rest' => true,
	) );
}
