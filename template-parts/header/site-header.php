<?php

/**
 * Site header with top bar, main navigation.
 *
 * @package GoldenBee
 */

$phone    = goldenbee_get_option('phone', '0911469969');
$phone2   = goldenbee_get_option('phone_secondary', '0943759119');
$hours    = goldenbee_get_option('hours', '08:00 - 17:00');
$address  = goldenbee_get_option('address', 'P. An Phú Đông, TP.HCM');
$shop_url = class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/shop/');

$nav_link_class          = 'px-[13px] py-4 inline-block text-[15px] font-bold text-white uppercase no-underline transition-colors whitespace-nowrap';
$nav_dropdown_link_class = 'px-[13px] py-4 flex items-center gap-1 text-[15px] font-bold text-white uppercase no-underline transition-colors whitespace-nowrap';
$nav_home_class          = 'px-5 py-4 text-[15px] font-bold text-white uppercase no-underline inline-block tracking-wide shrink-0 transition-colors';
$nav_active_class        = 'bg-[#5CB815] hover:bg-green-600';
$nav_inactive_class      = 'hover:bg-blue-600';
$nav_dropdown_inactive   = 'group-hover:bg-blue-500';

$is_shop_active = class_exists('WooCommerce') && (
    (function_exists('is_shop') && is_shop())
    || (function_exists('is_product') && is_product())
    || (function_exists('is_product_taxonomy') && is_product_taxonomy())
);
$is_news_active = is_home() || is_category() || is_tag() || is_singular('post') || is_page('tin-tuc');
?>

