<?php
/**
 * Hero slider – full-width banner images like tonngoinhua.vn.
 *
 * @package GoldenBee
 */

$slides = goldenbee_get_hero_slides_for_display();

$default_banners = array(
	'https://tonngoinhua.vn/wp-content/uploads/2021/08/banner-1.jpg',
	'https://tonngoinhua.vn/wp-content/uploads/2021/08/banner-2.jpg',
	'https://tonngoinhua.vn/wp-content/uploads/2021/08/banner-3.jpg',
);
?>
<section class="hero-slider" aria-label="<?php esc_attr_e( 'Banner', 'goldenbee' ); ?>">
	<div class="hero-slides">
		<?php foreach ( $slides as $i => $slide ) : ?>
			<?php
			$image   = $slide['slide_image'] ?? null;
			$img_url = is_array( $image ) && ! empty( $image['url'] ) ? $image['url'] : ( $default_banners[ $i % count( $default_banners ) ] ?? $default_banners[0] );
			$link    = $slide['slide_button_url'] ?? '';
			?>
			<div class="hero-slide hero-slide-image <?php echo 0 === $i ? 'active' : ''; ?>">
				<?php if ( $link ) : ?>
					<a href="<?php echo esc_url( $link ); ?>">
						<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $slide['slide_title'] ?? '' ); ?>" width="1920" height="830" loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>">
					</a>
				<?php else : ?>
					<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $slide['slide_title'] ?? '' ); ?>" width="1920" height="830" loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>">
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if ( count( $slides ) > 1 ) : ?>
		<div class="hero-dots">
			<?php foreach ( $slides as $i => $slide ) : ?>
				<button type="button" class="hero-dot <?php echo 0 === $i ? 'active' : ''; ?>" data-slide="<?php echo esc_attr( $i ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Slide %d', 'goldenbee' ), $i + 1 ) ); ?>"></button>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
