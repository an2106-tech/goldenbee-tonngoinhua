<?php
/**
 * Partners strip (ACF free – partner_1..6 groups).
 *
 * @package GoldenBee
 */

$title    = goldenbee_get_option_field( 'partners_title', __( 'Đối tác và khách hàng', 'goldenbee' ) );
$partners = array();

for ( $i = 1; $i <= 6; $i++ ) {
	$group = goldenbee_get_option_field( 'partner_' . $i, null );
	if ( is_array( $group ) && ! empty( $group['partner_logo']['url'] ) ) {
		$partners[] = $group;
	}
}
?>
<section class="py-10">
	<div class="container-site text-center">
		<div class="section-title-container mb-8">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php echo esc_html( $title ); ?></span>
				<b></b>
			</h2>
		</div>
		<?php if ( ! empty( $partners ) ) : ?>
			<div class="flex flex-wrap items-center justify-center gap-8">
				<?php foreach ( $partners as $partner ) : ?>
					<?php
					$logo = $partner['partner_logo'];
					$url  = $logo['url'] ?? '';
					$alt  = $partner['partner_name'] ?? ( $logo['alt'] ?? '' );
					$link = $partner['partner_url'] ?? '';
					?>
					<?php if ( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener noreferrer" class="opacity-80 transition hover:opacity-100">
							<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="h-12 max-w-[140px] object-contain" loading="lazy">
						</a>
					<?php else : ?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="h-12 max-w-[140px] object-contain opacity-80" loading="lazy">
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="mb-4 text-sm text-gray-500">
				<?php esc_html_e( 'Tab Đối tác → Đối tác 1…6 → upload Logo.', 'goldenbee' ); ?>
			</p>
			<div class="flex flex-wrap items-center justify-center gap-8 opacity-60">
				<?php for ( $i = 0; $i < 6; $i++ ) : ?>
					<div class="h-12 w-28 rounded bg-gray-200"></div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
