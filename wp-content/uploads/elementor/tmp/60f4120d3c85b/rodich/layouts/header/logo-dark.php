<?php
// Logo Image
$rodich_brand_logo_dark = cs_get_option('brand_logo_dark');
$rodich_brand_logo_retina_dark = cs_get_option('rodich_brand_logo_retina_dark');

// Metabox - Header Transparent
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox'. true );

// Retina Size
$rodich_retina_width = cs_get_option('retina_width');
$rodich_retina_height = cs_get_option('retina_height');

// Logo Spacings
$rodich_brand_logo_top = cs_get_option('brand_logo_top');
$rodich_brand_logo_bottom = cs_get_option('brand_logo_bottom');

if ($rodich_brand_logo_top) {
	$rodich_brand_logo_top = 'padding-top:'. rodich_check_px($rodich_brand_logo_top) .';';
} else { $rodich_brand_logo_top = ''; }

if ($rodich_brand_logo_bottom) {
	$rodich_brand_logo_bottom = 'padding-bottom:'. rodich_check_px($rodich_brand_logo_bottom) .';';
} else { $rodich_brand_logo_bottom = ''; }

?>

<div class="roch-logo-black" style="<?php echo esc_attr($rodich_brand_logo_top); echo esc_attr($rodich_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
		<?php
			if (isset($rodich_brand_logo_dark)){
				if ($rodich_brand_logo_retina_dark){
					echo '<img src="'. esc_url(wp_get_attachment_url($rodich_brand_logo_retina_dark)) .'" width="'. esc_attr($rodich_retina_width) .'" height="'. esc_attr($rodich_retina_height) .'" alt="logo" class="retina-logo">
						';
				}
				echo '<img src="'. esc_url(wp_get_attachment_url($rodich_brand_logo_dark)) .'" alt="logo" class="default-logo" width="'. esc_attr($rodich_retina_width) .'" height="'. esc_attr($rodich_retina_height) .'">';
			} else {
				echo '<div class="text-logo roch-tangerineb-fontS-45">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
			}
		?>
	</a>
</div>

<?php
