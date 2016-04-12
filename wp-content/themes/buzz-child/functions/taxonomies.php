<?php
/**
 * Custom Taxonomies
 *
 * @author 		Nir Goldberg
 * @package 	functions
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * JCA_register_taxonomies
 *
 * Register taxonomies
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_taxonomies() {

	JCA_register_taxonomy_era();
	JCA_register_taxonomy_occupation();
	JCA_register_taxonomy_timezone();

}
add_action('init', 'JCA_register_taxonomies');

/**
 * JCA_register_taxonomy_occupation
 *
 * Register taxonomy occupation
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_taxonomy_era() {

	$labels = array(
		'name'							=> __('Eras', 'JCA'),
		'singular_name'					=> __('Era', 'JCA'),
		'menu_name'						=> __('Eras', 'JCA'),
		'all_items'						=> __('All Eras', 'JCA'),
		'edit_item'						=> __('Edit Era', 'JCA'),
		'view_item'						=> __('View Era', 'JCA'),
		'update_item'					=> __('Update Era', 'JCA'),
		'add_new_item'					=> __('Add New Era', 'JCA'),
		'new_item_name'					=> __('New Era Name', 'JCA'),
		'parent_item'					=> __('Parent Era', 'JCA'),
		'parent_item_colon'				=> __('Parent Era:', 'JCA'),
		'search_items'					=> __('Search Eras', 'JCA'),
		'popular_items'					=> __('Popular Eras', 'JCA'),
		'separate_items_with_commas'	=> __('Separate Eras with commas', 'JCA'),
		'add_or_remove_items'			=> __('Add or remove Eras', 'JCA'),
		'choose_from_most_used'			=> __('Choose from the most used Eras', 'JCA'),
		'not_found'						=> __('No Eras found', 'JCA')
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
			'slug'						=> 'era',
			'with_front'				=> false
		)
	);
	register_taxonomy('era', array('community', 'synagogue'), $args);

}

/**
 * JCA_register_taxonomy_occupation
 *
 * Register taxonomy occupation
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_taxonomy_occupation() {

	$labels = array(
		'name'							=> __('Occupations', 'JCA'),
		'singular_name'					=> __('Occupation', 'JCA'),
		'menu_name'						=> __('Occupations', 'JCA'),
		'all_items'						=> __('All Occupations', 'JCA'),
		'edit_item'						=> __('Edit Occupation', 'JCA'),
		'view_item'						=> __('View Occupation', 'JCA'),
		'update_item'					=> __('Update Occupation', 'JCA'),
		'add_new_item'					=> __('Add New Occupation', 'JCA'),
		'new_item_name'					=> __('New Occupation Name', 'JCA'),
		'parent_item'					=> __('Parent Occupation', 'JCA'),
		'parent_item_colon'				=> __('Parent Occupation:', 'JCA'),
		'search_items'					=> __('Search Occupations', 'JCA'),
		'popular_items'					=> __('Popular Occupations', 'JCA'),
		'separate_items_with_commas'	=> __('Separate Occupations with commas', 'JCA'),
		'add_or_remove_items'			=> __('Add or remove Occupations', 'JCA'),
		'choose_from_most_used'			=> __('Choose from the most used Occupations', 'JCA'),
		'not_found'						=> __('No Occupations found', 'JCA')
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
			'slug'						=> 'occupation',
			'with_front'				=> false
		)
	);
	register_taxonomy('occupation', 'person', $args);

}

/**
 * JCA_register_taxonomy_timezone
 *
 * Register taxonomy timezone
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_taxonomy_timezone() {

	$labels = array(
		'name'							=> __('Timezones', 'JCA'),
		'singular_name'					=> __('Timezone', 'JCA'),
		'menu_name'						=> __('Timezones', 'JCA'),
		'all_items'						=> __('All Timezones', 'JCA'),
		'edit_item'						=> __('Edit Timezone', 'JCA'),
		'view_item'						=> __('View Timezone', 'JCA'),
		'update_item'					=> __('Update Timezone', 'JCA'),
		'add_new_item'					=> __('Add New Timezone', 'JCA'),
		'new_item_name'					=> __('New Timezone Name', 'JCA'),
		'parent_item'					=> __('Parent Timezone', 'JCA'),
		'parent_item_colon'				=> __('Parent Timezone:', 'JCA'),
		'search_items'					=> __('Search Timezones', 'JCA'),
		'popular_items'					=> __('Popular Timezones', 'JCA'),
		'separate_items_with_commas'	=> __('Separate Timezones with commas', 'JCA'),
		'add_or_remove_items'			=> __('Add or remove Timezones', 'JCA'),
		'choose_from_most_used'			=> __('Choose from the most used Timezones', 'JCA'),
		'not_found'						=> __('No Timezones found', 'JCA')
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
			'slug'						=> 'timezone',
			'with_front'				=> false
		)
	);
	register_taxonomy('timezone', 'timeline', $args);

}

// add filter option for admin columns
class taxonomies_filter_walker extends Walker_CategoryDropdown {

	function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {

		$pad = str_repeat('&nbsp;', $depth * 3);
		$cat_name = apply_filters('list_cats', $category->name, $category);
		
		if( !isset($args['value']) ){
			$args['value'] = ( $category->taxonomy != 'category' ? 'slug' : 'id' );
		}
		
		$value = ( $args['value'] == 'slug' ? $category->slug : $category->term_id );
		
		$output .= "\t<option class=\"level-$depth\" value=\"" . $value . "\"";
		if ( $value === (string) $args['selected'] ) {
			$output .= ' selected="selected"';
		}
		$output .= '>';
		$output .= $pad . $cat_name;
		if ( $args['show_count'] )
			$output .= '&nbsp;&nbsp;(' . $category->count . ')';
			
		$output .= "</option>\n";

	}

}

/**
 * taxonomies_filter_list
 *
 * Build taxonomies filters for Persons edit screen
 *
 * @param	N/A
 * @return	N/A
 */
