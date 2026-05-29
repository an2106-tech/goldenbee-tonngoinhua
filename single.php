<?php
/**
 * Single post template.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site max-w-4xl">
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<h1 class="mb-2 text-3xl font-bold text-brand"><?php the_title(); ?></h1>
				<p class="mb-6 text-sm text-gray-500"><?php echo esc_html( get_the_date() ); ?></p>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="mb-6 overflow-hidden rounded-lg"><?php the_post_thumbnail( 'large', array( 'class' => 'w-full' ) ); ?></div>
				<?php endif; ?>
				<div class="prose prose-lg max-w-none"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
