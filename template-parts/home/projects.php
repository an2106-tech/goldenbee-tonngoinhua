<?php
/**
 * Projects section on homepage.
 *
 * @package GoldenBee
 */

$projects = new WP_Query( array(
	'post_type'      => 'project',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
) );
?>
<section class="py-12 md:py-16">
	<div class="container-site">
		<h2 class="section-title mb-10"><?php esc_html_e( 'Công trình sử dụng tôn ngói nhựa Green BM', 'goldenbee' ); ?></h2>
		<?php if ( $projects->have_posts() ) : ?>
			<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
				<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
					<article class="product-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'goldenbee-card', array( 'class' => 'aspect-video w-full object-cover' ) ); ?>
							<?php else : ?>
								<div class="aspect-video bg-gradient-to-br from-brand to-brand-dark"></div>
							<?php endif; ?>
							<div class="p-4">
								<h3 class="font-semibold text-brand hover:underline"><?php the_title(); ?></h3>
								<p class="mt-1 text-sm text-gray-500"><?php echo esc_html( get_the_date() ); ?></p>
							</div>
						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php else : ?>
			<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
				<?php for ( $i = 0; $i < 3; $i++ ) : ?>
					<article class="product-card">
						<div class="aspect-video bg-gradient-to-br from-brand/80 to-brand-dark"></div>
						<div class="p-4">
							<h3 class="font-semibold text-gray-400"><?php esc_html_e( 'Công trình mẫu – thêm trong admin', 'goldenbee' ); ?></h3>
						</div>
					</article>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
		<div class="mt-8 text-center">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="btn-outline"><?php esc_html_e( 'Xem tất cả công trình', 'goldenbee' ); ?></a>
		</div>
	</div>
</section>