function taxonomies_filter_list() {

	if ( ! is_admin() ) return;
	
	global $wp_query;

	$screen		= get_current_screen();
	$taxonomies	= array();

	if ( $screen->post_type == 'community' ) {
		$taxonomies = array(
			'era'	=> 'Eras'
		);
	}
	else if ( $screen->post_type == 'person' ) {
		$taxonomies = array(
			'occupation'	=> 'Occupations'
		);
	}
	else if ( $screen->post_type == 'synagogue' ) {
		$taxonomies = array(
			'era'	=> 'Eras'
		);
	}
	else if ( $screen->post_type == 'timeline' ) {
		$taxonomies = array(
			'timezone'	=> 'Timezones'
		);
	}

	if ($taxonomies) {
		foreach ($taxonomies as $slug => $name) :
		
			$args = array(
				'show_option_all'	=> 'Show All ' . $name,
				'taxonomy'			=> $slug,
				'name'				=> $slug,
				'orderby'			=> 'name',
				'selected'			=> ( isset( $wp_query->query[$slug] ) ? $wp_query->query[$slug] : '' ),
				'hierarchical'		=> true,
				'show_count'		=> true,
				'hide_empty'		=> false,
				'walker'			=> new taxonomies_filter_walker(),
				'value'				=> 'slug'
			);
			wp_dropdown_categories($args);
			
		endforeach;
	}

}
add_action('restrict_manage_posts', 'taxonomies_filter_list');

/**
 * Add custom admin columns
 */

/**
 * person_subpannel_columns
 *
 * Add columns to post subpannel
 *
 * @param	$columns (array)
 * @return	(array)
 */
function person_subpannel_columns($columns) {

	$person_columns = array(
		'first_name'	=> 'First Name',
		'last_name'		=> 'Last Name',
		'year_of_birth'	=> 'Year of Birth',
		'year_of_death'	=> 'Year of Death'
	);

	$columns = array_merge(
		array_slice($columns, 0, -1),	// before
		$person_columns,				// inserted
		array_slice($columns, -1)		// after
	);

	// return
	return $columns;

}
add_filter('manage_person_posts_columns', 'person_subpannel_columns');

/**
 * person_subpannel_columns_values
 *
 * Add columns values to post subpannel
 *
 * @param	$columns (array)
 * @param	$post_id (int)
 * @return	N/A
 */
function person_subpannel_columns_values($columns, $post_id) {

	if ( ! class_exists('acf') )
		return;

	global $post;

	$columns_arr = array('first_name', 'last_name', 'year_of_birth', 'year_of_death');

	if ( in_array($columns, $columns_arr) ) {
		$value = get_field('acf-person-' . $columns, $post->ID);
		echo $value;
	}

}
add_action('manage_person_posts_custom_column', 'person_subpannel_columns_values', 10, 2);