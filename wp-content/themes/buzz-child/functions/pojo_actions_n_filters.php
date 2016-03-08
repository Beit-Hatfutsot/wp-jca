<?php
/**
 * Pojo Actions and Filters
 *
 * @author		Nir Goldberg
 * @package		functions
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * JCA_set_js_vars
 *
 * Set JS variables
 *
 * @param	N/A
 * @return	N/A
 */
function JCA_set_js_vars() {

	$current_language	= get_locale();
	$bh_siteurl			= 'http://www.bh.org.il/';

	if ($current_language == 'he_IL') {
		$bh_siteurl .= 'he/';
	}

	?>
		<script>
			_JCA_bh_siteurl = '<?php echo $bh_siteurl; ?>';
		</script>
	<?php

}
add_action('pojo_get_end_layout', 'JCA_set_js_vars');