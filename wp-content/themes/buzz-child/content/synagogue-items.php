<?php
/**
 * Synagogue items
 *
 * Initiate $synagogues
 *
 * @author 		Nir Goldberg
 * @package 	content
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $era, $synagogues;

if ( ! $era )
	return;

// get synagogue posts
$args = array(
	'post_type'			=> 'synagogue',
	'posts_per_page'	=> -1,
	'no_found_rows'		=> true,
	'orderby'			=> 'title',
	'order'				=> 'ASC',
	'tax_query' => array(
		array(
			'taxonomy'	=> 'era',
			'field'		=> 'id',
			'terms'		=> $era
		),
	)
);
$query = new WP_Query($args);

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

	$synagogues[] = $post;

endwhile; endif; wp_reset_postdata();