<?php
/**
 * Product archive.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WooCommerce' ) ) {
	exit;
}

$catalog            = goldenbee_get_product_catalog();
$display_categories = array();
$product_terms      = get_terms( array(
	'taxonomy'   => 'product_cat',
	'hide_empty' => false,
	'orderby'    => 'menu_order',
	'order'      => 'ASC',
) );

if ( ! is_wp_error( $product_terms ) && ! empty( $product_terms ) ) {
	foreach ( $product_terms as $term ) {
		if ( 'uncategorized' === $term->slug ) {
			continue;
		}

		$term_link = get_term_link( $term );
		$display_categories[] = array(
			'slug' => $term->slug,
			'name' => $term->name,
			'link' => is_wp_error( $term_link ) ? wc_get_page_permalink( 'shop' ) : $term_link,
		);
	}
} else {
	foreach ( $catalog['categories'] as $category ) {
		$display_categories[] = array(
			'slug' => $category['slug'],
			'name' => $category['name'],
			'link' => goldenbee_category_link( $category['slug'] ),
		);
	}
}

get_header();
?>

<main class="gb-shop-page">
	<div class="gb-shop-container">
		<nav class="gb-shop-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'goldenbee' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'goldenbee' ); ?></a>
			<span>/</span>
			<strong><?php esc_html_e( 'Tất cả sản phẩm', 'goldenbee' ); ?></strong>
		</nav>

		<div class="gb-shop-layout">
			<aside class="gb-shop-sidebar" aria-label="<?php esc_attr_e( 'Danh mục sản phẩm', 'goldenbee' ); ?>">
				<h2><?php esc_html_e( 'Danh mục sản phẩm', 'goldenbee' ); ?></h2>
				<ul>
					<?php foreach ( $display_categories as $sidebar_category ) : ?>
						<li>
							<a href="<?php echo esc_url( $sidebar_category['link'] ); ?>">
								<span>&gt;</span>
								<?php echo esc_html( $sidebar_category['name'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</aside>

			<div class="gb-shop-sections">
				<?php foreach ( $display_categories as $category ) : ?>
					<?php
					$cat_link = $category['link'];
					$args     = array(
						'limit'   => 4,
						'status'  => 'publish',
						'orderby' => 'menu_order',
						'order'   => 'ASC',
					);

					if ( ! empty( $category['slug'] ) ) {
						$args['category'] = array( $category['slug'] );
					}

					$products = wc_get_products( $args );
					if ( empty( $products ) ) {
						continue;
					}
					?>
					<section class="gb-product-section">
						<div class="gb-product-section__heading">
							<h2><?php echo esc_html( $category['name'] ); ?></h2>
							<a href="<?php echo esc_url( $cat_link ); ?>"><?php esc_html_e( 'Xem tất cả', 'goldenbee' ); ?> &raquo;</a>
						</div>

						<ul class="products-grid-home">
							<?php foreach ( $products as $product ) : ?>
								<?php
								$post_object = get_post( $product->get_id() );
								setup_postdata( $GLOBALS['post'] = $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
								wc_get_template_part( 'content', 'product' );
								wp_reset_postdata();
								?>
							<?php endforeach; ?>
						</ul>
					</section>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
