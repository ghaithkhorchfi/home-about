<?php
/*
 * Rodich Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'RODICH_THEMEROOT_PATH', get_template_directory() );
define( 'RODICH_THEMEROOT_URI', get_template_directory_uri() );
define( 'RODICH_CSS', RODICH_THEMEROOT_URI . '/assets/css' );
define( 'RODICH_IMAGES', RODICH_THEMEROOT_URI . '/assets/images' );
define( 'RODICH_SCRIPTS', RODICH_THEMEROOT_URI . '/assets/js' );
define( 'RODICH_FRAMEWORK', get_template_directory() . '/inc' );
define( 'RODICH_LAYOUT', get_template_directory() . '/layouts' );
define( 'RODICH_CS_IMAGES', RODICH_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'RODICH_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'RODICH_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$rodich_theme_child = wp_get_theme();
	$rodich_get_parent = $rodich_theme_child->Template;
	$rodich_theme = wp_get_theme($rodich_get_parent);
} else { // Parent Theme Active
	$rodich_theme = wp_get_theme();
}
define('RODICH_NAME', $rodich_theme->get( 'Name' ));
define('RODICH_VERSION', $rodich_theme->get( 'Version' ));
define('RODICH_BRAND_URL', $rodich_theme->get( 'AuthorURI' ));
define('RODICH_BRAND_NAME', $rodich_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( RODICH_FRAMEWORK . '/init.php' );
