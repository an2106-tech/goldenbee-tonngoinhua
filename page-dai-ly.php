<?php
/**
 * Template Name: Đại Lý
 *
 * @package GoldenBee
 */

get_header();

// Get ACF banner image if available
$banner_image = function_exists('get_field') ? get_field( 'dai_ly_banner_image' ) : '';
if ( ! $banner_image && has_post_thumbnail() ) {
	$banner_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
}
?>
<main id="main" class="w-full">
	<!-- Hero Banner -->
	<?php if ( $banner_image ) : ?>
	<div class="w-full">
		<img
			class="w-full h-auto object-cover"
			src="<?php echo esc_url( $banner_image ); ?>"
			alt="<?php echo esc_attr__( 'Đại Lý Tôn Ngói Nhựa Xanh Green BM', 'goldenbee' ); ?>"
		/>
	</div>
	<?php endif; ?>

	<!-- Content Section -->
	<section class="w-full pb-16">
		<div class="max-w-[1200px] mx-auto px-4 w-full">
			
			<!-- Breadcrumbs -->
			<div class="py-4 text-sm text-gray-600 mb-2">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-gray-800">Home</a> 
				<span class="mx-1">/</span> 
				<span class="text-gray-800 font-bold">Đại lý</span>
			</div>

			<!-- Main Text -->
			<div class="text-[15px] leading-relaxed text-black space-y-3 mb-10">
				<?php
				$custom_intro = function_exists( 'get_field' ) ? get_field( 'dai_ly_intro_text' ) : '';
				if ( ! empty( $custom_intro ) ) :
					echo wp_kses_post( $custom_intro );
				else :
				?>
				<p>
					Công ty Cổ Phần Đầu Tư Xuất Nhập Khẩu Vật Liệu Xanh cho ra mắt thị trường với sản phẩm Tôn Ngói Nhựa Xanh Green BM, chúng tôi luôn chào đón và mong muốn hợp tác cùng phát triển với các nhà phân phối, Đại lý và Cửa hàng tiêu thụ sản phẩm Tôn Ngói nhựa PVC/ASA trên toàn lãnh thổ Việt Nam, trong đó:
				</p>
				<p>
					<span class="text-[#2ba249] font-bold">1. Nhà phân phối:</span> là các Cá nhân/Tổ chức đáp ứng được các điều kiện và chấp thuận ký hợp đồng nhà phân phối chính thức với công ty, đăng ký phụ trách địa bàn kinh doanh cụ thể và tuân thủ theo mọi điều khoản cam kết với công ty.
				</p>
				<p>
					<span class="text-[#2ba249] font-bold">2. Đại lý tiêu thụ:</span> là các Cá nhân/Tổ chức đáp ứng được các điều kiện và chấp thuận ký hợp đồng đại lý tiêu thụ chính thức với công ty, đăng ký phụ trách địa bàn kinh doanh cụ thể và tuân thủ theo mọi điều khoản cam kết với công ty. Đại lý thông thường có địa bàn kinh doanh nhỏ hơn so với nhà phân phối, có thể hoạt động độc lập hoặc phụ thuộc vào nhà phân phối. Đại lý có thể có nhiều cấp: cấp 1, cấp 2...
				</p>
				<p>
					<span class="text-[#2ba249] font-bold">3. Cửa hàng tiêu thụ:</span> là các Nhà phân phối tiềm năng hoặc Đại lý tiêu thụ tiềm năng hoặc cửa hàng bán lẻ có nhu cầu mua hàng của công ty, nhưng chưa đáp ứng được các điều kiện và/hoặc chưa đăng ký hợp đồng nhà phân phối, đại lý tiêu thụ chính thức. Cửa hàng tiêu thụ là cấp độ thấp nhất trong mạng lưới đối tác tiêu thụ sản phẩm của công ty.
				</p>
				<p>
					<span class="text-[#2ba249] font-bold">4. Khách hàng lẻ:</span> là các chủ đầu tư, hộ dân mua để trực tiếp sử dụng sản phẩm của công ty.
				</p>
				<p>
					<span class="text-[#2ba249] font-bold">5. Dự án:</span> là các công trình xây dựng có như cầu sử dụng sản phẩm Tôn Ngói của công ty với số lượng lớn từ 5.000 mét hoặc tổng giá trị đơn hàng từ 500 triệu đồng trở lên. Chủ dự án có thể liên hệ trực tiếp với văn phòng công ty để mua hàng hoặc thông qua nhà phân phối, đại lý tiêu thụ, cửa hàng tiêu thụ trên địa bàn.
				</p>
				<p>
					<span class="text-[#2ba249] font-bold">6. Quyền lợi:</span> Đối với các đối tác tiềm năng chúng tôi có những chính sách linh hoạt; phù hợp như chính sách giá ưu đãi; chính sách thưởng doanh thu; chính sách phân chia và bảo hộ khu vực, địa bàn; chống bán hàng phá giá và cạnh tranh nội bộ,... Nhà phân phối / Đại lý tiêu thụ có thể chủ động phát triển nhiều đại lý, cửa hàng tiêu thụ trực thuộc địa bàn kinh doanh của mình. Trong trường hợp địa bàn đã có nhà phân phối / Đại lý tiêu thụ thì các đại lý, cửa hàng tiêu thụ mở ra sau trên cùng địa bàn sẽ được ưu tiên giới thiệu cho Nhà phân phối / Đại lý tiêu thụ trước đó. Công ty quản lý quy hoạch mạng lưới, ban hành và giám sát việc thực thi chính sách bán hàng để đảm bảo không xảy ra tình trạng cạnh tranh nội bộ hoặc bán hàng phá giá trên cùng địa bàn kinh doanh.
				</p>
				<?php endif; ?>
			</div>

			<!-- Form Section -->
			<div class="w-full flex justify-center mb-10">
				<div class="w-full max-w-[480px] bg-[#f5f5f5] p-6 rounded-md shadow-sm">
					<div class="mb-5 flex flex-row items-center justify-center space-x-4 border-b border-gray-300 pb-4">
						<img 
							src="https://tonngoinhua.vn/wp-content/uploads/2021/07/PNG_LOGO-GREEN-BM-05.png" 
							alt="Green BM"
							class="w-[140px] h-auto"
						/>
						<div class="text-[17px] font-bold text-[#003481] leading-tight">
							ĐĂNG KÝ ĐẠI LÝ<br>PHÂN PHỐI
						</div>
					</div>

					<div class="text-left w-full">
					<style>
					.btnFormDT {
						width: 100%;
						margin: 0;
						display: block;
						overflow: hidden;
						background: #003481 !important;
						position: relative;
						border: none;
						min-height: 42px;
						cursor: pointer;
						text-transform: uppercase;
						font-weight: bold;
						border-radius: 0;
					}
					.btnFormDT:before {
						width: 150% !important;
						height: 300px !important;
						background: #fff;
						border: none;
						content: "";
						position: absolute;
						top: -450px;
						left: -25%;
						transform: skewY(15deg) translateY(0);
						transition: all 300ms ease;
						z-index: 1;
					}
					.btnFormDT:hover:before {
						transform: skewY(15deg) translateY(250px);
					}
					.btnFormDT:after {
						content: 'GỬI';
						color: #fff;
						position: absolute;
						left: 50%;
						top: 50%;
						transition: all 300ms ease;
						transform: translateY(-50%) translateX(-50%);
						z-index: 2;
						font-size: 14px;
					}
					.btnFormDT:hover:after {
						color: #003481;
					}
					</style>
					<?php
					if ( shortcode_exists( 'contact-form-7' ) ) {
						echo do_shortcode( '[contact-form-7 id="dai-ly-registration-form" title="Đăng ký đại lý"]' );
					} else {
						?>
						<form method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" class="space-y-3">
							<input type="hidden" name="action" value="submit_dai_ly_form">
							<?php wp_nonce_field( 'dai_ly_form_nonce' ); ?>

							<div>
								<input type="text" name="full_name" placeholder="Họ và tên" class="w-full border border-gray-300 px-3 py-2 text-[14px] focus:outline-none focus:border-[#003481] bg-white" required>
							</div>
							<div>
								<input type="email" name="email" placeholder="Email" class="w-full border border-gray-300 px-3 py-2 text-[14px] focus:outline-none focus:border-[#003481] bg-white" required>
							</div>
							<div>
								<input type="tel" name="phone" placeholder="Số điện thoại" class="w-full border border-gray-300 px-3 py-2 text-[14px] focus:outline-none focus:border-[#003481] bg-white" required>
							</div>
							<div>
								<textarea name="message" placeholder="Nội dung liên hệ" rows="3" class="w-full border border-gray-300 px-3 py-2 text-[14px] focus:outline-none focus:border-[#003481] bg-white" required></textarea>
							</div>
							<div class="text-center pt-1">
								<button type="submit" class="btn btnFormDT"></button>
							</div>
						</form>
						<?php
					}
					?>
					</div>
				</div>
			</div>

			<!-- Contact Info -->
			<div class="w-full">
				<p class="text-center mb-6">
					<strong class="text-[#2ba249] text-[16px] uppercase">GREEN MB – ĐỒNG HÀNH CÙNG PHÁT TRIỂN</strong>
				</p>
				
				<div class="text-black space-y-2 text-[14px]">
					<p><strong>Công Ty Cổ Phần Đầu Tư Xuất Nhập Khẩu Vật Liệu Xanh</strong></p>
					<p><strong>Địa chỉ 1:</strong> 1605/1A QL 1A, P. An Phú Đông, TP.HCM</p>
					<p><strong>Địa chỉ 2:</strong> 17 Lê Duẩn, TP. Đông Hà, Quảng Trị</p>
					<p><strong>Hotline 1:</strong> 0943.759.119</p>
					<p><strong>Hotline 2:</strong> 0911.469.969</p>
					<p><strong>Hotline 3:</strong> 0919.301.246</p>
					<p><strong>Website:</strong> https://www.tonngoinhua.vn/</p>
				</div>
			</div>

		</div>
	</section>
</main>

<?php get_footer(); ?>
