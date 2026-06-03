<?php
/**
 * Clients section (Khách hàng của chúng tôi).
 *
 * @package GoldenBee
 */

$title   = goldenbee_get_option_field( 'partners_title', __( 'Khách hàng của chúng tôi', 'goldenbee' ) );
$clients = array();

for ( $i = 1; $i <= 4; $i++ ) {
	$group = goldenbee_get_option_field( 'client_' . $i, null );
	if ( is_array( $group ) && ! empty( $group['client_image']['url'] ) ) {
		$clients[] = $group;
	}
}

if ( empty( $clients ) ) {
	return;
}
?>
<section class="py-10 bg-white">
	<div class="container-site text-center">
		<div class="partners-section-title">
			<h2 class="section-title-main"><?php echo esc_html( $title ); ?></h2>
		</div>
		
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5 mt-8">
			<?php foreach ( $clients as $client ) : ?>
				<?php
				$image = $client['client_image'];
				$url   = $image['url'] ?? '';
				$alt   = $client['client_name'] ?? ( $image['alt'] ?? '' );
				$link  = $client['client_url'] ?? '';
				?>
				<div class="client-item overflow-hidden shadow-sm hover:shadow-md transition duration-200">
					<?php if ( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>" class="block group">
							<div class="aspect-[4/3] w-full overflow-hidden">
								<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
							</div>
						</a>
					<?php else : ?>
						<div class="aspect-[4/3] w-full overflow-hidden">
							<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="w-full h-full object-cover" loading="lazy">
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
