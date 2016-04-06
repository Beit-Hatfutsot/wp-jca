<?php
/**
 * pf-widget-occupations-filter
 *
 * Display PF widget occupations filter
 *
 * Override this template by copying it to yourtheme/pf/templates/pf-widget-occupations-filter.php
 *
 * @author		Nir Goldberg
 * @package		templates/pf-widget
 * @version		1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$title			= pf_widget_front()->get_attribute('occupations_title');
$occupations	= pf_widget_front()->get_attribute('occupations_filter');

if ( ! $occupations )
	return;

?>

<div class="pf-filter pf-occupations-filter col-sm-4">

	<?php // filter title ?>
	<div class="pf-filter-title">

		<h3><?php echo $title; ?></h3>

	</div>

	<?php // filter content ?>
	<div class="pf-filter-content">

		<select>
			<option value="0"><?php _e('Choose an occupation', 'pf'); ?></option>
			<?php foreach ($occupations as $o) { ?>
				<option value="<?php echo $o->slug; ?>"><?php echo $o->name; ?></option>
			<?php } ?>
		</select>

	</div>

</div>