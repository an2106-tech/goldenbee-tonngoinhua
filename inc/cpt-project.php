<?php
/**
 * Project CPT for Công trình.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'goldenbee_register_project_cpt' );

/**
 * Register project post type.
 */
function goldenbee_register_project_cpt() {
	register_post_type( 'project', array(
		'labels' => array(
			'name'          => __( 'Công trình', 'goldenbee' ),
			'singular_name' => __( 'Công trình', 'goldenbee' ),
			'add_new_item'  => __( 'Thêm công trình', 'goldenbee' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'cong-trinh' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-building',
		'show_in_rest' => true,
	) );
}
