<?php
/**
 * Product archive.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="py-8">
	<div class="container-site">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="section-title mb-6"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>

		<?php if ( woocommerce_product_loop() ) : ?>
			<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			<?php woocommerce_product_loop_start(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php wc_get_template_part( 'content', 'product' ); ?>
			<?php endwhile; ?>
			<?php woocommerce_product_loop_end(); ?>
			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		<?php else : ?>
			<?php do_action( 'woocommerce_no_products_found' ); ?>
		<?php endif; ?>

	</div>
</main>

<?php
get_footer();
