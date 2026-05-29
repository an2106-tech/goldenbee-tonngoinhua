<?php
/**
 * Run one-time setup on theme activation.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_switch_theme', 'goldenbee_on_theme_activation' );

/**
 * Activate WooCommerce, seed catalog, create pages.
 */
function goldenbee_on_theme_activation() {
	// Activate WooCommerce if present.
	if ( ! class_exists( 'WooCommerce' ) ) {
		$plugin = 'woocommerce/woocommerce.php';
		if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
			activate_plugin( $plugin );
		}
	}

	if ( class_exists( 'WooCommerce' ) && ! get_option( 'goldenbee_catalog_seeded' ) ) {
		goldenbee_seed_catalog();
	}

	if ( ! get_option( 'goldenbee_pages_created' ) ) {
		goldenbee_create_default_pages();
		goldenbee_create_default_menu();
		update_option( 'goldenbee_pages_created', time() );
	}

	flush_rewrite_rules();
}
