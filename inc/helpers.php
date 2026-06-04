<?php
/**
 * Theme helpers.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

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
 * Get ACF option field with fallback.
 *
 * @param string $name     Field name.
 * @param mixed  $default Default.
 * @return mixed
 */
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
 * Base URL for bundled default media images (theme assets, không hotlink).
 *
 * @return string
 */
function goldenbee_media_asset_base() {
	return get_template_directory_uri() . '/assets/images/media';
}

/**
 * Merge ACF media group với default theo index (bù ảnh/text còn thiếu).
 *
 * @param array|null $acf     ACF group.
 * @param array      $default Default row.
 * @param array      $keys    Keys to merge.
 * @return array
 */
function goldenbee_merge_media_group( $acf, $default, $keys ) {
	$out = $default;
	if ( is_array( $acf ) ) {
		foreach ( $keys as $key ) {
			if ( ! isset( $acf[ $key ] ) ) {
				continue;
			}
			$val = $acf[ $key ];
			if ( in_array( $key, array( 'quote_logo', 'press_image' ), true ) ) {
				if ( goldenbee_acf_image_url( $val ) ) {
					$out[ $key ] = $val;
				}
				continue;
			}
			if ( is_string( $val ) && '' === trim( $val ) ) {
				continue;
			}
			if ( null !== $val && false !== $val && '' !== $val ) {
				$out[ $key ] = $val;
			}
		}
	}
	return $out;
}

/**
 * Default media quotes for slider.
 *
 * @return array
 */
function goldenbee_default_media_quotes() {
	$base = goldenbee_media_asset_base();
	return array(
		array(
			'quote_source' => 'Báo xây dựng',
			'quote_text'   => __( 'Trong những năm gần đây, nhu cầu tìm kiếm vật liệu xây dựng “xanh”, thân thiện với môi trường và giảm thiểu tối đa chi phí đang được rất nhiều nhà đầu tư để ý. Để đáp ứng điều kiện khí hậu khắc nghiệt của Việt Nam, sản phẩm tôn ngói nhựa xanh Green BM ra đời nhằm phục vụ khách hàng có nhu cầu lợp mái nhà dân dụng hoặc các nhà máy ở khu công nghiệp.', 'goldenbee' ),
			'quote_logo'   => array( 'url' => $base . '/logo-bao-xay-dung.png' ),
		),
		array(
			'quote_source' => 'HTV tin tức',
			'quote_text'   => __( 'Với tầm nhìn và định hướng trở thành nhà cung cấp Vật liệu xây dựng XANH hàng đầu ở Việt Nam trong 10 năm tới. Công ty Tôn Ngói Nhựa Xanh (GREEN BM) có bước tiến là biến nhựa thành vật liệu xây dựng bền vững vì trong nhựa hội tụ đầy đủ đặc tính chắc, bền, chống nước, nhẹ, dễ đúc khuôn, và tái chế được.', 'goldenbee' ),
			'quote_logo'   => array( 'url' => $base . '/htv-tin-tuc.png' ),
		),
		array(
			'quote_source' => 'Nhịp Sống Khỏe',
			'quote_text'   => __( 'Công ty CP Đầu Tư Xuất Nhập Khẩu Vật Liệu Xanh tự hào, góp phần để lại cho những thế hệ tiếp theo một hành tinh sạch sẽ hơn, bền vững hơn. Nhằm đưa ra những giải pháp để hình thành một nền kinh tế tuần hoàn. Góp phần bảo vệ môi trường thêm sạch – đẹp, giảm ô nhiễm.', 'goldenbee' ),
			'quote_logo'   => array( 'url' => $base . '/nhip-song-khoe.png' ),
		),
		array(
			'quote_source' => 'Nhịp Sống Kinh Doanh',
			'quote_text'   => __( 'Với tiêu chí phát triển bền vững công ty Tôn Ngói Nhựa Xanh (GREEN BM) với định hướng chiến lược tập trung kinh doanh trong lĩnh vực vật liệu xây dựng chính hãng, sản xuất bằng công nghệ tiên tiến và bảo vệ môi trường. Hiện nay công ty đã cho ra đời sản phẩm tôn Ngói nhựa mang thương hiệu GreenBM.', 'goldenbee' ),
			'quote_logo'   => array( 'url' => $base . '/nhip-song-kinh-doanh.png' ),
		),
		array(
			'quote_source' => 'Nhịp Sống Khỏe',
			'quote_text'   => __( 'Công ty CP Đầu Tư Xuất Nhập Khẩu Vật Liệu Xanh tự hào, góp phần để lại cho những thế hệ tiếp theo một hành tinh sạch sẽ hơn, bền vững hơn.', 'goldenbee' ),
			'quote_logo'   => array( 'url' => $base . '/nhip-song-khoe.png' ),
		),
		array(
			'quote_source' => 'HTV tin tức',
			'quote_text'   => __( 'Với tầm nhìn và định hướng trở thành nhà cung cấp Vật liệu xây dựng XANH hàng đầu ở Việt Nam trong 10 năm tới, công ty Tôn Ngói Nhựa Xanh (GREEN BM) có bước tiến là biến nhựa thành vật liệu xây dựng bền vững.', 'goldenbee' ),
			'quote_logo'   => array( 'url' => $base . '/htv-tin-tuc.png' ),
		),
	);
}

