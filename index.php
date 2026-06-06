<?php
/**
 * Main template fallback.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10<?php echo is_home() ? ' news-archive-page' : ''; ?>">
	<div class="container-site<?php echo is_home() ? ' news-container' : ''; ?>">
		<?php if ( is_home() ) : ?>
			<div class="news-main-content">
		<?php endif; ?>
		<?php if ( have_posts() ) : ?>
			<div class="<?php echo is_home() ? 'news-grid' : 'grid gap-6 md:grid-cols-2 lg:grid-cols-3'; ?>">
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
		<?php if ( is_home() ) : ?>
			</div>
			<aside class="news-sidebar">
				<div class="sidebar-widget widget-search mb-6">
					<h2 class="widget-title"><?php esc_html_e( 'Tìm kiếm', 'goldenbee' ); ?></h2>
					<form role="search" method="get" class="sidebar-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label for="search-form-input" class="screen-reader-text"><?php esc_html_e( 'Tìm kiếm', 'goldenbee' ); ?></label>
						<input id="search-form-input" class="search-input" type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Tìm kiếm...', 'goldenbee' ); ?>" />
						<button type="submit" class="search-submit"><?php esc_html_e( 'Tìm', 'goldenbee' ); ?></button>
					</form>
				</div>

				<div class="sidebar-widget widget-categories mb-6">
					<h2 class="widget-title"><?php esc_html_e( 'Danh mục tin tức', 'goldenbee' ); ?></h2>
					<ul>
						<?php wp_list_categories( array( 'title_li' => '' ) ); ?>
					</ul>
				</div>

				<div class="sidebar-widget widget-popular">
					<h2 class="widget-title"><?php esc_html_e( 'Bài viết nổi bật', 'goldenbee' ); ?></h2>
					<?php
					$popular_args = array(
						'post_type'      => 'post',
						'posts_per_page' => 5,
						'orderby'        => 'date',
						'order'          => 'DESC',
					);
					$popular_query = new WP_Query( $popular_args );
					if ( $popular_query->have_posts() ) : ?>
						<ul>
							<?php while ( $popular_query->have_posts() ) : $popular_query->the_post(); ?>
								<li class="popular-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; ?>
						</ul>
					<?php wp_reset_postdata(); else : ?>
						<p><?php esc_html_e( 'Chưa có bài viết nổi bật.', 'goldenbee' ); ?></p>
					<?php endif; ?>
				</div>
			</aside>
		<?php endif; ?>
	</div>

</main>
<?php
get_footer();
