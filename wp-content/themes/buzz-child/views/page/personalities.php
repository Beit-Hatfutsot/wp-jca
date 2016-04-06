<?php
/**
 * Personalities data
 *
 * @author 		Nir Goldberg
 * @package 	views/page
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists('pf') )
	return;

global $pf_letters, $pf_persons;

// personalities filters
get_template_part('views/sidebar/personalities');

// get persons
$args = array(
	'post_type'			=> 'person',
	'posts_per_page'	=> -1,
	'no_found_rows'		=> true,
	'meta_key'			=> 'acf-person-last_name',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC'
);
$query = new WP_Query($args);

if ( $query->have_posts() ) :

	while ( $query->have_posts() ) : $query->the_post();

		include( locate_template('loop/loop-person.php') );

	endwhile;

	// display persons

	?>

	<div class="personalities-data">

		<?php
			foreach ($pf_persons as $key => $value) {
				if ( $value['data'] ) {
					echo '<div class="personalities-index-entry index-entry-' . $key . '">';
						echo '<h2>' . $value['letter'] . '</h2>';

						foreach ($value['data'] as $person) {
							echo $person;
						}
					echo '</div>';
				}
			}
		?>

	</div>

<?php endif;

wp_reset_postdata();