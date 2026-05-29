<?php
/**
 * Desktop mega menu for products (full-width under nav).
 *
 * @package GoldenBee
 */

$catalog    = goldenbee_get_product_catalog();
$labels     = goldenbee_color_labels();
$categories = $catalog['categories'];
?>
<div id="mega-menu-products" class="mega-menu-panel pointer-events-none invisible absolute left-0 right-0 top-full z-50 hidden opacity-0 transition-all duration-200 lg:block" aria-hidden="true">
	<div class="border-t border-gray-200 bg-white text-gray-800 shadow-xl">
		<div class="container-site grid grid-cols-1 gap-8 py-6 sm:grid-cols-2 lg:grid-cols-4">
			<?php foreach ( $categories as $cat ) : ?>
				<?php
				$is_accessories = 'phu-kien-ton-ngoi-nhua' === $cat['slug'];
				$col_class      = $is_accessories
					? 'mega-menu-col-accessories min-w-0 sm:col-span-2 lg:col-span-2'
					: 'min-w-0';
				?>
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<h3 class="mb-3 border-b border-brand pb-2 text-sm font-bold uppercase leading-snug text-brand">
						<a href="<?php echo esc_url( goldenbee_category_link( $cat['slug'] ) ); ?>"><?php echo esc_html( $cat['name'] ); ?></a>
					</h3>
					<ul class="space-y-1.5 text-sm leading-relaxed">
						<?php foreach ( $cat['products'] as $product ) : ?>
							<li class="break-words">
								<a href="<?php echo esc_url( goldenbee_product_link( $product['slug'] ) ); ?>" class="hover:text-brand">
									<?php echo esc_html( $product['name'] ); ?>
								</a>
								<?php if ( ! empty( $product['colors'] ) && count( $product['colors'] ) <= 4 ) : ?>
									<span class="block text-xs text-gray-400 sm:inline sm:ml-1">
										(<?php
										$color_names = array_map( function ( $s ) use ( $labels ) {
											return $labels[ $s ] ?? $s;
										}, $product['colors'] );
										echo esc_html( implode( ', ', $color_names ) );
										?>)
									</span>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
