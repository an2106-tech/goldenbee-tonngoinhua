<?php
/**
 * Product card in loop.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'product-card list-none', $product ); ?>>
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="block">
		<div class="relative overflow-hidden bg-gray-100">
			<?php echo $product->get_image( 'goldenbee-card', array( 'class' => 'aspect-square w-full object-cover transition hover:scale-105' ) ); ?>
		</div>
		<div class="p-4">
			<h2 class="text-sm font-semibold text-gray-800 line-clamp-2 hover:text-brand"><?php echo esc_html( $product->get_name() ); ?></h2>
			<div class="mt-2 text-brand font-semibold">
				<?php echo wp_kses_post( $product->get_price_html() ); ?>
			</div>
			<span class="mt-3 inline-block text-xs font-bold uppercase text-brand"><?php esc_html_e( 'Xem ngay', 'goldenbee' ); ?></span>
		</div>
	</a>
</li>
