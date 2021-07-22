<?php
/*
 * All Rodich Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( RODICH_FRAMEWORK . '/theme-support.php' );
require_once( RODICH_FRAMEWORK . '/backend-functions.php' );
require_once( RODICH_FRAMEWORK . '/frontend-functions.php' );
require_once( RODICH_FRAMEWORK . '/enqueue-files.php' );
require_once( RODICH_CS_FRAMEWORK . '/custom-style.php' );
require_once( RODICH_CS_FRAMEWORK . '/config.php' );

/* Install Plugins */
require_once( RODICH_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( RODICH_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( RODICH_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( RODICH_FRAMEWORK . '/core/sidebars.php' );

/* Ajax Product */
require_once( RODICH_FRAMEWORK . '/product-ajax.php' );