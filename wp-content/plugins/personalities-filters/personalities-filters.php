<?php
/**
 * Plugin Name: Personalities Filters
 * Plugin URI: http://www.htmline.com/
 * Description: Personalities Filters - Widget for JCA project
 * Version: 1.0 
 * Author: Nir Goldberg 
 * Author URI: http://www.htmline.com/
 * License: GPLv2+
 * Text Domain: pf
 * Domain Path: /lang
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists('pf') ) :

class pf {

	var $settings;

	/**
	 * __construct
	 *
	 * A dummy constructor to ensure PF is only initialized once
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function __construct() {

		/* Do nothing here */

	}

	/**
	 * initialize
	 *
	 * The real constructor to initialize PF
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function initialize() {

		$this->settings = array(
			// basic
			'name'			=> __('Personalities Filters', 'pf'),
			'version'		=> '1.0',

			// urls
			'basename'		=> plugin_basename( __FILE__ ),
			'path'			=> plugin_dir_path( __FILE__ ),		// with trailing slash
			'dir'			=> plugin_dir_url( __FILE__ ),		// with trailing slash

			// options
			'capability'	=> 'manage_options',
			'debug'			=> false
		);

		// include helpers
		include_once('api/api-helpers.php');

		// functions
		pf_include('includes/pf-hooks.php');
		pf_include('includes/pf-functions.php');

		// widgets
		pf_include('widgets/pf/pf-widget.php');
		pf_include('widgets/pf/pf-widget-front.php');

		// actions
		add_action( 'init',	array($this, 'init'), 5 );
		add_action( 'init',	array($this, 'register_assets'), 5 );

		// plugin activation / deactivation
		register_activation_hook( __FILE__,		array( $this, 'pf_install' ) );
		register_deactivation_hook( __FILE__,	array( $this, 'pf_uninstall' ) );

	}

	/**
	 * init
	 *
	 * This function will run after all plugins and theme functions have been included
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function init() {

		// exit if called too early
		if ( ! did_action('plugins_loaded') )
			return;

		// exit if already init
		if( pf_get_setting('init') )
			return;

		// only run once
		pf_update_setting('init', true);

		// redeclare dir - allow another plugin to modify dir
		pf_update_setting( 'dir', plugin_dir_url( __FILE__ ) );

		// set text domain
		load_textdomain( 'pf', pf_get_path( 'lang/pf-' . get_locale() . '.mo' ) );

		// action for 3rd party
		do_action('pf/init');

	}

	/**
	 * register_assets
	 *
	 * This function will register scripts and styles
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function register_assets() {

		// vars
		$version	= pf_get_setting('version');
		$lang		= get_locale();
		$scripts	= array();
		$styles		= array();

		// append scripts
		$scripts['pf'] = array(
			'src'	=> pf_get_dir('assets/js/pf.min.js'),
			'deps'	=> array('jquery')
		);

		// register scripts
		foreach ( $scripts as $handle => $script ) {

			wp_register_script( $handle, $script['src'], $script['deps'], $version );

		}

		// enqueue scripts
		wp_enqueue_script('pf');

		// append styles
		$styles['pf'] = array(
			'src'	=> pf_get_dir('assets/css/pf.css'),
			'deps'	=> false
		);

		$styles['pf-rtl'] = array(
			'src'	=> pf_get_dir('assets/css/pf-rtl.css'),
			'deps'	=> false
		);

		// register styles
		foreach( $styles as $handle => $style ) {

			wp_register_style( $handle, $style['src'], $style['deps'], $version );

		}

		// enqueue scripts
		wp_enqueue_style('pf');

		// enqueue style for RTL locale
		if ( is_rtl() ) {
			wp_enqueue_style('pf-rtl');
		}

	}

	/**
	 * template_path
	 *
	 * Get the template path
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		(string)
	 */
	public function template_path() {

		return apply_filters( 'pf_template_path', 'pf/templates/' );

	}

	/**
	 * pf_install
	 *
	 * Actions perform on activation of plugin
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function pf_install() {}

	/**
	 * pf_uninstall
	 *
	 * Actions perform on deactivation of plugin
	 *
	 * @since		1.0
	 * @param		N/A
	 * @return		N/A
	 */
	function pf_uninstall() {}

}

/**
 * pf
 *
 * The main function responsible for returning the one true pf Instance
 *
 * @since	1.0
 * @param	N/A
 * @return	(object)
 */
function pf() {

	global $pf;

	if( ! isset($pf) ) {

		$pf = new pf();

		$pf->initialize();

	}

	// return
	return $pf;

}

// initialize
pf();

endif; // class_exists check