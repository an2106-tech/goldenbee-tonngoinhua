<?php
/**
 * 404 template.
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-20 text-center">
	<div class="container-site">
		<h1 class="text-6xl font-bold text-brand">404</h1>
		<p class="mt-4 text-lg text-gray-600"><?php esc_html_e( 'Trang không tồn tại.', 'goldenbee' ); ?></p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary mt-8"><?php esc_html_e( 'Về trang chủ', 'goldenbee' ); ?></a>
	</div>
</main>
<?php
get_footer();
