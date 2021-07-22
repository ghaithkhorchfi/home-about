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
?>
<!-- Footer Widgets -->
<div class="container">
	<div class="row roch-footer-widgets">
		<?php
			if ($rodich_active_onepage_footer === 'onepage') {
				if (is_active_sidebar('footer-onepage')) {
					echo '<div class="text-center onepage-footer-widgets">';
						dynamic_sidebar( 'footer-onepage' );
					echo '</div>';
				}
			} else {
				echo rodich_vt_footer_widgets();
			}
		?>
	</div>
</div>
<!-- Footer Widgets -->

<?php
