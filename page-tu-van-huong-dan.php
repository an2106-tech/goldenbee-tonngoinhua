<?php
/**
 * Template Name: Trang Tổng Tư Vấn Hướng Dẫn
 * Description: Hiển thị toàn bộ các trang con (Hướng dẫn thi công, thanh toán...) thuộc mục Tư vấn hướng dẫn.
 *
 * @package GoldenBee
 */

get_header();
?>

<div class="relative w-full h-[200px] sm:h-[300px] md:h-[400px] overflow-hidden bg-gray-100">
    <img src="https://tonngoinhua.vn/wp-content/uploads/2022/06/banner1.jpg" alt="Banner Tư Vấn Hướng Dẫn" class="w-full h-full object-cover object-center" />
</div>

<main class="py-10 bg-white font-sans overflow-hidden">
    <div class="container mx-auto px-4 max-w-7xl">

        <div class="text-center mb-12 select-none">
            <h1 class="text-brand text-3xl md:text-4xl font-extrabold text-[#003481] uppercase tracking-wide relative pb-4 inline-block after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-32 after:h-[3px] after:bg-[#003481]">
                <?php the_title(); ?>
            </h1>
        </div>

        <?php
        // KHỞI TẠO QUERY LẤY CÁC TRANG CON (HƯỚNG DẪN THI CÔNG, THANH TOÁN,...)
        $args = array(
            'post_type'      => 'page',             // Chỉ quét trong mục Pages
            'posts_per_page' => -1,                 // Lấy đầy đủ tất cả các trang con không giới hạn
            'post_parent'    => get_the_ID(),       // Lấy các trang nhận trang Tư Vấn Hướng Dẫn hiện tại làm CHA
            'orderby'        => 'menu_order',       // Sắp xếp theo thứ tự cài đặt trong Admin
            'order'          => 'ASC',              // Thứ tự tăng dần
        );

        $tv_query = new WP_Query( $args );

        if ( $tv_query->have_posts() ) : ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php while ( $tv_query->have_posts() ) : $tv_query->the_post(); ?>
                    
                    <div class="h-auto bg-white border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between product-card rounded-md overflow-hidden">
                        
                        <div class="relative w-full aspect-[4/3] overflow-hidden bg-gray-50">
                            <a href="<?php the_permalink(); ?>" class="block w-full h-full group">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300' ) ); ?>
                                <?php else : ?>
                                    <?php 
                                    $acf_image = get_field('event_image_1'); 
                                    if ( !empty($acf_image) ) : ?>
                                        <img src="<?php echo esc_url($acf_image['url']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="<?php the_title_attribute(); ?>">
                                    <?php else : ?>
                                        <div class="w-full h-full bg-gradient-to-br from-[#003481] to-[#0B4A8F] opacity-90 flex items-center justify-center text-white font-medium p-4 text-center"><?php the_title(); ?></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                            
                            <div class="absolute bottom-3 left-3 bg-[#0B4A8F] text-white text-xs px-2.5 py-1 font-medium z-10">
                                <?php echo esc_html( get_the_date('d/m/Y') ); ?>
                            </div>
                        </div>

                        <div class="p-5 flex-1 flex flex-col justify-between items-start">
                            <h2 class="font-bold text-[16px] text-[#0B4A8F] uppercase line-clamp-2 mb-3 leading-snug hover:text-orange-500 transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="text-sm text-gray-500 line-clamp-3 mb-4 leading-relaxed">
                                <?php echo wp_strip_all_tags( get_the_excerpt() ); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="text-[13px] text-gray-900 font-bold px-3 py-1.5 border border-dashed border-gray-800 hover:bg-gray-50 hover:text-orange-500 hover:border-orange-500 transition-colors mt-auto">
                                <?php esc_html_e( 'Xem ngay ›', 'goldenbee' ); ?>
                            </a>
                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <p class="text-gray-500 mb-2"><?php esc_html_e( 'Chưa có bài viết hướng dẫn nào.', 'goldenbee' ); ?></p>
                
        <?php endif; wp_reset_postdata(); ?>

    </div>
</main>

<?php
get_footer();