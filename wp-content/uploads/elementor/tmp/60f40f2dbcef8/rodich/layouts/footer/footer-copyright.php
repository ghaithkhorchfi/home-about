<?php
	$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
	$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
	$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
	$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );

	if (!is_search()) {
		if ($rodich_meta) {
			$rodich_active_onepage_footer  = $rodich_meta['active_onepage_footer'];
		} else { $rodich_active_onepage_footer = ''; }
	} else {
		$rodich_active_onepage_footer = '';
	}

	// Main Text
	$rodich_need_copyright = cs_get_option('need_copyright');
	$rodich_need_menu = cs_get_option('need_menu');
	if (isset($rodich_need_copyright)) {
?>

<!--footer bottom bar start /-->
<div class="roch-footer-bar-wrap">
	<div class="container">
        <div class="row">
			<?php if ($rodich_active_onepage_footer === 'onepage') { ?>
				<!--footer copyright text start /-->
				<div class="text-center roch-copyright">
					<?php
						$rodich_copyright_text = cs_get_option('copyright_text');
						if ($rodich_copyright_text) {
							echo do_shortcode($rodich_copyright_text);
						} else {
							echo '&copy; '. esc_attr(RODICH_NAME) .' '. date('Y') .'-  Handcrafted with love by <a href="'. esc_url(RODICH_BRAND_URL) .'" target="_blank">'. esc_attr(RODICH_BRAND_NAME) .'</a>';
						}
					?>
	            </div><!--/ end-->
			<?php } else { ?>
			<!--footer copyright text start /-->
			<div class="col-sm-6 roch-copyright">
				<?php
					$rodich_copyright_text = cs_get_option('copyright_text');
					if ($rodich_copyright_text) {
						echo do_shortcode($rodich_copyright_text);
					} else {
						echo '&copy; '. esc_attr(RODICH_NAME) .' '. date('Y') .'-  Handcrafted with love by <a href="'. esc_url(RODICH_BRAND_URL) .'" target="_blank">'. esc_attr(RODICH_BRAND_NAME) .'</a>';
					}
				?>
			</div><!--/ end-->

			<!--footer menu start /-->
			<?php
				if($rodich_need_menu) {
					wp_nav_menu(
						array(
							'menu'              => 'footermenu',
							'theme_location'    => 'footermenu',
							'container'         => 'div',
							'container_class'   => 'text-right col-sm-6 roch-foo-menu',
							'menu_class'        => 'list-inline',
							'menu_id'           => 'roch-foo-menu',
							'depth'             => 1,
							'fallback_cb'       => 'rodich_menu_fallback'
						)
					);
				}
			} ?>
		</div>
	</div>
</div><!--/ end-->
<?php }