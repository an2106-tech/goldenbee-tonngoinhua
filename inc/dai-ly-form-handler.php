<?php
/**
 * Form handlers for Dai Ly (Dealership) page.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_submit_dai_ly_form', 'goldenbee_submit_dai_ly_form' );
add_action( 'wp_ajax_nopriv_submit_dai_ly_form', 'goldenbee_submit_dai_ly_form' );

/**
 * Handle Dai Ly registration form submission.
 */
function goldenbee_submit_dai_ly_form() {
	// Verify nonce
	if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'dai_ly_form_nonce' ) ) {
		wp_send_json_error( array( 'message' => __( 'Nonce verification failed', 'goldenbee' ) ) );
		wp_die();
	}

	// Sanitize and validate inputs
	$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
	$email     = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone     = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	// Validate required fields
	if ( empty( $full_name ) || empty( $email ) || empty( $phone ) || empty( $message ) ) {
		wp_send_json_error( array( 'message' => __( 'Please fill in all required fields', 'goldenbee' ) ) );
		wp_die();
	}

	// Validate email
	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Please enter a valid email address', 'goldenbee' ) ) );
		wp_die();
	}

	// Validate phone (basic check)
	if ( strlen( $phone ) < 9 ) {
		wp_send_json_error( array( 'message' => __( 'Please enter a valid phone number', 'goldenbee' ) ) );
		wp_die();
	}

	// Get recipient email (site admin or custom email)
	$recipient_email = get_option( 'admin_email' );
	$custom_email    = get_option( 'goldenbee_dai_ly_email' );
	if ( ! empty( $custom_email ) && is_email( $custom_email ) ) {
		$recipient_email = $custom_email;
	}

	// Prepare email content
	$subject = sprintf(
		/* translators: %s: Full name of the registrant */
		__( 'New Dealership Registration: %s', 'goldenbee' ),
		$full_name
	);

	$email_body = sprintf(
		"Bạn nhận được một đơn đăng ký đại lý mới:\n\n" .
		"Họ và tên: %s\n" .
		"Email: %s\n" .
		"Số điện thoại: %s\n\n" .
		"Nội dung:\n%s\n\n" .
		"---\n" .
		"Đây là một email tự động từ " . get_bloginfo( 'name' ) . "\n",
		$full_name,
		$email,
		$phone,
		$message
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'From: ' . get_bloginfo( 'name' ) . ' <' . get_option( 'admin_email' ) . '>',
		'Reply-To: ' . $email,
	);

	// Send email to admin
	$mail_sent = wp_mail( $recipient_email, $subject, $email_body, $headers );

	// Optional: Send confirmation email to user
	$user_subject = __( 'Chúng tôi đã nhận được yêu cầu của bạn - GREEN BM', 'goldenbee' );
	$user_body    = sprintf(
		"Xin chào %s,\n\n" .
		"Cảm ơn bạn đã đăng ký trở thành đại lý phân phối của Tôn Ngói Nhựa Xanh Green BM.\n" .
		"Chúng tôi đã nhận được yêu cầu của bạn và sẽ liên hệ lại soonest possible.\n\n" .
		"Thông tin của bạn:\n" .
		"Họ và tên: %s\n" .
		"Email: %s\n" .
		"Số điện thoại: %s\n\n" .
		"Trân trọng,\n" .
		"Công Ty Cổ Phần Đầu Tư Xuất Nhập Khẩu Vật Liệu Xanh\n" .
		"GREEN BM – Tôn Ngói Nhựa Xanh",
		$full_name,
		$full_name,
		$email,
		$phone
	);

	$user_headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'From: ' . get_bloginfo( 'name' ) . ' <' . get_option( 'admin_email' ) . '>',
	);

	wp_mail( $email, $user_subject, $user_body, $user_headers );

	if ( $mail_sent ) {
		wp_send_json_success( array(
			'message' => __( 'Cảm ơn bạn! Chúng tôi đã nhận được yêu cầu của bạn và sẽ liên hệ lại soonest possible.', 'goldenbee' ),
		) );
	} else {
		wp_send_json_error( array(
			'message' => __( 'There was an error sending your request. Please try again later.', 'goldenbee' ),
		) );
	}

	wp_die();
}
