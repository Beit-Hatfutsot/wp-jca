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

	JCA_register_taxonomy_occupation();

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
function JCA_register_taxonomy_occupation() {

	$labels = array(
		'name'							=> 'Occupations',
		'singular_name'					=> 'Occupation',
		'menu_name'						=> 'Occupations',
		'all_items'						=> 'All Occupations',
		'edit_item'						=> 'Edit Occupation',
		'view_item'						=> 'View Occupation',
		'update_item'					=> 'Update Occupation',
		'add_new_item'					=> 'Add New Occupation',
		'new_item_name'					=> 'New Occupation Name',
		'parent_item'					=> 'Parent Occupation',
		'parent_item_colon'				=> 'Parent Occupation:',
		'search_items'					=> 'Search Occupations',
		'popular_items'					=> 'Popular Occupations',
		'separate_items_with_commas'	=> 'Separate Occupations with commas',
		'add_or_remove_items'			=> 'Add or remove Occupations',
		'choose_from_most_used'			=> 'Choose from the most used Occupations',
		'not_found'						=> 'No Occupations found'
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
	
	$screen = get_current_screen();
	global $wp_query;
	
	if ( $screen->post_type == 'person' ) {
		$taxonomies = array(
			'occupation'	=> 'Occupations'
		);
	}

	if ( $screen->post_type == 'person' ) {
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