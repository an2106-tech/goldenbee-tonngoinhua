<?php
/**
 * Floating contact – tonngoinhua.vn style.
 *
 * @package GoldenBee
 */

$phone     = goldenbee_get_option( 'phone_secondary', '0943759119' );
$zalo      = goldenbee_get_option( 'zalo_url', 'https://zalo.me/0943759119' );
$messenger = goldenbee_get_option( 'messenger_url', 'https://m.me/tonngoinhua.vn/' );
$icon_base = 'https://tonngoinhua.vn/wp-content/uploads/2023/03';
?>
<div class="contact-social">
	<div class="phoneFt contact-tus">
		<div class="note-social">
			<div class="phone-vr-circle-fill"></div>
			<div class="phone-vr-img-circle">
				<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>">
					<img src="<?php echo esc_url( $icon_base . '/phone.png' ); ?>" alt="<?php esc_attr_e( 'Gọi điện', 'goldenbee' ); ?>">
				</a>
			</div>
		</div>
		<div class="contact-bar phone-bar"><?php echo esc_html( $phone ); ?></div>
	</div>

	<div class="zaloFt contact-tus">
		<div class="note-social">
			<div class="phone-vr-circle-fill"></div>
			<div class="phone-vr-img-circle">
				<a href="<?php echo esc_url( $zalo ); ?>" target="_blank" rel="noopener">
					<img src="<?php echo esc_url( $icon_base . '/zalo.png' ); ?>" alt="Zalo">
				</a>
			</div>
		</div>
		<div class="contact-bar zalo-bar"><?php echo esc_html( $phone ); ?></div>
	</div>

	<div class="faceFt contact-tus">
		<div class="note-social">
			<div class="phone-vr-circle-fill"></div>
			<div class="phone-vr-img-circle">
				<a href="<?php echo esc_url( $messenger ); ?>" target="_blank" rel="noopener">
					<img src="<?php echo esc_url( $icon_base . '/2Bu49oF.png' ); ?>" alt="Messenger">
				</a>
			</div>
		</div>
		<div class="contact-bar fb-bar">Messenger</div>
	</div>
</div>
