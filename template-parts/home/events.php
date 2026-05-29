<?php
/**
 * Events gallery (ACF free – 6 image fields).
 *
 * @package GoldenBee
 */

$title  = goldenbee_get_option_field( 'events_title', __( 'Hình ảnh Green BM tại các sự kiện', 'goldenbee' ) );
$images = array();

for ( $i = 1; $i <= 6; $i++ ) {
	$img = goldenbee_get_option_field( 'event_image_' . $i, null );
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		$images[] = $img;
	}
}
?>
<section class="bg-gray-100 py-12">
	<div class="container-site">
		<h2 class="section-title mb-8"><?php echo esc_html( $title ); ?></h2>
		<?php if ( ! empty( $images ) ) : ?>
			<div class="grid grid-cols-2 gap-3 md:grid-cols-4 lg:grid-cols-6">
				<?php foreach ( $images as $image ) : ?>
					<div class="aspect-square overflow-hidden rounded-lg">
						<img src="<?php echo esc_url( $image['sizes']['medium_large'] ?? $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" class="h-full w-full object-cover" loading="lazy">
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="mb-4 text-center text-sm text-gray-500">
				<?php esc_html_e( 'Tab Hình sự kiện → upload Ảnh 1 … Ảnh 6.', 'goldenbee' ); ?>
			</p>
			<div class="grid grid-cols-2 gap-3 md:grid-cols-4 lg:grid-cols-6">
				<?php for ( $i = 0; $i < 6; $i++ ) : ?>
					<div class="aspect-square overflow-hidden rounded-lg bg-gradient-to-br from-brand/30 to-brand-dark/50"></div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
