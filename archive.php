<?php
/**
 * Archive template.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site">
		<h1 class="section-title mb-8"><?php the_archive_title(); ?></h1>
		<?php if ( have_posts() ) : ?>
			<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>
			<div class="mt-8"><?php the_posts_pagination(); ?></div>
		<?php else : ?>
			<p class="text-center text-gray-600"><?php esc_html_e( 'Không có nội dung.', 'goldenbee' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
