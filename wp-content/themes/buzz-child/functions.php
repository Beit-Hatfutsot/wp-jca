<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Put your custom code here.

// config
require_once('functions/config.php');

// pojo actions & filters
require_once('functions/pojo_actions_n_filters.php');

// scripts & styles
require_once('functions/scripts-n-styles.php');

// acf
require_once('functions/acf.php');

// gtm
require_once('functions/gtm.php');

// shortcodes
require_once('functions/shortcodes.php');

// post-types
require_once('functions/post-types.php');

// taxonomies
require_once('functions/taxonomies.php');

// sidebars
require_once('functions/sidebars.php');

// helper functions
require_once('functions/helper-functions.php');