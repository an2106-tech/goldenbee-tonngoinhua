<?php
/**
 * Video projects section on homepage.
 *
 * @package GoldenBee
 */

$title = goldenbee_get_option_field( 'project_videos_title', __( 'Video các công trình sử dụng tôn ngói nhựa Green BM', 'goldenbee' ) );
$items = array();

for ( $i = 1; $i <= 6; $i++ ) {
	$group = goldenbee_get_option_field( 'project_video_' . $i, null );
	if ( ! is_array( $group ) ) {
		continue;
	}

	$image = $group['project_video_image'] ?? null;
	$url   = $group['project_video_url'] ?? '';
	$name  = $group['project_video_title'] ?? sprintf( __( 'Công trình video %d', 'goldenbee' ), $i );
	$thumb = goldenbee_acf_image_url( $image );
	$embed = goldenbee_get_youtube_embed_url( $url );

	if ( ! $thumb || ! $embed ) {
		continue;
	}

	$items[] = array(
		'title' => $name,
		'thumb' => $thumb,
		'embed' => $embed,
	);
}
?>
<section class="video-projects-section">
	<div class="container-site">
		<div class="video-projects-title-wrap">
			<h2 class="video-projects-title"><?php echo esc_html( $title ); ?></h2>
		</div>

		<?php if ( ! empty( $items ) ) : ?>
			<div class="video-projects-grid">
				<?php foreach ( $items as $index => $item ) : ?>
					<button
						type="button"
						class="video-project-card"
						data-video-project="<?php echo esc_attr( $index ); ?>"
						data-video-embed="<?php echo esc_url( $item['embed'] ); ?>"
						data-video-title="<?php echo esc_attr( $item['title'] ); ?>"
					>
						<span class="video-project-thumb">
							<img src="<?php echo esc_url( $item['thumb'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy">
							<span class="video-project-play" aria-hidden="true">
								<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="32" cy="32" r="31" fill="#003481" stroke="#FFFFFF" stroke-width="2"/>
									<path d="M43 32L27 22V42L43 32Z" fill="#FFFFFF"/>
								</svg>
							</span>
						</span>
					</button>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="video-projects-grid">
				<?php for ( $i = 0; $i < 6; $i++ ) : ?>
					<div class="video-project-card video-project-card--placeholder" aria-hidden="true">
						<span class="video-project-thumb video-project-thumb--placeholder">
							<span class="video-project-play" aria-hidden="true">
								<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="32" cy="32" r="31" fill="#003481" stroke="#FFFFFF" stroke-width="2"/>
									<path d="M43 32L27 22V42L43 32Z" fill="#FFFFFF"/>
								</svg>
							</span>
						</span>
					</div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<div class="video-project-modal" hidden aria-hidden="true">
	<button type="button" class="video-project-modal-backdrop" data-video-project-close aria-label="<?php esc_attr_e( 'Đóng xem video', 'goldenbee' ); ?>"></button>
	<div class="video-project-modal-dialog" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Xem video công trình', 'goldenbee' ); ?>">
		<button type="button" class="video-project-modal-close" data-video-project-close aria-label="<?php esc_attr_e( 'Đóng', 'goldenbee' ); ?>">×</button>
		<button type="button" class="video-project-modal-nav video-project-modal-prev" data-video-project-prev aria-label="<?php esc_attr_e( 'Video trước', 'goldenbee' ); ?>">‹</button>
		<div class="video-project-modal-frame">
			<iframe class="video-project-modal-iframe" src="" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<button type="button" class="video-project-modal-nav video-project-modal-next" data-video-project-next aria-label="<?php esc_attr_e( 'Video tiếp theo', 'goldenbee' ); ?>">›</button>
	</div>
</div>

<style>
.video-projects-section {
	padding: 24px 0 42px;
	background: #fff;
}

.video-projects-title-wrap {
	margin-bottom: 24px;
	text-align: center;
}

.video-projects-title {
	position: relative;
	display: inline-block;
	margin: 0;
	padding-bottom: 12px;
	color: #003481;
	font-size: clamp(24px, 2.3vw, 32px);
	font-weight: 700;
	line-height: 1.15;
	text-transform: uppercase;
}

.video-projects-title::after {
	content: "";
	position: absolute;
	left: 50%;
	bottom: 0;
	width: 200px;
	height: 3px;
	background: #003481;
	transform: translateX(-50%);
}

.video-projects-grid {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 16px;
}

