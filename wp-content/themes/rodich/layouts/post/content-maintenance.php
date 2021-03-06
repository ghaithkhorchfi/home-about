<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(RODICH_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$rodich_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($rodich_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($rodich_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
wp_head();

// Metabox
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );

if ($rodich_meta) {
  $rodich_content_padding = $rodich_meta['content_spacings'];
} else { $rodich_content_padding = ''; }
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
?>
</head>

	<body <?php body_class(); ?>>
    <div class="vt-maintenance-mode">
      <div class="container <?php echo esc_attr($rodich_content_padding); ?> trnr-content-area" style="<?php echo esc_attr($rodich_custom_padding); ?>">
     	<div class="row">
        <?php
          $rodich_page = get_post( cs_get_option('maintenance_mode_page') );
          WPBMap::addAllMappedShortcodes();
          echo ( is_object( $rodich_page ) ) ? do_shortcode( $rodich_page->post_content ) : '';
        ?>
      </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>

<?php
