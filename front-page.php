<?php
/**
 * Front page template.
 *
 * @package GoldenBee
 */

get_header();
?>
<main>
	<?php
	get_template_part( 'template-parts/home/hero', 'slider' );
	get_template_part( 'template-parts/home/intro' );
	get_template_part( 'template-parts/home/intro-video' );
	get_template_part( 'template-parts/home/featured', 'products' );
	get_template_part( 'template-parts/home/projects' );
	get_template_part( 'template-parts/home/events' );
	get_template_part( 'template-parts/home/media' );
	get_template_part( 'template-parts/home/video', 'projects' );
	get_template_part( 'template-parts/home/news' );
	get_template_part( 'template-parts/home/partners' );
	?>
</main>
<?php
get_footer();
