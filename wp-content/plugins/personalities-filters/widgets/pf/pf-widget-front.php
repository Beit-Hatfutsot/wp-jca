<?php
/**
 * PF Widget frontend
 *
 * @author		Nir Goldberg
 * @package		widgets/pf
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists('PF_Widget_Front') ) :

class PF_Widget_Front {

	private $attributes;

	/**
	 * __construct
	 *
	 * A dummy constructor to ensure PF_Widget_Front is only initialized once
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function __construct() {

		/* Do nothing here */

	}

	/**
	 * initialize
	 *
	 * The real constructor to initialize PF
	 *
	 * @since		1.0
	 * @param		$communities_title (string) communities title
	 * @param		$occupations_title (string) occupations title
	 * @return		N/A
	 */
	function initialize( $communities_title, $occupations_title ) {

		// initiate attributes
		$this->attributes = array(
			// filter settings
			'communities_title'		=> $communities_title,
			'occupations_title'		=> $occupations_title,

			// filter data
			'communities_filter'	=> array(),
			'occupations_filter'	=> array()
		);

		// initiate communities filter
		$this->init_communities_filter();

		// initiate occupations filter
		$this->init_occupations_filter();

		// display filters
		$this->display_filters();

	}

	/**
	 * get_attribute
	 *
	 * This function will return a value from the attributes array found in PF_Widget_Front object
	 *
	 * @since		1.0
	 * @param		$name (string) the attribute name to return
	 * @return		(mixed)
	 */
	function get_attribute( $name, $default = null ) {

		$arrtibute = pf_maybe_get( $this->attributes, $name, $default );

		// return
		return $arrtibute;

	}

	/**
	 * set_attribute
	 *
	 * This function will update a value into the attributes array found in PF_Widget_Front object
	 *
	 * @since		1.0
	 * @param		$name (string) the attribute name to update
	 * @param		$value (mixed) the attribute value to update
	 * @return		N/A
	 */
	function set_attribute( $name, $value ) {

		$this->attributes[ $name ] = $value;

	}

	/**
	 * init_communities_filter
	 *
	 * Initiate communities filter
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	private function init_communities_filter() {

		$communities = array();

		global $post;

		$args = array(
			'post_type'			=> 'community',
			'posts_per_page'	=> -1,
			'no_found_rows'		=> true,
			'orderby'			=> 'title',
			'order'				=> 'ASC'
		);
		$query = new WP_Query($args);

		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

			$communities[$post->post_name] = $post->post_title;

		endwhile; endif; wp_reset_postdata();

		$this->set_attribute('communities_filter', $communities);

	}

	/**
	 * init_occupations_filter
	 *
	 * Initiate occupations filter
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	private function init_occupations_filter() {

		$occupations = get_terms('occupation');

		$this->set_attribute('occupations_filter', $occupations);

	}

	/**
	 * display_filters
	 *
	 * Display personalities filters
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	private function display_filters() {

		// get attributes
		$communities_filter		= $this->get_attribute( 'communities_filter' );
		$occupations_filter		= $this->get_attribute( 'occupations_filter' );

		echo '<div class="widgetcontent">';

			/**
			 * pf_before_filter_content hook
			 */
			do_action( 'pf_before_filter_content' );

			// letters filter
			pf_get_template_part( 'pf-widget/pf-widget', 'letters-filter' );

			echo '<div class="row">';

				// communities filter
				if ( $communities_filter ) {
					pf_get_template_part( 'pf-widget/pf-widget', 'communities-filter' );
				}

				// occupations filter
				if ( $occupations_filter ) {
					pf_get_template_part( 'pf-widget/pf-widget', 'occupations-filter' );
				}

				echo '<div class="button-clear col-sm-2">';
					echo '<a class="button size-small" role="link">' . __('Clear', 'pf') . '</a>';
				echo '</div>';

			echo '</div>';

			/**
			 * pf_after_filter_content hook
			 */
			do_action( 'pf_after_filter_content' );

		echo '</div>';

	}

}

/**
 * pf_widget_front
 *
 * This function initialize PF_Widget_Front
 *
 * @since	1.0
 * @param	N/A
 * @return	(object)
 */
function pf_widget_front() {

	global $pf_widget_front;

	if( ! isset($pf_widget_front) ) {

		$pf_widget_front = new PF_Widget_Front();

	}

	// return
	return $pf_widget_front;

}

// initialize
pf_widget_front();

endif; // class_exists check