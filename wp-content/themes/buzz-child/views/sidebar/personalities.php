<?php
/**
 * Personalities sidebar
 *
 * @author 		Nir Goldberg
 * @package 	views/sidebar
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( is_active_sidebar('personalities') ) {
	echo '<div class="personalities-sidebar">';
		dynamic_sidebar('personalities');
	echo '</div>';
}