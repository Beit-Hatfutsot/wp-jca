<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<article id="post-0" class="post no-results not-found hentry">
	<div class="entry-page">
		<?php
		$pojo_404_page_id = get_theme_mod( 'pojo_404_page_id', 0 );
		if ( ! empty ( $pojo_404_page_id ) ) :
			if ( ! Pojo_Core::instance()->builder->display_builder( $pojo_404_page_id ) ) :
				$post_content = get_post_field( 'post_content', $pojo_404_page_id );
				echo apply_filters( 'the_content', $post_content );
			endif;
		else : ?>
			<h1><?php _e( '404', 'pojo' ); ?></h1>
			<h2><?php _e( 'Not Found', 'pojo' ); ?></h2>
			<h3><?php _e( 'Sorry, this page could not be found!', 'pojo' ); ?></h3>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</article><!-- #post-0 -->