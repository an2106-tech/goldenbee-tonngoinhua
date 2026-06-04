<?php
/**
 * Latest news on homepage.
 *
 * @package GoldenBee
 */

$news = new WP_Query(
	array(
		'posts_per_page' => 4,
		'post_status'    => 'publish',
	)
);
?>
<section class="bg-white py-12 md:py-16">
	<div class="container-site">
		<div class="section-title-container mb-8 md:mb-10">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php esc_html_e( 'Bài viết nổi bật', 'goldenbee' ); ?></span>
				<b></b>
			</h2>
		</div>

		<?php if ( $news->have_posts() ) : ?>
			<div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
				<?php while ( $news->have_posts() ) : $news->the_post(); ?>
					<article class="group overflow-hidden border border-[#d8e0f2] bg-white transition-transform duration-200 hover:-translate-y-0.5">
						<a href="<?php the_permalink(); ?>" class="block">
							<div class="relative">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'goldenbee-card', array( 'class' => 'h-[220px] w-full object-cover md:h-[200px] xl:h-[192px]' ) ); ?>
								<?php else : ?>
									<div class="h-[220px] w-full bg-[#e9eef7] md:h-[200px] xl:h-[192px]"></div>
								<?php endif; ?>
								<span class="absolute bottom-0 left-0 inline-flex bg-[#003481] px-4 py-1.5 text-[13px] font-bold leading-none text-white">
									<?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?>
								</span>
							</div>
							<div class="p-4 md:p-5">
								<h3 class="min-h-[66px] text-[18px] font-bold leading-[1.35] text-[#163e78] line-clamp-3">
									<?php the_title(); ?>
								</h3>
								<span class="mt-4 inline-flex border-2 border-dotted border-[#003481] px-2 py-1 text-[13px] font-medium text-[#003481] transition-colors duration-200 group-hover:bg-[#003481] group-hover:text-white">
									<?php esc_html_e( 'Xem ngay', 'goldenbee' ); ?> &rsaquo;
								</span>
							</div>
						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php else : ?>
			<p class="text-center text-gray-500"><?php esc_html_e( 'Thêm bài viết trong mục Tin tức.', 'goldenbee' ); ?></p>
		<?php endif; ?>

		<div class="mt-8 text-center">
			<a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>" class="inline-flex items-center justify-center text-[15px] font-medium text-[#0a0a0a] hover:text-[#003481]">
				<?php esc_html_e( 'Xem tất cả tin tức', 'goldenbee' ); ?>
			</a>
		</div>
	</div>
</section>
