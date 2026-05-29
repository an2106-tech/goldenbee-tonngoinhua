<?php
/**
 * Theme Customizer.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', 'goldenbee_customize_register' );

/**
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function goldenbee_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'goldenbee_contact', array(
		'title'    => __( 'Thông tin liên hệ', 'goldenbee' ),
		'priority' => 30,
	) );

	$fields = array(
		'phone'          => array( 'label' => 'Hotline', 'default' => '0911469969' ),
		'phone_secondary'=> array( 'label' => 'Hotline 2', 'default' => '0943759119' ),
		'email'          => array( 'label' => 'Email', 'default' => 'tonngoinhuaxanh@gmail.com' ),
		'address'        => array( 'label' => 'Địa chỉ', 'default' => 'P. An Phú Đông, TP.HCM' ),
		'hours'          => array( 'label' => 'Giờ làm việc', 'default' => '08:00 - 17:00 (T2 - T7)' ),
		'zalo_url'       => array( 'label' => 'Zalo URL', 'default' => 'https://zalo.me/0911469969' ),
		'messenger_url'  => array( 'label' => 'Messenger URL', 'default' => 'https://m.me/' ),
		'facebook_url'   => array( 'label' => 'Facebook URL', 'default' => '' ),
		'map_embed'      => array( 'label' => 'Google Map embed URL', 'default' => '' ),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting( 'goldenbee_' . $key, array(
			'default'           => $field['default'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'goldenbee_' . $key, array(
			'label'   => $field['label'],
			'section' => 'goldenbee_contact',
			'type'    => 'text',
		) );
	}
}
