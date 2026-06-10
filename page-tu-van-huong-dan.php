<?php
/**
 * Template Name: Trang Tổng Tư Vấn Hướng Dẫn
 * Description: Hiển thị toàn bộ các bài viết thuộc danh mục Tư vấn hoặc Hướng dẫn.
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
        // KHỞI TẠO QUERY LẤY BÀI VIẾT THEO DANH MỤC
        $args = array(
            'post_type'      => 'post',                 // Đổi từ 'page' thành 'post' để lấy bài viết
            'posts_per_page' => 12,                     // Số lượng bài viết trên mỗi trang (thay -1 bằng số cụ thể nếu muốn phân trang, hoặc giữ -1 để lấy hết)
            'category_name'  => 'tu-van',   // ĐIỀU CHỈNH: Nhập SLUG của các danh mục vào đây (phân cách bằng dấu phẩy)
            'orderby'        => 'date',                 // Sắp xếp bài viết theo ngày đăng
            'order'          => 'DESC',                 // Bài viết mới nhất xếp lên đầu
        );

        $tv_query = new WP_Query( $args );

        if ( $tv_query->have_posts() ) : ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php while ( $tv_query->have_posts() ) : $tv_query->the_post(); ?>
                    
                    <div class="h-auto bg-white border border-gray-200 shadow-sm flex flex-col justify-between product-card rounded-md overflow-hidden">
                        
                        <div class="relative w-full aspect-[4/3] overflow-hidden bg-gray-50">
                            <a href="<?php the_permalink(); ?>" class="block w-full h-full">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                                <?php else : ?>
                                    <?php 
                                    $acf_image = get_field('event_image_1'); 
                                    if ( !empty($acf_image) ) : ?>
                                        <img src="<?php echo esc_url($acf_image['url']); ?>" class="w-full h-full object-cover" alt="<?php the_title_attribute(); ?>">
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
                            <h2 class="font-bold text-[16px] text-[#0B4A8F] uppercase line-clamp-2 mb-3 leading-snug">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="text-sm text-gray-500 line-clamp-3 mb-4 leading-relaxed">
                                <?php echo wp_strip_all_tags( get_the_excerpt() ); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="text-[13px] text-gray-900 font-bold px-3 py-1.5 border border-dashed border-gray-800 mt-auto">
                                <?php esc_html_e( 'Xem ngay ›', 'goldenbee' ); ?>
                            </a>
                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <p class="text-gray-500 mb-2"><?php esc_html_e( 'Chưa có bài viết hướng dẫn nào.', 'goldenbee' ); ?></p>
            </div>
        <?php endif; wp_reset_postdata(); ?>

    </div>
</main>

<?php
get_footer();