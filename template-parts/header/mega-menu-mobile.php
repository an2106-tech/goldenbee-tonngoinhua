<?php
/**
 * Mobile product menu accordion content.
 *
 * @package GoldenBee
 */

$catalog = goldenbee_get_product_catalog();
foreach ( $catalog['categories'] as $cat ) : ?>
	<div class="mb-3">
		<p class="mb-1 text-xs font-bold uppercase text-brand">
			<a href="<?php echo esc_url( goldenbee_category_link( $cat['slug'] ) ); ?>"><?php echo esc_html( $cat['name'] ); ?></a>
		</p>
		<ul class="space-y-1 text-xs text-gray-600">
			<?php foreach ( $cat['products'] as $product ) : ?>
				<li><a href="<?php echo esc_url( goldenbee_product_link( $product['slug'] ) ); ?>" class="hover:text-brand"><?php echo esc_html( $product['name'] ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
