<?php
/**
 * Google Tag Manager
 *
 * @author		Nir Goldberg
 * @package		functions
 * @version		1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * gtm_head
 *
 * This function displays the GTM head part
 *
 * @since		1.0.1
 * @param		N/A
 * @return		N/A
 */
function gtm_head() {

	if ( ! defined( 'GTM_ID' ) )
		return;

	echo "<!-- Google Tag Manager -->
		 <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		 new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		 j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		 })(window,document,'script','dataLayer','" . GTM_ID .  "');</script>
		 <!-- End Google Tag Manager -->";

}

/**
 * gtm_body
 *
 * This function displays the GTM body part
 *
 * @since		1.0.1
 * @param		N/A
 * @return		N/A
 */
function gtm_body() {

	if ( ! defined( 'GTM_ID' ) )
		return;

	echo '<!-- Google Tag Manager (noscript) -->
		 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . GTM_ID . '"
		 height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		 <!-- End Google Tag Manager (noscript) -->';

}