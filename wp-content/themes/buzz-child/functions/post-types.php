<?php
/**
 * Custom Post Types
 *
 * @author 		Nir Goldberg
 * @package 	functions
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * JCA_register_posttypes
 *
 * Register post types
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_posttypes() {

	JCA_register_posttype_community();
	JCA_register_posttype_person();

}
add_action('init', 'JCA_register_posttypes');

/**
 * JCA_register_posttype_community
 *
 * Register post type community
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_posttype_community() {

	$labels = array(
		'name'					=> 'Communities',
		'singular_name'			=> 'Community',
		'menu_name'				=> 'Communities',
		'all_items'				=> 'All Communities',
		'add_new'				=> 'Add New',
		'add_new_item'			=> 'Add New Community',
		'edit_item'				=> 'Edit Community',
		'new_item'				=> 'New Community',
		'view_item'				=> 'View Community',
		'search_items'			=> 'Search Communities',
		'not_found'				=> 'No Communities Found',
		'not_found_in_trash'	=> 'No Communities Found in Trash'
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> true,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-groups',
		'capability_type'		=> 'post',
		'hierarchical'			=> true,
		'supports'				=> array('title', 'editor', 'revisions'),
		'taxonomies'			=> array(),
		'has_archive'			=> true,
		'rewrite'				=> array('slug' => 'community', 'with_front' => false),
		'query_var'				=> true
	);
	register_post_type('community', $args);

}

/**
 * JCA_register_posttype_person
 *
 * Register post type person
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_posttype_person() {

	$labels = array(
		'name'					=> 'Persons',
		'singular_name'			=> 'Person',
		'menu_name'				=> 'Persons',
		'all_items'				=> 'All Persons',
		'add_new'				=> 'Add New',
		'add_new_item'			=> 'Add New Person',
		'edit_item'				=> 'Edit Person',
		'new_item'				=> 'New Person',
		'view_item'				=> 'View Person',
		'search_items'			=> 'Search Persons',
		'not_found'				=> 'No Persons Found',
		'not_found_in_trash'	=> 'No Persons Found in Trash'
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_nav_menus'		=> true,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-businessman',
		'capability_type'		=> 'post',
		'hierarchical'			=> true,
		'supports'				=> array('title', 'editor', 'revisions'),
		'taxonomies'			=> array(),
		'has_archive'			=> true,
		'rewrite'				=> array('slug' => 'person', 'with_front' => false),
		'query_var'				=> true
	);
	register_post_type('person', $args);

}