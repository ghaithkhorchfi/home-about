<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Metabox
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );
$rodich_page_layout_meta  = get_post_meta( $rodich_id, 'page_layout_options', true );

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

// Theme Options
$rodich_blog_style = cs_get_option('blog_listing_style');
$rodich_sidebar_position = cs_get_option('blog_sidebar_position');

// Style
if ($rodich_blog_style === 'style-grid-2') {
	$rodich_blog_columns = ' col-sm-6 ';
	$rodich_blog_num = 2;
	$rodich_blog_style_class = '';
} elseif ($rodich_blog_style === 'style-grid-3') {
	$rodich_blog_columns = ' col-md-4 col-sm-6 ';
	$rodich_blog_num = 3;
	$rodich_blog_style_class = '';
} else {
	$rodich_blog_columns = '';
	$rodich_blog_num = '';
	$rodich_blog_style_class = ' roch-blog-standard-entry-post-warp ';
}

// Sidebar Position
if ($rodich_sidebar_position === 'sidebar-hide') {
	$layout_class = '';
} else {
	$layout_class = ' roch-blog-stan-custom-col-left ';
}
?>

<?php if ($rodich_hide_banner == false) { ?>
<!-- = Slider area start = \-->
<section class="roch-fix roch-slider-area" style="height:450px;">
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
		<?php } ?>

		<div class="container roch-full_height">
			<!-- single slide item  caption start\-->
			<div class="text-center roch-dis-table roch-slider-banner-caption-warp">
				<div class="roch-dis-table-cell roch-page-slide-banner-cation roch-banner-caption">
					<?php if ( $rodich_content_page_custom_title ) : ?>
						<h2 class="roch-headlin-primary roch-oswaldr-fontS-60">
							<?php echo esc_attr( $rodich_content_page_custom_title ); ?>
						</h2>
					<?php else : ?>
						<h2 class="roch-headlin-primary roch-oswaldr-fontS-60">
							<?php echo rodich_title_area(); ?>
						</h2>
					<?php endif;
					 if ( $rodich_content_page_custom_subtitle ) : ?>
						<h3 class="roch-headlin-secondary roch-tangerineb-fontS-55">
							<?php echo esc_attr( $rodich_content_page_custom_subtitle ); ?>
						</h3>
					<?php else:

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<h3 class="roch-headlin-secondary roch-tangerineb-fontS-55">
							<?php echo esc_attr( $description ); ?>
						</h3>
						<?php endif;
						 endif; ?>
				</div>
			</div><!--/ end-->
		</div>
	</div><!--/ end-->
</section>
<!--/ =XXX Slider area end XXX=-->
<?php } ?>

<div class="roch-blog-standard-area">
	<div class="roch-fix container <?php echo esc_attr($rodich_content_padding); ?>" style="<?php echo esc_attr($rodich_custom_padding); ?>">

		<div class="<?php echo esc_attr($layout_class); ?>">
			<div class="<?php echo esc_attr($rodich_blog_style_class); ?>">
				<?php
					if ( have_posts() ) :
						$i = 0;
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							if ($rodich_blog_style === 'style-grid-2' || $rodich_blog_style === 'style-grid-3') {
								if ($i % $rodich_blog_num == 0) {
									echo '<div class="row">';
								}
							}
							get_template_part( 'layouts/post/content' );

							$i++;
							if ($rodich_blog_style === 'style-grid-2' || $rodich_blog_style === 'style-grid-3') {
								if ($i != 0 && $i % $rodich_blog_num == 0) {
									echo '</div>';
								}
							}

						endwhile;

						if ($rodich_blog_style === 'style-grid-2' || $rodich_blog_style === 'style-grid-3') :
							if($i % $rodich_blog_num != 0):
								echo '</div>';
							endif;
						endif;

					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif;
				?>

				<!--  Post pagination start\-->
				<div class="text-center roch-posts-pagination-warp">
					<nav class="navigation pagination">
						<h2 class="screen-reader-text"><?php echo esc_html__( 'Posts navigation', 'rodich' ); ?></h2>
						<div class="nav-links">
							<?php rodich_paging_nav(); ?>
						</div>
					</nav>
				</div><!--/end-->
			</div><!-- Blog Div -->
			<?php
				wp_reset_postdata();  // avoid errors further down the page
			?>
		</div><!-- Content Area -->

		<?php
			if ($rodich_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
		?>

	</div>

</div>

<?php
get_footer();
