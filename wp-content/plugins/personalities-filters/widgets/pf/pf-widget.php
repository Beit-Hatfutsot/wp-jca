<?php
/**
 * Widget Name: PF Widget
 *
 * @author		Nir Goldberg
 * @package		widgets/pf
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('widgets_init', function() {

	// register widget
	register_widget( 'PF_Widget' );

});

class PF_Widget extends WP_Widget {

	var $form_fields;

	/**
	 * __construct
	 *
	 * Widget constructor
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function __construct() {

		$this->widget_id			= 'PF_Widget';
		$this->widget_name			= __( 'Personalities Filters', 'pf' );
		$this->widget_cssclass		= 'pf pf-widget';
		$this->widget_description	= __( 'Personalities Filters - Widget for JCA project', 'pf' );

		$widget_ops = array(
			'classname'		=> $this->widget_cssclass,
			'description'	=> $this->widget_description
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );

		// form fields
		$this->form_fields = array(
			'title'				=> '',
			'communities_title'	=> '',
			'occupations_title'	=> ''
		);

	}

	/**
	 * form
	 *
	 * Admin widget form
	 *
	 * @since		1.0
	 * @param		$instance (array) widget instance values
	 * @return		N/A
	 */
	function form($instance) {

		$this->form_fields['title']					= isset( $instance['title'] )					? $instance['title']				: '';
		$this->form_fields['communities_title']		= isset( $instance['communities_title'] )		? $instance['communities_title']	: '';
		$this->form_fields['occupations_title']		= isset( $instance['occupations_title'] )		? $instance['occupations_title']	: '';

		$this->generate_widget_form();

	}
	
	/**
	 * update
	 *
	 * Widget update
	 *
	 * @since		1.0
	 * @param		$new_instance (array) widget instance new values
	 * @param		$old_instance (array) widget instance old values
	 * @return		$instance (array) widget instance updated values
	 */
	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		
		$instance['title']					= $new_instance['title'];
		$instance['communities_title']		= $new_instance['communities_title'];
		$instance['occupations_title']		= $new_instance['occupations_title'];
		
		// return
		return $instance;

	}
	
	/**
	 * widget
	 *
	 * Widget frontend
	 *
	 * @since		1.0
	 * @param		$args (array)
	 * @param		$instance (array)
	 * @return		N/A
	 */
	function widget($args, $instance) {

		extract($args, EXTR_SKIP);

		// exit if declared out of personalities page template
		if ( ! is_page_template('page-templates/personalities.php') )
			return;

		// widget content
		echo $before_widget;

		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance);
		if ( ! empty($title) ) {
			echo $before_title . $title . $after_title;
		}

		pf_widget_front()->initialize( $instance['communities_title'], $instance['occupations_title'] );

		echo $after_widget;
	}

	/**
	 * get_form_field
	 *
	 * This function will return a value from the form_fields array found in PF_Widget object
	 *
	 * @since		1.0
	 * @param		$name (string) the form field name to return
	 * @return		(mixed)
	 */
	private function get_form_field( $name, $default = null ) {

		$form_field = pf_maybe_get( $this->form_fields, $name, $default );

		// return
		return $form_field;

	}

	/**
	 * generate_widget_form
	 *
	 * This function will generate the widget form
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	private function generate_widget_form() {

		$title					= $this->get_form_field( 'title' );
		$communities_title		= $this->get_form_field( 'communities_title' );
		$occupations_title		= $this->get_form_field( 'occupations_title' );

		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'pf' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $this->form_fields['title'] ); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('communities_title'); ?>"><?php _e( 'Communities Title', 'pf' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id('communities_title'); ?>" name="<?php echo $this->get_field_name('communities_title'); ?>" type="text" value="<?php echo esc_attr( $this->form_fields['communities_title'] ); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('occupations_title'); ?>"><?php _e( 'Occupations Title', 'pf' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id('occupations_title'); ?>" name="<?php echo $this->get_field_name('occupations_title'); ?>" type="text" value="<?php echo esc_attr( $this->form_fields['occupations_title'] ); ?>" /></label></p>

		<?php

	}

}