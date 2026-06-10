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
                <div style="text-align:center; margin-bottom:24px;">
                    <h1 style="font-size:1.75rem; font-weight:700; color:#003481; line-height:1.3; margin:0 0 12px 0;">
                        <?php the_title(); ?>
                    </h1>
                    <div style="width:80px; height:3px; background-color:#003481; margin:0 auto;"></div>
                </div>
                <p class="mb-6 text-sm text-gray-500"><?php echo esc_html( get_the_date() ); ?></p>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-6 overflow-hidden rounded-lg"><?php the_post_thumbnail( 'large', array( 'class' => 'w-full' ) ); ?></div>
                <?php endif; ?>
                
                <div class="content-bai-viet text-justify">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>
<?php
get_footer();