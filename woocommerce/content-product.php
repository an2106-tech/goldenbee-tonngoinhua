<?php
/**
 * Product card – Flatsome proHome style.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$permalink = $product->get_permalink();
$price_html = $product->get_price_html();
if ( ! $product->get_price() && ! $product->is_type( 'variable' ) ) {
	$price_html = '<span class="price"><span class="woocommerce-Price-amount amount">' . esc_html__( 'Giá: Liên hệ', 'goldenbee' ) . '</span></span>';
}
?>
<li <?php wc_product_class( 'pro-home list-none', $product ); ?>>
	<div class="box-image">
		<div class="image-cover">
			<a href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
				<?php echo $product->get_image( 'woocommerce_thumbnail', array( 'class' => 'attachment-original size-original' ) ); ?>
			</a>
		</div>
	</div>
	<div class="box-text text-left">
		<div class="title-wrapper">
			<p class="name product-title woocommerce-loop-product__title">
				<a href="<?php echo esc_url( $permalink ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo esc_html( $product->get_name() ); ?></a>
			</p>
		</div>
		<div class="price-wrapper">
			<?php echo wp_kses_post( $price_html ); ?>
		</div>
		<div class="xemngaygia tv"><a href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'Xem ngay', 'goldenbee' ); ?></a></div>
		<div class="xemngaygia ta"><a href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'See now', 'goldenbee' ); ?></a></div>
	</div>
</li>
