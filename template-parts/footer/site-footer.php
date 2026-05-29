<?php
/**
 * Site footer.
 *
 * @package GoldenBee
 */

$phone   = goldenbee_get_option( 'phone', '0911469969' );
$phone2  = goldenbee_get_option( 'phone_secondary', '0943759119' );
$email   = goldenbee_get_option( 'email', 'tonngoinhuaxanh@gmail.com' );
$address = goldenbee_get_option( 'address', 'P. An Phú Đông, TP.HCM' );
?>
<footer class="bg-gray-900 text-gray-300">
	<div class="container-site grid gap-8 py-12 md:grid-cols-3">
		<div>
			<h3 class="mb-4 text-lg font-bold text-white"><?php esc_html_e( 'Thông tin công ty', 'goldenbee' ); ?></h3>
			<p class="mb-2 text-sm font-semibold text-brand-light"><?php esc_html_e( 'CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH', 'goldenbee' ); ?></p>
			<p class="mb-2 text-sm"><?php esc_html_e( 'Văn phòng:', 'goldenbee' ); ?> <?php echo esc_html( $address ); ?></p>
			<p class="mb-2 text-sm">
				<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>" class="hover:text-white"><?php echo esc_html( $phone ); ?></a>
				–
				<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone2 ) ); ?>" class="hover:text-white"><?php echo esc_html( $phone2 ); ?></a>
			</p>
			<p class="text-sm"><a href="mailto:<?php echo esc_attr( $email ); ?>" class="hover:text-white"><?php echo esc_html( $email ); ?></a></p>
		</div>
		<div>
			<h3 class="mb-4 text-lg font-bold text-white"><?php esc_html_e( 'Chi nhánh', 'goldenbee' ); ?></h3>
			<ul class="space-y-1 text-sm">
				<li><?php esc_html_e( 'Chi nhánh Hà Nội', 'goldenbee' ); ?></li>
				<li><?php esc_html_e( 'Chi nhánh Đà Nẵng', 'goldenbee' ); ?></li>
				<li><?php esc_html_e( 'Chi nhánh Nghệ An', 'goldenbee' ); ?></li>
				<li><?php esc_html_e( 'Chi nhánh Bình Định', 'goldenbee' ); ?></li>
				<li class="text-gray-500"><?php esc_html_e( '… và nhiều chi nhánh trên toàn quốc', 'goldenbee' ); ?></li>
			</ul>
		</div>
		<div>
			<h3 class="mb-4 text-lg font-bold text-white"><?php esc_html_e( 'Nhận khuyến mãi', 'goldenbee' ); ?></h3>
			<form class="flex gap-2" action="#" method="post" onsubmit="return false;">
				<input type="email" placeholder="<?php esc_attr_e( 'Email của bạn', 'goldenbee' ); ?>" class="flex-1 rounded border-0 bg-gray-800 px-3 py-2 text-sm text-white placeholder-gray-500 focus:ring-2 focus:ring-brand">
				<button type="submit" class="btn-primary shrink-0 text-sm"><?php esc_html_e( 'Đăng ký', 'goldenbee' ); ?></button>
			</form>
			<div class="mt-6 flex gap-4 text-sm">
				<a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>" class="hover:text-white"><?php esc_html_e( 'Giới thiệu', 'goldenbee' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="hover:text-white"><?php esc_html_e( 'Liên hệ', 'goldenbee' ); ?></a>
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="hover:text-white"><?php esc_html_e( 'Sản phẩm', 'goldenbee' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="border-t border-gray-800 py-4 text-center text-xs text-gray-500">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH | Green BM', 'goldenbee' ); ?></p>
	</div>
</footer>
