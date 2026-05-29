<?php
/**
 * Template Name: Giới thiệu
 *
 * @package GoldenBee
 */

get_header();
?>
<main class="py-10">
	<div class="container-site max-w-4xl">
		<h1 class="section-title mb-8"><?php the_title(); ?></h1>
		<div class="prose prose-lg max-w-none">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
			<?php if ( ! have_posts() || ! get_the_content() ) : ?>
				<p><?php esc_html_e( 'Công ty CP Đầu tư Xuất nhập khẩu Vật liệu xanh (Green Materials JSC) chuyên sản xuất và cung cấp tôn ngói nhựa Green BM – giải pháp vật liệu xanh bền vững cho ngành xây dựng Việt Nam.', 'goldenbee' ); ?></p>
				<p><?php esc_html_e( 'Sản phẩm sử dụng nhựa PVC và lớp phủ ASA, chống ăn mòn, nhẹ, dễ thi công và thân thiện môi trường.', 'goldenbee' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php
get_footer();
