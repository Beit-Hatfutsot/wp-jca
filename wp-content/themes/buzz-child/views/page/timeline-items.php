<?php
/**
 * Timeline items
 *
 * Display timeline items
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $timeline_items;

if ( ! $timeline_items )
	return;

foreach ($timeline_items as $posts) {
	if ($posts) {
		foreach ($posts as $p) {
			// get timeline items
			$t_items = get_field('acf-timeline-items', $p->ID);

			if ($t_items) {

				echo '<div class="timeline-list" data-timeline-list-id="' . $p->ID . '">';

					foreach ($t_items as $item) {
						$title		= $item['title'];
						$content	= $item['content'];

						echo '<div class="timeline-item">';
							echo '<div class="item-title">' . $title . '</div>';
							echo '<div class="item-content">' . $content . '</div>';
						echo '</div>';
					}

				echo '</div>';

			}
		}
	}
}