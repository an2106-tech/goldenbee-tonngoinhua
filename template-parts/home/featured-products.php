<?php
/**
 * Featured products by category.
 *
 * @package GoldenBee
 */

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

$catalog = goldenbee_get_product_catalog();
?>
<section class="bg-gray-100 py-12 md:py-16">
	<div class="container-site">
		<h2 class="section-title mb-10"><?php esc_html_e( 'Sản phẩm nổi bật', 'goldenbee' ); ?></h2>

		<?php foreach ( $catalog['categories'] as $category ) : ?>
			<?php
			$term = get_term_by( 'slug', $category['slug'], 'product_cat' );
			$args = array(
				'limit'    => 4,
				'status'   => 'publish',
				'orderby'  => 'menu_order',
				'order'    => 'ASC',
			);
			if ( $term ) {
				$args['category'] = array( $category['slug'] );
			}
			$products = wc_get_products( $args );
			if ( empty( $products ) ) {
				continue;
			}
			?>
			<div class="mb-12">
				<div class="mb-6 flex items-center justify-between">
					<h3 class="text-xl font-bold text-brand"><?php echo esc_html( $category['name'] ); ?></h3>
					<a href="<?php echo esc_url( goldenbee_category_link( $category['slug'] ) ); ?>" class="text-sm font-semibold text-brand hover:underline">
						<?php esc_html_e( 'Xem tất cả', 'goldenbee' ); ?> →
					</a>
				</div>
				<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
					<?php foreach ( $products as $product ) : ?>
						<?php
						$post_object = get_post( $product->get_id() );
						setup_postdata( $GLOBALS['post'] = $post_object );
						wc_get_template_part( 'content', 'product' );
						wp_reset_postdata();
						?>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
