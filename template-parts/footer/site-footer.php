<?php
/**
 * Site footer – matching tonngoinhua.vn layout.
 *
 * @package GoldenBee
 */

$phone   = goldenbee_get_option( 'phone', '0911469969' );
$phone2  = goldenbee_get_option( 'phone_secondary', '0943759119' );
$email   = goldenbee_get_option( 'email', 'tonngoinhuaxanh@gmail.com' );
$factory = goldenbee_get_option( 'factory_address', 'Đường số 2 Cụm Công nghiệp Hoàng Gia, Ấp 2, Xã Mỹ Hạnh, Tỉnh Tây Ninh' );
$office  = goldenbee_get_option( 'office_address', 'Lầu 1, 1605/1A Quốc Lộ 1A, P. An Phú Đông, TP. Hồ Chí Minh' );
$fb_url  = goldenbee_get_option( 'facebook_url', 'https://www.facebook.com/tonngoinhua.vn/' );
?>
<footer>
	<section class="site-footer-main">
		<div class="container-site grid gap-8 md:grid-cols-2 lg:grid-cols-4">
			<div>
				<div class="section-title-container section-title-footer mb-[10px]">
					<h3 class="section-title"><b></b><span class="section-title-main"><?php esc_html_e( 'Thông tin công ty', 'goldenbee' ); ?></span><b></b></h3>
				</div>
				<h4><?php esc_html_e( 'CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH', 'goldenbee' ); ?></h4>
				<p class="footer-address"><a href="#" target="_blank" rel="noopener"><?php echo esc_html( sprintf( __( 'Địa chỉ nhà máy: %s', 'goldenbee' ), $factory ) ); ?></a></p>
				<p class="footer-address"><a href="#" target="_blank" rel="noopener"><?php echo esc_html( sprintf( __( 'Văn phòng: %s', 'goldenbee' ), $office ) ); ?></a></p>
				<p class="footer-phone"><?php echo esc_html( preg_replace( '/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', $phone ) ); ?> - <?php echo esc_html( preg_replace( '/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', $phone2 ) ); ?></p>
				<p class="footer-email"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
			</div>

			<div class="md:col-span-1 lg:col-span-1">
				<div class="section-title-container section-title-footer mb-[10px]">
					<h3 class="section-title"><b></b><span class="section-title-main"><?php esc_html_e( 'thông tin chi nhánh', 'goldenbee' ); ?></span><b></b></h3>
				</div>
				<h4><?php esc_html_e( 'CÁC CHI NHÁNH MIỀN BẮC', 'goldenbee' ); ?></h4>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Hà Nội', 'goldenbee' ); ?></p>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Hải Dương', 'goldenbee' ); ?></p>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Quảng Ninh', 'goldenbee' ); ?></p>
				<h4 class="mt-4"><?php esc_html_e( 'CÁC CHI NHÁNH MIỀN TRUNG', 'goldenbee' ); ?></h4>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Quảng Trị', 'goldenbee' ); ?></p>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Nghệ An', 'goldenbee' ); ?></p>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Đà Nẵng', 'goldenbee' ); ?></p>
				<p class="footer-address"><?php esc_html_e( 'Chi Nhánh Bình Định', 'goldenbee' ); ?></p>
			</div>

			<div>
				<div class="section-title-container section-title-footer mb-[10px]">
					<h3 class="section-title"><b></b><span class="section-title-main"><?php esc_html_e( 'FANPAGE FACEBOOK', 'goldenbee' ); ?></span><b></b></h3>
				</div>
				<iframe
					src="https://www.facebook.com/plugins/page.php?href=<?php echo esc_attr( rawurlencode( $fb_url ) ); ?>&amp;tabs=timeline&amp;width=340&amp;height=180&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true"
					width="340" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"
					title="Facebook"></iframe>

				<div class="section-title-container section-title-footer mb-[10px] mt-6">
					<h3 class="section-title"><b></b><span class="section-title-main"><?php esc_html_e( 'nhận khuyến mãi', 'goldenbee' ); ?></span><b></b></h3>
				</div>
				<form class="footer-newsletter" action="#" method="post" onsubmit="return false;">
					<input type="email" placeholder="Email" aria-label="<?php esc_attr_e( 'Email', 'goldenbee' ); ?>">
					<button type="submit"><?php esc_html_e( 'Đăng ký', 'goldenbee' ); ?></button>
				</form>
				<div class="mt-4 space-y-1 text-sm">
					<a href="<?php echo esc_url( home_url( '/chinh-sach-ban-hang/' ) ); ?>" class="block"><?php esc_html_e( 'Chính sách bán hàng', 'goldenbee' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat-thong-tin/' ) ); ?>" class="block"><?php esc_html_e( 'Chính sách bảo mật thông tin', 'goldenbee' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<div class="absolute-footer">
		<div class="container-site">
			<p class="mb-0">© <?php esc_html_e( 'Bản quyền thuộc về CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH | Cung cấp bởi Viocompany', 'goldenbee' ); ?></p>
		</div>
	</div>
</footer>

<a href="#top" id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e( 'Lên đầu trang', 'goldenbee' ); ?>">↑</a>
