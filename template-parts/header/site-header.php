<?php
/**
 * Site header – Flatsome-style layout matching tonngoinhua.vn.
 *
 * @package GoldenBee
 */

$phone    = goldenbee_get_option( 'phone', '0911469969' );
$phone2   = goldenbee_get_option( 'phone_secondary', '0943759119' );
$hours    = goldenbee_get_option( 'hours', '08:00 - 17:00' );
$address  = goldenbee_get_option( 'address', 'P. An Phú Đông, TP.HCM' );
$map_url  = goldenbee_get_option( 'map_url', 'https://www.google.com/maps/place/C%C3%B4ng+ty+CP+%C4%90%E1%BA%A7u+t%C6%B0+XNK+V%E1%BA%ADt+Li%E1%BB%87u+Xanh/@10.860653,106.695919,16z' );
$shop_url = class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
$cart_count = class_exists( 'WooCommerce' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$icon_base = 'https://tonngoinhua.vn/wp-content/uploads/2021/08';
?>
<header class="site-header" id="site-header">
	<div class="header-main">
		<div class="container-site flex h-full items-center justify-between gap-4">
			<div class="site-logo shrink-0">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="https://tonngoinhua.vn/wp-content/uploads/2025/09/PNG_LOGO-GREEN-BM-05.png" alt="<?php bloginfo( 'name' ); ?>" width="200" height="90" class="custom-logo">
					</a>
				<?php endif; ?>
			</div>

			<div class="header-contact-row hidden flex-1 items-center justify-center gap-6 lg:flex">
				<div class="header-icon-box max-w-[160px]">
					<img src="<?php echo esc_url( $icon_base . '/ico-phone-contact.png' ); ?>" alt="" width="29" height="29">
					<div>
						<p><?php esc_html_e( 'Làm việc từ T2 - T7', 'goldenbee' ); ?></p>
						<p><strong class="highlight-orange"><?php echo esc_html( $hours ); ?></strong></p>
					</div>
				</div>
				<div class="header-icon-box max-w-[180px]">
					<img src="<?php echo esc_url( $icon_base . '/ico-calendar-contact.png' ); ?>" alt="" width="27" height="28">
					<div>
						<p><?php esc_html_e( 'Bạn cần tư vấn ngay?', 'goldenbee' ); ?></p>
						<p><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>" class="highlight-phone"><?php echo esc_html( $phone ); ?></a></p>
					</div>
				</div>
				<div class="header-icon-box max-w-[280px]">
					<img src="<?php echo esc_url( $icon_base . '/ico-marker-contact.png' ); ?>" alt="" width="20" height="29">
					<div>
						<p><?php echo esc_html( $address ); ?></p>
						<p><a href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener" class="highlight-map"><?php esc_html_e( 'Xem bản đồ', 'goldenbee' ); ?></a></p>
					</div>
				</div>
			</div>

			<div class="flex shrink-0 items-center gap-3">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart-link hidden sm:flex">
						<span><?php esc_html_e( 'Cart', 'goldenbee' ); ?></span>
						<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
						<?php if ( $cart_count > 0 ) : ?>
							<span class="flex h-5 min-w-[20px] items-center justify-center rounded-full bg-brand px-1 text-xs text-white"><?php echo esc_html( $cart_count ); ?></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
				<button type="button" id="mobile-menu-toggle" class="rounded border border-gray-200 p-2 lg:hidden" aria-label="<?php esc_attr_e( 'Menu', 'goldenbee' ); ?>">
					<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
				</button>
			</div>
		</div>
	</div>

	<nav class="header-bottom relative hidden lg:block" id="main-nav" aria-label="<?php esc_attr_e( 'Menu chính', 'goldenbee' ); ?>">
		<div class="container-site flex items-stretch justify-between">
			<ul id="primary-nav" class="header-bottom-nav">
				<li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php echo is_front_page() ? 'nav-active' : ''; ?>"><?php esc_html_e( 'Trang chủ', 'goldenbee' ); ?></a>
				</li>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>"><?php esc_html_e( 'Giới thiệu', 'goldenbee' ); ?></a></li>
				<li id="nav-products">
					<a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Sản phẩm', 'goldenbee' ); ?> ▾</a>
				</li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>"><?php esc_html_e( 'Công trình', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>"><?php esc_html_e( 'Tin tức', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/dai-ly/' ) ); ?>"><?php esc_html_e( 'Đại lý', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ', 'goldenbee' ); ?></a></li>
			</ul>
			<ul class="header-bottom-nav">
				<li>
					<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone2 ) ); ?>" class="header-hotline-btn !bg-secondary !py-[8px] !text-[14px]">
						<?php echo esc_html( $phone2 ); ?>
					</a>
				</li>
			</ul>
		</div>
		<?php get_template_part( 'template-parts/header/mega-menu', 'products' ); ?>
	</nav>

	<div id="mobile-menu" class="hidden border-t border-gray-200 bg-white lg:hidden">
		<div class="container-site py-4">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mb-4">
				<input type="search" name="s" placeholder="<?php esc_attr_e( 'Tìm kiếm...', 'goldenbee' ); ?>" class="w-full rounded border px-3 py-2 text-sm">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?><input type="hidden" name="post_type" value="product"><?php endif; ?>
			</form>
			<ul class="space-y-1 text-sm">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Trang chủ', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Giới thiệu', 'goldenbee' ); ?></a></li>
				<li>
					<button type="button" class="mobile-accordion-toggle flex w-full items-center justify-between rounded px-3 py-2 hover:bg-gray-100" data-target="mobile-products">
						<?php esc_html_e( 'Sản phẩm', 'goldenbee' ); ?>
						<span>▾</span>
					</button>
					<div id="mobile-products" class="hidden pl-4">
						<?php get_template_part( 'template-parts/header/mega-menu', 'mobile' ); ?>
					</div>
				</li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Công trình', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Tin tức', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/dai-ly/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Đại lý', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Liên hệ', 'goldenbee' ); ?></a></li>
				<li><a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone2 ) ); ?>" class="block rounded bg-secondary px-3 py-2 text-center font-bold text-white"><?php echo esc_html( $phone2 ); ?></a></li>
			</ul>
		</div>
	</div>
</header>
