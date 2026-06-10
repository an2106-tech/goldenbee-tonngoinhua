<?php
/**
 * ACF field definitions - ACF Free compatible.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

/**
 * Image field helper.
 *
 * @param string $key_prefix Key prefix.
 * @param string $name       Field name.
 * @param string $label      Field label.
 * @return array
 */
function goldenbee_acf_image_field( $key_prefix, $name, $label ) {
	return array(
		'key'           => $key_prefix . '_' . $name,
		'label'         => $label,
		'name'          => $name,
		'type'          => 'image',
		'instructions'  => __( 'Chon hoac upload anh jpg, png, webp.', 'goldenbee' ),
		'return_format' => 'array',
		'preview_size'  => 'medium',
		'library'       => 'all',
		'mime_types'    => 'jpg,jpeg,png,webp',
	);
}

/**
 * Home banner fields.
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
			'message' => __( 'Toi da 3 slide. Moi slide gom anh, tieu de, mo ta va nut.', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_slide' . $i,
			'label'      => sprintf( __( 'Slide %d', 'goldenbee' ), $i ),
			'name'       => 'slide_' . $i,
			'type'       => 'group',
			'layout'     => 'block',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_slide' . $i, 'slide_image', __( 'Anh nen', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_slide' . $i . '_title',
					'label' => __( 'Tieu de', 'goldenbee' ),
					'name'  => 'slide_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_slide' . $i . '_description',
					'label' => __( 'Mo ta ngan', 'goldenbee' ),
					'name'  => 'slide_description',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'           => 'field_gb_slide' . $i . '_button_text',
					'label'         => __( 'Chu nut', 'goldenbee' ),
					'name'          => 'slide_button_text',
					'type'          => 'text',
					'default_value' => __( 'Xem san pham', 'goldenbee' ),
				),
				array(
					'key'   => 'field_gb_slide' . $i . '_button_url',
					'label' => __( 'Link nut', 'goldenbee' ),
					'name'  => 'slide_button_url',
					'type'  => 'url',
				),
			),
		);
	}

	return $fields;
}

/**
 * Home event image fields.
 *
 * @return array
 */
function goldenbee_acf_event_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_events_title',
			'label'         => __( 'Tieu de section', 'goldenbee' ),
			'name'          => 'events_title',
			'type'          => 'text',
			'default_value' => __( 'Hinh anh Green BM tai cac su kien', 'goldenbee' ),
		),
		array(
			'key'     => 'field_gb_events_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Upload toi da 40 anh su kien.', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 40; $i++ ) {
		$fields[] = goldenbee_acf_image_field( 'field_gb_evt', 'event_image_' . $i, sprintf( __( 'Anh su kien %d', 'goldenbee' ), $i ) );
	}

	return $fields;
}

/**
 * Home media fields.
 *
 * @return array
 */
function goldenbee_acf_media_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_media_title',
			'label'         => __( 'Tieu de section', 'goldenbee' ),
			'name'          => 'media_title',
			'type'          => 'text',
			'default_value' => __( 'Truyen thong noi ve chung toi', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_quote' . $i,
			'label'      => sprintf( __( 'Trich dan %d', 'goldenbee' ), $i ),
			'name'       => 'quote_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_q' . $i, 'quote_logo', __( 'Logo bao', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_quote' . $i . '_src',
					'label' => __( 'Ten nguon', 'goldenbee' ),
					'name'  => 'quote_source',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_quote' . $i . '_txt',
					'label' => __( 'Noi dung trich dan', 'goldenbee' ),
					'name'  => 'quote_text',
					'type'  => 'textarea',
					'rows'  => 3,
				),
			),
		);
	}

	for ( $i = 1; $i <= 2; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_press' . $i,
			'label'      => sprintf( __( 'Tin bao %d', 'goldenbee' ), $i ),
			'name'       => 'press_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_pr' . $i, 'press_image', __( 'Anh', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_press' . $i . '_title',
					'label' => __( 'Tieu de', 'goldenbee' ),
					'name'  => 'press_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_press' . $i . '_excerpt',
					'label' => __( 'Mo ta ngan', 'goldenbee' ),
					'name'  => 'press_excerpt',
					'type'  => 'textarea',
					'rows'  => 3,
				),
				array(
					'key'   => 'field_gb_press' . $i . '_source',
					'label' => __( 'Nguon', 'goldenbee' ),
					'name'  => 'press_source',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_press' . $i . '_link',
					'label' => __( 'Link bai viet', 'goldenbee' ),
					'name'  => 'press_link',
					'type'  => 'url',
				),
			),
		);
	}

	$fields[] = array(
		'key'           => 'field_gb_media_video_url',
		'label'         => __( 'URL video YouTube', 'goldenbee' ),
		'name'          => 'media_video_url',
		'type'          => 'url',
		'default_value' => 'https://www.youtube.com/watch?v=4v6ZrRwVxBo',
	);
	$fields[] = array(
		'key'           => 'field_gb_media_video_caption',
		'label'         => __( 'Chu thich video', 'goldenbee' ),
		'name'          => 'media_video_caption',
		'type'          => 'text',
	);

	return $fields;
}

