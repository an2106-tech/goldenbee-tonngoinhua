<?php
/**
 * Template Name: Liên hệ
 *
 * @package GoldenBee
 */

get_header();

// Banner Image
$banner_image = function_exists('get_field') ? get_field( 'lien_he_banner_image' ) : '';
if ( ! $banner_image ) {
    $banner_image = 'https://tonngoinhua.vn/wp-content/uploads/2026/03/banner-lien-he-website-1.jpg';
}
?>

<main class="w-full">
	<!-- Banner Image -->
	<div class="w-full relative">
		<img src="<?php echo esc_url($banner_image); ?>" alt="Liên hệ" class="w-full h-auto object-cover max-h-[800px]" />
	</div>

	<div class="max-w-site mx-auto px-4 w-full pt-8 pb-16">
		
		<!-- Breadcrumbs -->
		<div class="flex justify-center text-center mb-6">
			<nav class="text-[#777] uppercase text-[12px] font-bold tracking-wider font-montserrat">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-brand transition-colors text-[#777]">HOME</a>
				<span class="mx-2 text-[11px] opacity-50">/</span>
				<span class="text-[#777]">LIÊN HỆ</span>
			</nav>
		</div>

		<!-- Title Section -->
		<div class="text-center mb-10 text-[#000]">
			<h4 class="text-[20px] font-bold mb-1 uppercase font-roboto text-[#000]">LIÊN HỆ</h4>
			<h4 class="text-[20px] font-bold uppercase font-roboto"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-[#00a859] hover:text-[#00a859]">TÔN NHỰA</a> <span class="text-[#00a859]">NGÓI NHỰA XANH GREEN BM</span></h4>
		</div>

		<!-- Map and Form Section -->
		<div class="flex flex-wrap md:flex-nowrap -mx-4 mb-16 gap-y-8">
			<!-- Google Map -->
			<div class="w-full md:w-1/2 px-4">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1385.3245082771246!2d106.50539549794227!3d10.865577935378694!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310ad5af405957cf%3A0xfc4a1dbbc4b70af3!2zTmjDoCBNw6F5IFPhuqNuIFh14bqldCBUw7RuIE5nw7NpIE5o4buxYSBBU0EvUFZD!5e0!3m2!1svi!2sus!4v1713800420573!5m2!1svi!2sus" width="100%" height="580" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>

			<!-- Contact Form -->
			<div class="w-full md:w-1/2 px-4">
				<div class="bg-white">
					<p class="mb-4 text-[#0a0a0a] text-[16px] leading-[1.6]">Mọi thắc mắc và yêu cầu cần hỗ trợ từ GREEN BM, vui lòng để lại thông tin tại đây. Chúng tôi sẽ xem xét và gửi phản hồi sớm nhất.</p>
					
					<?php if ( shortcode_exists( 'contact-form-7' ) ) : ?>
						<?php echo do_shortcode('[contact-form-7 id="131" title="Form liên hệ"]'); ?>
					<?php else : ?>
						<form class="space-y-4" method="post" action="#">
							<input type="text" name="name" placeholder="Họ và tên" class="w-full rounded border border-[#ddd] bg-[#fff] text-[#333] px-[0.75em] py-[0.75em] focus:outline-none focus:border-brand shadow-inner text-[16px]" required>
							<input type="email" name="email" placeholder="Email" class="w-full rounded border border-[#ddd] bg-[#fff] text-[#333] px-[0.75em] py-[0.75em] focus:outline-none focus:border-brand shadow-inner text-[16px]" required>
							<input type="tel" name="phone" placeholder="Số điện thoại" class="w-full rounded border border-[#ddd] bg-[#fff] text-[#333] px-[0.75em] py-[0.75em] focus:outline-none focus:border-brand shadow-inner text-[16px]" required>
							<input type="text" name="subject" placeholder="Tiêu đề" class="w-full rounded border border-[#ddd] bg-[#fff] text-[#333] px-[0.75em] py-[0.75em] focus:outline-none focus:border-brand shadow-inner text-[16px]" required>
							<textarea name="message" rows="5" placeholder="Nội dung liên hệ" class="w-full rounded border border-[#ddd] bg-[#fff] text-[#333] px-[0.75em] py-[0.75em] focus:outline-none focus:border-brand shadow-inner text-[16px]"></textarea>
							<button type="submit" class="bg-[#003481] hover:bg-[#6bca1e] text-white font-bold uppercase tracking-wider px-[1.2em] py-[0.6em] transition-colors rounded text-[16px]">Gửi</button>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Branches Section -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-8 gap-y-12 mb-12">
			
			<!-- Branch 1: Quảng Trị -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2026/03/z6793034126540_8dbe0ef4f7d637f071e5545e13783332.jpg" alt="Chi nhánh Quảng Trị" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#00a859]">
					<a href="#" class="text-[#00a859] hover:text-[#00a859]">Chi nhánh Quảng Trị</a>
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]"><strong><a href="#" class="text-[#0a0a0a] hover:text-[#0a0a0a]">Quốc Lộ 1A, Phù Áng, Triệu Giang, Triệu Phong, tỉnh Quảng Trị</a></strong></p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0918 090 579</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 2: Hải Dương -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2024/04/417772359_1067706694376540_6738646357478079535_n.jpg" alt="Chi nhánh Hải Dương" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#00a859]">
					<a href="#" class="text-[#00a859] hover:text-[#00a859]">Chi nhánh Hải Dương</a>
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]"><strong><a href="#" class="text-[#0a0a0a] hover:text-[#0a0a0a]">Phường Hoàng Gián, Hoàng Tiến, Chí Linh, Hải Dương (Cách Cầu Địa 500m)</a></strong></p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0904 682 274</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 3: Hải Phòng -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2024/05/a77af1f7-1cf2-4c89-8642-b5d797529f45.jpg" alt="Chi nhánh Hải Phòng" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#0a0a0a]">
					Chi nhánh Hải Phòng
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">Đường 17A, Vĩnh Tiến, Vĩnh Bảo, TP Hải Phòng</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0945 843 688</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 4: Thái Thụy -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2024/05/1eb3dcdf-c31b-4705-b3a3-7b5e34cefd77.jpg" alt="Đại lý Thái Thụy" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#0a0a0a]">
					Đại lý Thái Thụy (Thái Bình)
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">Sơn Thọ 3, Thái Dương, Thái Thụy, tỉnh Thái Bình</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0947 843 688 - 0966 353 222 - 0945 813 688</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 5: Quảng Ngãi -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2025/09/z6993584086096_5122f98673ac02811f8b0362514ba235.jpg" alt="Chi nhánh Quảng Ngãi" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#00a859]">
					<a href="#" class="text-[#00a859] hover:text-[#00a859]">Chi nhánh Quảng Ngãi</a>
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]"><strong><a href="#" class="text-[#0a0a0a] hover:text-[#0a0a0a]">Quốc Lộ 1A, thôn Long Hội, xã Bình Long, huyện Bình Sơn, tỉnh Quảng Ngãi</a></strong></p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0914 991 667 - 0907 465 667</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 6: Thái Bình (Vũ Thư) -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2024/05/5d450331-ec11-41d5-a4c7-1211624df3ea.jpg" alt="Chi nhánh Thái Bình" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#0a0a0a]">
					Chi nhánh Thái Bình (Vũ Thư)
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">Bồn Thôn, Trung An, Vũ Thư, Thái Bình</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0967 783 985</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 7: Long An -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2026/03/IMG_0433-scaled.jpg" alt="Nhà máy Long An" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#00a859]">
					<a href="#" class="text-[#00a859] hover:text-[#00a859]">Địa chỉ nhà máy Long An</a>
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]"><strong><a href="#" class="text-[#0a0a0a] hover:text-[#0a0a0a]">Đường số 2 Cụm Công nghiệp Hoàng Gia, Ấp 2, Xã Mỹ Hạnh, Tỉnh Tây Ninh</a></strong></p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0911 469 969</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 8: Văn phòng TP.HCM -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2025/11/z6835338178767_581becf3ea01b1350d1176574c4b6955.jpg" alt="Văn phòng TP.HCM" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#00a859]">
					<a href="#" class="text-[#00a859] hover:text-[#00a859]">Địa chỉ văn phòng TP. HCM</a>
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]"><strong><a href="#" class="text-[#0a0a0a] hover:text-[#0a0a0a]">Lầu 1, 1605/1A Quốc Lộ 1A, P. An Phú Đông, TP. Hồ Chí Minh</a></strong></p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0943 759 119</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

			<!-- Branch 9: Ba Đồn -->
			<div>
				<div class="relative w-full pb-[56.25%] overflow-hidden mb-4">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2026/03/z7671594452140_ae2cc44a6fa359897e5b437df7fccb4e.jpg" alt="Chi nhánh Ba Đồn" class="absolute inset-0 w-full h-full object-cover" />
				</div>
				<h4 class="text-[16px] font-bold mb-2 uppercase font-roboto text-[#00a859]">
					<a href="#" class="text-[#00a859] hover:text-[#00a859]">Chi nhánh ba đồn</a>
				</h4>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]"><strong><a href="#" class="text-[#0a0a0a] hover:text-[#0a0a0a]">Quốc lộ 1A, p. Quảng Thuận, TX Ba Đồn, Quảng Bình</a></strong></p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">0918 090 579</p>
				<p class="mb-2 text-[#0a0a0a] text-[16px] leading-[1.6]">tonngoinhuaxanh@gmail.com</p>
			</div>

		</div>
	</div>
</main>

<?php get_footer(); ?>
