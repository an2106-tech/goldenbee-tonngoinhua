<?php
/**
 * Intro section – content-clip style.
 *
 * @package GoldenBee
 */

$default_title = __( 'Giải Pháp Tấm Lợp Tôn Ngói Nhựa Xanh GREEN BM Cho Xây Dựng Bền Vững', 'goldenbee' );
$title         = goldenbee_get_option_field( 'intro_title', $default_title );
$content       = goldenbee_get_option_field( 'intro_content', '' );
$btn_txt       = goldenbee_get_option_field( 'intro_button_text', __( 'Xem thêm', 'goldenbee' ) );
$btn_url       = goldenbee_get_option_field( 'intro_button_url', home_url( '/gioi-thieu/' ) );

// Fallback content when ACF field empty or too short — match sample text
$default_intro = '<p>Dòng sản phẩm Tôn Ngói Nhựa Xanh (GREEN BM) là hệ giải pháp duy nhất đạt được bản quyền độc quyền toàn quốc của Công ty CP Đầu tư Xuất nhập khẩu Vật liệu xanh (Green Materials JSC). Chúng tôi hiểu rằng tương lai xây dựng phải đồng điệu với sự bảo vệ môi trường. Với cam kết vững chắc, chúng tôi chuyên tâm mang đến cho Quý khách hàng trên khắp Việt Nam những sản phẩm vật liệu xây dựng chất lượng. Bao gồm tôn nhựa Green BM, ngói nhựa Green BM hàng đầu. Sử dụng công nghệ sản xuất tiên tiến, nhựa PVC và lớp ASA. Góp phần vào việc bảo vệ môi trường bền vững. Chúng tôi rất hân hạnh được đồng hành cùng Quý khách hàng trong hành trình xây dựng. Có trách nhiệm và thân thiện với môi trường!</p>';

if ( ! $title || strlen( trim( $title ) ) < 30 || false === stripos( $title, 'Cho Xây Dựng Bền Vững' ) ) {
	$title = $default_title;
}

if ( ! $content || strlen( wp_strip_all_tags( $content ) ) < 80 ) {
	$content = $default_intro;
}
?>
<section class="py-5 md:py-10 bg-white">
	<div class="container-site">
		<div class="mx-auto max-w-[1120px] px-4">
			<?php if ( $title ) : ?>
				<h1 class="text-center text-brand text-[18px] md:text-[22px] lg:text-[24px] xl:text-[26px] font-bold uppercase tracking-tight leading-[1.03] mb-4"><?php echo esc_html( $title ); ?></h1>
			<?php endif; ?>

			<div class="text-left text-[16px] md:text-[17px] lg:text-[18px] leading-[30px] mb-4 text-gray-800">
				<?php echo wp_kses_post( $content ); ?>
			</div>

			<?php if ( $btn_txt && $btn_url ) : ?>
				<div>
					<a href="<?php echo esc_url( $btn_url ); ?>" class="btn-intro inline-flex"><span><?php echo esc_html( $btn_txt ); ?></span></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
