<?php
/**
 * Scripts and Styles
 *
 * @author		Nir Goldberg
 * @package		functions
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * JCA_register_scripts_n_styles
 *
 * Register scripts and styles
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_scripts_n_styles() {

	if ( ! is_admin() ) {

		JCA_register_styles();
		JCA_register_scripts();

	}

}
add_action('init', 'JCA_register_scripts_n_styles');

/**
 * JCA_register_styles
 *
 * Register frontend styles
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_styles() {}

/**
 * JCA_register_scripts
 *
 * Register frontend scripts
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_scripts() {

	wp_enqueue_script( 'general',	JS_DIR . '/general.min.js',		array('jquery'),	VERSION,	true );

}