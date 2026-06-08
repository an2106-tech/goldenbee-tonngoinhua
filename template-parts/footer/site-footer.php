<?php
/**
 * Site footer matching tonngoinhua.vn layout.
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
<footer class="site-footer">
	<section class="site-footer-main">
		<div class="container-site site-footer-main__grid">
			<div class="site-footer-main__brand">
				<div class="site-footer-main__logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-footer-main__logo-link">
						<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/PNG_LOGO-GREEN-BM-05.png" alt="GREEN BM" class="site-footer-main__logo-image">
					</a>
				</div>
				<div class="site-footer-main__socials">
					<a href="https://www.facebook.com/tonngoinhua.vn" target="_blank" rel="noopener noreferrer nofollow" class="site-footer-main__social" aria-label="Facebook">
						<svg class="site-footer-main__social-icon" viewBox="0 0 24 24"><path d="M9 8H7v3h2v9h3v-9h3l.5-3H12V6c0-.88.39-1 1-1h2V2h-3c-2.5 0-3 1.5-3 3.5V8z"/></svg>
					</a>
					<a href="https://www.tiktok.com/@mangxoinhuapvcgreenbm" target="_blank" rel="noopener noreferrer nofollow" class="site-footer-main__social" aria-label="TikTok">
						<svg class="site-footer-main__social-icon" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.06-2.89-.5-4.09-1.33-.7-.5-1.27-1.17-1.67-1.93v7.4c.07 1.94-.52 3.96-1.85 5.37-1.55 1.73-4.09 2.59-6.38 2.22-2.3-.35-4.45-1.92-5.32-4.14-.99-2.45-.63-5.46 1.05-7.53 1.49-1.91 3.99-2.85 6.38-2.43v4.18c-1.3-.44-2.82-.12-3.79.83-.98.92-1.23 2.45-.64 3.69.58 1.25 1.98 2.05 3.37 1.91 1.34-.09 2.51-1.12 2.72-2.45.06-.41.04-.83.04-1.25V.02h-.01z"/></svg>
					</a>
					<a href="https://www.linkedin.com/company/t-n-ng-i-nh-a-xanh-greenbm/mycompany/" target="_blank" rel="noopener noreferrer nofollow" class="site-footer-main__social" aria-label="LinkedIn">
						<svg class="site-footer-main__social-icon" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.8v8.37h2.8v-4.87c0-.26.05-.52.13-.7a1.11 1.11 0 0 1 .98-.71c.6 0 .91.56.91 1.39v4.9h2.76M6.5 8.37a1.37 1.37 0 1 0 0-2.75 1.37 1.37 0 0 0 0 2.75M8 18.5V10.1H5.2v8.4H8z"/></svg>
					</a>
				</div>
			</div>

			<div class="site-footer-main__column">
				<div class="site-footer-main__title-wrap site-footer-main__title-wrap--white">
					<h3 class="site-footer-main__title"><span><?php esc_html_e( 'Thông tin công ty', 'goldenbee' ); ?></span></h3>
				</div>
				<h4 class="site-footer-main__heading"><?php esc_html_e( 'CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH', 'goldenbee' ); ?></h4>
				<p class="site-footer-main__line site-footer-main__line--address">
					<a href="https://www.google.com/maps/place/Nh%C3%A0+M%C3%A1y+S%E1%BA%A3n+Xu%E1%BA%A5t+T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+ASA%2FPVC/@10.8656994,106.5030144,17z/data=!3m1!4b1!4m6!3m5!1s0x310ad5af405957cf:0xfc4a1dbbc4b70af3!8m2!3d10.8656994!4d106.5055893!16s%2Fg%2F11l2z9h__t?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener">
						<strong><?php esc_html_e( 'Địa chỉ nhà máy: ', 'goldenbee' ); ?></strong><?php echo esc_html( $factory ); ?>
					</a>
				</p>
				<p class="site-footer-main__line site-footer-main__line--address">
					<a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM/@10.8606487,106.6932472,17z/data=!3m1!4b1!4m6!3m5!1s0x3174d7485e17fced:0xece062a60b13766e!8m2!3d10.8606487!4d106.6958221!16s%2Fg%2F11g1pnypl7?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener">
						<strong><?php esc_html_e( 'Văn phòng: ', 'goldenbee' ); ?></strong><?php echo esc_html( $office ); ?>
					</a>
				</p>
				<p class="site-footer-main__line site-footer-main__line--phone">
					<?php echo esc_html( preg_replace( '/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', $phone ) ); ?> - <?php echo esc_html( preg_replace( '/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', $phone2 ) ); ?>
				</p>
				<p class="site-footer-main__line site-footer-main__line--email">
					<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</p>
			</div>

			<div class="site-footer-main__column">
				<div class="site-footer-main__title-wrap site-footer-main__title-wrap--white">
					<h3 class="site-footer-main__title"><span><?php esc_html_e( 'Thông tin chi nhánh', 'goldenbee' ); ?></span></h3>
				</div>

				<h4 class="site-footer-main__subheading"><?php esc_html_e( 'CÁC CHI NHÁNH MIỀN BẮC', 'goldenbee' ); ?></h4>
				<ul class="site-footer-main__list">
					<li><a href="#">Chi Nhánh Hà Nội</a></li>
					<li><a href="#">Chi Nhánh Hải Dương</a></li>
					<li><a href="#">Chi Nhánh Quảng Ninh</a></li>
				</ul>

				<h4 class="site-footer-main__subheading site-footer-main__subheading--spaced"><?php esc_html_e( 'CÁC CHI NHÁNH MIỀN TRUNG', 'goldenbee' ); ?></h4>
				<ul class="site-footer-main__list">
					<li><a href="#">Chi Nhánh Quảng Trị</a></li>
					<li><a href="#">Chi Nhánh Ba Đồn</a></li>
					<li><a href="#">Chi Nhánh Quảng Nam</a></li>
					<li><a href="#">Chi Nhánh Quảng Ngãi</a></li>
					<li><a href="#">Chi Nhánh Nghệ An</a></li>
					<li><a href="#">Chi Nhánh Hà Tĩnh</a></li>
					<li><a href="#">Chi Nhánh Huế</a></li>
					<li><a href="#">Chi Nhánh Đà Nẵng</a></li>
					<li><a href="#">Chi Nhánh Bình Định</a></li>
					<li><a href="#">Chi Nhánh Khánh Hòa</a></li>
					<li><a href="#">Chi Nhánh Ninh Thuận</a></li>
				</ul>
			</div>

			<div class="site-footer-main__column">
				<div class="site-footer-main__title-wrap site-footer-main__title-wrap--white">
					<h3 class="site-footer-main__title"><span><?php esc_html_e( 'Fanpage Facebook', 'goldenbee' ); ?></span></h3>
				</div>
				<div class="site-footer-main__facebook">
					<iframe
						src="https://www.facebook.com/plugins/page.php?href=<?php echo esc_attr( rawurlencode( $fb_url ) ); ?>&amp;tabs=timeline&amp;width=340&amp;height=180&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true"
						width="340"
						height="180"
						style="border:none;overflow:hidden;width:100%"
						scrolling="no"
						frameborder="0"
						allowfullscreen="true"
						title="Facebook"
					></iframe>
				</div>

				<div class="site-footer-main__title-wrap site-footer-main__title-wrap--white site-footer-main__title-wrap--spaced">
					<h3 class="site-footer-main__title"><span><?php esc_html_e( 'Nhận khuyến mãi', 'goldenbee' ); ?></span></h3>
				</div>

				<form class="site-footer-main__newsletter" action="#" method="post" onsubmit="return false;">
					<input type="email" placeholder="Email" class="site-footer-main__newsletter-input">
					<button type="submit" class="site-footer-main__newsletter-button"><?php esc_html_e( 'Đăng ký', 'goldenbee' ); ?></button>
				</form>

				<div class="site-footer-main__links">
					<a href="https://tonngoinhua.vn/chinh-sach-ban-hang/"><?php esc_html_e( 'Chính sách bán hàng', 'goldenbee' ); ?></a>
					<a href="https://tonngoinhua.vn/chinh-sach-bao-mat-thong-tin/"><?php esc_html_e( 'Chính sách bảo mật thông tin', 'goldenbee' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<div class="absolute-footer">
		<div class="container-site">
			<div class="absolute-footer__text">© <?php esc_html_e( 'Bản quyền thuộc về CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH | Cung cấp bởi Viocompany', 'goldenbee' ); ?></div>
		</div>
	</div>
</footer>

<a href="#top" id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e( 'Lên đầu trang', 'goldenbee' ); ?>">↑</a>
