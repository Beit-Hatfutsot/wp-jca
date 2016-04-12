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

	$current_lang	= get_locale();
	$bh_siteurl		= 'http://www.bh.org.il/';

	if ($current_lang == 'he_IL') {
		$bh_siteurl .= 'he/';
	}

	$output =	'<div class="shortcode shortcode-bh-logo">
					<a href="' . $bh_siteurl . '" target="_blank">
						<div class="bh-logo"></div>
					</a>
				</div>';

	// return
	return $output;

}
add_shortcode('bh-logo', 'bh_logo');

/**
 * language_switcher
 *
 * Shortcode to display language switcher ([language-switcher])
 *
 * @param	N/A
 * @return	(string)
 */
function language_switcher() {

	if ( ! function_exists('pll_the_languages') )
		return;

	global $post;

	$args = array(
		'echo'						=> 0,
		'hide_if_no_translation'	=> 1,
		'hide_current'				=> 1,
		'post_id'					=> $post->ID
	);
	$languages = pll_the_languages($args);

	if ( ! $languages )
		return;

	$output =	'<div class="shortcode shortcode-language-switcher">
					<span>' . __('Change language', 'JCA') . ':</span>
					<ul>' . $languages . '</ul>
				</div>';

	// return
	return $output;

}
add_shortcode('language-switcher', 'language_switcher');

/**
 * community_synagogues
 *
 * Shortcode to display community synagogues list ([community-synagogues])
 *
 * @param	N/A
 * @return	(string)
 */
function community_synagogues() {

	if ( get_post_type() != 'community' || ! class_exists('acf') )
		return;

	global $post;

	$synagogues = get_field('acf-communities-related_synagogues', $post->ID);

	if ( ! $synagogues )
		return;

	$synagogues_list = array();

	foreach ($synagogues as $s) {
		$synagogues_list[] = '<li><a href="' . get_permalink($s->ID) . '" target="_blank">' . $s->post_title . '</a></li>';
	}

	$output =	'<div class="shortcode shortcode-community-synagogues">
					<h3>' . __('Synagogues', 'JCA') . '</h3>
					<ul>' . implode(' ', $synagogues_list) . '</ul>
				</div>';

	// return
	return $output;

}
add_shortcode('community-synagogues', 'community_synagogues');