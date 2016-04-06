<?php
/**
 * PF - helper functions
 *
 * @author		Nir Goldberg
 * @package		api
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * pf_get_setting
 *
 * This function will return a value from the settings array found in the pf object
 *
 * @since		1.0
 * @param		$name (string) the setting name to return
 * @return		(mixed)
 */
function pf_get_setting( $name, $default = null ) {

	// vars
	$settings = pf()->settings;

	// find setting
	$setting = pf_maybe_get( $settings, $name, $default );

	// filter for 3rd party customization
	$setting = apply_filters( "pf/settings/{$name}", $setting );

	// return
	return $setting;

}

/**
 * pf_update_setting
 *
 * This function will update a value into the settings array found in the pf object
 *
 * @since		1.0
 * @param		$name (string) the setting name to update
 * @param		$value (mixed) the setting value to update
 * @return		N/A
 */
function pf_update_setting( $name, $value ) {

	pf()->settings[ $name ] = $value;

}

/**
 * pf_get_path
 *
 * This function will return the path to a file within the PF plugin folder
 *
 * @since		1.0
 * @param		$path (string) the relative path from the root of the PF plugin folder
 * @return		(string)
 */
function pf_get_path( $path ) {

	return pf_get_setting('path') . $path;

}

/**
 * pf_get_dir
 *
 * This function will return the url to a file within the PF plugin folder
 *
 * @since		1.0
 * @param		$path (string) the relative path from the root of the PF plugin folder
 * @return		(string)
 */
function pf_get_dir( $path ) {

	return pf_get_setting('dir') . $path;

}

/**
 * pf_include
 *
 * This function will include a file
 *
 * @since		1.0
 * @param		$file (string) the file name to be included
 * @return		N/A
 */
function pf_include( $file ) {

	$path = pf_get_path( $file );

	if( file_exists($path) ) {

		include_once( $path );

	}

}

/**
 * pf_maybe_get
 *
 * This function will return a variable if it exists in an array
 *
 * @since		1.0
 * @param		$array (array) the array to look within
 * @param		$key (key) the array key to look for
 * @param		$default (mixed) the value returned if not found
 * @return		(mixed)
 */
function pf_maybe_get( $array, $key, $default = null ) {

	// return default if does not exist
	if( ! isset( $array[ $key ] ) ) {

		return $default;

	}

	// return
	return $array[ $key ];

}

/**
 * pf_get_template_part
 *
 * Get template part
 *
 * @since		1.0
 * @param		$slug (mixed)
 * @param		$name (string)
 * @return		N/A
 */
function pf_get_template_part( $slug, $name = '' ) {

	$template	= '';
	$debug		= pf_get_setting('debug');

	// look in yourtheme/pf/templates/slug-name.php
	if ( $name && ! $debug ) {
		$template = locate_template( pf()->template_path() . "{$slug}-{$name}.php" );
	}

	// get default slug-name.php
	if ( ! $template && $name && file_exists( pf_get_path( "templates/{$slug}-{$name}.php" ) ) ) {
		$template = pf_get_path( "templates/{$slug}-{$name}.php" );
	}

	// if template file doesn't exist, look in yourtheme/pf/templates/slug.php
	if ( ! $template && ! $debug ) {
		$template = locate_template( pf()->template_path() . "{$slug}.php" );
	}

	// get default slug.php
	if ( ! $template && file_exists( pf_get_path( "templates/{$slug}.php" ) ) ) {
		$template = pf_get_path( "templates/{$slug}.php" );
	}

	// allow 3rd party plugin filter template file from their plugin
	if ( ( ! $template && $debug ) || $template ) {
		$template = apply_filters( 'pf_get_template_part', $template, $slug, $name );
	}

	if ( $template ) {
		load_template( $template, false );
	}

}