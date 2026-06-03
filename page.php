<?php
/**
 * Page template.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site max-w-4xl">
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="mb-6 text-3xl font-bold text-brand"><?php the_title(); ?></h1>
			<div class="prose prose-lg max-w-none text-justify"><?php the_content(); ?></div>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
