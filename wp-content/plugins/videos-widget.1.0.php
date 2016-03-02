<?php
/*
Plugin Name: Video_Audio_Posts_Widget
Plugin URI: http://www.bh.org.il
Version: 1.0
Description: Video/Audio Posts Widget based on video/audio post format
Author: Nir Goldberg
Author URI: http://www.bh.org.il
*/

class Video_Audio_Posts_Widget extends WP_Widget
{
	function Video_Audio_Posts_Widget() {
		$widget_ops = array('classname' => 'Video_Audio_Posts_Widget', 'description' => 'Video/Audio Posts Widget based on video/audio post format');
		$this->WP_Widget('Video_Audio_Posts_Widget', 'Video/Audio Posts Widget', $widget_ops);
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance,
			array (
				'title'						=> '',
				'video_post_format'			=> '',
				'audio_post_format'			=> '',
				'number_of_posts'			=> '',
				'show_excerpt'				=> '',
			));
		$title					= $instance['title'];
		$video_post_format		= $instance['video_post_format'];
		$audio_post_format		= $instance['audio_post_format'];
		$number_of_posts		= $instance['number_of_posts'];
		$show_excerpt			= $instance['show_excerpt'];
		
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'Video_Audio_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('video_post_format'); ?>"><input id="<?php echo $this->get_field_id('video_post_format'); ?>" name="<?php echo $this->get_field_name('video_post_format'); ?>" type="checkbox" <?php echo esc_attr($video_post_format) ? 'checked' : ''; ?> /><?php _e( 'Show video post format', 'Video_Audio_Posts_Widget' ); ?></label></p>
			<p><label for="<?php echo $this->get_field_id('audio_post_format'); ?>"><input id="<?php echo $this->get_field_id('audio_post_format'); ?>" name="<?php echo $this->get_field_name('audio_post_format'); ?>" type="checkbox" <?php echo esc_attr($audio_post_format) ? 'checked' : ''; ?> /><?php _e( 'Show audio post format', 'Video_Audio_Posts_Widget' ); ?></label></p>
			<p><label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of Posts to Display', 'Video_Audio_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="text" value="<?php echo attribute_escape($number_of_posts); ?>" /></label></p>
			<p>
				<label for="<?php echo $this->get_field_id('show_excerpt'); ?>"><?php _e('Show Excerpt', 'Video_Audio_Posts_Widget'); ?>:
					<select class="widefat" id="<?php echo $this->get_field_id('show_excerpt'); ?>" name="<?php echo $this->get_field_name('show_excerpt'); ?>">
						<option value="no" <?php echo $instance['show_excerpt'] == 'no' ? 'selected="selected"' : ''; ?>><?php _e('No', 'Video_Audio_Posts_Widget'); ?></option>
						<option value="yes" <?php echo $instance['show_excerpt'] == 'yes' ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'Video_Audio_Posts_Widget'); ?></option>
					</select>
				</label>
			</p>
		<?php
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title']					= $new_instance['title'];
		$instance['video_post_format']		= $new_instance['video_post_format'];
		$instance['audio_post_format']		= $new_instance['audio_post_format'];
		$instance['number_of_posts']		= $new_instance['number_of_posts'];
		$instance['show_excerpt']			= $new_instance['show_excerpt'];
		return $instance;
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		
		$id = $args['widget_id'];
		
		$posts_list		= '';
		$posts_count	= 0;
		
		if ( ! $instance['video_post_format'] && ! $instance['audio_post_format'] )
			return;
			
		$post_formats = array();

		if ( $instance['video_post_format'] ) $post_formats[] = 'post-format-video';
		if ( $instance['audio_post_format'] ) $post_formats[] = 'post-format-audio';

		global $post;
		
		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $instance['number_of_posts'] ? $instance['number_of_posts'] : -1,
			'orderby'			=> 'menu_order',
			'order'				=> 'ASC',
			'tax_query'			=> array(
				array(
					'taxonomy'	=> 'post_format',
					'field'		=> 'slug',
					'terms'		=> $post_formats
				)
			)
		);
		$posts = new WP_Query($args);
		
		if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post();
			$posts_list .= 
				'<article id="post-' . $post->ID . '" class="media pojo-class-item">' .
					'<div class="media-body">' .
						'<h3 class="media-heading">' . get_the_title() . '</h3>' .
						( $instance['show_excerpt'] == 'yes' ? get_the_excerpt() : '' ) .
					'</div>' .
				'</article>';
			
			$posts_count++;
		endwhile; endif; wp_reset_postdata();
		
		// widget content
		echo $before_widget;
		
		$title = empty( $instance['title'] ) ? '' : apply_filters('widget_title', $instance['title']);
		
		if (!empty($title))
			echo $before_title . $title . $after_title;
			
		echo '<div class="widgetcontent">';
			echo ( $posts_count ? $posts_list : '<li class="center no_posts">' . __('No Posts found', 'Video_Audio_Posts_Widget') . '</li>' ); ?>
		<?php echo '</div>';
		
		echo $after_widget;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("Video_Audio_Posts_Widget");') );