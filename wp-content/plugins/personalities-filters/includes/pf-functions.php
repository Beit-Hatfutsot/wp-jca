<?php
/**
 * PF - functions
 *
 * @author 		Nir Goldberg
 * @package 	includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * pf_init_personalities
 *
 * Init $pf_letters and $pf_persons global arrays
 *
 * @param	N/A
 * @return	N/A
 */
function pf_init_personalities() {

	global $pf_letters, $pf_persons;

	$current_lang = get_locale();

	if ($current_lang == 'he_IL') {
		$pf_letters = array( 'א','ב','ג','ד','ה','ו','ז','ח','ט','י','כ','ל','מ','נ','ס','ע','פ','צ','ק','ר','ש','ת' );
	}
	else {
		$pf_letters = range( 'A', 'Z' );
	}

	foreach ($pf_letters as $l) {
		$pf_persons[] = array(
			'letter'	=> $l,
			'data'		=> array()
		);
	}

}