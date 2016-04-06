<?php
/*
Plugin Name: Post Gallery Widget
Plugin URI: http://www.bh.org.il
Version: 1.0
Description: Post Gallery Widget
Author: Nir Goldberg
Author URI: http://www.bh.org.il
*/

class Post_Gallery_Widget extends WP_Widget
{
	function Post_Gallery_Widget() {
		$widget_ops = array('classname' => 'Post_Gallery_Widget', 'description' => 'Post Gallery Widget');
		$this->WP_Widget('Post_Gallery_Widget', 'Post Gallery Widget', $widget_ops);
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance,
			array (
				'title'				=> ''
			));
		$title			= $instance['title'];
		
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'Post_Gallery_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		<?php
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title']			= $new_instance['title'];

		return $instance;
	}
	
	function widget($args, $instance) {
		if( ! class_exists('acf') )
			return;

		extract($args, EXTR_SKIP);
		
		$id = $args['widget_id'];
		
		global $post;

		$gallery	= get_field('acf-post_gallery', $post->ID);
		$output		= '';
		
		if ($gallery) {
			foreach ($gallery as $g) {
				$image = $g['image'];

				$output .= '<figure class="gallery-item">
								<div class="gallery-icon landscape">
									<a data-size="' . $image['width'] . 'x' . $image['height'] . '" href="' . $image['url'] . '" role="link">
										<img width="' . $image['width'] . '" height="' . $image['height'] . '" src="' . $image['url'] . '" class="attachment-full size-full" alt="' . $image['alt'] . '">
									</a>' .
									( $image['caption'] ? '<figcaption class="wp-caption-text gallery-caption">' . $image['caption'] . '</figcaption>' : '' ) .
								'</div>
							</figure>';
			}
		}

		if ( ! $output )
			return;

		// widget content
		echo $before_widget;
		
		$title = empty( $instance['title'] ) ? '' : apply_filters('widget_title', $instance['title']);
		
		if (!empty($title))
			echo $before_title . $title . $after_title;
			
		echo '<div class="widgetcontent">';

			echo '<div class="gallery gallery-columns-1 gallery-size-thumbnail">' . $output . '</div>';

		echo '</div>';
		
		echo $after_widget;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("Post_Gallery_Widget");') );