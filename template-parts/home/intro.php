<?php
/**
 * Intro section (ACF or defaults).
 *
 * @package GoldenBee
 */

$title   = goldenbee_get_option_field( 'intro_title', __( 'Giải Pháp Tấm Lợp Tôn Ngói Nhựa Xanh GREEN BM', 'goldenbee' ) );
$content = goldenbee_get_option_field( 'intro_content', '' );
$btn_txt = goldenbee_get_option_field( 'intro_button_text', __( 'Xem thêm', 'goldenbee' ) );
$btn_url = goldenbee_get_option_field( 'intro_button_url', home_url( '/gioi-thieu/' ) );

if ( ! $content ) {
	$content = '<p>' . esc_html__( 'Dòng sản phẩm Tôn Ngói Nhựa Xanh (GREEN BM) là hệ giải pháp vật liệu xây dựng bền vững, sử dụng nhựa PVC và lớp phủ ASA. Chúng tôi chuyên cung cấp tôn nhựa, ngói nhựa và phụ kiện đồng bộ trên khắp Việt Nam.', 'goldenbee' ) . '</p>';
}
?>
<section class="py-12 md:py-16">
	<div class="container-site text-center">
		<?php if ( $title ) : ?>
			<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<div class="intro-content mx-auto mt-6 max-w-3xl text-gray-600 leading-relaxed">
			<?php echo wp_kses_post( $content ); ?>
		</div>
		<?php if ( $btn_txt && $btn_url ) : ?>
			<a href="<?php echo esc_url( $btn_url ); ?>" class="btn-outline mt-8"><?php echo esc_html( $btn_txt ); ?></a>
		<?php endif; ?>
	</div>
</section>
