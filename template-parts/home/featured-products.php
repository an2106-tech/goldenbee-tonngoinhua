<?php
/**
 * Featured products by category – tonngoinhua.vn layout.
 *
 * @package GoldenBee
 */

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

$catalog = goldenbee_get_product_catalog();
?>
<section class="sec-sp-home py-8 md:py-12">
	<div class="container-site">
		<div class="section-title-container title-page">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php esc_html_e( 'Sản phẩm nổi bật', 'goldenbee' ); ?></span>
				<b></b>
			</h2>
		</div>

		<?php foreach ( $catalog['categories'] as $category ) : ?>
			<?php
			$term = get_term_by( 'slug', $category['slug'], 'product_cat' );
			$args = array(
				'limit'   => 4,
				'status'  => 'publish',
				'orderby' => 'menu_order',
				'order'   => 'ASC',
			);
			if ( $term ) {
				$args['category'] = array( $category['slug'] );
			}
			$products = wc_get_products( $args );
			if ( empty( $products ) ) {
				continue;
			}
			$cat_link = goldenbee_category_link( $category['slug'] );
			?>
			<div class="title-news">
				<h2><span><a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $category['name'] ); ?></a></span></h2>
				<div class="right-lsm">
					<a class="link-see-more" href="<?php echo esc_url( $cat_link ); ?>">
						<?php esc_html_e( 'Xem tất cả', 'goldenbee' ); ?> »
					</a>
				</div>
			</div>

			<ul class="products-grid-home mb-10">
				<?php foreach ( $products as $product ) : ?>
					<?php
					$post_object = get_post( $product->get_id() );
					setup_postdata( $GLOBALS['post'] = $post_object );
					wc_get_template_part( 'content', 'product' );
					wp_reset_postdata();
					?>
				<?php endforeach; ?>
			</ul>
		<?php endforeach; ?>
	</div>
</section>