/**
 * Home project video fields.
 *
 * @return array
 */
function goldenbee_acf_project_video_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_project_videos_title',
			'label'         => __( 'Tieu de section', 'goldenbee' ),
			'name'          => 'project_videos_title',
			'type'          => 'text',
			'default_value' => __( 'Video cac cong trinh su dung ton ngoi nhua Green BM', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_project_video' . $i,
			'label'      => sprintf( __( 'Video cong trinh %d', 'goldenbee' ), $i ),
			'name'       => 'project_video_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_pv' . $i, 'project_video_image', __( 'Anh thumbnail', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_project_video' . $i . '_url',
					'label' => __( 'Link video', 'goldenbee' ),
					'name'  => 'project_video_url',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_gb_project_video' . $i . '_title',
					'label' => __( 'Tieu de video', 'goldenbee' ),
					'name'  => 'project_video_title',
					'type'  => 'text',
				),
			),
		);
	}

	return $fields;
}

/**
 * Partner fields.
 *
 * @return array
 */
function goldenbee_acf_partner_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_partners_title',
			'label'         => __( 'Tieu de section', 'goldenbee' ),
			'name'          => 'partners_title',
			'type'          => 'text',
			'default_value' => __( 'Khach hang cua chung toi', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_client' . $i,
			'label'      => sprintf( __( 'Khach hang %d', 'goldenbee' ), $i ),
			'name'       => 'client_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_cli' . $i, 'client_image', __( 'Hinh anh', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_cli' . $i . '_name',
					'label' => __( 'Ten cong trinh', 'goldenbee' ),
					'name'  => 'client_name',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_cli' . $i . '_url',
					'label' => __( 'Link lien ket', 'goldenbee' ),
					'name'  => 'client_url',
					'type'  => 'url',
				),
			),
		);
	}

	return $fields;
}

/**
 * Product detail fields (ACF Free: fixed slots).
 *
 * @return array
 */
