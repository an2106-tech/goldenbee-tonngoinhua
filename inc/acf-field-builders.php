<?php
/**
 * ACF field definitions – chỉ dùng loại field FREE (không Repeater/Gallery PRO).
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

/**
 * @param string $key_prefix Key prefix.
 * @param string $name       Field name prefix.
 * @param string $label      Label prefix.
 * @return array
 */
function goldenbee_acf_image_field( $key_prefix, $name, $label ) {
	return array(
		'key'           => $key_prefix . '_' . $name,
		'label'         => $label,
		'name'          => $name,
		'type'          => 'image',
		'return_format' => 'array',
		'preview_size'  => 'medium',
		'library'       => 'all',
	);
}

/**
 * Slide groups (3 slides).
 *
 * @return array
 */
function goldenbee_acf_banner_fields() {
	$fields = array(
		array(
			'key'     => 'field_gb_hero_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Tối đa 3 slide. Bấm "Thêm ảnh" trong từng slide → chọn ảnh từ thư viện hoặc upload mới.', 'goldenbee' ),
		),
	);

	$sub = array(
		goldenbee_acf_image_field( 'field_gb', 'slide_image', __( 'Ảnh nền', 'goldenbee' ) ),
		array(
			'key'   => 'field_gb_stitle',
			'label' => __( 'Tiêu đề', 'goldenbee' ),
			'name'  => 'slide_title',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_gb_sdesc',
			'label' => __( 'Mô tả ngắn', 'goldenbee' ),
			'name'  => 'slide_description',
			'type'  => 'textarea',
			'rows'  => 2,
		),
		array(
			'key'           => 'field_gb_sbtn',
			'label'         => __( 'Chữ nút', 'goldenbee' ),
			'name'          => 'slide_button_text',
			'type'          => 'text',
			'default_value' => 'Xem sản phẩm',
		),
		array(
			'key'   => 'field_gb_surl',
			'label' => __( 'Link nút', 'goldenbee' ),
			'name'  => 'slide_button_url',
			'type'  => 'url',
		),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$slide_sub = $sub;
		foreach ( $slide_sub as $idx => $f ) {
			$slide_sub[ $idx ]['key'] = 'field_gb_slide' . $i . '_' . $f['name'];
		}
		$fields[] = array(
			'key'        => 'field_gb_slide' . $i,
			'label'      => sprintf( /* translators: %d: slide number */ __( 'Slide %d', 'goldenbee' ), $i ),
			'name'       => 'slide_' . $i,
			'type'       => 'group',
			'layout'     => 'block',
			'sub_fields' => $slide_sub,
		);
	}

	return $fields;
}

/**
 * Event images (6 slots).
 *
 * @return array
 */
function goldenbee_acf_event_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_events_title',
			'label'         => __( 'Tiêu đề section', 'goldenbee' ),
			'name'          => 'events_title',
			'type'          => 'text',
			'default_value' => 'Hình ảnh Green BM tại các sự kiện',
		),
		array(
			'key'     => 'field_gb_events_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Upload tối đa 6 ảnh (ảnh 1 → ảnh 6).', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = goldenbee_acf_image_field( 'field_gb_evt', 'event_image_' . $i, sprintf( __( 'Ảnh %d', 'goldenbee' ), $i ) );
	}

	return $fields;
}

/**
 * Media quotes (4 slots).
 *
 * @return array
 */
function goldenbee_acf_media_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_media_title',
			'label'         => __( 'Tiêu đề section', 'goldenbee' ),
			'name'          => 'media_title',
			'type'          => 'text',
			'default_value' => 'Truyền thông nói về chúng tôi',
		),
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_quote' . $i,
			'label'      => sprintf( __( 'Trích dẫn %d', 'goldenbee' ), $i ),
			'name'       => 'quote_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				array(
					'key'   => 'field_gb_quote' . $i . '_src',
					'label' => __( 'Nguồn', 'goldenbee' ),
					'name'  => 'quote_source',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_quote' . $i . '_txt',
					'label' => __( 'Nội dung', 'goldenbee' ),
					'name'  => 'quote_text',
					'type'  => 'textarea',
					'rows'  => 2,
				),
			),
		);
	}

	return $fields;
}

/**
 * Partner logos (6 slots).
 *
 * @return array
 */
function goldenbee_acf_partner_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_partners_title',
			'label'         => __( 'Tiêu đề section', 'goldenbee' ),
			'name'          => 'partners_title',
			'type'          => 'text',
			'default_value' => 'Đối tác và khách hàng',
		),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_partner' . $i,
			'label'      => sprintf( __( 'Đối tác %d', 'goldenbee' ), $i ),
			'name'       => 'partner_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_ptr' . $i, 'partner_logo', __( 'Logo', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_ptr' . $i . '_name',
					'label' => __( 'Tên (alt)', 'goldenbee' ),
					'name'  => 'partner_name',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_ptr' . $i . '_url',
					'label' => __( 'Link', 'goldenbee' ),
					'name'  => 'partner_url',
					'type'  => 'url',
				),
			),
		);
	}

	return $fields;
}
