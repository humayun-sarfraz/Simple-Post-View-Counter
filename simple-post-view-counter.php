<?php
/**
 * Plugin Name:     Simple Post View Counter
 * Plugin URI:      https://github.com/humayun-sarfraz/simple-post-view-counter
 * Description:     Counts each post view and provides a shortcode to display the total.
 * Version:         1.0.0
 * Author:          Humayun Sarfraz
 * Author URI:      https://github.com/humayun-sarfraz
 * Text Domain:     simple-post-view-counter
 * Domain Path:     /languages
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Simple_Post_View_Counter', false ) ) {

	final class Simple_Post_View_Counter {

		/** Meta key where view counts are stored */
		private $meta_key = 'spvc_view_count';

		public function __construct() {
			// Count the view on singular post pages
			add_action( 'wp', [ $this, 'count_view' ] );

			// Shortcode to display the view count: [spvc_views]
			add_shortcode( 'spvc_views', [ $this, 'display_views' ] );
		}

		/**
		 * Increment the view count for the current post.
		 */
		public function count_view(): void {
			if ( is_singular( 'post' ) && is_main_query() ) {
				global $post;
				$count = (int) get_post_meta( $post->ID, $this->meta_key, true );
				update_post_meta( $post->ID, $this->meta_key, $count + 1 );
			}
		}

		/**
		 * Shortcode callback to return the view count.
		 *
		 * @param array $atts Shortcode attributes.
		 * @return string
		 */
		public function display_views( array $atts ): string {
			global $post;
			$count = (int) get_post_meta( $post->ID, $this->meta_key, true );
			/* translators: %d is the number of views */
			return sprintf( esc_html__( '%d views', 'simple-post-view-counter' ), $count );
		}
	}

	// Initialize the plugin
	new Simple_Post_View_Counter();
}
