<?php
/**
 * Synagogue data
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $era, $synagogues;

$era		= get_field('acf-synagogues-era');
$synagogues	= array();

if ( ! $era )
	return;

// initiate $synagogues
get_template_part('content/synagogue', 'items');

if ( ! $synagogues )
	return;

// display page content
echo apply_filters('the_content', $post->post_content);

// display synagogues
get_template_part('views/page/synagogue', 'items');