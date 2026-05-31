<?php
/**
 * Intro section – content-clip style.
 *
 * @package GoldenBee
 */

$title   = goldenbee_get_option_field( 'intro_title', __( 'Giải Pháp Tấm Lợp Tôn Ngói Nhựa Xanh GREEN BM Cho Xây Dựng Bền Vững', 'goldenbee' ) );
$content = goldenbee_get_option_field( 'intro_content', '' );
$btn_txt = goldenbee_get_option_field( 'intro_button_text', __( 'Xem thêm', 'goldenbee' ) );
$btn_url = goldenbee_get_option_field( 'intro_button_url', home_url( '/gioi-thieu/' ) );

if ( ! $content ) {
	$content = '<p>' . esc_html__( 'Dòng sản phẩm Tôn Ngói Nhựa Xanh (GREEN BM) là hệ giải pháp duy nhất đạt được bản quyền độc quyền toàn quốc của Công ty CP Đầu tư Xuất nhập khẩu Vật liệu xanh (Green Materials JSC). Chúng tôi hiểu rằng tương lai xây dựng phải đồng điệu với sự bảo vệ môi trường. Với cam kết vững chắc, chúng tôi chuyên tâm mang đến cho Quý khách hàng trên khắp Việt Nam những sản phẩm vật liệu xây dựng chất lượng.', 'goldenbee' ) . '</p>';
}
?>
<section class="py-5 md:py-[50px]">
	<div class="container-site">
		<div class="content-clip mx-auto max-w-[900px] text-center">
			<?php if ( $title ) : ?>
				<h1><?php echo esc_html( $title ); ?></h1>
			<?php endif; ?>
			<?php echo wp_kses_post( $content ); ?>
			<?php if ( $btn_txt && $btn_url ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn-intro"><span><?php echo esc_html( $btn_txt ); ?></span></a>
			<?php endif; ?>
		</div>
	</div>
</section>
