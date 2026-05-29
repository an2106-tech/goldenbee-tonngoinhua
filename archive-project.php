<?php
/**
 * Project archive.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site">
		<h1 class="section-title mb-10"><?php esc_html_e( 'Công trình', 'goldenbee' ); ?></h1>
		<?php if ( have_posts() ) : ?>
			<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="product-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'goldenbee-card', array( 'class' => 'aspect-video w-full object-cover' ) ); ?>
							<?php else : ?>
								<div class="aspect-video bg-gradient-to-br from-brand to-brand-dark"></div>
							<?php endif; ?>
							<div class="p-4">
								<h2 class="font-semibold text-brand"><?php the_title(); ?></h2>
								<p class="mt-1 text-sm text-gray-500"><?php echo esc_html( get_the_date() ); ?></p>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="mt-8"><?php the_posts_pagination(); ?></div>
		<?php else : ?>
			<p class="text-center text-gray-600"><?php esc_html_e( 'Chưa có công trình. Thêm trong admin → Công trình.', 'goldenbee' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
