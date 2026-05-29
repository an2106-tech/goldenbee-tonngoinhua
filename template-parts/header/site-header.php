<?php
/**
 * Site header with top bar, main header, navigation, mega menu.
 *
 * @package GoldenBee
 */

$phone    = goldenbee_get_option( 'phone', '0911469969' );
$phone2   = goldenbee_get_option( 'phone_secondary', '0943759119' );
$hours    = goldenbee_get_option( 'hours', '08:00 - 17:00 (T2 - T7)' );
$address  = goldenbee_get_option( 'address', 'P. An Phú Đông, TP.HCM' );
$shop_url = class_exists( 'WooCommerce' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
?>
<header class="sticky top-0 z-50 bg-white shadow-md">
	<!-- Top bar -->
	<div class="hidden border-b border-gray-100 bg-gray-50 text-sm md:block">
		<div class="container-site flex items-center justify-between py-2">
			<div class="flex gap-6 text-gray-600">
				<span><?php esc_html_e( 'Làm việc T2 - T7', 'goldenbee' ); ?> <strong class="text-brand"><?php echo esc_html( $hours ); ?></strong></span>
				<span><?php echo esc_html( $address ); ?></span>
			</div>
			<div class="flex items-center gap-4">
				<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>" class="font-semibold text-brand hover:text-brand-dark">
					<?php echo esc_html( $phone ); ?>
				</a>
				<span class="text-gray-300">|</span>
				<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone2 ) ); ?>" class="text-gray-600 hover:text-brand">
					<?php echo esc_html( $phone2 ); ?>
				</a>
			</div>
		</div>
	</div>

	<!-- Main header -->
	<div class="container-site flex items-center justify-between gap-4 py-3">
		<div class="site-logo shrink-0">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-xl font-bold text-brand md:text-2xl">
					GREEN <span class="text-accent">BM</span>
				</a>
			<?php endif; ?>
		</div>

		<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="hidden flex-1 max-w-md lg:block">
			<div class="relative">
				<input type="search" name="s" placeholder="<?php esc_attr_e( 'Tìm sản phẩm...', 'goldenbee' ); ?>"
					class="w-full rounded-full border border-gray-300 py-2 pl-4 pr-10 text-sm focus:border-brand focus:outline-none"
					<?php echo class_exists( 'WooCommerce' ) ? 'value="' . esc_attr( get_search_query() ) . '"' : ''; ?>>
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<input type="hidden" name="post_type" value="product">
				<?php endif; ?>
				<button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-brand" aria-label="<?php esc_attr_e( 'Tìm kiếm', 'goldenbee' ); ?>">
					<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
				</button>
			</div>
		</form>

		<div class="flex items-center gap-3">
			<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>" class="btn-primary hidden text-sm sm:inline-flex md:hidden">
				<?php esc_html_e( 'Gọi ngay', 'goldenbee' ); ?>
			</a>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="relative flex items-center gap-1 rounded border border-gray-200 px-3 py-2 text-sm hover:border-brand">
					<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
					<span class="hidden sm:inline"><?php esc_html_e( 'Giỏ hàng', 'goldenbee' ); ?></span>
					<?php $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
					<?php if ( $count > 0 ) : ?>
						<span class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-brand text-xs text-white"><?php echo esc_html( $count ); ?></span>
					<?php endif; ?>
				</a>
			<?php endif; ?>
			<button type="button" id="mobile-menu-toggle" class="rounded border border-gray-200 p-2 lg:hidden" aria-label="<?php esc_attr_e( 'Menu', 'goldenbee' ); ?>">
				<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
			</button>
		</div>
	</div>

	<!-- Navigation -->
	<nav class="relative border-t border-gray-100 bg-brand text-white" id="main-nav" aria-label="<?php esc_attr_e( 'Menu chính', 'goldenbee' ); ?>">
		<div class="container-site">
			<ul id="primary-nav" class="hidden items-stretch lg:flex">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block px-4 py-3 text-sm font-medium hover:bg-brand-dark"><?php esc_html_e( 'Trang chủ', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>" class="block px-4 py-3 text-sm font-medium hover:bg-brand-dark"><?php esc_html_e( 'Giới thiệu', 'goldenbee' ); ?></a></li>
				<li id="nav-products">
					<a href="<?php echo esc_url( $shop_url ); ?>" class="flex items-center gap-1 px-4 py-3 text-sm font-medium hover:bg-brand-dark">
						<?php esc_html_e( 'Sản phẩm', 'goldenbee' ); ?>
						<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
					</a>
				</li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="block px-4 py-3 text-sm font-medium hover:bg-brand-dark"><?php esc_html_e( 'Công trình', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>" class="block px-4 py-3 text-sm font-medium hover:bg-brand-dark"><?php esc_html_e( 'Tin tức', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/dai-ly/' ) ); ?>" class="block px-4 py-3 text-sm font-medium hover:bg-brand-dark"><?php esc_html_e( 'Đại lý', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="block px-4 py-3 text-sm font-medium hover:bg-brand-dark"><?php esc_html_e( 'Liên hệ', 'goldenbee' ); ?></a></li>
			</ul>
		</div>
		<?php get_template_part( 'template-parts/header/mega-menu', 'products' ); ?>
	</nav>

	<!-- Mobile menu -->
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
						<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
					</button>
					<div id="mobile-products" class="hidden pl-4">
						<?php get_template_part( 'template-parts/header/mega-menu', 'mobile' ); ?>
					</div>
				</li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Công trình', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Tin tức', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/dai-ly/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Đại lý', 'goldenbee' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="block rounded px-3 py-2 hover:bg-gray-100"><?php esc_html_e( 'Liên hệ', 'goldenbee' ); ?></a></li>
			</ul>
		</div>
	</div>
</header>
