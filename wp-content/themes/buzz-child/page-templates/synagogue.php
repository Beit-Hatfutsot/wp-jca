<?php
/**
 * Template Name: Synagogue
 *
 * @author 		Nir Goldberg
 * @package 	page-templates
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php do_action( 'pojo_get_start_layout', 'single', get_post_type(), '' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-page">
		<?php if ( po_breadcrumbs_need_to_show() || pojo_is_show_page_title() ) : ?>
			<header class="entry-header">
				<?php if ( po_breadcrumbs_need_to_show() ) : ?>
					<?php pojo_breadcrumbs(); ?>
				<?php endif; ?>
				<?php if ( pojo_is_show_page_title() ) : ?>
					<div class="page-title">
						<h1><?php the_title(); ?></h1>
					</div>
				<?php endif; ?>
			</header>
		<?php endif; ?>
		<div class="entry-content">

			<?php if ( class_exists('acf') ) {
				get_template_part('views/page/synagogue');
			} ?>

		</div>
	</div>
</article>

<?php do_action( 'pojo_get_end_layout', 'single', get_post_type(), '' ); ?>

<?php get_footer(); ?>