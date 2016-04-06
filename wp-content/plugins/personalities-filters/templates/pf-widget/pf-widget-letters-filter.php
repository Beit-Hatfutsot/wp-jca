<?php
/**
 * pf-widget-letters-filter
 *
 * Display PF widget letters filter
 *
 * Override this template by copying it to yourtheme/pf/templates/pf-widget-letters-filter.php
 *
 * @author		Nir Goldberg
 * @package		templates/pf-widget
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $pf_letters;

?>

<div class="pf-filter pf-letters-filter clearfix">

	<?php // filter content ?>
	<div class="pf-filter-content">

		<ul>
			<?php foreach ($pf_letters as $l) { ?>
				<li><span><?php echo $l; ?></span></li>
			<?php } ?>
		</ul>

	</div>

</div>