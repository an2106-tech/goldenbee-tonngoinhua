<?php
/**
 * Theme setup.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'goldenbee_setup' );

/**
 * Register theme features.
 */
function goldenbee_setup() {
	load_theme_textdomain( 'goldenbee', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 90,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	register_nav_menus( array(
		'primary' => __( 'Menu chính', 'goldenbee' ),
		'footer'  => __( 'Menu chân trang', 'goldenbee' ),
	) );

	set_post_thumbnail_size( 400, 400, true );
	add_image_size( 'goldenbee-hero', 1920, 700, true );
	add_image_size( 'goldenbee-card', 400, 300, true );
}

add_filter( 'get_custom_logo', 'goldenbee_custom_logo_html' );

/**
 * Remove fixed width/height on logo img so CSS max-size applies.
 *
 * @param string $html Logo HTML.
 * @return string
 */
function goldenbee_custom_logo_html( $html ) {
	if ( empty( $html ) ) {
		return $html;
	}
	return preg_replace( '/\s(width|height)=["\'][^"\']*["\']/i', '', $html );
}

add_action( 'wp_enqueue_scripts', 'goldenbee_enqueue_assets' );

/**
 * Enqueue styles and scripts.
 */
function goldenbee_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$style_path    = get_template_directory() . '/assets/style.css';
	$script_path   = get_template_directory() . '/assets/js/main.js';
	$style_version = file_exists( $style_path ) ? filemtime( $style_path ) : $theme_version;
	$script_version = file_exists( $script_path ) ? filemtime( $script_path ) : $theme_version;

	wp_enqueue_style(
		'goldenbee-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto:wght@400;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'goldenbee-style',
		get_template_directory_uri() . '/assets/style.css',
		array( 'goldenbee-fonts' ),
		filemtime( GOLDENBEE_DIR . '/assets/style.css' )
	);

	wp_enqueue_style(
		'goldenbee-news-archive',
		get_template_directory_uri() . '/assets/news-archive.css',
		array( 'goldenbee-style' ),
		filemtime( GOLDENBEE_DIR . '/assets/news-archive.css' )
	);

	wp_enqueue_script(
		'goldenbee-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$script_version,
		true
	);

	wp_enqueue_style(
		'goldenbee-page-gioi-thieu',
		get_template_directory_uri() . '/assets/css/page-gioi-thieu.css',
		array( 'goldenbee-style' ),
		$theme_version
	);

	if ( is_page_template( 'page-dai-ly.php' ) || is_page( 'dai-ly' ) ) {
		wp_enqueue_style(
			'goldenbee-page-dai-ly',
			get_template_directory_uri() . '/assets/css/page-dai-ly.css',
			array( 'goldenbee-style' ),
			$theme_version
		);
	}

	wp_localize_script( 'goldenbee-main', 'goldenbeeData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	) );
}
