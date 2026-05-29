<?php
/**
 * Single product content layout.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'grid gap-8 lg:grid-cols-2', $product ); ?>>
	<div class="product-gallery">
		<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
	</div>
	<div class="product-summary">
		<h1 class="text-2xl font-bold text-brand md:text-3xl"><?php the_title(); ?></h1>
		<div class="mt-4 text-xl font-semibold text-brand">
			<?php echo wp_kses_post( $product->get_price_html() ); ?>
		</div>
		<div class="mt-6">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
		<?php if ( $product->get_short_description() ) : ?>
			<div class="mt-6 prose text-gray-600"><?php echo wp_kses_post( $product->get_short_description() ); ?></div>
		<?php endif; ?>
	</div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