<header class="w-full block clear-both font-sans box-border select-none">

    <div class="bg-white border-b border-gray-200 w-full py-3.5">
        <div class="max-w-[1200px] mx-auto px-4 flex items-center justify-between box-border">

            <div class="w-1/4 shrink-0 box-border logo-container-fixed">
                <?php if (has_custom_logo()) : ?>
                    <div class="max-w-[240px] block">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        if ($logo) {
                            echo '<a href="' . esc_url(home_url('/')) . '" rel="home" class="block"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="max-w-[240px] w-full h-auto block max-h-[75px] object-fill"></a>';
                        } else {
                            the_custom_logo();
                        }
                        ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="block no-underline">
                        <div class="text-2xl font-black text-green-600 uppercase leading-tight">GREEN BM</div>
                        <div class="text-[11px] font-bold text-green-600 uppercase tracking-wider">TÔN NGÓI NHỰA XANH</div>
                        <div class="h-[2px] w-[90px] bg-blue-700 my-1"></div>
                        <div class="text-[10px] font-bold text-blue-700">WWW.TONNGOINHUA.VN</div>
                    </a>
                <?php endif; ?>
            </div>

            <div class="w-[64%] flex justify-between items-center px-2 box-border">

                <div class="flex items-center gap-3">
                    <svg class="w-9 h-9 shrink-0" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="14" fill="#f17221" />
                        <path d="M17 10a1 1 0 10-2 0v6a1 1 0 00.55.89l4.5 2.5a1 1 0 10.9-1.78L17 15.33V10z" fill="#fff" />
                    </svg>
                    <div class="leading-tight">
                        <div class="text-gray-500 text-[14.5px] whitespace-nowrap">Làm việc từ T2 - T7</div>
                        <div class="text-[#f17221] text-[19px] font-bold whitespace-nowrap mt-0.5"><?php echo esc_html($hours); ?></div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <svg class="w-9 h-9 shrink-0" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 19h38v22a2 2 0 01-2 2H7a2 2 0 01-2-2V19z" fill="#fff" stroke="#f17221" stroke-width="4" stroke-linejoin="round" />
                        <path d="M5 9a2 2 0 012-2h34a2 2 0 012 2v10H5V9z" fill="#f17221" stroke="#f17221" stroke-width="4" stroke-linejoin="round" />
                        <path d="M12 4v6M36 4v6M14 27h4M22 27h4M30 27h4M14 34h4M22 34h4M30 34h4" stroke="#f17221" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="leading-tight">
                        <div class="text-gray-500 text-[14.5px] whitespace-nowrap">Bạn cần tư vấn ngay?</div>
                        <div class="text-[#003680] text-[19px] font-bold whitespace-nowrap mt-0.5"><?php echo esc_html($phone); ?></div>
                    </div>
                </div>

                <div class="flex items-center gap-3 max-w-[260px]">
                    <svg class="w-8 h-8 shrink-0" viewBox="0 0 384 512" fill="#f17221" xmlns="http://www.w3.org/2000/svg">
                        <path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z" />
                    </svg>
                    <div class="leading-tight overflow-hidden">
                        <div class="text-gray-500 text-[14.5px] text-ellipsis overflow-hidden whitespace-nowrap"><?php echo esc_html($address); ?></div>
                        <div class="text-[#f17221] text-[14.5px] font-bold underline cursor-pointer mt-0.5 hover:text-orange-600">Xem bản đồ</div>
                    </div>
                </div>

            </div>

            <div class="w-[11%] flex justify-end box-border">
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="inline-flex items-center gap-2 text-[#003680] hover:text-orange-500 text-[15px] font-bold no-underline group">
                        <span class="tracking-wide">CART</span>
                        <svg class="w-5 h-5 text-[#003680] group-hover:text-orange-500 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <div class="bg-[#003680] w-full relative">
        <div class="max-w-[1200px] mx-auto px-4 flex items-center justify-between box-border">

            <div class="flex items-center flex-1 min-w-0">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr($nav_home_class . ' ' . (is_front_page() ? $nav_active_class : $nav_inactive_class)); ?>">
                    <?php esc_html_e('TRANG CHỦ', 'goldenbee'); ?>
                </a>

                <ul id="primary-nav" class="m-0 p-0 list-none flex items-center flex-1 justify-start">
                    <li><a href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>" class="<?php echo esc_attr($nav_link_class . ' ' . (is_page('gioi-thieu') ? $nav_active_class : $nav_inactive_class)); ?>"><?php esc_html_e('GIỚI THIỆU', 'goldenbee'); ?></a></li>

                    <li class="relative group dropdown-nav-item">
                        <a href="<?php echo esc_url($shop_url); ?>" class="<?php echo esc_attr($nav_dropdown_link_class . ' ' . ($is_shop_active ? $nav_active_class : $nav_dropdown_inactive)); ?>">
                            <?php esc_html_e('SẢN PHẨM', 'goldenbee'); ?>
                            <svg class="w-4 h-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <ul class="sub-menu-dropdown absolute top-full left-0 w-[280px] bg-white m-0 p-0 list-none shadow-xl border border-gray-200 border-t-0 z-[99999]">
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Ngói nhựa ASA PVC</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Tôn Nhựa ASA PVC</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Tôn Nhựa Lấy Sáng</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Máng xối nhựa Green BM</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Máng Xối Nhập Khẩu Green BM</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Máng Xối Nhôm</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Tấm ốp tường nhựa PVC ngoài trời Green BM</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Thanh FRP</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Lam gió nhựa | Cửa chớp | Louver</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="<?php echo esc_attr($nav_link_class . ' ' . ((is_post_type_archive('project') || is_singular('project')) ? $nav_active_class : $nav_inactive_class)); ?>"><?php esc_html_e('CÔNG TRÌNH', 'goldenbee'); ?></a></li>

                    <li class="relative group dropdown-nav-item">

                        <a href="<?php echo esc_url(home_url('/tu-van-huong-dan/')); ?>"
                            class="px-[13px] py-4 flex items-center gap-1 text-[15px] font-bold text-white uppercase no-underline group-hover:bg-blue-500 transition-colors whitespace-nowrap">
                            <?php esc_html_e('TƯ VẤN/ HƯỚNG DẪN', 'goldenbee'); ?>
                            <svg class="w-4 h-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>

                        <ul class="sub-menu-dropdown absolute top-full left-0 w-[250px] bg-white m-0 p-0 list-none shadow-xl border border-gray-200 border-t-0 z-[99999]">

                            <li>
                                <a href="<?php echo esc_url(home_url('/huong-dan-thi-cong/')); ?>"
                                    class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">
                                    <?php esc_html_e('Hướng dẫn thi công', 'goldenbee'); ?>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo esc_url(home_url('/huong-dan-thanh-toan/')); ?>"
                                    class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">
                                    <?php esc_html_e('Hướng dẫn thanh toán', 'goldenbee'); ?>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo esc_url(home_url('/huong-dan-van-chuyen/')); ?>"
                                    class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">
                                    <?php esc_html_e('Hướng dẫn vận chuyển', 'goldenbee'); ?>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo esc_url(home_url('/chinh-sach-doi-tra/')); ?>"
                                    class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">
                                    <?php esc_html_e('Chính sách đổi trả', 'goldenbee'); ?>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="relative group dropdown-nav-item">
                        <a href="<?php echo esc_url(home_url('/tin-tuc/')); ?>" class="<?php echo esc_attr($nav_dropdown_link_class . ' ' . ($is_news_active ? $nav_active_class : $nav_dropdown_inactive)); ?>">
                            <?php esc_html_e('TIN TỨC', 'goldenbee'); ?>
                            <svg class="w-4 h-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <ul class="sub-menu-dropdown absolute top-full left-0 w-[260px] bg-white m-0 p-0 list-none shadow-xl border border-gray-200 border-t-0 z-[99999]">
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Thông tin ngành VLXD</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Thị trường Tôn Ngói</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Hoạt động nội bộ và hoạt động xã hội</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline border-b border-dashed border-gray-200 hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Thông báo tuyển dụng</a></li>
                            <li><a href="#" class="block px-4 py-2.5 text-[14px] font-medium text-blue-900 no-underline hover:bg-green-50 hover:text-orange-500 hover:pl-5 transition-all duration-150">Báo chí nói gì về chúng tôi</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo esc_url(home_url('/dai-ly/')); ?>" class="<?php echo esc_attr($nav_link_class . ' ' . (is_page('dai-ly') ? $nav_active_class : $nav_inactive_class)); ?>"><?php esc_html_e('ĐẠI LÝ', 'goldenbee'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/lien-he/')); ?>" class="<?php echo esc_attr($nav_link_class . ' ' . (is_page('lien-he') ? $nav_active_class : $nav_inactive_class)); ?>"><?php esc_html_e('LIÊN HỆ', 'goldenbee'); ?></a></li>
                </ul>
            </div>

            <div class="flex items-center gap-4 shrink-0 box-border pl-4 relative z-10">
                <div class="flex items-center gap-1.5 shrink-0">
                    <a href="#" class="block leading-none shrink-0"><img src="https://flagcdn.com/w20/vn.png" width="20" alt="VN" class="rounded-sm shadow-sm block max-w-none"></a>
                    <a href="#" class="block leading-none opacity-85 shrink-0"><img src="https://flagcdn.com/w20/us.png" width="20" alt="EN" class="rounded-sm shadow-sm block max-w-none"></a>
                </div>

                <a href="tel:<?php echo esc_attr(preg_replace('/\D/', '', $phone2)); ?>" class="inline-flex items-center gap-2 rounded bg-[#2EA643] px-4 py-2 text-[16px] font-bold text-white no-underline whitespace-nowrap shadow-sm hover:bg-green-700 transition-colors shrink-0">
                    <svg class="w-5 h-5 animate-phone-shake inline-block align-middle shrink-0" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.59l2.2-2.21a.96.96 0 00.25-1A11.56 11.56 0 018.75 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.62c0-.55-.45-1-1-1z" />
                    </svg>
                    <span><?php echo esc_html($phone2); ?></span>
                </a>
            </div>

        </div>
    </div>
</header>

<style>
    /* Ép hiển thị menu con chính xác 100% trên mọi nền tảng */
    .sub-menu-dropdown {
        display: none !important;
        visibility: hidden;
        opacity: 0;
        transition: all 0.2s ease;
    }

    .dropdown-nav-item:hover .sub-menu-dropdown {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    /* Hiệu ứng rung lắc hotline */
    @keyframes phoneShake {
        0% {
            transform: rotate(0deg);
        }

        10% {
            transform: rotate(-10deg);
        }

        20% {
            transform: rotate(12deg);
        }

        30% {
            transform: rotate(-10deg);
        }

        40% {
            transform: rotate(9deg);
        }

        50% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    .animate-phone-shake {
        display: inline-block !important;
        animation: phoneShake 0.8s infinite ease-in-out;
        transform-origin: center;
    }

    /* Khóa tỷ lệ kích thước logo */
    .logo-container-fixed img,
    .logo-container-fixed .custom-logo,
    .logo-container-fixed a img {
        max-width: 240px !important;
        width: 100% !important;
        max-height: 75px !important;
        height: auto !important;
        display: block !important;
    }
</style>