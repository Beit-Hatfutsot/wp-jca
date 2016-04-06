<?php
/**
 * Sidebars
 *
 * @author 		Nir Goldberg
 * @package 	functions
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function JCA_sidebars() {

	// personalities
	register_sidebar(
		array(
			'id'			=> 'personalities',
			'name'			=> 'Personalities',
			'description'	=> 'Place here Personalities Filters Widget',
			'before_widget'	=> '<div class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h2 class="widgettitle">',
			'after_title'	=> '</h2>'
		)
	);

}
add_action('widgets_init', 'JCA_sidebars');