<?php
/**
 * sidebar-footer.php -> Pojo overridden file
 *
 * @author 		Nir Goldberg
 * @package 	functions
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// get variables
if( class_exists('acf') ) {
	$credit = get_field('acf-footer_credit', 'option');
}

?>

<div id="footer-widgets">

	<?php if ($credit) : ?>

		<div class="jca-credit">
			<?php echo $credit; ?>
		</div>

	<?php endif; ?>

	<?php if ( is_active_sidebar( 'pojo-' . sanitize_title( 'Footer' ) ) ) : ?>

		<div class="<?php echo WRAP_CLASSES; ?>">
			<div class="<?php echo CONTAINER_CLASSES; ?>">
				<?php dynamic_sidebar( 'pojo-' . sanitize_title( 'Footer' ) ); ?>
			</div>
		</div>

	<?php endif; ?>

</div>