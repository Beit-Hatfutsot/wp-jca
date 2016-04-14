<?php
/**
 * Timeline data
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $timezone, $timeline_items;

$timezone		= get_field('acf-timeline-timezone');
$timeline_items	= array();

if ( ! $timezone )
	return;

// initiate $timeline_items
get_template_part('content/timeline', 'items');

if ( ! $timeline_items )
	return;

// display timezones
get_template_part('views/page/timeline', 'timezones');

// display timeline items
get_template_part('views/page/timeline', 'items');