.video-project-card {
	display: block;
	padding: 0;
	border: 0;
	background: transparent;
	text-align: left;
	cursor: pointer;
}

.video-project-thumb {
	position: relative;
	display: block;
	overflow: hidden;
	aspect-ratio: 16 / 9;
	background: #f0f4f8;
}

.video-project-thumb img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
}

.video-project-thumb--placeholder {
	background: linear-gradient(135deg, rgba(0, 52, 129, 0.18), rgba(0, 52, 129, 0.54));
}

.video-project-play {
	position: absolute;
	left: 50%;
	top: 50%;
	width: 58px;
	height: 58px;
	transform: translate(-50%, -50%);
}

.video-project-play svg {
	width: 100%;
	height: 100%;
	display: block;
}

.video-project-modal[hidden] {
	display: none !important;
}

.video-project-modal {
	position: fixed;
	inset: 0;
	z-index: 999999;
	display: grid;
	place-items: center;
}

.video-project-modal-backdrop {
	position: absolute;
	inset: 0;
	border: 0;
	background: rgba(118, 118, 118, 0.88);
}

.video-project-modal-dialog {
	position: relative;
	z-index: 1;
	width: min(100vw - 40px, 1180px);
}

.video-project-modal-frame {
	position: relative;
	aspect-ratio: 16 / 9;
	background: #000;
	box-shadow: 0 24px 80px rgba(0, 0, 0, 0.45);
}

.video-project-modal-iframe {
	width: 100%;
	height: 100%;
	display: block;
}

.video-project-modal-close,
.video-project-modal-nav {
	position: absolute;
	z-index: 2;
	border: 0;
	background: transparent;
	color: rgba(255, 255, 255, 0.82);
}

.video-project-modal-close {
	top: -10px;
	right: 0;
	width: 30px;
	height: 30px;
	font-size: 34px;
	line-height: 1;
}

.video-project-modal-nav {
	top: 50%;
	width: 56px;
	height: 56px;
	transform: translateY(-50%);
	font-size: 56px;
	line-height: 1;
}

.video-project-modal-prev {
	left: -14px;
}

.video-project-modal-next {
	right: -14px;
}

body.video-project-modal-open {
	overflow: hidden;
}

@media (max-width: 767px) {
	.video-projects-grid {
		grid-template-columns: 1fr;
	}

	.video-project-modal-dialog {
		width: min(100vw - 24px, 1180px);
	}

	.video-project-modal-prev {
		left: 4px;
	}

	.video-project-modal-next {
		right: 4px;
	}
}
</style>

<script>
(function () {
	const cards = Array.from(document.querySelectorAll('[data-video-project]'));
	const modal = document.querySelector('.video-project-modal');
	if (!cards.length || !modal) return;

	const iframe = modal.querySelector('.video-project-modal-iframe');
	const title = modal.querySelector('.video-project-modal-dialog');
	const prevButton = modal.querySelector('[data-video-project-prev]');
	const nextButton = modal.querySelector('[data-video-project-next]');
	const closeButtons = modal.querySelectorAll('[data-video-project-close]');
	let currentIndex = 0;

	const setVideo = (index) => {
		const total = cards.length;
		currentIndex = (index + total) % total;
		const card = cards[currentIndex];
		const embed = card.getAttribute('data-video-embed') || '';
		const videoTitle = card.getAttribute('data-video-title') || '';
		iframe.src = embed;
		iframe.title = videoTitle;
	};

	const openModal = (index) => {
		setVideo(index);
		modal.hidden = false;
		modal.setAttribute('aria-hidden', 'false');
		document.body.classList.add('video-project-modal-open');
	};

	const closeModal = () => {
		modal.hidden = true;
		modal.setAttribute('aria-hidden', 'true');
		document.body.classList.remove('video-project-modal-open');
		iframe.src = '';
	};

	cards.forEach((card, index) => {
		card.addEventListener('click', () => openModal(index));
	});

	prevButton.addEventListener('click', () => setVideo(currentIndex - 1));
	nextButton.addEventListener('click', () => setVideo(currentIndex + 1));
	closeButtons.forEach((button) => button.addEventListener('click', closeModal));

	document.addEventListener('keydown', (event) => {
		if (modal.hidden) return;
		if (event.key === 'Escape') closeModal();
		if (event.key === 'ArrowLeft') setVideo(currentIndex - 1);
		if (event.key === 'ArrowRight') setVideo(currentIndex + 1);
	});
})();
</script>
