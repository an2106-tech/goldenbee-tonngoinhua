<?php
/**
 * Seed WooCommerce catalog from product-catalog.php
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

/**
 * Run full catalog seed.
 *
 * @return array{success:bool,message:string}
 */
function goldenbee_seed_catalog() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return array(
			'success' => false,
			'message' => __( 'WooCommerce chưa được cài đặt.', 'goldenbee' ),
		);
	}

	$catalog = goldenbee_get_product_catalog();

	goldenbee_seed_attribute( $catalog['attribute'] );

	foreach ( $catalog['categories'] as $category ) {
		$parent_id = goldenbee_ensure_product_category( $category['slug'], $category['name'] );

		foreach ( $category['products'] as $product_data ) {
			$type = isset( $product_data['type'] ) ? $product_data['type'] : 'variable';

			if ( 'simple' === $type ) {
				goldenbee_create_simple_product( $product_data, $parent_id );
			} else {
				goldenbee_create_variable_product( $product_data, $parent_id );
			}
		}
	}

	update_option( 'goldenbee_catalog_seeded', time() );

	return array(
		'success' => true,
		'message' => __( 'Đã tạo danh mục và sản phẩm thành công.', 'goldenbee' ),
	);
}

/**
 * @param array $attr_config Attribute config.
 */
function goldenbee_seed_attribute( $attr_config ) {
	$slug = 'pa_' . $attr_config['slug'];

	if ( ! taxonomy_exists( $slug ) ) {
		wc_create_attribute( array(
			'name'         => $attr_config['label'],
			'slug'         => $attr_config['slug'],
			'type'         => 'select',
			'order_by'     => 'menu_order',
			'has_archives' => false,
		) );
		register_taxonomy( $slug, array( 'product' ), array() );
	}

	foreach ( $attr_config['terms'] as $term_slug => $term_name ) {
		if ( ! term_exists( $term_slug, $slug ) ) {
			wp_insert_term( $term_name, $slug, array( 'slug' => $term_slug ) );
		}
	}
}

/**
 * @param string $slug Slug.
 * @param string $name Name.
 * @return int Term ID.
 */
function goldenbee_ensure_product_category( $slug, $name ) {
	$term = get_term_by( 'slug', $slug, 'product_cat' );
	if ( $term ) {
		return (int) $term->term_id;
	}
	$result = wp_insert_term( $name, 'product_cat', array( 'slug' => $slug ) );
	return is_wp_error( $result ) ? 0 : (int) $result['term_id'];
}

/**
 * @param array $data       Product data.
 * @param int   $category_id Category term ID.
 */
function goldenbee_create_simple_product( $data, $category_id ) {
	$existing = get_page_by_path( $data['slug'], OBJECT, 'product' );
	if ( $existing ) {
		return (int) $existing->ID;
	}

	$product = new WC_Product_Simple();
	$product->set_name( $data['name'] );
	$product->set_slug( $data['slug'] );
	$product->set_status( 'publish' );
	$product->set_catalog_visibility( 'visible' );
	$product->set_category_ids( array( $category_id ) );

	if ( ! empty( $data['price'] ) ) {
		$product->set_regular_price( (string) $data['price'] );
	}

	$product->save();
	return $product->get_id();
}

/**
 * @param array $data       Product data.
 * @param int   $category_id Category term ID.
 */
function goldenbee_create_variable_product( $data, $category_id ) {
	$existing = get_page_by_path( $data['slug'], OBJECT, 'product' );
	if ( $existing ) {
		return (int) $existing->ID;
	}

	$attr_slug = 'pa_mau';
	$product   = new WC_Product_Variable();
	$product->set_name( $data['name'] );
	$product->set_slug( $data['slug'] );
	$product->set_status( 'publish' );
	$product->set_catalog_visibility( 'visible' );
	$product->set_category_ids( array( $category_id ) );

	$labels  = goldenbee_color_labels();
	$options = array();
	foreach ( $data['colors'] as $color_slug ) {
		$options[] = $labels[ $color_slug ] ?? $color_slug;
	}

	$attribute = new WC_Product_Attribute();
	$attribute->set_id( wc_attribute_taxonomy_id_by_name( $attr_slug ) );
	$attribute->set_name( $attr_slug );
	$attribute->set_options( $options );
	$attribute->set_visible( true );
	$attribute->set_variation( true );
	$product->set_attributes( array( $attribute ) );

	$product_id = $product->save();

	wp_set_object_terms( $product_id, $data['colors'], $attr_slug );

	foreach ( $data['colors'] as $color_slug ) {
		$variation = new WC_Product_Variation();
		$variation->set_parent_id( $product_id );
		$variation->set_attributes( array( 'attribute_' . $attr_slug => $color_slug ) );

		if ( ! empty( $data['price'] ) ) {
			$variation->set_regular_price( (string) $data['price'] );
		}

		$variation->set_status( 'publish' );
		$variation->save();
	}

	if ( class_exists( 'WC_Product_Variable' ) ) {
		WC_Product_Variable::sync( $product_id );
	}

	return $product_id;
}

