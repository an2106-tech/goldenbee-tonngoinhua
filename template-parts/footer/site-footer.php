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
		<div class="container-site grid gap-8 lg:gap-12 md:grid-cols-2 lg:grid-cols-4">
			
			<!-- Column 1: Logo & Socials -->
			<div class="text-center lg:pt-[200px]">
				<div class="mb-6 logo-container-footer flex justify-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="block mx-auto">
						<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/PNG_LOGO-GREEN-BM-05.png" alt="GREEN BM" class="w-[191.16px] h-[71.5px] lg:w-[300px] lg:h-[120px] max-w-full lg:max-w-none block mx-auto object-contain">
					</a>
				</div>
				<div class="flex items-center gap-3 mt-4 justify-center">
					<a href="https://www.facebook.com/tonngoinhua.vn" target="_blank" rel="noopener noreferrer nofollow" class="w-8 h-8 rounded-full border border-white/60 hover:border-white flex items-center justify-center text-white transition duration-150" aria-label="Facebook">
						<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M9 8H7v3h2v9h3v-9h3l.5-3H12V6c0-.88.39-1 1-1h2V2h-3c-2.5 0-3 1.5-3 3.5V8z"/></svg>
					</a>
					<a href="https://www.tiktok.com/@mangxoinhuapvcgreenbm" target="_blank" rel="noopener noreferrer nofollow" class="w-8 h-8 rounded-full border border-white/60 hover:border-white flex items-center justify-center text-white transition duration-150" aria-label="TikTok">
						<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.06-2.89-.5-4.09-1.33-.7-.5-1.27-1.17-1.67-1.93v7.4c.07 1.94-.52 3.96-1.85 5.37-1.55 1.73-4.09 2.59-6.38 2.22-2.3-.35-4.45-1.92-5.32-4.14-.99-2.45-.63-5.46 1.05-7.53 1.49-1.91 3.99-2.85 6.38-2.43v4.18c-1.3-.44-2.82-.12-3.79.83-.98.92-1.23 2.45-.64 3.69.58 1.25 1.98 2.05 3.37 1.91 1.34-.09 2.51-1.12 2.72-2.45.06-.41.04-.83.04-1.25V.02h-.01z"/></svg>
					</a>
					<a href="https://www.linkedin.com/company/t-n-ng-i-nh-a-xanh-greenbm/mycompany/" target="_blank" rel="noopener noreferrer nofollow" class="w-8 h-8 rounded-full border border-white/60 hover:border-white flex items-center justify-center text-white transition duration-150" aria-label="LinkedIn">
						<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.8v8.37h2.8v-4.87c0-.26.05-.52.13-.7a1.11 1.11 0 0 1 .98-.71c.6 0 .91.56.91 1.39v4.9h2.76M6.5 8.37a1.37 1.37 0 1 0 0-2.75 1.37 1.37 0 0 0 0 2.75M8 18.5V10.1H5.2v8.4H8z"/></svg>
					</a>
				</div>
			</div>

			<!-- Column 2: Company Info -->
			<div>
				<div class="section-title-container section-title-footer mb-[15px]">
					<h3 class="section-title"><span class="section-title-main uppercase font-bold text-[18px]"><?php esc_html_e( 'Thông tin công ty', 'goldenbee' ); ?></span></h3>
				</div>
				<h4 class="text-[15px] font-bold mb-4 uppercase leading-snug text-white"><?php esc_html_e( 'CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH', 'goldenbee' ); ?></h4>
				
				<div class="flex items-start gap-2.5 mb-3.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold leading-relaxed">
						<a href="https://www.google.com/maps/place/Nh%C3%A0+M%C3%A1y+S%E1%BA%A3n+Xu%E1%BA%A5t+T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+ASA%2FPVC/@10.8656994,106.5030144,17z/data=!3m1!4b1!4m6!3m5!1s0x310ad5af405957cf:0xfc4a1dbbc4b70af3!8m2!3d10.8656994!4d106.5055893!16s%2Fg%2F11l2z9h__t?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><strong><?php esc_html_e( 'Địa chỉ nhà máy: ', 'goldenbee' ); ?></strong><?php echo esc_html( $factory ); ?></a>
					</span>
				</div>
				
				<div class="flex items-start gap-2.5 mb-3.5 text-[14px]">
						<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold leading-relaxed">
						<a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM/@10.8606487,106.6932472,17z/data=!3m1!4b1!4m6!3m5!1s0x3174d7485e17fced:0xece062a60b13766e!8m2!3d10.8606487!4d106.6958221!16s%2Fg%2F11g1pnypl7?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><strong><?php esc_html_e( 'Văn phòng: ', 'goldenbee' ); ?></strong><?php echo esc_html( $office ); ?></a>
					</span>
				</div>
				
				<div class="flex items-start gap-2.5 mb-3.5 text-[14px]">
						<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/phone-call.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-semibold leading-relaxed"><?php echo esc_html( preg_replace( '/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', $phone ) ); ?> - <?php echo esc_html( preg_replace( '/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', $phone2 ) ); ?></span>
				</div>
				
				<div class="flex items-start gap-2.5 mb-3.5 text-[14px]">
						<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/envelope.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-semibold leading-relaxed"><a href="mailto:<?php echo esc_attr( $email ); ?>" class="hover:underline text-white"><?php echo esc_html( $email ); ?></a></span>
				</div>
			</div>

			<!-- Column 3: Branch Info -->
			<div>
				<div class="section-title-container section-title-footer mb-[15px]">
					<h3 class="section-title"><span class="section-title-main uppercase font-bold text-[18px]"><?php esc_html_e( 'Thông tin chi nhánh', 'goldenbee' ); ?></span></h3>
				</div>
				
				<h4 class="text-[15px] font-bold mb-3 uppercase text-white"><?php esc_html_e( 'CÁC CHI NHÁNH MIỀN BẮC', 'goldenbee' ); ?></h4>
				
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%94N+NG%C3%93I+NH%E1%BB%B0A+XANH+GREEN+BM-+CHI+NH%C3%81NH+H%C3%80+N%E1%BB%98I/@21.0855048,105.6156427,17z/data=!3m1!4b1!4m6!3m5!1s0x313457feb3e1d09b:0x2e08da04d9f27076!8m2!3d21.0855048!4d105.6156427!16s%2Fg%2F11ydn31jns?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwOC4wIKXMDSoASAFQAw%3D%3D" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Hà Nội', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM+(Chi+Nh%C3%A1nh+H%E1%BA%A3i+D%C6%B0%C6%A1ng)/@21.1211789,106.4606662,18z/data=!4m14!1m7!3m6!1s0x31357f0059177153:0x219a5f583ca0e249!2zVMO0biBOZ8OzaSBOaOG7sWEgWGFuaCBHcmVlbiBCTSAoQ2hpIE5ow6FuaCBI4bqjaSBExrDGoW5nKQ!8m2!3d21.1211503!4d106.4609474!16s%2Fg%2F11w9r4m03b!3m5!1s0x31357f0059177153:0x219a5f583ca0e249!8m2!3d21.1211503!4d106.4609474!16s%2Fg%2F11w9r4m03b?hl=vi&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Hải Dương', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/C%E1%BB%ADa+H%C3%A0ng+Ph%C3%A2n+Ph%E1%BB%91i+T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+GREEN+BM-+DUY+TH%C3%81I+V%C3%82N+%C4%90%E1%BB%92N/@21.0442109,107.3862435,19z/data=!4m9!1m2!2m1!1zMTU1MSDEkMO0bmcgVGnhur9uLCDEkMO0bmcgWMOhLCBWw6JuIMSQ4buTbiwgUXXhuqNuZyBOaW5o!3m5!1s0x314b050075146c3b:0xbb90ec967889033d!8m2!3d21.0442109!4d107.3874344!16s%2Fg%2F11y74f1s39?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwOS4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Quảng Ninh', 'goldenbee' ); ?></a></span>
				</div>

				<h4 class="text-[15px] font-bold mb-3 mt-5 uppercase text-white"><?php esc_html_e( 'CÁC CHI NHÁNH MIỀN TRUNG', 'goldenbee' ); ?></h4>
				
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM+-+Chi+Nh%C3%A1nh+Qu%E1%BA%A3ng+Tr%E1%BB%8B/@16.7916999,107.1375667,19z/data=!4m6!3m5!1s0x3140e5fdd98c1185:0x4c1617125184928e!8m2!3d16.7914915!4d107.1376725!16s%2Fg%2F11xlhmlcxq?hl=vi&amp;authuser=0&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Quảng Trị', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM+-+Chi+Nh%C3%A1nh+Ba+%C4%90%E1%BB%93n/@17.7443061,106.44005,17z/data=!3m1!4b1!4m6!3m5!1s0x313899db097e4629:0xf694e21490ba0d84!8m2!3d17.7443061!4d106.44005!16s%2Fg%2F11yf_cmhm9?hl=vi&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Ba Đồn', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+ng%C3%B3i+nh%E1%BB%B1a+xanh+Green+BM/@15.9081897,108.2378957,21z/data=!4m12!1m5!3m4!2zMTXCsDU0JzI5LjUiTiAxMDjCsDE0JzE3LjEiRQ!8m2!3d15.9081944!4d108.2380833!3m5!1s0x31420f495ac4b5e5:0x574ff13789d74fcb!8m2!3d15.9081449!4d108.2379552!16s%2Fg%2F11zk218lmz?entry=ttu&amp;g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Quảng Nam', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/15%C2%B016%2704.3%22N+108%C2%B046%2733.4%22E/@15.2678494,108.7758869,21z/data=!4m4!3m3!8m2!3d15.2678719!4d108.7759323?entry=ttu&amp;g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Quảng Ngãi', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM+-+Chi+Nh%C3%A1nh+Ngh%E1%BB%87+An/@18.9452737,105.6035706,17z/data=!3m1!4b1!4m6!3m5!1s0x31377dc5d36ce997:0x2a5c4e7efa7d596c!8m2!3d18.9452737!4d105.6035706!16s%2Fg%2F11xn5nny7m?hl=vi&amp;entry=ttu&amp;g_ep=EgoyMDI1MDcwOC4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Nghệ An', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM+-+CN+H%C3%A0+T%C4%A9nh/@18.3101754,105.8849903,20.31z/data=!4m6!3m5!1s0x313851002353f655:0x2d072556c1e048c5!8m2!3d18.3099853!4d105.8851231!16s%2Fg%2F11n9vz2gxh!18m1!1e1?entry=ttu&amp;g_ep=EgoyMDI2MDMyMy4xIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Hà Tĩnh', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/GREEN+BM+CN+B%E1%BA%AEC+HU%E1%BA%BE+T%C3%94N+NG%C3%93I+NH%E1%BB%B0A+XANH/@16.6826637,107.4125296,17z/data=!4m6!3m5!1s0x31410586c2f07321:0xe48cfc38a1107f9!8m2!3d16.681266!4d107.4141389!16s%2Fg%2F11z0h5btk4?hl=vi&amp;entry=ttu&amp;g_ep=EgoyMDI2MDMyMy4xIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Huế', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/GREEN+BM+CN+%C4%90%C3%80+N%E1%BA%B4NG+T%C3%94N+NG%C3%93I+NH%E1%BB%B0A+XANH/@16.0459246,108.1851299,17z/data=!4m6!3m5!1s0x3142198977a0f145:0x8f48a7cb9a732840!8m2!3d16.0457327!4d108.1844451!16s%2Fg%2F11y_dtp_42?hl=vi&amp;entry=ttu&amp;g_ep=EgoyMDI2MDYwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Đà Nẵng', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+nh%E1%BB%B1a+Green+BM+chi+Nh%C3%A1nh+B%C3%ACnh+%C4%90%E1%BB%8Bnh/@13.8542699,109.1092506,20z/data=!4m6!3m5!1s0x316f150069e56fe5:0xd5108954cdfd57a1!8m2!3d13.8541063!4d109.1094276!16s%2Fg%2F11z59596d3?hl=vi-VN&amp;entry=ttu&amp;g_ep=EgoyMDI2MDQyMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Bình Định', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/T%C3%B4n+Ng%C3%B3i+Nh%E1%BB%B1a+Xanh+Green+BM+-+CN+Kh%C3%A1nh+H%C3%B2a/@12.2143619,109.0767945,20z/data=!4m14!1m7!3m6!1s0x31705b61e4155fd3:0x7bcf32ce9525335c!2zVMO0biBOZ8OzaSBOaOG7sWEgWGFuaCBHcmVlbiBCTSAtIENOIEtow6FuaCBIw7Jh!8m2!3d12.2142582!4d109.0766864!16s%2Fg%2F11ms0802rc!3m5!1s0x31705b61e4155fd3:0x7bcf32ce9525335c!8m2!3d12.2142582!4d109.0766864!16s%2Fg%2F11ms0802rc?entry=ttu&amp;g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Khánh Hòa', 'goldenbee' ); ?></a></span>
				</div>
				<div class="flex items-center gap-2.5 mb-2.5 text-[14px]">
					<img src="https://tonngoinhua.vn/wp-content/uploads/2021/07/adress.png" alt="" class="w-[18px] h-[18px] shrink-0 mt-0.5 object-contain">
					<span class="text-white font-bold"><a href="https://www.google.com/maps/place/GREEN+BM+CN+NINH+THU%E1%BA%ACN+T%C3%94N+NG%C3%93I+NH%E1%BB%B0A+XANH/@11.6206544,108.9952397,17z/data=!3m1!4b1!4m6!3m5!1s0x3170db98d7136d73:0x7bff2447c883fadb!8m2!3d11.6206544!4d108.9952397!16s%2Fg%2F11nb74mxl9?hl=vi&amp;entry=ttu&amp;g_ep=EgoyMDI2MDQxMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="hover:underline text-white"><?php esc_html_e( 'Chi Nhánh Ninh Thuận', 'goldenbee' ); ?></a></span>
				</div>
			</div>

			<!-- Column 4: Facebook Fanpage & Newsletter -->
			<div>
				<div class="section-title-container section-title-footer mb-[15px]">
					<h3 class="section-title"><span class="section-title-main uppercase font-bold text-[18px]"><?php esc_html_e( 'FANPAGE FACEBOOK', 'goldenbee' ); ?></span></h3>
				</div>
				<div class="w-full overflow-hidden rounded mb-6">
					<iframe
						src="https://www.facebook.com/plugins/page.php?href=<?php echo esc_attr( rawurlencode( $fb_url ) ); ?>&amp;tabs=timeline&amp;width=340&amp;height=180&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true"
						width="340" height="180" style="border:none;overflow:hidden;width:100%" scrolling="no" frameborder="0" allowfullscreen="true"
						title="Facebook"></iframe>
				</div>

				<div class="section-title-container section-title-footer mb-[15px] mt-6">
					<h3 class="section-title"><span class="section-title-main uppercase font-bold text-[18px]"><?php esc_html_e( 'NHẬN KHUYẾN MÃI', 'goldenbee' ); ?></span></h3>
				</div>
				
				<?php if ( shortcode_exists( 'contact-form-7' ) ) : ?>
					<?php echo do_shortcode( '[contact-form-7 id="64" title="Form liên hệ"]' ); ?>
				<?php else : ?>
					<form class="footer-newsletter flex flex-col gap-2" action="#" method="post" onsubmit="return false;">
						<div class="formFooter tv">
							<span class="wpcf7-form-control-wrap" data-name="text-828">
								<input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Email" value="" type="text" name="text-828">
							</span>
							<button type="submit" class="btn btn-Footer"></button>
						</div>
					</form>
				<?php endif; ?>
				
				<div class="ux-menu stack stack-col justify-start ux-menu--divider-solid mt-6 flex flex-col gap-2">
					<div class="ux-menu-link flex menu-item pb-1">
						<a class="ux-menu-link__link flex text-white hover:underline text-[14px]" href="https://tonngoinhua.vn/chinh-sach-ban-hang/">
							<span class="ux-menu-link__text">Chính sách bán hàng</span>
						</a>
					</div>
					<div class="ux-menu-link flex menu-item pb-1">
						<a class="ux-menu-link__link flex text-white hover:underline text-[14px]" href="https://tonngoinhua.vn/chinh-sach-bao-mat-thong-tin/">
							<span class="ux-menu-link__text">Chính sách bảo mật thông tin</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</section>

	<div class="absolute-footer">
		<div class="container-site text-center">
			<div class="text-[13px] py-1 text-white">© <?php esc_html_e( 'Bản quyền thuộc về CÔNG TY CP ĐẦU TƯ XUẤT NHẬP KHẨU VẬT LIỆU XANH | Cung cấp bởi Viocompany', 'goldenbee' ); ?></div>
		</div>
	</div>
</footer>

<a href="#top" id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e( 'Lên đầu trang', 'goldenbee' ); ?>">↑</a>
