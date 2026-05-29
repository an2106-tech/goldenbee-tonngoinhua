<?php
/**
 * Post card.
 *
 * @package GoldenBee
 */
?>
<article class="product-card">
	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'goldenbee-card', array( 'class' => 'aspect-video w-full object-cover' ) ); ?>
		<?php else : ?>
			<div class="aspect-video bg-gray-200"></div>
		<?php endif; ?>
		<div class="p-4">
			<h3 class="font-semibold text-brand line-clamp-2"><?php the_title(); ?></h3>
			<p class="mt-1 text-sm text-gray-500"><?php echo esc_html( get_the_date() ); ?></p>
			<span class="mt-2 inline-block text-sm font-semibold text-brand"><?php esc_html_e( 'Xem ngay →', 'goldenbee' ); ?></span>
		</div>
	</a>
</article>
