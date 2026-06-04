<?php
/**
 * Events gallery (ACF free – 40 image fields).
 *
 * @package GoldenBee
 */

$title  = goldenbee_get_option_field( 'events_title', __( 'Hình ảnh Green BM tại các sự kiện', 'goldenbee' ) );
$images = array();

for ( $i = 1; $i <= 40; $i++ ) {
	$img = goldenbee_get_option_field( 'event_image_' . $i, null );
	if ( is_array( $img ) && ! empty( $img['url'] ) ) {
		$images[] = $img;
	}
}

$layout_classes = array(
	'event-gallery-item--hero',
	'event-gallery-item--wide',
	'',
	'',
	'event-gallery-item--wide',
	'',
	'',
	'',
	'',
);
?>
<section class="events-gallery-section">
	<div class="events-gallery-container">
		<div class="events-gallery-title-wrap">
			<h2 class="events-gallery-title"><?php echo esc_html( $title ); ?></h2>
		</div>
		<?php if ( ! empty( $images ) ) : ?>
			<div class="events-gallery-grid">
				<?php foreach ( $images as $index => $image ) : ?>
					<?php
					$item_class = $layout_classes[ $index % count( $layout_classes ) ];
					$image_src  = $image['sizes']['large'] ?? $image['sizes']['medium_large'] ?? $image['url'];
					$image_alt  = $image['alt'] ?? sprintf(
						/* translators: %d: image number */
						__( 'Hình ảnh sự kiện Green BM %d', 'goldenbee' ),
						$index + 1
					);
					?>
					<figure class="events-gallery-item <?php echo esc_attr( $item_class ); ?>">
						<a class="events-gallery-link" href="<?php echo esc_url( $image['url'] ); ?>" data-event-index="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( $image_alt ); ?>">
							<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" loading="lazy">
						</a>
					</figure>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="events-gallery-empty">
				<?php esc_html_e( 'Tab Hình sự kiện → upload Ảnh 1 … Ảnh 40.', 'goldenbee' ); ?>
			</p>
			<div class="events-gallery-grid">
				<?php for ( $i = 0; $i < 9; $i++ ) : ?>
					<div class="events-gallery-item events-gallery-placeholder <?php echo esc_attr( $layout_classes[ $i % count( $layout_classes ) ] ); ?>"></div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<div class="events-gallery-modal" hidden aria-hidden="true">
	<button type="button" class="events-gallery-modal-backdrop" data-event-close aria-label="<?php esc_attr_e( 'Đóng xem ảnh', 'goldenbee' ); ?>"></button>
	<div class="events-gallery-modal-dialog" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Xem ảnh sự kiện', 'goldenbee' ); ?>">
		<button type="button" class="events-gallery-modal-close" data-event-close aria-label="<?php esc_attr_e( 'Đóng', 'goldenbee' ); ?>">×</button>
		<button type="button" class="events-gallery-modal-nav events-gallery-modal-prev" data-event-prev aria-label="<?php esc_attr_e( 'Ảnh trước', 'goldenbee' ); ?>">‹</button>
		<figure class="events-gallery-modal-figure">
			<img class="events-gallery-modal-image" src="" alt="">
			<figcaption class="events-gallery-modal-caption"></figcaption>
		</figure>
		<button type="button" class="events-gallery-modal-nav events-gallery-modal-next" data-event-next aria-label="<?php esc_attr_e( 'Ảnh tiếp theo', 'goldenbee' ); ?>">›</button>
	</div>
</div>

<style>
.events-gallery-section {
	background: #f5f5f5;
	padding: 28px 0 48px;
}

.events-gallery-container {
	width: min(100% - 30px, 1248px);
	margin: 0 auto;
}

.events-gallery-title-wrap {
	margin-bottom: 28px;
	text-align: center;
}

.events-gallery-title {
	position: relative;
	display: inline-block;
	margin: 0;
	padding-bottom: 12px;
	color: #003481;
	font-size: clamp(24px, 2.35vw, 32px);
	font-weight: 700;
	line-height: 1.15;
	text-transform: uppercase;
}

.events-gallery-title::after {
	content: "";
	position: absolute;
	left: 50%;
	bottom: 0;
	width: 200px;
	height: 3px;
	background: #003481;
	transform: translateX(-50%);
}

.events-gallery-grid {
	display: grid;
	grid-template-columns: repeat(4, minmax(0, 1fr));
	grid-auto-rows: clamp(190px, 23vw, 300px);
	gap: 3px;
}

.events-gallery-item {
	position: relative;
	margin: 0;
	overflow: hidden;
	background: #e8edf2;
}

.events-gallery-link {
	display: block;
	width: 100%;
	height: 100%;
	cursor: zoom-in;
}

.events-gallery-item--hero {
	grid-column: span 2;
	grid-row: span 2;
}

.events-gallery-item--wide {
	grid-column: span 2;
}

.events-gallery-item img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
}

