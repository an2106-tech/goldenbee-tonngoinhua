<?php
/**
 * Floating contact buttons.
 *
 * @package GoldenBee
 */

$phone         = goldenbee_get_option( 'phone', '0911469969' );
$zalo          = goldenbee_get_option( 'zalo_url', 'https://zalo.me/0911469969' );
$messenger     = goldenbee_get_option( 'messenger_url', '#' );
$phone_digits  = preg_replace( '/\D/', '', $phone );
?>
<div id="floating-contact" class="fixed bottom-4 right-4 z-50 flex flex-col gap-2">
	<a href="tel:<?php echo esc_attr( $phone_digits ); ?>"
		class="flex h-12 w-12 items-center justify-center rounded-full bg-brand text-white shadow-lg hover:bg-brand-dark"
		title="<?php esc_attr_e( 'Gọi điện', 'goldenbee' ); ?>">
		<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
	</a>
	<a href="<?php echo esc_url( $zalo ); ?>" target="_blank" rel="noopener"
		class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white shadow-lg hover:bg-blue-600"
		title="Zalo">
		<span class="text-xs font-bold">Zalo</span>
	</a>
	<?php if ( '#' !== $messenger ) : ?>
	<a href="<?php echo esc_url( $messenger ); ?>" target="_blank" rel="noopener"
		class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white shadow-lg hover:bg-blue-700"
		title="Messenger">
		<span class="text-xs font-bold">FB</span>
	</a>
	<?php endif; ?>
</div>
