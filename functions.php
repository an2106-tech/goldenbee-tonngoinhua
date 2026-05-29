<?php
/**
 * Golden Bee Theme
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

define( 'GOLDENBEE_VERSION', '1.0.0' );
define( 'GOLDENBEE_DIR', get_template_directory() );
define( 'GOLDENBEE_URI', get_template_directory_uri() );

require GOLDENBEE_DIR . '/inc/helpers.php';
require GOLDENBEE_DIR . '/inc/setup.php';
require GOLDENBEE_DIR . '/inc/customizer.php';
require GOLDENBEE_DIR . '/inc/cpt-project.php';
require GOLDENBEE_DIR . '/inc/seed-products.php';
require GOLDENBEE_DIR . '/inc/theme-activation.php';

if ( class_exists( 'WooCommerce' ) ) {
	require GOLDENBEE_DIR . '/inc/woocommerce.php';
}

require GOLDENBEE_DIR . '/inc/acf-fields.php';

add_action( 'after_switch_theme', 'goldenbee_theme_activation_notice' );

/**
 * Redirect to setup after activation.
 */
function goldenbee_theme_activation_notice() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		set_transient( 'goldenbee_wc_missing', 1, DAY_IN_SECONDS );
	}
}

add_action( 'admin_notices', 'goldenbee_admin_notices' );

/**
 * Admin notices.
 */
function goldenbee_admin_notices() {
	if ( ! function_exists( 'get_field' ) && current_user_can( 'install_plugins' ) ) {
		echo '<div class="notice notice-info"><p><strong>Golden Bee:</strong> ';
		echo esc_html__( 'Cài plugin Advanced Custom Fields để chỉnh banner trên trang Trang chủ.', 'goldenbee' );
		echo ' <a href="' . esc_url( admin_url( 'plugin-install.php?s=advanced+custom+fields&tab=search&type=term' ) ) . '">' . esc_html__( 'Cài ACF', 'goldenbee' ) . '</a></p></div>';
	} elseif ( function_exists( 'get_field' ) && ! goldenbee_acf_post_id() && current_user_can( 'manage_options' ) ) {
		echo '<div class="notice notice-warning"><p><strong>Golden Bee:</strong> ';
		echo esc_html__( 'Chưa gán trang chủ. Vào Golden Bee Setup → Tạo trang mẫu, hoặc Cài đặt → Đọc.', 'goldenbee' );
		echo ' <a href="' . esc_url( admin_url( 'themes.php?page=goldenbee-setup' ) ) . '">' . esc_html__( 'Golden Bee Setup', 'goldenbee' ) . '</a></p></div>';
	}

	if ( get_transient( 'goldenbee_wc_missing' ) ) {
		echo '<div class="notice notice-warning"><p><strong>Golden Bee:</strong> ';
		echo esc_html__( 'Vui lòng cài đặt và kích hoạt WooCommerce, sau đó vào Giao diện → Golden Bee Setup.', 'goldenbee' );
		echo ' <a href="' . esc_url( admin_url( 'plugin-install.php?s=woocommerce&tab=search&type=term' ) ) . '">' . esc_html__( 'Cài WooCommerce', 'goldenbee' ) . '</a></p></div>';
		delete_transient( 'goldenbee_wc_missing' );
	}
}
