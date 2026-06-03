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
				'default_value' => 'GIẢI PHÁP TẤM LỢP TÔN NGÓI NHỰA XANH GREEN BM CHO XÂY DỰNG BỀN VỮNG',
			),
			array(
				'key'          => 'field_gb_intro_content',
				'label'        => __( 'Nội dung', 'goldenbee' ),
				'name'         => 'intro_content',
				'type'         => 'wysiwyg',
				'tabs'         => 'visual',
				'toolbar'      => 'basic',
				'media_upload' => 0,
				'default_value' => '<p>Dòng sản phẩm Tôn Ngói Nhựa Xanh (GREEN BM) là hệ giải pháp duy nhất đạt được bản quyền độc quyền toàn quốc của Công ty CP Đầu tư Xuất nhập khẩu Vật liệu xanh (Green Materials JSC). Chúng tôi hiểu rằng tương lai xây dựng phải đồng điệu với sự bảo vệ môi trường. Với cam kết vững chắc, chúng tôi chuyên tâm mang đến cho Quý khách hàng trên khắp Việt Nam những sản phẩm vật liệu xây dựng chất lượng. Bao gồm tôn nhựa Green BM, ngói nhựa Green BM hàng đầu. Sử dụng công nghệ sản xuất tiên tiến, nhựa PVC và lớp ASA. Góp phần vào việc bảo vệ môi trường bền vững. Chúng tôi rất hân hạnh được đồng hành cùng Quý khách hàng trong hành trình xây dựng. Có trách nhiệm và thân thiện với môi trường!</p>',
			),
			array(
				'key'           => 'field_gb_intro_btn_text',
				'label'         => __( 'Chữ nút', 'goldenbee' ),
				'name'          => 'intro_button_text',
				'type'          => 'text',
				'default_value' => 'Xem thêm',
			),
			array(
				'key'           => 'field_gb_intro_btn_url',
				'label'         => __( 'Link nút', 'goldenbee' ),
				'name'          => 'intro_button_url',
				'type'          => 'url',
				'default_value' => home_url( '/gioi-thieu/' ),
			),
			array(
				'key'   => 'field_gb_tab_intro_video',
				'label' => __( 'Video giới thiệu', 'goldenbee' ),
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_gb_intro_video_title',
				'label'         => __( 'Tiêu đề video', 'goldenbee' ),
				'name'          => 'intro_video_title',
				'type'          => 'text',
				'default_value' => __( 'Xem video giới thiệu GREEN BM', 'goldenbee' ),
			),
			array(
				'key'           => 'field_gb_intro_video_text',
				'label'         => __( 'Mô tả video', 'goldenbee' ),
				'name'          => 'intro_video_text',
				'type'          => 'wysiwyg',
				'tabs'          => 'visual',
				'toolbar'       => 'basic',
				'media_upload'  => 0,
				'default_value' => '<p>Video giới thiệu sản phẩm Tôn Ngói Nhựa Xanh GREEN BM và giải pháp xây dựng bền vững.</p>',
			),
			array(
				'key'           => 'field_gb_intro_video_url',
				'label'         => __( 'Link video YouTube', 'goldenbee' ),
				'name'          => 'intro_video_url',
				'type'          => 'url',
				'default_value' => 'https://www.youtube.com/embed/4v6ZrRwVxBo',
			),
			array(
				'key'           => 'field_gb_intro_slider_shortcode',
				'label'         => __( 'Shortcode slider', 'goldenbee' ),
				'name'          => 'intro_slider_shortcode',
				'type'          => 'textarea',
				'instructions'  => __( 'Dán shortcode Smart Slider 3 tại đây, ví dụ [smartslider3 slider="3"].', 'goldenbee' ),
				'new_lines'     => 'none',
			),
			array(
				'key'   => 'field_gb_tab_events',
				'label' => __( 'Hình ảnh sự kiện', 'goldenbee' ),
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


