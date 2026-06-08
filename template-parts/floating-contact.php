<?php
/**
 * Floating contact matching tonngoinhua.vn layout.
 *
 * @package GoldenBee
 */

$phone = goldenbee_get_option( 'phone_secondary', '0943759119' );
?>
<div class="contact-social">
	<div class="phoneFt contact-tus">
		<div class="note-social">
			<div class="phone-vr-circle-fill"></div>
			<div class="phone-vr-img-circle">
				<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2023/03/phone.png" alt="<?php esc_attr_e( 'Gọi điện', 'goldenbee' ); ?>">
				</a>
			</div>
		</div>
		<div class="contact-bar phone-bar"><?php echo esc_html( $phone ); ?></div>
	</div>

	<div class="zaloFt contact-tus">
		<div class="note-social">
			<div class="phone-vr-circle-fill"></div>
			<div class="phone-vr-img-circle">
				<a href="https://zalo.me/<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>" target="_blank" rel="noopener">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2023/03/zalo.png" alt="Zalo">
				</a>
			</div>
		</div>
		<div class="contact-bar zalo-bar"><?php echo esc_html( $phone ); ?></div>
	</div>

	<div class="faceFt contact-tus">
		<div class="note-social">
			<div class="phone-vr-circle-fill"></div>
			<div class="phone-vr-img-circle">
				<a href="https://m.me/tonngoinhua.vn/" target="_blank" rel="noopener">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2023/03/2Bu49oF.png" alt="Messenger">
				</a>
			</div>
		</div>
		<div class="contact-bar fb-bar">Messenger</div>
	</div>
</div>

<div class="nguyenntu-contact">
	<ul>
		<li>
			<a id="goidien" href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>">
				<img src="/wp-content/uploads/2021/08/phone-footer.png" alt="icon"><br>
				<span><?php esc_html_e( 'Gọi điện', 'goldenbee' ); ?></span>
			</a>
		</li>
		<li>
			<a id="nhantin" href="sms:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>">
				<img src="/wp-content/uploads/2021/08/sms-footer.png" alt="icon"><br>
				<span><?php esc_html_e( 'Nhắn tin', 'goldenbee' ); ?></span>
			</a>
		</li>
		<li>
			<a id="chatzalo" href="https://zalo.me/<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>">
				<img src="/wp-content/uploads/2021/08/zalo-footer.png" alt="icon"><br>
				<span><?php esc_html_e( 'Chat zalo', 'goldenbee' ); ?></span>
			</a>
		</li>
		<li>
			<a id="chatfb" href="https://m.me/tonngoinhua.vn/">
				<img src="/wp-content/uploads/2021/08/messenger-footer.png" alt="icon"><br>
				<span><?php esc_html_e( 'Chat Facebook', 'goldenbee' ); ?></span>
			</a>
		</li>
	</ul>
</div>