add_action( 'admin_init', 'goldenbee_handle_seed_request' );

/**
 * Admin seed handler.
 */
function goldenbee_handle_seed_request() {
	if ( ! isset( $_GET['goldenbee_seed'] ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'goldenbee_seed' ) ) {
		wp_die( esc_html__( 'Nonce không hợp lệ.', 'goldenbee' ) );
	}

	$result = goldenbee_seed_catalog();

	wp_safe_redirect( add_query_arg( array(
		'page'             => 'goldenbee-setup',
		'goldenbee_seeded' => $result['success'] ? '1' : '0',
		'message'          => rawurlencode( $result['message'] ),
	), admin_url( 'themes.php' ) ) );
	exit;
}

add_action( 'admin_menu', 'goldenbee_add_setup_page' );

/**
 * Setup admin page.
 */
function goldenbee_add_setup_page() {
	add_theme_page(
		__( 'Golden Bee Setup', 'goldenbee' ),
		__( 'Golden Bee Setup', 'goldenbee' ),
		'manage_options',
		'goldenbee-setup',
		'goldenbee_render_setup_page'
	);
}

/**
 * Render setup page.
 */
function goldenbee_render_setup_page() {
	$seeded = get_option( 'goldenbee_catalog_seeded' );
	$nonce  = wp_create_nonce( 'goldenbee_seed' );
	$seed_url = wp_nonce_url( admin_url( 'admin.php?goldenbee_seed=1' ), 'goldenbee_seed' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Golden Bee – Thiết lập', 'goldenbee' ); ?></h1>
		<?php if ( isset( $_GET['message'] ) ) : ?>
			<div class="notice notice-info"><p><?php echo esc_html( rawurldecode( sanitize_text_field( wp_unslash( $_GET['message'] ) ) ) ); ?></p></div>
		<?php endif; ?>
		<p><?php esc_html_e( 'Tạo 4 danh mục sản phẩm và ~30 sản phẩm với biến thể màu theo bảng danh mục.', 'goldenbee' ); ?></p>
		<p>
			<strong><?php esc_html_e( 'WooCommerce:', 'goldenbee' ); ?></strong>
			<?php echo class_exists( 'WooCommerce' ) ? '✓ ' . esc_html__( 'Đã cài', 'goldenbee' ) : '✗ ' . esc_html__( 'Chưa cài – vui lòng cài WooCommerce trước.', 'goldenbee' ); ?>
		</p>
		<p>
			<strong><?php esc_html_e( 'Đã seed:', 'goldenbee' ); ?></strong>
			<?php echo $seeded ? esc_html( date_i18n( 'd/m/Y H:i', $seeded ) ) : esc_html__( 'Chưa', 'goldenbee' ); ?>
		</p>
		<p><a href="<?php echo esc_url( $seed_url ); ?>" class="button button-primary"><?php esc_html_e( 'Chạy seed danh mục sản phẩm', 'goldenbee' ); ?></a></p>
		<hr>
		<h2><?php esc_html_e( 'Tạo trang & menu', 'goldenbee' ); ?></h2>
		<p><a href="<?php echo esc_url( wp_nonce_url( admin_url( 'themes.php?page=goldenbee-setup&goldenbee_pages=1' ), 'goldenbee_pages' ) ); ?>" class="button"><?php esc_html_e( 'Tạo trang mẫu + gán menu', 'goldenbee' ); ?></a></p>
		<hr>
		<h2><?php esc_html_e( 'ACF – Nội dung trang chủ', 'goldenbee' ); ?></h2>
		<p><?php esc_html_e( 'ACF bản miễn phí: chỉnh banner/ảnh ngay trong trang Trang chủ (không dùng Options Page PRO).', 'goldenbee' ); ?></p>
		<?php if ( function_exists( 'get_field' ) ) : ?>
			<?php if ( goldenbee_acf_post_id() ) : ?>
				<p><a href="<?php echo esc_url( goldenbee_acf_home_admin_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Sửa trang chủ (banner, ảnh ACF)', 'goldenbee' ); ?></a></p>
			<?php else : ?>
				<p class="description"><?php esc_html_e( 'Chưa có trang chủ. Bấm "Tạo trang mẫu" bên trên, hoặc Cài đặt → Đọc → chọn trang làm Trang chủ.', 'goldenbee' ); ?></p>
			<?php endif; ?>
		<?php else : ?>
			<p><a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=advanced+custom+fields&tab=search&type=term' ) ); ?>" class="button"><?php esc_html_e( 'Cài Advanced Custom Fields', 'goldenbee' ); ?></a></p>
		<?php endif; ?>
	</div>
	<?php
}

add_action( 'admin_init', 'goldenbee_handle_pages_request' );

/**
 * Create default pages and menu.
 */
function goldenbee_handle_pages_request() {
	if ( ! isset( $_GET['goldenbee_pages'] ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'goldenbee_pages' ) ) {
		return;
	}

	goldenbee_create_default_pages();
	goldenbee_create_default_menu();

	wp_safe_redirect( add_query_arg( array(
		'page'              => 'goldenbee-setup',
		'goldenbee_pages_ok'=> '1',
	), admin_url( 'themes.php' ) ) );
	exit;
}

/**
 * Create pages.
 */
function goldenbee_create_default_pages() {
	$pages = array(
		'trang-chu'    => array( 'title' => 'Trang chủ', 'template' => '' ),
		'gioi-thieu'  => array( 'title' => 'Giới thiệu', 'template' => 'page-gioi-thieu.php' ),
		'lien-he'     => array( 'title' => 'Liên hệ', 'template' => 'page-lien-he.php' ),
		'dai-ly'      => array( 'title' => 'Đại lý', 'template' => 'page-dai-ly.php' ),
		'cong-trinh'  => array( 'title' => 'Công trình', 'template' => '' ),
		'tin-tuc'     => array( 'title' => 'Tin tức', 'template' => '' ),
	);

	$page_ids = array();

	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$page_ids[ $slug ] = $existing->ID;
			continue;
		}
		$id = wp_insert_post( array(
			'post_title'   => $page['title'],
			'post_name'    => $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		if ( $page['template'] && $id ) {
			update_post_meta( $id, '_wp_page_template', $page['template'] );
		}
		$page_ids[ $slug ] = $id;
	}

	if ( ! empty( $page_ids['trang-chu'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_ids['trang-chu'] );
	}
	if ( ! empty( $page_ids['tin-tuc'] ) ) {
		update_option( 'page_for_posts', $page_ids['tin-tuc'] );
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$shop = wc_get_page_id( 'shop' );
		if ( $shop < 0 ) {
			wc_create_page( 'shop', 'woocommerce_shop_page_id', 'Cửa hàng' );
		}
	}
}

/**
 * Create primary navigation menu.
 */
function goldenbee_create_default_menu() {
	$menu_name = 'Menu chính';
	$menu      = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
	} else {
		$menu_id = $menu->term_id;
	}

	$items = array(
		array( 'title' => 'Trang chủ', 'url' => home_url( '/' ) ),
		array( 'title' => 'Giới thiệu', 'slug' => 'gioi-thieu' ),
		array( 'title' => 'Sản phẩm', 'url' => class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ),
		array( 'title' => 'Công trình', 'url' => get_post_type_archive_link( 'cong-trinh' ) ),
		array( 'title' => 'Tin tức', 'slug' => 'tin-tuc' ),
		array( 'title' => 'Đại lý', 'slug' => 'dai-ly' ),
		array( 'title' => 'Liên hệ', 'slug' => 'lien-he' ),
	);

	$existing = wp_get_nav_menu_items( $menu_id );
	if ( empty( $existing ) ) {
		foreach ( $items as $item ) {
			if ( ! empty( $item['slug'] ) ) {
				$page = get_page_by_path( $item['slug'] );
				if ( $page ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title'     => $item['title'],
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $page->ID,
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					) );
					continue;
				}
			}
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'  => $item['title'],
				'menu-item-url'    => $item['url'] ?? home_url( '/' ),
				'menu-item-type'   => 'custom',
				'menu-item-status' => 'publish',
			) );
		}
	}

	$locations           = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}
