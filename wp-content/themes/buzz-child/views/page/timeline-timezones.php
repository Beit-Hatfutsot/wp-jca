<?php
/**
 * Timeline timezones
 *
 * Display timezones
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $timeline_items;

if ( ! $timeline_items )
	return;

// generate timezones
$timezones_content		= array();
$sub_timezones_content	= array();
$timezone_width			= 100/count($timeline_items);

foreach ($timeline_items as $timezone_id => $posts) {
	$timezone = get_term_by('id', $timezone_id, 'timezone');

	if ($timezone) {
		$timezones_content[] = '<li data-timezone-id="' . $timezone_id . '" style="width:' . $timezone_width . '%;"><span>' . $timezone->name . '</span>';

		if ($posts) {
			$sub_timezone_width = 100/count($posts);

			$sub_timezones_content[] = '<ul class="sub-timezones clearfix" data-parent-timezone-id="' . $timezone_id . '">';

			foreach ($posts as $p) {
				$sub_timezones_content[] = '<li data-sub-timezone-id="' . $p->ID . '" style="width:' . $sub_timezone_width . '%;"><span>' . $p->post_title . '</span></li>';
			}

			$sub_timezones_content[] = '</ul>';
		}
	}
}

// display timezones

?>

<div class="timezones-wrapper">
	<ul class="timezones clearfix">
		<?php echo implode('', $timezones_content); ?>
	</ul>

	<?php echo implode('', $sub_timezones_content); ?>
</div>