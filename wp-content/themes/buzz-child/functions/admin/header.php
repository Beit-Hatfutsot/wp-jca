<?php
/**
 * Admin header functions
 *
 * @author		Nir Goldberg
 * @package		functions/admin
 * @version		1.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * JCA_login_screen
 *
 * This function tweaks login screen
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_login_screen() {

	wp_enqueue_style( 'admin-login' );

}
add_action( 'login_head', 'JCA_login_screen' );

/**
 * JCA_login_logo_url
 *
 * This function tweaks login header URL
 *
 * @param	N/A
 * @return	(string)
 */
function JCA_login_logo_url() {

	// return
	return HOME;

}
add_filter( 'login_headerurl', 'JCA_login_logo_url' );

/**
 * BH_login_logo_url_title
 *
 * This function tweaks login header title
 *
 * @param	N/A
 * @return	(string)
 */
function JCA_login_logo_url_title() {

	// return
	return get_bloginfo( 'name' );

}
add_filter( 'login_headertitle', 'JCA_login_logo_url_title' );