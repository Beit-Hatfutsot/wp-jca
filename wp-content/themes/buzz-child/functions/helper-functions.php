<?php
/**
 * Helper functions
 *
 * @author		Nir Goldberg
 * @package		functions
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * JCA_communities_sort
 *
 * Sort communities array (used for map page template / communities list presentation)
 *
 * @param	$a (array)
 * @param	$b (array)
 * @return	(int)
*/
function JCA_communities_sort($a, $b) {
	return strcmp( $a['title'], $b['title'] );
}