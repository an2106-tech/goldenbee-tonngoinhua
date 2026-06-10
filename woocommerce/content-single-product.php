<?php
/**
 * Single product content layout.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
	return;
}

$product_id      = $product->get_id();
$phone           = function_exists( 'goldenbee_get_option' ) ? goldenbee_get_option( 'phone', '0911469969' ) : '0911469969';
$sales_phone     = function_exists( 'goldenbee_get_option' ) ? goldenbee_get_option( 'phone_secondary', '0943759119' ) : '0943759119';
$phone_link      = preg_replace( '/\D/', '', $phone );
$sales_phone_link = preg_replace( '/\D/', '', $sales_phone );
$categories      = wc_get_product_category_list( $product_id, ', ' );
$subtitle        = goldenbee_get_product_field( 'product_subtitle', $product_id, $product->get_short_description() );
$badge           = goldenbee_get_product_field( 'product_badge', $product_id, '' );
$highlights      = goldenbee_get_product_text_slots( 'product_highlight', 4, $product_id );
$applications    = goldenbee_get_product_text_slots( 'product_application', 4, $product_id );
$faqs            = goldenbee_get_product_group_slots( 'product_faq', 4, $product_id, array( 'question', 'answer' ) );
$specs           = goldenbee_get_product_specs_for_display( $product );
$warranty        = goldenbee_get_product_field( 'product_warranty', $product_id, '' );
$material        = goldenbee_get_product_field( 'product_material', $product_id, '' );
$origin          = goldenbee_get_product_field( 'product_origin', $product_id, '' );
$color_note      = goldenbee_get_product_field( 'product_color_note', $product_id, '' );
$install_note    = goldenbee_get_product_field( 'product_install_note', $product_id, '' );
$install_content = goldenbee_get_product_field( 'product_install_content', $product_id, '' );
$cta_note        = goldenbee_get_product_field( 'product_cta_note', $product_id, '' );
$download_url    = goldenbee_get_product_field( 'product_download_url', $product_id, '' );
$download_label  = goldenbee_get_product_field( 'product_download_label', $product_id, __( 'Tải catalogue', 'goldenbee' ) );
$specs_image      = goldenbee_get_product_field( 'product_specs_image', $product_id, null );
$specs_image_url  = goldenbee_acf_image_url( $specs_image );
$real_content     = goldenbee_get_product_field( 'product_real_content', $product_id, '' );
$real_images      = goldenbee_get_product_image_slots( 'product_real_image', 8, $product_id );
$video_title     = goldenbee_get_product_field( 'product_video_title', $product_id, '' );
$video_url       = goldenbee_get_product_field( 'product_video_url', $product_id, '' );
$video_embed     = $video_url ? wp_oembed_get( $video_url, array( 'width' => 760 ) ) : '';
$description     = apply_filters( 'the_content', $product->get_description() );
$stock_label     = $product->is_in_stock() ? __( 'Còn hàng', 'goldenbee' ) : __( 'Hết hàng', 'goldenbee' );

if ( empty( $highlights ) ) {
	$highlights = goldenbee_default_product_highlights();
}
?>
<article id="product-<?php the_ID(); ?>" <?php wc_product_class( 'gb-product-detail', $product ); ?>>
	<div class="gb-product-breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'goldenbee' ); ?></a>
		<span>/</span>
		<?php if ( $categories ) : ?>
			<span><?php echo wp_kses_post( $categories ); ?></span>
		<?php else : ?>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Sản phẩm', 'goldenbee' ); ?></a>
		<?php endif; ?>
		<span class="mx-2">/</span>
		<span class="sr-only"><?php the_title(); ?></span>
	</div>

	<section class="gb-product-main-grid">
		<div class="gb-product-gallery-col">
			<div class="product-gallery gb-product-gallery-box">
				<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
			</div>
		</div>

		<div class="product-summary gb-product-summary-box">
			<div>
				<h1 class="gb-product-title"><?php the_title(); ?></h1>
				<p class="gb-product-stock"><?php esc_html_e( 'Tình trạng:', 'goldenbee' ); ?> <span><?php echo esc_html( $stock_label ); ?></span></p>
			</div>

			<div class="gb-product-commitments">
				<p><?php esc_html_e( 'Cam kết hàng chính hãng', 'goldenbee' ); ?></p>
				<p><?php esc_html_e( 'Giao hàng Toàn Quốc', 'goldenbee' ); ?></p>
				<a class="gb-product-call-button" href="tel:<?php echo esc_attr( $sales_phone_link ); ?>">
					<span><?php esc_html_e( 'Gọi ngay', 'goldenbee' ); ?></span>
					<strong><?php echo esc_html( $sales_phone ); ?></strong>
				</a>
			</div>

			<?php if ( $download_url ) : ?>
				<a href="<?php echo esc_url( $download_url ); ?>" class="gb-product-catalogue-link" target="_blank" rel="noopener">&gt;&gt; <?php echo esc_html( $download_label ); ?> &lt;&lt;</a>
			<?php endif; ?>

			<div class="gb-product-price-row">
				<?php echo wp_kses_post( $product->get_price_html() ); ?>
			</div>

			<?php if ( $subtitle ) : ?>
				<div class="gb-product-short-desc"><?php echo wp_kses_post( wpautop( $subtitle ) ); ?></div>
			<?php endif; ?>

			<?php if ( $product->get_sku() ) : ?>
				<p class="mb-0 text-xs text-gray-500"><?php esc_html_e( 'Mã sản phẩm:', 'goldenbee' ); ?> <span class="font-semibold text-gray-700"><?php echo esc_html( $product->get_sku() ); ?></span></p>
			<?php endif; ?>

			<div class="gb-product-cart-area">
				<?php woocommerce_template_single_rating(); ?>
				<?php woocommerce_template_single_add_to_cart(); ?>
			</div>
		</div>

		<aside class="gb-product-service-panel" aria-label="<?php esc_attr_e( 'Chính sách mua hàng', 'goldenbee' ); ?>">
			<div class="gb-product-service-item gb-product-service-item--free">
				<div class="gb-product-service-icon" aria-hidden="true"></div>
				<div>
					<h2><?php esc_html_e( 'Giao hàng miễn phí', 'goldenbee' ); ?></h2>
					<p><?php esc_html_e( 'Với số lượng nhiều', 'goldenbee' ); ?></p>
				</div>
			</div>
			<div class="gb-product-service-item gb-product-service-item--nation">
				<div class="gb-product-service-icon" aria-hidden="true"></div>
				<div>
					<h2><?php esc_html_e( 'Giao hàng toàn quốc', 'goldenbee' ); ?></h2>
					<p><?php esc_html_e( 'Nhanh chóng', 'goldenbee' ); ?></p>
				</div>
			</div>
			<div class="gb-product-service-item gb-product-service-item--payment">
				<div class="gb-product-service-icon" aria-hidden="true"></div>
				<div>
					<h2><?php esc_html_e( 'Hình thức thanh toán', 'goldenbee' ); ?></h2>
					<p><?php esc_html_e( 'Thanh toán khi nhận hàng', 'goldenbee' ); ?></p>
					<p><?php esc_html_e( 'Thanh toán trực tiếp tại cửa hàng', 'goldenbee' ); ?></p>
					<p><?php esc_html_e( 'Thanh toán chuyển khoản', 'goldenbee' ); ?></p>
					<p><?php esc_html_e( 'Thanh toán trực tuyến qua Visa, Master Card...', 'goldenbee' ); ?></p>
				</div>
			</div>
			<div class="gb-product-service-item gb-product-service-item--order">
				<div class="gb-product-service-icon" aria-hidden="true"></div>
				<div>
					<h2><?php esc_html_e( 'Đặt mua hàng online', 'goldenbee' ); ?></h2>
					<p><?php esc_html_e( 'Gọi ngay', 'goldenbee' ); ?></p>
					<a href="tel:<?php echo esc_attr( $phone_link ); ?>"><?php echo esc_html( $phone ); ?></a>
				</div>
			</div>
		</aside>
	</section>

	<section class="gb-product-tabs-like">
		<nav class="gb-product-tab-nav" aria-label="<?php esc_attr_e( 'Nội dung sản phẩm', 'goldenbee' ); ?>">
			<a class="is-active" href="#gb-product-description" data-gb-tab="gb-product-description"><?php esc_html_e( 'Description', 'goldenbee' ); ?></a>
			<a href="#gb-product-install" data-gb-tab="gb-product-install"><?php esc_html_e( 'Hướng dẫn thi công', 'goldenbee' ); ?></a>
			<a href="#gb-product-real" data-gb-tab="gb-product-real"><?php esc_html_e( 'Hình ảnh thi công thực tế', 'goldenbee' ); ?></a>
			<a href="#gb-product-reviews" data-gb-tab="gb-product-reviews"><?php esc_html_e( 'Đánh giá sản phẩm', 'goldenbee' ); ?></a>
		</nav>

		<div id="gb-product-description" class="gb-product-tab-panel is-active">
			<?php if ( $specs_image_url ) : ?>
				<figure class="gb-product-specs-image">
					<img src="<?php echo esc_url( $specs_image_url ); ?>" alt="<?php echo esc_attr( is_array( $specs_image ) && ! empty( $specs_image['alt'] ) ? $specs_image['alt'] : get_the_title() ); ?>">
					<figcaption><?php esc_html_e( 'Thông tin sản phẩm', 'goldenbee' ); ?></figcaption>
				</figure>
			<?php endif; ?>

			<div class="gb-product-description-copy">
				<?php echo wp_kses_post( $description ); ?>
			</div>
		</div>

		<div id="gb-product-real" class="gb-product-tab-panel gb-product-info-section">
			<?php if ( $real_content ) : ?>
				<div class="gb-product-description-copy">
					<?php echo wp_kses_post( apply_filters( 'the_content', $real_content ) ); ?>
				</div>
			<?php endif; ?>
			<h2><?php esc_html_e( 'Thông tin sản phẩm', 'goldenbee' ); ?></h2>
			<?php if ( ! empty( $real_images ) ) : ?>
				<div class="gb-product-real-gallery">
					<img class="gb-product-real-gallery__main" src="<?php echo esc_url( $real_images[0]['url'] ); ?>" alt="<?php echo esc_attr( $real_images[0]['alt'] ); ?>">
					<div class="gb-product-real-gallery__thumbs">
						<?php foreach ( $real_images as $image ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $specs ) ) : ?>
				<div id="gb-product-specs" class="gb-product-spec-table">
					<?php foreach ( $specs as $spec ) : ?>
						<div>
							<span><?php echo esc_html( $spec['label'] ); ?></span>
							<strong><?php echo esc_html( $spec['value'] ); ?></strong>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div id="gb-product-install" class="gb-product-tab-panel gb-product-video-block">
			<?php if ( $install_content ) : ?>
				<div class="gb-product-description-copy">
					<?php echo wp_kses_post( apply_filters( 'the_content', $install_content ) ); ?>
				</div>
			<?php elseif ( $install_note ) : ?>
				<div class="gb-product-description-copy">
					<?php echo wp_kses_post( wpautop( $install_note ) ); ?>
				</div>
			<?php endif; ?>
			<?php if ( $video_embed ) : ?>
				<h2><?php echo esc_html( $video_title ? $video_title : __( 'Hướng dẫn thi công', 'goldenbee' ) ); ?></h2>
				<div class="gb-product-video"><?php echo $video_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			<?php endif; ?>
		</div>

		<div id="gb-product-reviews" class="gb-product-tab-panel gb-product-faq-list">
			<?php if ( ! empty( $faqs ) ) : ?>
				<h2><?php esc_html_e( 'Câu hỏi thường gặp', 'goldenbee' ); ?></h2>
				<?php foreach ( $faqs as $faq ) : ?>
					<details class="gb-product-faq">
						<summary><?php echo esc_html( $faq['question'] ); ?></summary>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</details>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>

	<div class="product-tabs gb-product-related-wrap">
		<?php woocommerce_template_single_meta(); ?>
		<?php woocommerce_output_related_products(); ?>
	</div>
</article>
<?php do_action( 'woocommerce_after_single_product' ); ?>
