<?php
/**
 * PF - hooks
 *
 * @author 		Nir Goldberg
 * @package 	includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'init', 'pf_init_personalities', 10 );