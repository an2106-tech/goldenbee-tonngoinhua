<?php
/**
 * Custom widgets for Golden Bee theme.
 *
 * @package GoldenBee
 */

defined( 'ABSPATH' ) || exit;

/**
 * Featured Posts Widget
 */
class GoldenBee_Featured_Posts_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'goldenbee_featured_posts',
			'Golden Bee - Bài viết nổi bật',
			array( 'description' => 'Hiển thị các bài viết nổi bật' )
		);
	}

	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		echo wp_kses_post( $args['before_title'] );
		echo esc_html( ! empty( $instance['title'] ) ? $instance['title'] : 'Bài viết nổi bật' );
		echo wp_kses_post( $args['after_title'] );

		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 5;

		$featured_posts = new WP_Query( array(
			'posts_per_page' => $number,
			'post_type'      => 'post',
			'meta_key'       => '_featured',
			'meta_value'     => 1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		if ( $featured_posts->have_posts() ) {
			echo '<ul style="list-style: none; padding: 0; margin: 0;">';
			while ( $featured_posts->have_posts() ) {
				$featured_posts->the_post();
				?>
				<li style="border-bottom: 1px solid #e0e0e0; padding: 12px 0; margin: 0;">
					<a href="<?php the_permalink(); ?>" class="featured-posts-widget__link" style="color: #003481; font-weight: 600; text-decoration: none; display: block; margin-bottom: 4px; line-height: 1.4;">
						<?php echo esc_html( wp_trim_words( get_the_title(), 10 ) ); ?>
					</a>
					<span class="featured-posts-widget__date" style="font-size: 12px; color: #999; display: block;">
						<?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?>
					</span>
				</li>
				<?php
			}
			echo '</ul>';
			wp_reset_postdata();
		}

		echo wp_kses_post( $args['after_widget'] );
	}

	public function form( $instance ) {
		$title  = ! empty( $instance['title'] ) ? $instance['title'] : 'Bài viết nổi bật';
		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Tiêu đề:', 'goldenbee' ); ?>
			</label>
			<input
				class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				type="text"
				value="<?php echo esc_attr( $title ); ?>"
			>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
				<?php esc_html_e( 'Số bài viết:', 'goldenbee' ); ?>
			</label>
			<input
				class="tiny-text"
				id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"
				type="number"
				step="1"
				min="1"
				value="<?php echo esc_attr( $number ); ?>"
			>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance           = array();
		$instance['title']  = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['number'] = ! empty( $new_instance['number'] ) ? absint( $new_instance['number'] ) : 5;
		return $instance;
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'GoldenBee_Featured_Posts_Widget' );
} );