function goldenbee_acf_product_detail_fields() {
	$fields = array(
		array(
			'key'     => 'field_gb_product_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Cac truong nay bo sung noi dung cho trang chi tiet san pham. Neu de trong, theme se dung du lieu mac dinh tu WooCommerce.', 'goldenbee' ),
		),
		array(
			'key'   => 'field_gb_product_subtitle',
			'label' => __( 'Mo ta ngan noi bat', 'goldenbee' ),
			'name'  => 'product_subtitle',
			'type'  => 'textarea',
			'rows'  => 3,
		),
		array(
			'key'   => 'field_gb_product_badge',
			'label' => __( 'Nhan noi bat', 'goldenbee' ),
			'name'  => 'product_badge',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_gb_product_warranty',
			'label' => __( 'Bao hanh', 'goldenbee' ),
			'name'  => 'product_warranty',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_gb_product_material',
			'label' => __( 'Vat lieu', 'goldenbee' ),
			'name'  => 'product_material',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_gb_product_origin',
			'label' => __( 'Xuat xu / thuong hieu', 'goldenbee' ),
			'name'  => 'product_origin',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_gb_product_color_note',
			'label' => __( 'Ghi chu mau sac', 'goldenbee' ),
			'name'  => 'product_color_note',
			'type'  => 'textarea',
			'rows'  => 2,
		),
		array(
			'key'   => 'field_gb_product_install_note',
			'label' => __( 'Ghi chu thi cong', 'goldenbee' ),
			'name'  => 'product_install_note',
			'type'  => 'textarea',
			'rows'  => 3,
		),
		array(
			'key'          => 'field_gb_product_install_content',
			'label'        => __( 'Noi dung huong dan thi cong', 'goldenbee' ),
			'name'         => 'product_install_content',
			'type'         => 'wysiwyg',
			'tabs'         => 'visual',
			'toolbar'      => 'basic',
			'media_upload' => 1,
		),
		array(
			'key'   => 'field_gb_product_cta_note',
			'label' => __( 'Ghi chu tu van', 'goldenbee' ),
			'name'  => 'product_cta_note',
			'type'  => 'textarea',
			'rows'  => 3,
		),
		array(
			'key'   => 'field_gb_product_download_url',
			'label' => __( 'Link catalogue / bang gia', 'goldenbee' ),
			'name'  => 'product_download_url',
			'type'  => 'url',
		),
		array(
			'key'           => 'field_gb_product_download_label',
			'label'         => __( 'Chu nut tai lieu', 'goldenbee' ),
			'name'          => 'product_download_label',
			'type'          => 'text',
			'default_value' => __( 'Click xem CATALOGUE san pham', 'goldenbee' ),
		),
	);

	$fields[] = array(
		'key'   => 'field_gb_product_highlights_tab',
		'label' => __( 'Diem noi bat', 'goldenbee' ),
		'name'  => '',
		'type'  => 'tab',
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'   => 'field_gb_product_highlight_' . $i,
			'label' => sprintf( __( 'Diem noi bat %d', 'goldenbee' ), $i ),
			'name'  => 'product_highlight_' . $i,
			'type'  => 'text',
		);
	}

	$fields[] = array(
		'key'   => 'field_gb_product_specs_tab',
		'label' => __( 'Thong so ky thuat', 'goldenbee' ),
		'name'  => '',
		'type'  => 'tab',
	);

	for ( $i = 1; $i <= 8; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_product_spec_' . $i,
			'label'      => sprintf( __( 'Thong so %d', 'goldenbee' ), $i ),
			'name'       => 'product_spec_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				array(
					'key'   => 'field_gb_product_spec_' . $i . '_label',
					'label' => __( 'Ten thong so', 'goldenbee' ),
					'name'  => 'label',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_product_spec_' . $i . '_value',
					'label' => __( 'Gia tri', 'goldenbee' ),
					'name'  => 'value',
					'type'  => 'text',
				),
			),
		);
	}

	$fields[] = array(
		'key'   => 'field_gb_product_applications_tab',
		'label' => __( 'Ung dung', 'goldenbee' ),
		'name'  => '',
		'type'  => 'tab',
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'   => 'field_gb_product_application_' . $i,
			'label' => sprintf( __( 'Ung dung %d', 'goldenbee' ), $i ),
			'name'  => 'product_application_' . $i,
			'type'  => 'text',
		);
	}

	$fields[] = array(
		'key'   => 'field_gb_product_images_tab',
		'label' => __( 'Anh noi dung', 'goldenbee' ),
		'name'  => '',
		'type'  => 'tab',
	);

	$fields[] = goldenbee_acf_image_field( 'field_gb_product', 'product_specs_image', __( 'Anh thong tin ky thuat / catalogue', 'goldenbee' ) );

	$fields[] = array(
		'key'          => 'field_gb_product_real_content',
		'label'        => __( 'Noi dung hinh anh thi cong thuc te', 'goldenbee' ),
		'name'         => 'product_real_content',
		'type'         => 'wysiwyg',
		'tabs'         => 'visual',
		'toolbar'      => 'basic',
		'media_upload' => 1,
	);

	for ( $i = 1; $i <= 8; $i++ ) {
		$fields[] = goldenbee_acf_image_field( 'field_gb_product_real', 'product_real_image_' . $i, sprintf( __( 'Anh thi cong thuc te %d', 'goldenbee' ), $i ) );
	}

	$fields[] = array(
		'key'   => 'field_gb_product_media_tab',
		'label' => __( 'Video va FAQ', 'goldenbee' ),
		'name'  => '',
		'type'  => 'tab',
	);

	$fields[] = array(
		'key'   => 'field_gb_product_video_title',
		'label' => __( 'Tieu de video', 'goldenbee' ),
		'name'  => 'product_video_title',
		'type'  => 'text',
	);

	$fields[] = array(
		'key'   => 'field_gb_product_video_url',
		'label' => __( 'Link video YouTube/Vimeo', 'goldenbee' ),
		'name'  => 'product_video_url',
		'type'  => 'url',
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_product_faq_' . $i,
			'label'      => sprintf( __( 'FAQ %d', 'goldenbee' ), $i ),
			'name'       => 'product_faq_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				array(
					'key'   => 'field_gb_product_faq_' . $i . '_question',
					'label' => __( 'Cau hoi', 'goldenbee' ),
					'name'  => 'question',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_product_faq_' . $i . '_answer',
					'label' => __( 'Tra loi', 'goldenbee' ),
					'name'  => 'answer',
					'type'  => 'textarea',
					'rows'  => 3,
				),
			),
		);
	}

	return $fields;
}
