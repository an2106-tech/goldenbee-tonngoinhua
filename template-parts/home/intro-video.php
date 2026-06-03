<?php
/**
 * Intro video section.
 *
 * @package GoldenBee
 */

$video_title = goldenbee_get_option_field( 'intro_video_title', __( 'Xem video giới thiệu GREEN BM', 'goldenbee' ) );
$video_text  = goldenbee_get_option_field( 'intro_video_text', '<p>Video giới thiệu sản phẩm Tôn Ngói Nhựa Xanh GREEN BM và giải pháp xây dựng bền vững.</p>' );
$video_url   = goldenbee_get_option_field( 'intro_video_url', 'https://www.youtube.com/embed/4v6ZrRwVxBo' );
$video_embed = goldenbee_get_youtube_embed_url( $video_url );

if ( ! $video_embed ) {
	return;
}
$video_slider_shortcode = goldenbee_get_option_field( 'intro_slider_shortcode', '' );
if ( ! $video_slider_shortcode ) {
	$video_slider_shortcode = goldenbee_get_option_field( 'intro_video_slider_shortcode', '[smartslider3 slider="3"]' );
}
?>
<section class="py-2 md:py-4 bg-white">
	<div class="mx-auto w-full max-w-full px-0">
		<div class="overflow-hidden bg-black">
			<div class="aspect-video">
				<iframe class="h-full w-full" src="<?php echo esc_url( $video_embed ); ?>" title="<?php echo esc_attr( $video_title ? $video_title : __( 'Video giới thiệu', 'goldenbee' ) ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>

<?php if ( $video_slider_shortcode ) : ?>
	<section class="pt-16 pb-8 bg-white">
		<div class="mx-auto w-full max-w-full px-0">
			<?php echo do_shortcode( wp_kses_post( $video_slider_shortcode ) ); ?>
		</div>
	</section>
<?php endif; ?>
