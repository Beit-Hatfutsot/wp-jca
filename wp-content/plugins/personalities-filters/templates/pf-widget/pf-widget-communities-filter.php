<?php
/**
 * pf-widget-communities-filter
 *
 * Display PF widget communities filter
 *
 * Override this template by copying it to yourtheme/pf/templates/pf-widget-communities-filter.php
 *
 * @author		Nir Goldberg
 * @package		templates/pf-widget
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$title			= pf_widget_front()->get_attribute('communities_title');
$communities	= pf_widget_front()->get_attribute('communities_filter');

if ( ! $communities )
	return;

?>

<div class="pf-filter pf-communities-filter col-sm-6">

	<?php // filter title ?>
	<div class="pf-filter-title">

		<h3><?php echo $title; ?></h3>

	</div>

	<?php // filter content ?>
	<div class="pf-filter-content">

		<select>
			<option value="0"><?php _e('Choose a community', 'pf'); ?></option>
			<?php foreach ($communities as $name => $title) { ?>
				<option value="<?php echo $name; ?>"><?php echo $title; ?></option>
			<?php } ?>
		</select>

	</div>

</div>