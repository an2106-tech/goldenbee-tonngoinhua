<?php
/**
 * Main template fallback.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site">
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
			<p><?php esc_html_e( 'Không có bài viết.', 'goldenbee' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
