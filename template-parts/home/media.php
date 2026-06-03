<?php
/**
 * Media / press section – slider + press list + video (tonngoinhua.vn style).
 *
 * @package GoldenBee
 */

$title       = goldenbee_get_option_field( 'media_title', __( 'Truyền thông nói về chúng tôi', 'goldenbee' ) );
$quotes      = goldenbee_get_media_quotes_for_display();
$press_items = goldenbee_get_media_press_items();
$video_embed = goldenbee_get_media_video_embed();
$video_cap   = goldenbee_get_option_field(
	'media_video_caption',
	__( 'Tôn ngói nhựa xanh Green BM lên sóng HTV9 Chương trình nhịp sống kinh doanh', 'goldenbee' )
);
?>
<section class="sec-feedback" id="sec-feedback">
	<div class="container-site">
		<div class="section-title-container sec-feedback-title">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php echo esc_html( $title ); ?></span>
				<b></b>
			</h2>
		</div>

		<?php if ( ! empty( $quotes ) ) : ?>
			<div class="media-quotes-slider" data-media-slider>
				<button type="button" class="media-slider-btn media-slider-prev" aria-label="<?php esc_attr_e( 'Trước', 'goldenbee' ); ?>">
					<span aria-hidden="true">&#10094;</span>
				</button>
				<div class="media-quotes-viewport">
					<div class="media-quotes-track">
						<?php foreach ( $quotes as $q ) : ?>
							<?php $logo_url = goldenbee_acf_image_url( $q['quote_logo'] ?? null ); ?>
							<article class="media-quote-slide">
								<div class="media-quote-card">
									<?php if ( $logo_url ) : ?>
										<div class="media-quote-logo">
											<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $q['quote_source'] ?? '' ); ?>" width="80" height="80" loading="lazy" />
										</div>
									<?php endif; ?>
									<blockquote class="media-quote-text">
										<p><?php echo esc_html( $q['quote_text'] ); ?></p>
									</blockquote>
									<?php if ( ! empty( $q['quote_source'] ) ) : ?>
										<p class="media-quote-source"><?php echo esc_html( $q['quote_source'] ); ?></p>
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
				<button type="button" class="media-slider-btn media-slider-next" aria-label="<?php esc_attr_e( 'Sau', 'goldenbee' ); ?>">
					<span aria-hidden="true">&#10095;</span>
				</button>
				<div class="media-slider-dots" role="tablist" aria-label="<?php esc_attr_e( 'Trích dẫn báo chí', 'goldenbee' ); ?>"></div>
			</div>
		<?php endif; ?>

		<div class="media-bottom">
			<div class="media-press-col">
				<?php foreach ( $press_items as $press ) : ?>
					<?php
					$thumb   = goldenbee_acf_image_url( $press['press_image'] ?? null );
					$link    = ! empty( $press['press_link'] ) ? $press['press_link'] : '';
					$tag     = $link ? 'a' : 'div';
					$attrs   = $link ? ' href="' . esc_url( $link ) . '" class="media-press-item"' : ' class="media-press-item"';
					?>
					<<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag is a|div. ?><?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
						<?php if ( $thumb ) : ?>
							<div class="media-press-thumb">
								<img src="<?php echo esc_url( $thumb ); ?>" alt="" width="120" height="90" loading="lazy" />
							</div>
						<?php endif; ?>
						<div class="media-press-body">
							<?php if ( ! empty( $press['press_title'] ) ) : ?>
								<h3 class="media-press-title"><?php echo esc_html( $press['press_title'] ); ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $press['press_excerpt'] ) ) : ?>
								<p class="media-press-excerpt"><?php echo esc_html( $press['press_excerpt'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $press['press_source'] ) ) : ?>
								<p class="media-press-source"><em><?php echo esc_html( $press['press_source'] ); ?></em></p>
							<?php endif; ?>
						</div>
					</<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php endforeach; ?>
			</div>
			<?php if ( $video_embed ) : ?>
				<div class="media-video-col">
					<div class="media-video-wrap">
						<?php echo $video_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- oEmbed/iframe. ?>
					</div>
					<?php if ( $video_cap ) : ?>
						<p class="media-video-caption"><?php echo esc_html( $video_cap ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
