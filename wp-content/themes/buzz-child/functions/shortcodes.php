<?php
/**
 * Shortcodes
 *
 * @author 		Nir Goldberg
 * @package 	functions
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * bh_logo
 *
 * Shortcode to display BH logo ([bh-logo])
 *
 * @param	N/A
 * @return	(string)
 */
function bh_logo() {
	$output =	'<div class="shortcode shortcode-bh-logo">
					<a href="http://www.bh.org.il" target="_blank">
						<div class="bh-logo"></div>
					</a>
				</div>';

	// return
	return $output;
}
add_shortcode( 'bh-logo', 'bh_logo' );