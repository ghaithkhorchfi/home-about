<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

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

if ($rodich_meta) {
	$rodich_hide_footer  = $rodich_meta['hide_footer'];
} else { $rodich_hide_footer = ''; }
if (!$rodich_hide_footer) { // Hide Footer Metabox
	if ($rodich_active_onepage_footer === 'onepage') { // One Page
?>
<footer class="roch-footer-area one-page-footer">
<?php } else { ?>
<footer class="roch-footer-area">
<?php } ?>

	<?php
		$footer_widget_block = cs_get_option('footer_widget_block');
		if (isset($footer_widget_block)) {
      // Footer Widget Block
      get_template_part( 'layouts/footer/footer', 'widgets' );
    }

    $need_copyright = cs_get_option('need_copyright');
		if (isset($need_copyright)) {
      // Copyright Block
    	get_template_part( 'layouts/footer/footer', 'copyright' );
    }
  ?>

</footer>

<?php } // Hide Footer Metabox ?>

</div><!-- #MAIN LAYOUT END -->
<?php wp_footer(); ?>
</body>
</html><?php
