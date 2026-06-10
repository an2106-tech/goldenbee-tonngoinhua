<?php
/**
 * Generate ACF JSON from the theme's local PHP field definitions.
 *
 * This script is intended for local development only.
 *
 * @package GoldenBee
 */

define( 'ABSPATH', __DIR__ . '/../' );
define( 'GOLDENBEE_DIR', dirname( __DIR__ ) );

$goldenbee_groups = array();

function __( $text, $domain = null ) {
	return $text;
}

function home_url( $path = '' ) {
	return $path ? $path : '/';
}

function get_option( $name, $default = false ) {
	return $default;
}

function add_action() {
	return true;
}

function add_filter() {
	return true;
}

function acf_add_local_field_group( $group ) {
	global $goldenbee_groups;
	$goldenbee_groups[] = $group;
}

require GOLDENBEE_DIR . '/inc/acf-fields.php';

goldenbee_register_acf_field_groups();

$json_path = GOLDENBEE_DIR . '/acf-json';
if ( ! is_dir( $json_path ) ) {
	mkdir( $json_path, 0777, true );
}

foreach ( $goldenbee_groups as $group ) {
	$group['modified'] = time();
	$filename          = $json_path . '/' . $group['key'] . '.json';
	file_put_contents(
		$filename,
		wp_json_encode( $group, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
	);
}

function wp_json_encode( $data, $flags = 0, $depth = 512 ) {
	return json_encode( $data, $flags, $depth );
}

echo 'Generated ' . count( $goldenbee_groups ) . " ACF JSON files.\n";
