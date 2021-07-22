<?php
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );
if ($rodich_meta && is_page()) {
	$rodich_hide_breadcrumbs  = $rodich_meta['hide_breadcrumbs'];
} else { $rodich_hide_breadcrumbs = ''; }
if (!$rodich_hide_breadcrumbs) { // Hide Breadcrumbs
?>
<!-- Breadcrumbs -->
<div class="container-fluid trnr-breadcrumbs">
  <div class="row">

    <div class="container">
    <div class="row">

      <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

    </div>
    </div>

  </div>
</div>
<!-- Breadcrumbs -->
<?php } // Hide Breadcrumbs ?>