<?php
/**
 * Search results.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site">
		<h1 class="section-title mb-8">
			<?php
			/* translators: %s: search query */
			printf( esc_html__( 'Kết quả: %s', 'goldenbee' ), esc_html( get_search_query() ) );
			?>
		</h1>
		<?php if ( have_posts() ) : ?>
			<?php if ( 'product' === get_query_var( 'post_type' ) || ( isset( $_GET['post_type'] ) && 'product' === $_GET['post_type'] ) ) : ?>
				<ul class="products grid list-none gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
					<?php
					while ( have_posts() ) :
						the_post();
						wc_get_template_part( 'content', 'product' );
					endwhile;
					?>
				</ul>
			<?php else : ?>
				<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'card' );
					endwhile;
					?>
				</div>
			<?php endif; ?>
			<div class="mt-8"><?php the_posts_pagination(); ?></div>
		<?php else : ?>
			<p class="text-center text-gray-600"><?php esc_html_e( 'Không tìm thấy kết quả.', 'goldenbee' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