/**
 * Quotes for media slider (ACF or defaults).
 *
 * @return array
 */
function goldenbee_get_media_quotes_for_display() {
	$defaults = goldenbee_default_media_quotes();
	$quotes   = array();
	$keys     = array( 'quote_logo', 'quote_source', 'quote_text' );

	for ( $i = 1; $i <= 6; $i++ ) {
		$default = $defaults[ $i - 1 ] ?? array();
		$acf     = goldenbee_get_option_field( 'quote_' . $i, null );
		$merged  = goldenbee_merge_media_group( $acf, $default, $keys );
		if ( ! empty( $merged['quote_text'] ) ) {
			$quotes[] = $merged;
		}
	}

	return $quotes;
}

/**
 * Press items for media section.
 *
 * @return array
 */
function goldenbee_get_media_press_items() {
	$defaults = goldenbee_default_media_press_items();
	$items    = array();
	$keys     = array( 'press_image', 'press_title', 'press_excerpt', 'press_source', 'press_link' );

	for ( $i = 1; $i <= 2; $i++ ) {
		$default = $defaults[ $i - 1 ] ?? array();
		$acf     = goldenbee_get_option_field( 'press_' . $i, null );
		$merged  = goldenbee_merge_media_group( $acf, $default, $keys );
		if ( ! empty( $merged['press_title'] ) ) {
			$items[] = $merged;
		}
	}

	return $items;
}

/**
 * Default press items.
 *
 * @return array
 */
function goldenbee_default_media_press_items() {
	$base = goldenbee_media_asset_base();
	return array(
		array(
			'press_title'   => __( 'Hội Doanh Nghiệp Thái Bình MN Thăm Nhà Máy Vật Liệu Xanh', 'goldenbee' ),
			'press_excerpt' => __( 'Sáng 26 tháng 8 năm 2023, Hội Doanh nhân Thái Bình miền Nam đã tới thăm và làm việc tại nhà máy sản xuất tôn, ngói nhựa – Công ty CPĐT XNK Vật Liệu Xanh của Doanh nhân Giang Công Nục. Tại buổi làm việc, Doanh nhân Giang Công Nục đã trực tiếp hướng dẫn đoàn đi thăm toàn bộ quy trình sản xuất và vận hành của nhà máy.', 'goldenbee' ),
			'press_source'  => __( 'Doanh nhân Thái Bình', 'goldenbee' ),
			'press_link'    => '',
			'press_image'   => array( 'url' => $base . '/hoi-doanh-nghiep-thai-binh.jpg' ),
		),
		array(
			'press_title'   => __( 'Hội viên Giang Công Nục tặng quà Đoàn Boxing trẻ Thái Bình', 'goldenbee' ),
			'press_excerpt' => __( 'Hội viên, Hội Doanh nhân Thái Bình miền Nam Giang Công Nục – Giám đốc CÔNG TY CP ĐT XNK VẬT LIỆU XANH đã trao 6 phần quà. Mỗi phần quà trị giá 2 triệu đồng tới các Vận Động Viên Boxing trẻ Thái Bình góp mặt trong 6 trận tranh HCV tại giải Boxing trẻ toàn Quốc năm 2023 tại TPHCM.', 'goldenbee' ),
			'press_source'  => __( 'Doanh nhân Thái Bình', 'goldenbee' ),
			'press_link'    => '',
			'press_image'   => array( 'url' => $base . '/boxing-thai-binh.jpg' ),
		),
	);
}

/**
 * URL from ACF image field (array or attachment ID).
 *
 * @param mixed $field Image field value.
 * @return string
 */
function goldenbee_acf_image_url( $field ) {
	if ( is_array( $field ) && ! empty( $field['url'] ) ) {
		return $field['url'];
	}
	if ( is_numeric( $field ) ) {
		$url = wp_get_attachment_image_url( (int) $field, 'medium' );
		return $url ? $url : '';
	}
	return '';
}

/**
 * Media video embed HTML.
 *
 * @return string
 */
function goldenbee_get_media_video_embed() {
	$url = goldenbee_get_option_field( 'media_video_url', 'https://www.youtube.com/watch?v=4v6ZrRwVxBo' );
	if ( ! $url ) {
		return '';
	}
	$embed = wp_oembed_get( $url, array( 'width' => 640 ) );
	if ( $embed ) {
		return $embed;
	}
	$video_id = '';
	if ( preg_match( '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $m ) ) {
		$video_id = $m[1];
	}
	if ( $video_id ) {
		return '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . esc_attr( $video_id ) . '" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
	}
	return '';
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