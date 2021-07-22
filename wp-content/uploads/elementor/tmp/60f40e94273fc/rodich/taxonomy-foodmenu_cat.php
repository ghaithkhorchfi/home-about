<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Theme Options
$rodich_banner_bg = cs_get_option('blog_banner_image');
$rodich_hide_banner = cs_get_option('single_banner_area');

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
		<div class="container  roch-full_height">
			<!-- single slide item  caption start\-->
			<div class="text-center roch-dis-table roch-slider-banner-caption-warp">
				<div class="roch-dis-table-cell roch-page-slide-banner-cation roch-banner-caption">
					<h2 class="roch-headlin-primary roch-oswaldr-fontS-60">
						<?php echo rodich_title_area(); ?>
					</h2>

					<?php if ( is_category() || is_tag() ) : ?>
					<h3 class="roch-headlin-secondary roch-tangerineb-fontS-55">
						<?php echo category_description(); ?>
					</h3>
					<?php endif; ?>
				</div>
			</div><!--/ end-->
		</div>
	</div><!--/ end-->
</section>
<!--/ =XXX Slider area end XXX=-->
<?php } ?>

<div class="roch-blog-standard-area">
	<div class="roch-fix container">
		<?php
			if ( have_posts() ) :
				$i = 0;
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					if ($i % 3 == 0) {
						echo '<div class="row">';
					}

					get_template_part( 'layouts/post/content', 'foodmenu' );

					$i++;

					if ($i != 0 && $i % 3 == 0) {
						echo '</div>';
					}

				endwhile;

				if($i % 3 != 0):
					echo '</div>';
				endif;

			else :
				get_template_part( 'layouts/post/content', 'none' );
			endif;
		?>

		<!--  Post pagination start\-->
		<div class="text-center roch-posts-pagination-warp">
			<nav class="navigation pagination">
				<h2 class="screen-reader-text">Posts navigation</h2>
				<div class="nav-links">
					<?php rodich_paging_nav(); ?>
				</div>
			</nav>
		</div><!--/end-->

		<?php wp_reset_postdata();  // avoid errors further down the page ?>
	</div>
</div>

<?php
get_footer();