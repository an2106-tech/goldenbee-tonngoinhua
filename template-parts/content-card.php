<?php
/**
 * Post card.
 *
 * @package GoldenBee
 */
?>
<article class="news-card">
	<div class="card-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'goldenbee-card', array( 'style' => 'width:100%;height:auto;display:block;object-fit:cover;' ) ); ?>
		<?php else : ?>
			<div class="fallback-thumbnail" style="background-color:#f4f4f4;height:220px;"></div>
		<?php endif; ?>
		<div class="card-date"><?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?></div>
	</div>
	<div class="card-body">
		<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="card-excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 24, '...' ) ); ?></p>
		<a class="card-btn-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Xem ngay', 'goldenbee' ); ?></a>
	</div>
</article>
