<?php
/**
 * Floating contact buttons.
 *
 * @package GoldenBee
 */

$phone      = goldenbee_get_option( 'phone_secondary', '0943759119' );
$phone_link = preg_replace( '/\D/', '', $phone );
?>
<style id="goldenbee-floating-contact-inline">
	.gb-floating-contact,
	.gb-floating-contact * {
		box-sizing: border-box !important;
	}

	.gb-floating-contact {
		position: fixed !important;
		left: 5px !important;
		bottom: 16px !important;
		z-index: 999999 !important;
		display: flex !important;
		flex-direction: column !important;
		gap: 7px !important;
		width: 180px !important;
		pointer-events: none !important;
	}

	.gb-floating-contact__item {
		position: relative !important;
		display: flex !important;
		width: max-content !important;
		min-width: 166px !important;
		height: 62px !important;
		align-items: center !important;
		color: #fff !important;
		font-family: Roboto, Arial, sans-serif !important;
		font-size: 16px !important;
		font-weight: 700 !important;
		line-height: 1 !important;
		text-decoration: none !important;
		pointer-events: auto !important;
	}

	.gb-floating-contact__halo {
		position: absolute !important;
		left: 0 !important;
		top: 0 !important;
		z-index: 1 !important;
		display: block !important;
		width: 62px !important;
		height: 62px !important;
		border-radius: 999px !important;
		background: rgba(230, 8, 8, 0.7) !important;
		animation: goldenbee-contact-pulse-red 1.35s infinite ease-in-out !important;
	}

	.gb-floating-contact__icon {
		position: relative !important;
		z-index: 3 !important;
		display: flex !important;
		width: 44px !important;
		height: 44px !important;
		margin-left: 9px !important;
		align-items: center !important;
		justify-content: center !important;
		border-radius: 999px !important;
		background: #e60808 !important;
		color: #fff !important;
		flex: 0 0 44px !important;
	}

	.gb-floating-contact__icon svg,
	.gb-floating-contact__icon img {
		position: static !important;
		display: block !important;
		width: 24px !important;
		height: 24px !important;
		max-width: 24px !important;
		max-height: 24px !important;
		margin: 0 !important;
		fill: currentColor !important;
		object-fit: contain !important;
		transform-origin: center !important;
		animation: goldenbee-contact-shake 1.25s infinite ease-in-out !important;
	}

	.gb-floating-contact__label {
		position: relative !important;
		z-index: 2 !important;
		display: flex !important;
		height: 39px !important;
		min-width: 126px !important;
		margin-left: -21px !important;
		align-items: center !important;
		justify-content: center !important;
		border-radius: 0 999px 999px 0 !important;
		background: #ff2828 !important;
		padding: 0 15px 0 37px !important;
		white-space: nowrap !important;
		box-shadow: none !important;
	}

	.gb-floating-contact__item--zalo .gb-floating-contact__halo,
	.gb-floating-contact__item--messenger .gb-floating-contact__halo {
		background: rgba(33, 150, 243, 0.72) !important;
		animation-name: goldenbee-contact-pulse-blue !important;
	}

	.gb-floating-contact__item--zalo .gb-floating-contact__icon,
	.gb-floating-contact__item--messenger .gb-floating-contact__icon,
	.gb-floating-contact__item--zalo .gb-floating-contact__label,
	.gb-floating-contact__item--messenger .gb-floating-contact__label {
		background: #2196f3 !important;
	}

	.gb-floating-contact__item--messenger {
		min-width: 158px !important;
	}

	.gb-floating-contact__item--messenger .gb-floating-contact__label {
		min-width: 118px !important;
		padding-right: 14px !important;
	}

	.gb-floating-contact__messenger-cut {
		fill: #2196f3 !important;
	}

	.contact-social,
	.nguyenntu-contact {
		display: none !important;
	}

	@media (max-width: 767px) {
		.gb-floating-contact {
			display: none !important;
		}

		.nguyenntu-contact {
			position: fixed !important;
			left: 0 !important;
			bottom: 0 !important;
			z-index: 999999 !important;
			display: block !important;
			width: 100% !important;
			background: #fff !important;
			border-top: 1px solid #e5e7eb !important;
		}

		.nguyenntu-contact ul {
			display: grid !important;
			grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
			margin: 0 !important;
			padding: 0 !important;
			list-style: none !important;
		}

		.nguyenntu-contact a {
			display: flex !important;
			min-height: 58px !important;
			align-items: center !important;
			justify-content: center !important;
			flex-direction: column !important;
			gap: 4px !important;
			background: #003481 !important;
			color: #fff !important;
			font-size: 11px !important;
			font-weight: 700 !important;
			line-height: 1 !important;
			text-align: center !important;
			text-decoration: none !important;
		}

		.nguyenntu-contact img {
			width: 22px !important;
			height: 22px !important;
			object-fit: contain !important;
		}
	}

	@keyframes goldenbee-contact-shake {
		0%, 50%, 100% { transform: rotate(0deg) scale(1); }
		10%, 30% { transform: rotate(-24deg) scale(1); }
		20%, 40% { transform: rotate(24deg) scale(1); }
	}

	@keyframes goldenbee-contact-pulse-red {
		0% { transform: scale(.9); box-shadow: 0 0 0 0 rgba(230, 8, 8, .45); }
		70% { transform: scale(1); box-shadow: 0 0 0 14px rgba(230, 8, 8, 0); }
		100% { transform: scale(.9); box-shadow: 0 0 0 0 rgba(230, 8, 8, 0); }
	}

	@keyframes goldenbee-contact-pulse-blue {
		0% { transform: scale(.9); box-shadow: 0 0 0 0 rgba(33, 150, 243, .45); }
		70% { transform: scale(1); box-shadow: 0 0 0 14px rgba(33, 150, 243, 0); }
		100% { transform: scale(.9); box-shadow: 0 0 0 0 rgba(33, 150, 243, 0); }
	}
