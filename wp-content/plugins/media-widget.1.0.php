<?php
/*
Plugin Name: Media Posts Widget
Plugin URI: http://www.bh.org.il
Version: 1.0
Description: Media Posts Widget based on video/audio post format
Author: Nir Goldberg
Author URI: http://www.bh.org.il
*/

class Media_Posts_Widget extends WP_Widget
{
	function Media_Posts_Widget() {
		$widget_ops = array('classname' => 'Media_Posts_Widget', 'description' => 'Media Posts Widget based on video/audio post format');
		$this->WP_Widget('Media_Posts_Widget', 'Media Posts Widget', $widget_ops);
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance,
			array (
				'title'						=> '',
				'video_post_format'			=> '',
				'audio_post_format'			=> '',
				'number_of_posts'			=> '',
				'offset'					=> '',
				'show_content'				=> '',
				'archive_link'				=> '',
				'archive_link_text'			=> ''
			));
		$title					= $instance['title'];
		$video_post_format		= $instance['video_post_format'];
		$audio_post_format		= $instance['audio_post_format'];
		$number_of_posts		= $instance['number_of_posts'];
		$offset					= $instance['offset'];
		$show_content			= $instance['show_content'];
		$archive_link			= $instance['archive_link'];
		$archive_link_text		= $instance['archive_link_text'];
		
		?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'Media_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('video_post_format'); ?>"><input id="<?php echo $this->get_field_id('video_post_format'); ?>" name="<?php echo $this->get_field_name('video_post_format'); ?>" type="checkbox" <?php echo esc_attr($video_post_format) ? 'checked' : ''; ?> /><?php _e( 'Show video post format', 'Media_Posts_Widget' ); ?></label></p>
			<p><label for="<?php echo $this->get_field_id('audio_post_format'); ?>"><input id="<?php echo $this->get_field_id('audio_post_format'); ?>" name="<?php echo $this->get_field_name('audio_post_format'); ?>" type="checkbox" <?php echo esc_attr($audio_post_format) ? 'checked' : ''; ?> /><?php _e( 'Show audio post format', 'Media_Posts_Widget' ); ?></label></p>
			<p><label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of Posts to Display', 'Media_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="text" value="<?php echo attribute_escape($number_of_posts); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Offset', 'Media_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo attribute_escape($offset); ?>" /></label></p>
			<p>
				<label for="<?php echo $this->get_field_id('show_content'); ?>"><?php _e('Show Content', 'Media_Posts_Widget'); ?>:
					<select class="widefat" id="<?php echo $this->get_field_id('show_content'); ?>" name="<?php echo $this->get_field_name('show_content'); ?>">
						<option value="no" <?php echo $instance['show_content'] == 'no' ? 'selected="selected"' : ''; ?>><?php _e('No', 'Media_Posts_Widget'); ?></option>
						<option value="yes" <?php echo $instance['show_content'] == 'yes' ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'Media_Posts_Widget'); ?></option>
					</select>
				</label>
			</p>
			<p><label for="<?php echo $this->get_field_id('archive_link'); ?>"><?php _e('Link to Archive Page', 'Media_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('archive_link'); ?>" name="<?php echo $this->get_field_name('archive_link'); ?>" type="text" value="<?php echo attribute_escape($archive_link); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('archive_link_text'); ?>"><?php _e('Archive Link Button Text', 'Media_Posts_Widget'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('archive_link_text'); ?>" name="<?php echo $this->get_field_name('archive_link_text'); ?>" type="text" value="<?php echo attribute_escape($archive_link_text); ?>" /></label></p>
		<?php
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title']				= $new_instance['title'];
		$instance['video_post_format']	= $new_instance['video_post_format'];
		$instance['audio_post_format']	= $new_instance['audio_post_format'];
		$instance['number_of_posts']	= $new_instance['number_of_posts'];
		$instance['offset']				= $new_instance['offset'];
		$instance['show_content']		= $new_instance['show_content'];
		$instance['archive_link']		= $new_instance['archive_link'];
		$instance['archive_link_text']	= $new_instance['archive_link_text'];

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
			'offset'			=> $instance['offset'] ? $instance['offset'] : 0,
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

			$url = get_field('video-audio-posts_url');

			if ( ! $url )
				continue;

			$format = get_post_format();

			$posts_list .=
				'<article id="post-' . $post->ID . '" class="media pojo-class-item ' . $format . '">' .
					'<div class="container">' .
						'<div class="row">' .
							'<div class="media-src col-sm-5' . ( $format == 'audio' ? ' col-sm-push-7' : '' ) . '">' . do_shortcode('[' . ( $format == 'video' ? 'video mp4="' : 'audio mp3="' ) . $url . '"]') . '</div>' .
							'<div class="media-info col-sm-7' . ( $format == 'audio' ? ' col-sm-pull-5' : '' ) . '">' .
								'<h3 class="media-heading">' . get_the_title() . '</h3>' .
								( $instance['show_content'] == 'yes' ? apply_filters( 'the_content', get_the_content() ) : '' ) .
							'</div>' .
						'</div>' .
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

			if ( $posts_count ) {
				echo $posts_list;
				echo $instance['archive_link'] ? '<div class="archive-link"><a href="" class="button size-small">' . ( $instance['archive_link_text'] ? $instance['archive_link_text'] : __('View More', 'Media_Posts_Widget') ) . '</a></div>' : '';
			}
			else {
				echo '<li class="center no_posts">' . __('No posts found', 'Media_Posts_Widget') . '</li>';
			}

		echo '</div>';
		
		echo $after_widget;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("Media_Posts_Widget");') );