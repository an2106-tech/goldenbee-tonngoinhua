<?php
/**
 * Advanced Custom Fields – Trang chủ Golden Bee (ACF FREE)
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

require GOLDENBEE_DIR . '/inc/acf-field-builders.php';

add_action( 'acf/init', 'goldenbee_register_acf_field_groups' );

/**
 * Đăng ký field groups.
 */
function goldenbee_register_acf_field_groups() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$locations = array(
		array(
			array(
				'param'    => 'page_type',
				'operator' => '==',
				'value'    => 'front_page',
			),
		),
	);

	$front_id = (int) get_option( 'page_on_front' );
	if ( $front_id > 0 ) {
		$locations[] = array(
			array(
				'param'    => 'page',
				'operator' => '==',
				'value'    => (string) $front_id,
			),
		);
	}

	$fields = array_merge(
		array(
			array(
				'key'   => 'field_gb_tab_banner',
				'label' => __( 'Banner (Slider)', 'goldenbee' ),
				'name'  => '',
				'type'  => 'tab',
			),
		),
		goldenbee_acf_banner_fields(),
		array(
			array(
				'key'   => 'field_gb_tab_intro',
				'label' => __( 'Giới thiệu', 'goldenbee' ),
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_gb_intro_title',
				'label'         => __( 'Tiêu đề', 'goldenbee' ),
				'name'          => 'intro_title',
				'type'          => 'text',
				'default_value' => 'Giải Pháp Tấm Lợp Tôn Ngói Nhựa Xanh GREEN BM',
			),
			array(
				'key'          => 'field_gb_intro_content',
				'label'        => __( 'Nội dung', 'goldenbee' ),
				'name'         => 'intro_content',
				'type'         => 'wysiwyg',
				'tabs'         => 'visual',
				'toolbar'      => 'basic',
				'media_upload' => 0,
			),
			array(
				'key'           => 'field_gb_intro_btn_text',
				'label'         => __( 'Chữ nút', 'goldenbee' ),
				'name'          => 'intro_button_text',
				'type'          => 'text',
				'default_value' => 'Xem thêm',
			),
			array(
				'key'   => 'field_gb_intro_btn_url',
				'label' => __( 'Link nút', 'goldenbee' ),
				'name'  => 'intro_button_url',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_gb_tab_events',
				'label' => __( 'Hình sự kiện', 'goldenbee' ),
				'name'  => '',
				'type'  => 'tab',
			),
		),
		goldenbee_acf_event_fields(),
		array(
			array(
				'key'   => 'field_gb_tab_media',
				'label' => __( 'Truyền thông', 'goldenbee' ),
				'name'  => '',
				'type'  => 'tab',
			),
		),
		goldenbee_acf_media_fields(),
		array(
			array(
				'key'   => 'field_gb_tab_partners',
				'label' => __( 'Khách hàng', 'goldenbee' ),
				'name'  => '',
				'type'  => 'tab',
			),
		),
		goldenbee_acf_partner_fields()
	);

	acf_add_local_field_group( array(
		'key'                   => 'group_goldenbee_home',
		'title'                 => __( 'Trang chủ Golden Bee', 'goldenbee' ),
		'fields'                => $fields,
		'location'              => $locations,
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );
}

add_filter( 'acf/settings/save_json', 'goldenbee_acf_json_save_path' );
add_filter( 'acf/settings/load_json', 'goldenbee_acf_json_load_paths' );

function goldenbee_acf_json_save_path( $path ) {
	return GOLDENBEE_DIR . '/acf-json';
}

function goldenbee_acf_json_load_paths( $paths ) {
	$paths[] = GOLDENBEE_DIR . '/acf-json';
	return $paths;
}
