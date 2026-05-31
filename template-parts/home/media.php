<?php
/**
 * Media / press section (ACF free – quote_1..4 groups).
 *
 * @package GoldenBee
 */

$title  = goldenbee_get_option_field( 'media_title', __( 'Truyền thông nói về chúng tôi', 'goldenbee' ) );
$quotes = array();

for ( $i = 1; $i <= 4; $i++ ) {
	$group = goldenbee_get_option_field( 'quote_' . $i, null );
	if ( is_array( $group ) && ! empty( $group['quote_text'] ) ) {
		$quotes[] = $group;
	}
}

if ( empty( $quotes ) ) {
	$quotes = goldenbee_default_media_quotes();
}
?>
<section class="py-8 md:py-12">
	<div class="container-site">
		<div class="section-title-container mb-8">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php echo esc_html( $title ); ?></span>
				<b></b>
			</h2>
		</div>
		<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
			<?php foreach ( $quotes as $q ) : ?>
				<blockquote class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
					<p class="text-sm italic text-gray-600">"<?php echo esc_html( $q['quote_text'] ); ?>"</p>
					<?php if ( ! empty( $q['quote_source'] ) ) : ?>
						<cite class="mt-3 block text-sm font-bold text-brand not-italic"><?php echo esc_html( $q['quote_source'] ); ?></cite>
					<?php endif; ?>
				</blockquote>
			<?php endforeach; ?>
		</div>
	</div>
</section>
