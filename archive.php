<?php

/**
 * News archive template.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10 news-archive-page">
	<div class="container-site news-container">
		<div class="news-main-content">
			<header class="news-page-header mb-8">
				<h1 class="section-title"><?php the_archive_title(); ?></h1>
				<?php if (get_the_archive_description()) : ?>
					<div class="archive-description text-gray-600 text-base"><?php echo wp_kses_post(get_the_archive_description()); ?></div>
				<?php endif; ?>
			</header>

			<?php if (have_posts()) : ?>
				<div class="news-grid">
					<?php
					while (have_posts()) :
						the_post();
						get_template_part('template-parts/content', 'card');
					endwhile;
					?>
				</div>

				<div class="pagination-wrap mt-8">
					<?php the_posts_pagination(); ?>
				</div>
			<?php else : ?>
				<div class="no-posts text-center text-gray-600">
					<p><?php esc_html_e('Không có bài viết nào.', 'goldenbee'); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php
get_footer();
