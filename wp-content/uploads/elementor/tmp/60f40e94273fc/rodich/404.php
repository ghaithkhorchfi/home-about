<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$rodich_error_heading = cs_get_option('error_heading');
$rodich_error_page_content = cs_get_option('error_page_content');
$rodich_error_page_bg = cs_get_option('error_page_bg');
$rodich_error_btn_text = cs_get_option('error_btn_text');

$rodich_error_heading = ( $rodich_error_heading ) ? $rodich_error_heading : esc_html__( 'Sorry! Page Not Found', 'rodich' );
$rodich_error_page_content = ( $rodich_error_page_content ) ? $rodich_error_page_content : esc_html__( 'The link you followed probably broken, or the page has been removed.', 'rodich' );
$rodich_error_page_bg = ( $rodich_error_page_bg ) ? wp_get_attachment_url($rodich_error_page_bg) : RODICH_IMAGES . '/404.png';
$rodich_error_btn_text = ( $rodich_error_btn_text ) ? $rodich_error_btn_text : esc_html__( 'RETURN TO HOME', 'rodich' );

get_header(); ?>

	 <!-- = 404  error area start = \-->
	<section class="roch-error-page-area">
		<div class="container">
			<div class="text-center roch-error-page-content">
				 <!--  404  image start \-->
				<div class="roch-error-image">
					<img src="<?php echo esc_url($rodich_error_page_bg); ?>" alt="<?php esc_html_e('404 Error', 'rodich'); ?>" />
				</div><!--/ end-->

				<!--  404  image text \-->
				<div class="roch-error-text">
					<h2><?php echo esc_attr($rodich_error_heading); ?></h2>
					<p><?php echo esc_attr($rodich_error_page_content); ?></p>
					<a href="<?php echo esc_url(home_url( '/' )); ?>" class="roch-btn roch-btn-active roch-btn-hover-one"><span><?php echo esc_attr($rodich_error_btn_text); ?></span></a>
				</div><!--/ end-->
			</div>
		</div>
	</section>
	<!--/ =XXX 404  error area end XXX=-->

<?php
get_footer();