</style>

<nav class="gb-floating-contact" aria-label="<?php esc_attr_e( 'Lien he nhanh', 'goldenbee' ); ?>">
	<a class="gb-floating-contact__item gb-floating-contact__item--phone" href="tel:<?php echo esc_attr( $phone_link ); ?>" aria-label="<?php esc_attr_e( 'Goi dien', 'goldenbee' ); ?>">
		<span class="gb-floating-contact__halo" aria-hidden="true"></span>
		<span class="gb-floating-contact__icon" aria-hidden="true">
			<svg viewBox="0 0 24 24">
				<path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.3 1.3.4 2.6.6 4 .6.7 0 1.2.5 1.2 1.2v3.5c0 .7-.5 1.2-1.2 1.2C10.7 21.4 2.6 13.3 2.6 3.4c0-.7.5-1.2 1.2-1.2h3.5c.7 0 1.2.5 1.2 1.2 0 1.4.2 2.8.6 4 .1.4 0 .9-.3 1.2l-2.2 2.2z"/>
			</svg>
		</span>
		<span class="gb-floating-contact__label"><?php echo esc_html( $phone ); ?></span>
	</a>

	<a class="gb-floating-contact__item gb-floating-contact__item--zalo" href="https://zalo.me/<?php echo esc_attr( $phone_link ); ?>" target="_blank" rel="noopener" aria-label="Zalo">
		<span class="gb-floating-contact__halo" aria-hidden="true"></span>
		<span class="gb-floating-contact__icon" aria-hidden="true">
			<img src="https://tonngoinhua.vn/wp-content/uploads/2023/03/zalo.png" alt="">
		</span>
		<span class="gb-floating-contact__label"><?php echo esc_html( $phone ); ?></span>
	</a>

	<a class="gb-floating-contact__item gb-floating-contact__item--messenger" href="https://m.me/tonngoinhua.vn/" target="_blank" rel="noopener" aria-label="Messenger">
		<span class="gb-floating-contact__halo" aria-hidden="true"></span>
		<span class="gb-floating-contact__icon" aria-hidden="true">
			<svg viewBox="0 0 36 36">
				<path d="M18 4C9.9 4 3.5 9.9 3.5 17.3c0 4 1.9 7.6 4.9 10v4.6l4.5-2.5c1.6.5 3.3.8 5.1.8 8.1 0 14.5-5.9 14.5-13.3S26.1 4 18 4z"/>
				<path class="gb-floating-contact__messenger-cut" d="M9.6 21.5l5.5-5.8 4.1 4.3 7.2-7.7-5.5 5.8-4.1-4.3-7.2 7.7z"/>
			</svg>
		</span>
		<span class="gb-floating-contact__label">Messenger</span>
	</a>
</nav>

<div class="nguyenntu-contact">
	<ul>
		<li>
			<a id="goidien" href="tel:<?php echo esc_attr( $phone_link ); ?>">
				<img src="/wp-content/uploads/2021/08/phone-footer.png" alt="icon"><br>
				<span><?php esc_html_e( 'Goi dien', 'goldenbee' ); ?></span>
			</a>
		</li>
		<li>
			<a id="nhantin" href="sms:<?php echo esc_attr( $phone_link ); ?>">
				<img src="/wp-content/uploads/2021/08/sms-footer.png" alt="icon"><br>
				<span><?php esc_html_e( 'Nhan tin', 'goldenbee' ); ?></span>
			</a>
		</li>
		<li>
			<a id="chatzalo" href="https://zalo.me/<?php echo esc_attr( $phone_link ); ?>">
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