.events-gallery-placeholder {
	background: linear-gradient(135deg, rgba(0, 52, 129, 0.16), rgba(0, 52, 129, 0.46));
}

.events-gallery-empty {
	margin: 0 0 18px;
	color: #6b7280;
	font-size: 14px;
	text-align: center;
}

@media (max-width: 767px) {
	.events-gallery-section {
		padding: 24px 0 36px;
	}

	.events-gallery-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		grid-auto-rows: 46vw;
		gap: 3px;
	}

	.events-gallery-item--hero,
	.events-gallery-item--wide {
		grid-column: span 2;
		grid-row: span 1;
	}

	.events-gallery-modal-dialog {
		width: min(100% - 20px, 960px);
	}
}

.events-gallery-modal[hidden] {
	display: none !important;
}

.events-gallery-modal {
	position: fixed;
	inset: 0;
	z-index: 999999;
	display: grid;
	place-items: center;
	padding: 0;
}

.events-gallery-modal-backdrop {
	position: absolute;
	inset: 0;
	border: 0;
	background: rgba(118, 118, 118, 0.88);
}

.events-gallery-modal-dialog {
	position: relative;
	z-index: 1;
	width: min(100vw - 40px, 1280px);
	max-height: 100vh;
	display: grid;
	place-items: center;
}

.events-gallery-modal-figure {
	margin: 0;
	max-width: 100%;
	max-height: 100vh;
	display: grid;
	place-items: center;
	gap: 0;
}

.events-gallery-modal-image {
	max-width: 100%;
	max-height: 100vh;
	object-fit: contain;
	box-shadow: none;
	background: transparent;
}

.events-gallery-modal-caption {
	color: #fff;
	font-size: 14px;
	text-align: center;
}

.events-gallery-modal-close,
.events-gallery-modal-nav {
	position: absolute;
	z-index: 2;
	display: grid;
	place-items: center;
	border: 0;
	background: transparent;
	color: #fff;
	transition: background-color 0.15s ease;
}

.events-gallery-modal-close:hover,
.events-gallery-modal-nav:hover {
	background: rgba(0, 0, 0, 0.18);
}

.events-gallery-modal-close {
	top: 10px;
	right: 10px;
	width: 28px;
	height: 28px;
	border-radius: 9999px;
	font-size: 30px;
	line-height: 1;
}

.events-gallery-modal-nav {
	top: 50%;
	width: 54px;
	height: 54px;
	border-radius: 9999px;
	transform: translateY(-50%);
	font-size: 54px;
	line-height: 1;
	color: rgba(255, 255, 255, 0.72);
}

.events-gallery-modal-prev {
	left: 14px;
}

.events-gallery-modal-next {
	right: 14px;
}

body.events-gallery-modal-open {
	overflow: hidden;
}

@media (max-width: 767px) {
	.events-gallery-modal-close {
		top: 10px;
		right: 10px;
	}

	.events-gallery-modal-prev {
		left: 8px;
	}

	.events-gallery-modal-next {
		right: 8px;
	}
}
</style>

<script>
(function () {
	const links = Array.from(document.querySelectorAll('.events-gallery-link'));
	const modal = document.querySelector('.events-gallery-modal');
	if (!links.length || !modal) return;

	const modalImage = modal.querySelector('.events-gallery-modal-image');
	const modalCaption = modal.querySelector('.events-gallery-modal-caption');
	const prevButton = modal.querySelector('[data-event-prev]');
	const nextButton = modal.querySelector('[data-event-next]');
	const closeButtons = modal.querySelectorAll('[data-event-close]');
	let currentIndex = 0;

	const setImage = (index) => {
		const total = links.length;
		currentIndex = (index + total) % total;
		const link = links[currentIndex];
		const img = link.querySelector('img');
		if (!img) return;
		modalImage.src = link.href;
		modalImage.alt = img.alt || '';
		modalCaption.textContent = img.alt || '';
	};

	const openModal = (index) => {
		setImage(index);
		modal.hidden = false;
		modal.setAttribute('aria-hidden', 'false');
		document.body.classList.add('events-gallery-modal-open');
	};

	const closeModal = () => {
		modal.hidden = true;
		modal.setAttribute('aria-hidden', 'true');
		document.body.classList.remove('events-gallery-modal-open');
		modalImage.src = '';
	};

	links.forEach((link, index) => {
		link.addEventListener('click', (event) => {
			event.preventDefault();
			openModal(index);
		});
	});

	prevButton.addEventListener('click', () => setImage(currentIndex - 1));
	nextButton.addEventListener('click', () => setImage(currentIndex + 1));
	closeButtons.forEach((button) => button.addEventListener('click', closeModal));

	document.addEventListener('keydown', (event) => {
		if (modal.hidden) return;
		if (event.key === 'Escape') closeModal();
		if (event.key === 'ArrowLeft') setImage(currentIndex - 1);
		if (event.key === 'ArrowRight') setImage(currentIndex + 1);
	});
})();
</script>
