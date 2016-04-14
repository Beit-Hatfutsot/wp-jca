<?php
/**
 * Timeline items
 *
 * Initiate $timeline_items
 *
 * @author 		Nir Goldberg
 * @package 	content
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $timezone, $timeline_items;

if ( ! $timezone )
	return;

// get timezones
$args = array(
	'taxonomy'		=> 'timezone',
	'hide_empty'	=> false,
	'parent'		=> $timezone
);
$timezones = get_terms( $args );

if ( ! $timezones )
	return;

// initiate $timeline_items with array of timezones
foreach ($timezones as $t) {
	$timeline_items[$t->term_id] = array();
}

// get timeline posts
$args = array(
	'post_type'			=> 'timeline',
	'posts_per_page'	=> -1,
	'no_found_rows'		=> true,
	'orderby'			=> 'menu_order',
	'order'				=> 'ASC',
	'tax_query' => array(
		array(
			'taxonomy'	=> 'timezone',
			'field'		=> 'id',
			'terms'		=> $timezone
		),
	)
);
$query = new WP_Query($args);

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

	// get timezones associated with this post
	$timezones = wp_get_post_terms($post->ID, 'timezone');

	if ($timezones) {
		foreach ($timezones as $t) {
			// skip if it's a parent term
			if ( $t->parent == 0 || ! array_key_exists($t->term_id, $timeline_items) )
				continue;

			$timeline_items[$t->term_id][] = $post;
		}
	}

endwhile; endif; wp_reset_postdata();