<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

get_header();

// Metabox
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );

if ($rodich_meta) {
	$rodich_content_padding = $rodich_meta['content_spacings'];
	$rodich_content_page_custom_title = $rodich_meta['page_custom_title'];
	$rodich_content_page_custom_subtitle = $rodich_meta['page_custom_subtitle'];
	$rodich_content_banner_type = $rodich_meta['banner_type'];
	$rodich_hide_banner = $rodich_meta['hide_banner'];
	$rodich_banner_bg = $rodich_meta['blog_banner_image'];
	$rodich_title_area_spacings = $rodich_meta['title_area_spacings'];
	$rodich_banner_area_type = $rodich_meta['banner_area_type'];
	$rodich_page_banner_button_active = $rodich_meta['page_banner_button_active'];
	$rodich_page_banner_buttons = $rodich_meta['page_banner_buttons'];
} else {
	$rodich_content_padding = '';
	$rodich_content_page_custom_title = '';
	$rodich_content_page_custom_subtitle = '';
	$rodich_content_banner_type = '';
	$rodich_hide_banner = '';
	$rodich_banner_bg = '';
	$rodich_title_area_spacings = '';
	$rodich_banner_area_type = '';
	$rodich_page_banner_button_active = '';
	$rodich_page_banner_buttons = '';
}

if(!$rodich_hide_banner){
	$rodich_hide_banner = cs_get_option('single_banner_area');
}

if(!$rodich_banner_bg){
	$rodich_banner_bg = cs_get_option('blog_banner_image');
}

// Padding - Metabox
if ($rodich_content_padding && $rodich_content_padding !== 'padding-none') {
	$rodich_content_top_spacings = $rodich_meta['content_top_spacings'];
	$rodich_content_bottom_spacings = $rodich_meta['content_bottom_spacings'];
	if ($rodich_content_padding === 'padding-custom') {
		$rodich_content_top_spacings = $rodich_content_top_spacings ? 'padding-top:'. rodich_check_px($rodich_content_top_spacings) .';' : '';
		$rodich_content_bottom_spacings = $rodich_content_bottom_spacings ? 'padding-bottom:'. rodich_check_px($rodich_content_bottom_spacings) .';' : '';
		$rodich_custom_padding = $rodich_content_top_spacings . $rodich_content_bottom_spacings;
	} else {
		$rodich_custom_padding = '';
	}
} else {
	$rodich_custom_padding = '';
}

// Padding - Metabox
if ($rodich_title_area_spacings && $rodich_title_area_spacings !== 'padding-none') {
	$rodich_title_top_spacings = $rodich_meta['title_top_spacings'];
	$rodich_title_bottom_spacings = $rodich_meta['title_bottom_spacings'];
	if ($rodich_title_area_spacings === 'padding-custom') {
		$rodich_title_top_spacings = $rodich_title_top_spacings ? 'padding-top:'. rodich_check_px($rodich_title_top_spacings) .';' : '';
		$rodich_title_bottom_spacings = $rodich_title_bottom_spacings ? 'padding-bottom:'. rodich_check_px($rodich_title_bottom_spacings) .';' : '';
		$rodich_custom_title_padding = $rodich_title_top_spacings . $rodich_title_bottom_spacings;
	} else {
		$rodich_custom_title_padding = '';
	}
} else {
	$rodich_custom_title_padding = '';
}

// Theme Options
$rodich_sidebar_position = cs_get_option('woo_sidebar_position');

// Sidebar Position
if ($rodich_sidebar_position === 'right-sidebar') {
	$layout_class = ' roch-blog-stan-custom-col-left ';
} else {
	$layout_class = ' ';
}

if ($rodich_banner_area_type === 'fullheight-banner') {
	$rodich_banner_area_class = ' roch-full-screen-window-height ';
	$rodich_banner_area_style = '';
} else {
	$rodich_banner_area_class = '';
	$rodich_banner_area_style = 'height:450px;';
}

?>

	<?php if ($rodich_hide_banner == false) { ?>
		<!-- = Slider area start = \-->
		<section class="<?php echo esc_attr( $rodich_banner_area_class ); ?> roch-fix roch-slider-area" style="<?php echo esc_attr( $rodich_banner_area_style ); ?>">
			<!-- overly blank gradient overly div start\-->
			<div class="roch-page-slider-overly roch-slider-overly-gradient"></div>
			<!--/ end-->
			<!-- single slide item start\-->
			<div class="roch-full_height  roch-single-slid-item">
				<?php
					if ($rodich_banner_bg) {
						$banner_image = wp_get_attachment_image_src( $rodich_banner_bg, 'fullsize', '' );
						$banner_image = $banner_image[0];
						$banner_image_alt = get_post_meta( $rodich_banner_bg, '_wp_attachment_image_alt', true);
				?>
				<!-- single slide item  banner start\-->
				<div class="roch-banner-slider">
					<img class="roch-img-full_screen" src="<?php echo esc_url( $banner_image ); ?>" alt="<?php echo esc_attr( $banner_image_alt ); ?>">
				</div><!--/ end-->
				<?php }

				 if($rodich_content_banner_type != 'hide-title'){ ?>
				<div class="container roch-full_height <?php echo esc_attr($rodich_title_area_spacings); ?>" style="<?php echo esc_attr($rodich_custom_title_padding); ?>">
					<!-- single slide item  caption start\-->
					<div class="text-center roch-dis-table roch-slider-banner-caption-warp">
						<div class="roch-dis-table-cell roch-page-slide-banner-cation roch-banner-caption">
							<?php if ( $rodich_content_page_custom_title ) : ?>
								<h2 class="roch-headlin-primary roch-oswaldr-fontS-60">
									<?php echo esc_attr( $rodich_content_page_custom_title ); ?>
								</h2>
							<?php else : ?>
								<h2 class="roch-headlin-primary roch-oswaldr-fontS-60">
									<?php rodich_title_area(); ?>
								</h2>
							<?php endif;

							 if ( $rodich_content_page_custom_subtitle ) : ?>
							<h3 class="roch-headlin-secondary roch-tangerineb-fontS-55">
								<?php echo esc_attr( $rodich_content_page_custom_subtitle ); ?>
							</h3>
							<?php endif; ?>

							<div class="text-center btn-inline">
							<?php
								if ($rodich_page_banner_button_active) {
									if ($rodich_page_banner_buttons) {
										foreach ($rodich_page_banner_buttons as $button) {
											$target = ($button['button_link_target']) ? 'target="_blank"' : '';
											echo '<a class="roch-slider-readmore-btn" href="'.esc_url( $button['button_link'] ).'" '. $target .'>'.esc_attr( $button['button_text'] ).'</a>';
										}
									}
								}
							?>
							</div>
						</div>
					</div><!--/ end-->
				</div>
				<?php } ?>
			</div><!--/ end-->
		</section>
		<!--/ =XXX Slider area end XXX=-->
	<?php } ?>

	<div class="roch-page-entry-content <?php echo esc_attr($rodich_content_padding); ?>" style="<?php echo esc_attr($rodich_custom_padding); ?>">
		<div class="container">
			<div class="<?php echo esc_attr($layout_class); ?>">
				<?php woocommerce_content(); ?>
			</div><!-- Content Area -->

			<?php
				if ( $rodich_sidebar_position === 'right-sidebar' ) {
					get_sidebar(); // Sidebar
				}
			?>

		</div>
	</div>

<?php
get_footer();