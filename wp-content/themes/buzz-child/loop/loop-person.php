<?php
/**
 * Personalities / person loop
 *
 * @author 		Nir Goldberg
 * @package 	loop
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// personal info
$first_name		= get_field('acf-person-first_name');
$last_name		= get_field('acf-person-last_name');
$year_of_birth	= get_field('acf-person-year_of_birth');
$year_of_death	= get_field('acf-person-year_of_death');

if ( ! $first_name || ! $last_name )
	continue;

$index = array_search( mb_substr($last_name, 0, 1, 'utf-8'), $pf_letters );

// occupations
$occupations	= wp_get_post_terms( $post->ID, 'occupation' );

// communities
$communities	= get_field('acf-person-related_communities');

// build person classes
$classes = array('index-entry-' . $index);
if ($occupations) {
	foreach ($occupations as $o) {
		$classes[] = 'occ-' . $o->slug;
	}
}
if ($communities) {
	foreach ($communities as $c) {
		$classes[] = 'com-' . $c->post_name;
	}
}

// build person entry
if ($index !== false) {
	$person =
		'<div class="person ' . implode(' ', $classes) . '">
			<div class="toggle">+</div>
			<h3>' . $last_name . ', ' . $first_name . ' (' . $year_of_birth . '-' . $year_of_death . ')</h3>';

	if ($occupations) {
		$person .= '<div class="person-occupations">' . implode( ', ', array_map(function($o) { return $o->name; }, $occupations) ) . '</div>';
	}

	if ($communities) {
		$person .= '<div class="person-communities">' . implode( ', ', array_map(function($c) { return '<a href="' . get_the_permalink($c->ID) . '" target="_blank">' . $c->post_title . '</a>'; }, $communities) ) . '</div>';
	}

	$person .= '<div class="person-info clearfix">' . apply_filters( 'the_content', get_the_content() ) . '</div></div>';

	// insert person into $pf_persons
	$pf_persons[$index]['data'][] = $person;
}