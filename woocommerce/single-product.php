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
	do_action( 'woocommerce_before_single_product' );
	?>
	<main class="gb-single-product-page">
		<div class="gb-single-product-container">
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		</div>
	</main>
	<?php
endwhile;

get_footer();
