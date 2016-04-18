<?php
/**
 * Synagogue items
 *
 * Display synagogue items
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $synagogues;

if ( ! $synagogues )
	return;

echo '<ul class="synagogue-list">';

foreach ($synagogues as $p) {

	echo '<li>';
		echo '<h3 class="synagogue-title">' . $p->post_title . '</h3>';
		echo '<div class="synagogue-content">' . apply_filters('the_content', $p->post_content) . '</div>';
	echo '</li>';

}

echo '</ul>';