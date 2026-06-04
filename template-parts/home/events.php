<?php
/**
 * Events gallery (ACF free – 40 image fields).
 *
 * @package GoldenBee
 */

$title  = goldenbee_get_option_field( 'events_title', __( 'Hình ảnh Green BM tại các sự kiện', 'goldenbee' ) );
$images = array();

for ( $i = 1; $i <= 40; $i++ ) {
	$img = goldenbee_get_option_field( 'event_image_' . $i, null );
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		$images[] = $img;
	}
}
?>
<section class="bg-[#f5f5f5] py-8 md:py-12">
	<div class="container-site">
		<div class="section-title-container mb-8">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php echo esc_html( $title ); ?></span>
				<b></b>
			</h2>
		</div>
		<?php if ( ! empty( $images ) ) : ?>
			<div class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-6">
				<?php foreach ( $images as $index => $image ) : ?>
					<div class="<?php echo $index === 0 ? 'md:col-span-2 md:row-span-2' : ( $index % 2 === 1 ? 'md:mt-6' : 'md:-mt-6' ); ?>">
						<div class="aspect-[4/5] overflow-hidden md:aspect-square <?php echo $index === 0 ? 'md:aspect-[4/5]' : ''; ?>">
							<img src="<?php echo esc_url( $image['sizes']['medium_large'] ?? $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" class="h-full w-full object-cover" loading="lazy">
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="mb-4 text-center text-sm text-gray-500">
				<?php esc_html_e( 'Tab Hình sự kiện → upload Ảnh 1 … Ảnh 40.', 'goldenbee' ); ?>
			</p>
			<div class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-6">
				<?php for ( $i = 0; $i < 40; $i++ ) : ?>
					<div class="aspect-[4/5] overflow-hidden bg-gradient-to-br from-brand/30 to-brand-dark/50 md:aspect-square"></div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
