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
		'instructions'  => __( 'Chọn hoặc upload ảnh sự kiện có chất lượng rõ nét để hiển thị đúng khung hình.', 'goldenbee' ),
		'return_format' => 'array',
		'preview_size'  => 'medium',
		'library'       => 'all',
		'mime_types'    => 'jpg,jpeg,png,webp',
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
 * Event images (40 slots).
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
			'instructions'  => __( 'Đặt tiêu đề giống theo bố cục ảnh tham chiếu.', 'goldenbee' ),
			'default_value' => 'Hình ảnh Green BM tại các sự kiện',
		),
		array(
			'key'     => 'field_gb_events_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Upload từ 4 đến 40 ảnh sự kiện để tạo khung hình đẹp và đồng bộ với section trên trang chủ.', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 40; $i++ ) {
		$fields[] = goldenbee_acf_image_field( 'field_gb_evt', 'event_image_' . $i, sprintf( __( 'Ảnh sự kiện %d', 'goldenbee' ), $i ) );
	}

	return $fields;
}

/**
 * Media section – quotes slider, press items, video (ACF free).
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
		array(
			'key'     => 'field_gb_media_quote_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Slider trích dẫn báo chí (tối đa 6). Upload logo tròn cho từng nguồn.', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_quote' . $i,
			'label'      => sprintf( __( 'Trích dẫn %d', 'goldenbee' ), $i ),
			'name'       => 'quote_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_q' . $i, 'quote_logo', __( 'Logo báo', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_quote' . $i . '_src',
					'label' => __( 'Tên nguồn', 'goldenbee' ),
					'name'  => 'quote_source',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_quote' . $i . '_txt',
					'label' => __( 'Nội dung trích dẫn', 'goldenbee' ),
					'name'  => 'quote_text',
					'type'  => 'textarea',
					'rows'  => 3,
				),
			),
		);
	}

	$fields[] = array(
		'key'     => 'field_gb_media_press_help',
		'label'   => '',
		'name'    => '',
		'type'    => 'message',
		'message' => __( 'Tin báo (2 mục) – hiển thị cột trái dưới slider.', 'goldenbee' ),
	);

	for ( $i = 1; $i <= 2; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_press' . $i,
			'label'      => sprintf( __( 'Tin báo %d', 'goldenbee' ), $i ),
			'name'       => 'press_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_pr' . $i, 'press_image', __( 'Ảnh', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_press' . $i . '_title',
					'label' => __( 'Tiêu đề', 'goldenbee' ),
					'name'  => 'press_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_press' . $i . '_excerpt',
					'label' => __( 'Mô tả ngắn', 'goldenbee' ),
					'name'  => 'press_excerpt',
					'type'  => 'textarea',
					'rows'  => 3,
				),
				array(
					'key'   => 'field_gb_press' . $i . '_source',
					'label' => __( 'Nguồn (in nghiêng)', 'goldenbee' ),
					'name'  => 'press_source',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_press' . $i . '_link',
					'label' => __( 'Link bài viết', 'goldenbee' ),
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
		'label'         => __( 'Chú thích video', 'goldenbee' ),
		'name'          => 'media_video_caption',
		'type'          => 'text',
		'default_value' => 'Tôn ngói nhựa xanh Green BM lên sóng HTV9 Chương trình nhịp sống kinh doanh',
	);

	return $fields;
}

/**
 * Video công trình section.
 *
 * @return array
 */
function goldenbee_acf_project_video_fields() {
	$fields = array(
		array(
			'key'           => 'field_gb_project_videos_title',
			'label'         => __( 'Tiêu đề section', 'goldenbee' ),
			'name'          => 'project_videos_title',
			'type'          => 'text',
			'default_value' => 'Video các công trình sử dụng tôn ngói nhựa Green BM',
		),
		array(
			'key'     => 'field_gb_project_videos_help',
			'label'   => '',
			'name'    => '',
			'type'    => 'message',
			'message' => __( 'Upload tối đa 6 ảnh thumbnail, mỗi ảnh gắn 1 link video YouTube/Vimeo để mở trong lightbox.', 'goldenbee' ),
		),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_project_video' . $i,
			'label'      => sprintf( __( 'Video công trình %d', 'goldenbee' ), $i ),
			'name'       => 'project_video_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_pv' . $i, 'project_video_image', __( 'Ảnh thumbnail', 'goldenbee' ) ),
				array(
					'key'           => 'field_gb_project_video' . $i . '_url',
					'label'         => __( 'Link video', 'goldenbee' ),
					'name'          => 'project_video_url',
					'type'          => 'url',
					'instructions'  => __( 'Dán link YouTube hoặc video khác có thể nhúng.', 'goldenbee' ),
				),
				array(
					'key'           => 'field_gb_project_video' . $i . '_title',
					'label'         => __( 'Tiêu đề video', 'goldenbee' ),
					'name'          => 'project_video_title',
					'type'          => 'text',
					'default_value' => sprintf( __( 'Công trình video %d', 'goldenbee' ), $i ),
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
			'default_value' => 'Khách hàng của chúng tôi',
		),
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'        => 'field_gb_client' . $i,
			'label'      => sprintf( __( 'Khách hàng %d', 'goldenbee' ), $i ),
			'name'       => 'client_' . $i,
			'type'       => 'group',
			'layout'     => 'row',
			'sub_fields' => array(
				goldenbee_acf_image_field( 'field_gb_cli' . $i, 'client_image', __( 'Hình ảnh', 'goldenbee' ) ),
				array(
					'key'   => 'field_gb_cli' . $i . '_name',
					'label' => __( 'Tên công trình (alt)', 'goldenbee' ),
					'name'  => 'client_name',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_gb_cli' . $i . '_url',
					'label' => __( 'Link liên kết', 'goldenbee' ),
					'name'  => 'client_url',
					'type'  => 'url',
				),
			),
		);
	}

	return $fields;
}
