<?php
/**
 * Communities list
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// get map data
global $communities;

if ($communities) {
	usort($communities, 'JCA_communities_sort');

	$i = 0;
	$communities_in_col = ceil( count($communities)/3 );

	echo '<h3>' . __('Communities Quick Links', 'JCA') . ':</h3>';

	echo '<div class="communities-list row">';

		foreach ($communities as $c) {
			echo $i%$communities_in_col == 0 ? '<div class="col-sm-4">' : '';
			echo '<div class="item"><a href="' . $c['link'] . '" target="_blank">' . $c['title'] . '</a></div>';

			$i++;
			echo $i%$communities_in_col == 0 ? '</div>' : '';
		}

		echo $i%$communities_in_col != 0 ? '</div>' : '';

	echo '</div>';
}