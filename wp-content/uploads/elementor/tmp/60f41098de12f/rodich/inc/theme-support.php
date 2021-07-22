<?php
/*
 * All theme related setups here.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Set content width */
if ( ! isset( $content_width ) ) $content_width = 1170;

/* Register menu */
register_nav_menus( array(
	'primary' => esc_html__( 'Main Navigation', 'rodich' ),
	'onepage' => esc_html__( 'Onepage Navigation', 'rodich' ),
	'sidemenu' => esc_html__( 'Side Navigation', 'rodich' ),
	'footermenu' => esc_html__( 'Footer Navigation', 'rodich' )
) );

/* Thumbnails */
add_theme_support( 'post-thumbnails' );
add_image_size( 'rodich-featured-image-lg', 820, 450, true );
add_image_size( 'rodich-featured-image-md', 555, 343, true );
add_image_size( 'rodich-featured-image-sm', 365, 220, true );
add_image_size( 'rodich-featured-image-foodmenu', 370, 360, true );

/* Post formats */
add_theme_support( 'post-formats', array('image') );

/* Feeds */
add_theme_support( 'automatic-feed-links' );

/* Add support for Title Tag. */
add_theme_support( 'title-tag' );

/* HTML5 */
add_theme_support( 'html5', array( 'gallery', 'caption' ) );

/* Woocommerce Support */
add_theme_support( 'woocommerce' );

/* Extend wp_title */
if( ! function_exists( 'rodich_theme_wp_title' ) ) {
	function rodich_theme_wp_title( $title, $sep ) {
	 global $paged, $page;

	 if ( is_feed() )
	  return $title;

	 // Add the site name.
	 $site_name = get_bloginfo( 'name' );

	 // Add the site description for the home/front page.
	 $site_description = get_bloginfo( 'description', 'display' );
	 if ( $site_description && ( is_front_page() ) )
	  $title = "$site_name $sep $site_description";

	 // Add a page number if necessary.
	 if ( $paged >= 2 || $page >= 2 )
	  $title = "$site_name $sep" . sprintf( esc_html__( ' Page %s', 'rodich' ), max( $paged, $page ) );

	 return $title;
	}
	add_filter( 'wp_title', 'rodich_theme_wp_title', 10, 2 );
}

/* Languages */
if( ! function_exists( 'rodich_theme_language_setup' ) ) {
	function rodich_theme_language_setup(){
	  load_theme_textdomain( 'rodich', get_template_directory() . '/languages' );
	}
	add_action('after_setup_theme', 'rodich_theme_language_setup');
}

/* Slider Revolution Theme Mode */
if(function_exists( 'set_revslider_as_theme' )){
	add_action( 'init', 'rodich_theme_revslider' );
	function rodich_theme_revslider() {
		set_revslider_as_theme();
	}
}

/* Visual Composer Theme Mode */
if(function_exists('vc_set_as_theme')) vc_set_as_theme();