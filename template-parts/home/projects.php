<?php
/**
 * Projects section on homepage.
 *
 * @package GoldenBee
 */

$projects = new WP_Query( array(
	'post_type'      => 'cong-trinh',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
) );
?>
<section class="projects-home-section">
	<div class="container-site">
		<div class="section-title-container projects-home-title">
			<h2 class="section-title section-title-center">
				<b></b>
				<span class="section-title-main"><?php esc_html_e( 'Công trình sử dụng tôn ngói nhựa Green BM sản xuất lợp mái', 'goldenbee' ); ?></span>
				<b></b>
			</h2>
		</div>

		<div class="projects-home-shell">
			<button type="button" class="projects-home-arrow projects-home-prev" aria-label="<?php esc_attr_e( 'Xem công trình trước', 'goldenbee' ); ?>">‹</button>
			<div class="projects-home-viewport" data-projects-viewport>
				<div class="projects-home-track" data-projects-track>
					<?php if ( $projects->have_posts() ) : ?>
						<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
							<article class="projects-home-card">
								<a class="projects-home-link" href="<?php the_permalink(); ?>">
									<div class="projects-home-image">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'goldenbee-card', array( 'class' => 'projects-home-thumb' ) ); ?>
										<?php else : ?>
											<div class="projects-home-thumb projects-home-thumb--placeholder"></div>
										<?php endif; ?>
										<span class="projects-home-date"><?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?></span>
									</div>
									<div class="projects-home-content">
										<h3 class="projects-home-title-text"><?php the_title(); ?></h3>
										<span class="projects-home-button"><?php esc_html_e( 'Xem ngay', 'goldenbee' ); ?> <span aria-hidden="true">›</span></span>
									</div>
								</a>
							</article>
						<?php endwhile; wp_reset_postdata(); ?>
					<?php else : ?>
						<?php for ( $i = 0; $i < 3; $i++ ) : ?>
							<article class="projects-home-card">
								<div class="projects-home-link" role="presentation" aria-hidden="true">
									<div class="projects-home-image">
										<div class="projects-home-thumb projects-home-thumb--placeholder"></div>
										<span class="projects-home-date"><?php echo esc_html( date_i18n( 'd/m/Y' ) ); ?></span>
									</div>
									<div class="projects-home-content">
										<h3 class="projects-home-title-text"><?php esc_html_e( 'Công trình mẫu – thêm trong admin', 'goldenbee' ); ?></h3>
										<span class="projects-home-button"><?php esc_html_e( 'Xem ngay', 'goldenbee' ); ?> <span aria-hidden="true">›</span></span>
									</div>
								</div>
							</article>
						<?php endfor; ?>
					<?php endif; ?>
				</div>
			</div>
			<button type="button" class="projects-home-arrow projects-home-next" aria-label="<?php esc_attr_e( 'Xem công trình tiếp theo', 'goldenbee' ); ?>">›</button>
		</div>

		<div class="projects-home-footer">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'cong-trinh' ) ); ?>" class="projects-home-all-link"><?php esc_html_e( 'Xem tất cả công trình', 'goldenbee' ); ?></a>
		</div>
	</div>
</section>

<style>
.projects-home-section {
	padding: 28px 0 44px;
	background: #fff;
}

.projects-home-title {
	margin-bottom: 26px;
}

.projects-home-shell {
	position: relative;
	display: grid;
	align-items: center;
	grid-template-columns: 42px minmax(0, 1fr) 42px;
	gap: 12px;
}

.projects-home-viewport {
	overflow: hidden;
}

.projects-home-track {
	display: grid;
	grid-auto-flow: column;
	grid-auto-columns: calc((100% - 36px) / 3);
	gap: 18px;
	overflow-x: auto;
	scroll-snap-type: x mandatory;
	scroll-behavior: smooth;
	padding: 2px 0 6px;
	-ms-overflow-style: none;
	scrollbar-width: none;
}

.projects-home-track::-webkit-scrollbar {
	display: none;
}

.projects-home-card {
	scroll-snap-align: start;
	border: 1px solid #d9e2ef;
	background: #fff;
	box-sizing: border-box;
}

.projects-home-link {
	display: block;
	height: 100%;
	color: inherit;
	text-decoration: none;
}

.projects-home-image {
	position: relative;
	overflow: hidden;
	background: #edf2f7;
}

.projects-home-thumb {
	display: block;
	width: 100%;
	aspect-ratio: 1 / 1;
	object-fit: cover;
}

.projects-home-thumb--placeholder {
	background: linear-gradient(135deg, #1f4f9b 0%, #003481 100%);
}

.projects-home-date {
	position: absolute;
	left: 10px;
	bottom: 10px;
	display: inline-flex;
	align-items: center;
	min-height: 24px;
	padding: 0 12px;
	background: #003481;
	color: #fff;
	font-size: 12px;
	font-weight: 700;
	line-height: 1;
	letter-spacing: .01em;
}

.projects-home-content {
	padding: 12px 10px 14px;
	min-height: 154px;
	display: flex;
	flex-direction: column;
	gap: 16px;
}

.projects-home-title-text {
	margin: 0;
	color: #163e7d;
	font-size: 18px;
	font-weight: 800;
	line-height: 1.2;
	text-transform: uppercase;
}

.projects-home-button {
	display: inline-flex;
	align-items: center;
	width: fit-content;
	padding: 4px 10px;
	border: 2px dotted #003481;
	color: #003481;
	font-size: 14px;
	font-weight: 500;
	line-height: 1;
}

.projects-home-arrow {
	display: grid;
	place-items: center;
	width: 28px;
	height: 28px;
	border: 0;
	background: transparent;
	color: #b8b8b8;
	font-size: 42px;
	line-height: 1;
	cursor: pointer;
	user-select: none;
}

.projects-home-footer {
	padding-top: 30px;
	text-align: center;
}

.projects-home-all-link {
	color: #0b0b0b;
	font-size: 16px;
	text-decoration: none;
}

@media (max-width: 1023px) {
	.projects-home-track {
		grid-auto-columns: calc((100% - 18px) / 2);
	}
}

@media (max-width: 767px) {
	.projects-home-shell {
		grid-template-columns: 1fr;
	}

	.projects-home-arrow {
		display: none;
	}

	.projects-home-track {
		grid-auto-columns: 86%;
		gap: 12px;
	}
}
</style>

<script>
(function () {
	const viewport = document.querySelector('[data-projects-viewport]');
	const track = document.querySelector('[data-projects-track]');
	const prevButton = document.querySelector('.projects-home-prev');
	const nextButton = document.querySelector('.projects-home-next');
	if (!viewport || !track || !prevButton || !nextButton) return;

	const getStep = () => {
		const card = track.querySelector('.projects-home-card');
		if (!card) return 0;
		const style = window.getComputedStyle(track);
		const gap = parseFloat(style.columnGap || style.gap || '0') || 0;
		return card.getBoundingClientRect().width + gap;
	};

	prevButton.addEventListener('click', () => {
		viewport.scrollBy({ left: -getStep(), behavior: 'smooth' });
	});

	nextButton.addEventListener('click', () => {
		viewport.scrollBy({ left: getStep(), behavior: 'smooth' });
	});
})();
</script>
