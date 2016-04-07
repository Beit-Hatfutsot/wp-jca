<?php
/**
 * Map presentation
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// get map data
$map			= get_field('acf-map_image');
$communities	= get_field('acf-map_communities');

if ( ! $map )
	return;

if ($communities) {
	$communities_mapping = array();

	foreach ($communities as $c) {
		$spot = explode( ',', $c['coordinates'] );
		$communities_mapping[] = '<a xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . $c['link'] . '" xlink:title="' . $c['title'] . '" xlink:show="new"><rect x="' . $spot[0] . '" y="' . $spot[1] . '" fill="#fff" opacity="0" width="' . $spot[2] . '" height="' . $spot[3] . '"></rect></a>';
	}
}

// display map

?>

<div class="communities-map">
	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 <?php echo $map['width']; ?> <?php echo $map['height']; ?>">
		<image width="<?php echo $map['width']; ?>" height="<?php echo $map['height']; ?>" xlink:href="<?php echo $map['url']; ?>"/>

		<?php if ($communities_mapping) {
			echo implode('', $communities_mapping);
		} ?>
	</svg>
</div>