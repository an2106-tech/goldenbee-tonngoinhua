<?php
/**
 * Latest news on homepage.
 *
 * @package GoldenBee
 */

$news = new WP_Query( array(
	'posts_per_page' => 6,
	'post_status'    => 'publish',
) );
?>
<section class="bg-gray-100 py-12 md:py-16">
	<div class="container-site">
		<h2 class="section-title mb-10"><?php esc_html_e( 'Bài viết nổi bật', 'goldenbee' ); ?></h2>
		<?php if ( $news->have_posts() ) : ?>
			<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
				<?php while ( $news->have_posts() ) : $news->the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'card' ); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php else : ?>
			<p class="text-center text-gray-500"><?php esc_html_e( 'Thêm bài viết trong mục Tin tức.', 'goldenbee' ); ?></p>
		<?php endif; ?>
		<div class="mt-8 text-center">
			<a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>" class="btn-outline"><?php esc_html_e( 'Xem tất cả tin tức', 'goldenbee' ); ?></a>
		</div>
	</div>
</section>
