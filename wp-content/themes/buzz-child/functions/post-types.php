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
	JCA_register_posttype_synagogue();
	JCA_register_posttype_timeline();

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
		'name'					=> __('Communities', 'JCA'),
		'singular_name'			=> __('Community', 'JCA'),
		'menu_name'				=> __('Communities', 'JCA'),
		'all_items'				=> __('All Communities', 'JCA'),
		'add_new'				=> __('Add New', 'JCA'),
		'add_new_item'			=> __('Add New Community', 'JCA'),
		'edit_item'				=> __('Edit Community', 'JCA'),
		'new_item'				=> __('New Community', 'JCA'),
		'view_item'				=> __('View Community', 'JCA'),
		'search_items'			=> __('Search Communities', 'JCA'),
		'not_found'				=> __('No Communities Found', 'JCA'),
		'not_found_in_trash'	=> __('No Communities Found in Trash', 'JCA')
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
		'name'					=> __('Persons', 'JCA'),
		'singular_name'			=> __('Person', 'JCA'),
		'menu_name'				=> __('Persons', 'JCA'),
		'all_items'				=> __('All Persons', 'JCA'),
		'add_new'				=> __('Add New', 'JCA'),
		'add_new_item'			=> __('Add New Person', 'JCA'),
		'edit_item'				=> __('Edit Person', 'JCA'),
		'new_item'				=> __('New Person', 'JCA'),
		'view_item'				=> __('View Person', 'JCA'),
		'search_items'			=> __('Search Persons', 'JCA'),
		'not_found'				=> __('No Persons Found', 'JCA'),
		'not_found_in_trash'	=> __('No Persons Found in Trash', 'JCA')
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
		'menu_position'			=> 21,
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

/**
 * JCA_register_posttype_synagogue
 *
 * Register post type synagogue
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_posttype_synagogue() {

	$labels = array(
		'name'					=> __('Synagogues', 'JCA'),
		'singular_name'			=> __('Synagogue', 'JCA'),
		'menu_name'				=> __('Synagogues', 'JCA'),
		'all_items'				=> __('All Synagogues', 'JCA'),
		'add_new'				=> __('Add New', 'JCA'),
		'add_new_item'			=> __('Add New Synagogue', 'JCA'),
		'edit_item'				=> __('Edit Synagogue', 'JCA'),
		'new_item'				=> __('New Synagogue', 'JCA'),
		'view_item'				=> __('View Synagogue', 'JCA'),
		'search_items'			=> __('Search Synagogues', 'JCA'),
		'not_found'				=> __('No Synagogues Found', 'JCA'),
		'not_found_in_trash'	=> __('No Synagogues Found in Trash', 'JCA')
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
		'menu_position'			=> 22,
		'menu_icon'				=> 'dashicons-building',
		'capability_type'		=> 'post',
		'hierarchical'			=> true,
		'supports'				=> array('title', 'editor', 'revisions'),
		'taxonomies'			=> array(),
		'has_archive'			=> true,
		'rewrite'				=> array('slug' => 'synagogue', 'with_front' => false),
		'query_var'				=> true
	);
	register_post_type('synagogue', $args);

}

/**
 * JCA_register_posttype_timeline
 *
 * Register post type timeline
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_register_posttype_timeline() {

	$labels = array(
		'name'					=> __('Timeline Items', 'JCA'),
		'singular_name'			=> __('Timeline Item', 'JCA'),
		'menu_name'				=> __('Timeline', 'JCA'),
		'all_items'				=> __('All Timeline Items', 'JCA'),
		'add_new'				=> __('Add New', 'JCA'),
		'add_new_item'			=> __('Add New Timeline Item', 'JCA'),
		'edit_item'				=> __('Edit Timeline Item', 'JCA'),
		'new_item'				=> __('New Timeline Item', 'JCA'),
		'view_item'				=> __('View Timeline Item', 'JCA'),
		'search_items'			=> __('Search Timeline Items', 'JCA'),
		'not_found'				=> __('No Timeline Items Found', 'JCA'),
		'not_found_in_trash'	=> __('No Timeline Items Found in Trash', 'JCA')
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
		'menu_position'			=> 23,
		'menu_icon'				=> 'dashicons-schedule',
		'capability_type'		=> 'post',
		'hierarchical'			=> true,
		'supports'				=> array('title', 'editor', 'revisions'),
		'taxonomies'			=> array(),
		'has_archive'			=> true,
		'rewrite'				=> array('slug' => 'timeline', 'with_front' => false),
		'query_var'				=> true
	);
	register_post_type('timeline', $args);

}