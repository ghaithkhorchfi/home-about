<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'rodich_vt_scripts_styles' ) ) {
  function rodich_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', RODICH_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'lightgallery', RODICH_CSS .'/lightgallery.min.css', array(), '1.3.6', 'all' );
    wp_enqueue_style( 'own-carousel', RODICH_CSS .'/owl.carousel.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'bootstrap-datepicker', RODICH_CSS .'/bootstrap-datepicker.min.css', array(), '1.6.4', 'all' );
    wp_enqueue_style( 'bootstrap-rating', RODICH_CSS .'/bootstrap-rating.css', array(), RODICH_VERSION, 'all' );
    wp_enqueue_style( 'bootstrap-timepicker', RODICH_CSS .'/bootstrap-timepicker.min.css', array(), RODICH_VERSION, 'all' );
    wp_enqueue_style( 'bootstrap', RODICH_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'rodich-colors', RODICH_CSS .'/colors.css', array(), RODICH_VERSION, 'all' );
    wp_enqueue_style( 'rodich-style', RODICH_CSS .'/styles.css', array(), RODICH_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap', RODICH_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'rodich-plugins', RODICH_SCRIPTS . '/plugins.js', array( 'jquery' ), RODICH_VERSION, true );
    wp_enqueue_script( 'rodich-scripts', RODICH_SCRIPTS . '/scripts.js', array( 'jquery' ), RODICH_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', RODICH_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    wp_enqueue_style( 'rodich-responsive', RODICH_CSS .'/responsive.css', array(), RODICH_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'rodich_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'rodich_vt_admin_scripts_styles' ) ) {
  function rodich_vt_admin_scripts_styles() {

    wp_enqueue_style( 'rodich-admin-main', RODICH_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'rodich-admin-scripts', RODICH_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'rodich_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'rodich_vt_wp_enqueue_styles' ) ) {
  function rodich_vt_wp_enqueue_styles() {
    rodich_vt_google_fonts();
    add_action( 'wp_head', 'rodich_vt_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'rodich_vt_wp_enqueue_styles' );
}
