<?php
/**
 * Template Name: Liên hệ
 *
 * @package GoldenBee
 */

$phone   = goldenbee_get_option( 'phone', '0911469969' );
$phone2  = goldenbee_get_option( 'phone_secondary', '0943759119' );
$email   = goldenbee_get_option( 'email', 'tonngoinhuaxanh@gmail.com' );
$address = goldenbee_get_option( 'address', 'P. An Phú Đông, TP.HCM' );
$map     = goldenbee_get_option( 'map_embed', '' );

get_header();
?>
<main class="py-10">
	<div class="container-site">
		<h1 class="section-title mb-10"><?php the_title(); ?></h1>
		<div class="grid gap-10 lg:grid-cols-2">
			<div>
				<h2 class="mb-4 text-xl font-bold text-brand"><?php esc_html_e( 'Thông tin liên hệ', 'goldenbee' ); ?></h2>
				<ul class="space-y-3 text-gray-700">
					<li><strong><?php esc_html_e( 'Hotline:', 'goldenbee' ); ?></strong> <a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>" class="text-brand"><?php echo esc_html( $phone ); ?></a></li>
					<li><strong><?php esc_html_e( 'Hotline 2:', 'goldenbee' ); ?></strong> <a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone2 ) ); ?>" class="text-brand"><?php echo esc_html( $phone2 ); ?></a></li>
					<li><strong><?php esc_html_e( 'Email:', 'goldenbee' ); ?></strong> <a href="mailto:<?php echo esc_attr( $email ); ?>" class="text-brand"><?php echo esc_html( $email ); ?></a></li>
					<li><strong><?php esc_html_e( 'Địa chỉ:', 'goldenbee' ); ?></strong> <?php echo esc_html( $address ); ?></li>
				</ul>
				<form class="mt-8 space-y-4" method="post" action="#">
					<input type="text" name="name" placeholder="<?php esc_attr_e( 'Họ tên', 'goldenbee' ); ?>" class="w-full rounded border px-4 py-2" required>
					<input type="tel" name="phone" placeholder="<?php esc_attr_e( 'Số điện thoại', 'goldenbee' ); ?>" class="w-full rounded border px-4 py-2" required>
					<textarea name="message" rows="4" placeholder="<?php esc_attr_e( 'Nội dung', 'goldenbee' ); ?>" class="w-full rounded border px-4 py-2"></textarea>
					<button type="submit" class="btn-primary"><?php esc_html_e( 'Gửi liên hệ', 'goldenbee' ); ?></button>
				</form>
			</div>
			<div class="min-h-[300px] overflow-hidden rounded-lg bg-gray-200">
				<?php if ( $map ) : ?>
					<iframe src="<?php echo esc_url( $map ); ?>" class="h-full min-h-[300px] w-full border-0" loading="lazy" title="<?php esc_attr_e( 'Bản đồ', 'goldenbee' ); ?>"></iframe>
				<?php else : ?>
					<div class="flex h-full min-h-[300px] items-center justify-center text-gray-500">
						<?php esc_html_e( 'Thêm URL Google Map trong Customizer → Thông tin liên hệ', 'goldenbee' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
