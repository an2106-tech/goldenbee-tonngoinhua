<?php
/**
 * Single product.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main class="py-8">
		<div class="container-site">
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		</div>
	</main>
	<?php
endwhile;

get_footer();
