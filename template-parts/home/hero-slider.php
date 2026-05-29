<?php
/**
 * Hero slider section (ACF or defaults).
 *
 * @package GoldenBee
 */

$slides = goldenbee_get_hero_slides_for_display();

$gradients = array( 'from-brand-dark to-brand', 'from-brand to-brand-light', 'from-gray-800 to-brand-dark' );
?>
<section class="hero-slider relative overflow-hidden" aria-label="<?php esc_attr_e( 'Banner', 'goldenbee' ); ?>">
	<div class="hero-slides">
		<?php foreach ( $slides as $i => $slide ) : ?>
			<?php
			$image    = $slide['slide_image'] ?? null;
			$img_url  = is_array( $image ) && ! empty( $image['url'] ) ? $image['url'] : '';
			$title    = $slide['slide_title'] ?? '';
			$desc     = $slide['slide_description'] ?? '';
			$btn_text = $slide['slide_button_text'] ?? __( 'Xem sản phẩm', 'goldenbee' );
			$btn_url  = $slide['slide_button_url'] ?? ( class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : '#' );
			$gradient = $slide['gradient'] ?? ( $gradients[ $i % count( $gradients ) ] ?? 'from-brand-dark to-brand' );
			$slide_class = 'hero-slide min-h-[320px] md:min-h-[480px]';
			if ( $img_url ) {
				$slide_class .= ' hero-slide--image';
			} else {
				$slide_class .= ' bg-gradient-to-r ' . esc_attr( $gradient );
			}
			?>
			<div class="<?php echo esc_attr( $slide_class ); ?> <?php echo 0 === $i ? 'active' : ''; ?>"
				<?php if ( $img_url ) : ?>
					style="background-image: url('<?php echo esc_url( $img_url ); ?>');"
				<?php endif; ?>>
				<?php if ( $img_url ) : ?>
					<div class="hero-slide-overlay" aria-hidden="true"></div>
				<?php endif; ?>
				<div class="container-site hero-slide-content flex h-full min-h-[inherit] flex-col items-start justify-center py-16 text-white">
					<?php if ( $title ) : ?>
						<h2 class="max-w-2xl text-2xl font-bold leading-tight md:text-4xl"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $desc ) : ?>
						<p class="mt-4 max-w-xl text-lg opacity-90"><?php echo esc_html( $desc ); ?></p>
					<?php endif; ?>
					<?php if ( $btn_text && $btn_url ) : ?>
						<a href="<?php echo esc_url( $btn_url ); ?>" class="btn-primary mt-8 bg-white text-brand hover:bg-gray-100">
							<?php echo esc_html( $btn_text ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if ( count( $slides ) > 1 ) : ?>
		<div class="absolute bottom-4 left-1/2 z-10 flex -translate-x-1/2 gap-2">
			<?php foreach ( $slides as $i => $slide ) : ?>
				<button type="button" class="hero-dot h-2 w-2 rounded-full bg-white/50 <?php echo 0 === $i ? 'active !bg-white' : ''; ?>" data-slide="<?php echo esc_attr( $i ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Slide %d', 'goldenbee' ), $i + 1 ) ); ?>"></button>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
