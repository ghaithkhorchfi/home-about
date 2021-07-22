<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'rodich_dynamic_styles' ) ) {
  function rodich_dynamic_styles() {

    // Typography
    $rodich_vt_get_typography  = rodich_vt_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

  ob_start();

global $post;
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );
$bg_type = cs_get_option('theme_layout_bg_type');

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. RODICH_IMAGES . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Top Bar - Customizer - Background */
$topbar_bg_color  = cs_get_customize_option( 'topbar_bg_color' );
if ($topbar_bg_color) {
echo <<<CSS
  .no-class {}
  .roch-header-top-info {
    background-color: {$topbar_bg_color};
  }
CSS;
}
$topbar_border_color  = cs_get_customize_option( 'topbar_border_color' );
if ($topbar_border_color) {
echo <<<CSS
  .no-class {}
  .roch-header-top-info {
    border-bottom-color: {$topbar_border_color};
  }
CSS;
}
$topbar_text_color  = cs_get_customize_option( 'topbar_text_color' );
if ($topbar_text_color) {
echo <<<CSS
  .no-class {}
  .roch-header-info, .roch-follow-us-text {
    color: {$topbar_text_color};
  }
CSS;
}
$topbar_link_color  = cs_get_customize_option( 'topbar_link_color' );
if ($topbar_link_color) {
echo <<<CSS
  .no-class {}
  .roch-header-info a {
    color: {$topbar_link_color};
  }
CSS;
}
$topbar_link_hover_color  = cs_get_customize_option( 'topbar_link_hover_color' );
if ($topbar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .roch-header-top-info a:hover, .roch-header-top-info a:hover, .roch-header-top-info a:focus {
    color: {$topbar_link_hover_color};
  }
CSS;
}
$topbar_social_color  = cs_get_customize_option( 'topbar_social_color' );
if ($topbar_social_color) {
echo <<<CSS
  .no-class {}
  .roch-follow-us-social ul.list-inline li a i{
    color: {$topbar_social_color};
  }
CSS;
}
$topbar_social_hover_color  = cs_get_customize_option( 'topbar_social_hover_color' );
if ($topbar_social_hover_color) {
echo <<<CSS
  .no-class {}
  .roch-follow-us-social ul.list-inline li a:hover i{
    color: {$topbar_social_hover_color};
  }
CSS;
}

/* Header - Customizer */
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .roch-header-menu-wrapper.header-classic, .roch-header-active .roch-header-menu-wrapper {
    background-color: {$header_bg_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  #roch-main-menu > li > a, #roch-main-menu > li.menu-item-has-children:before {
    color: {$header_link_color} !important;
  }

  #roch-main-menu > li > a:hover, #roch-main-menu > li.current_page_item > a, .roch-header-menu-wrapper.header-classic #roch-main-menu > li.current_page_item > a, .roch-header-menu-wrapper.header-classic #roch-main-menu > li > a:hover, #roch-main-menu > li.menu-item-has-children:hover:before {
    color: {$header_link_hover_color} !important;
  }
CSS;
}
// Metabox - Header Transparent
$header_rollover_link_color  = cs_get_customize_option( 'header_rollover_link_color' );
$header_rollover_link_hover_color  = cs_get_customize_option( 'header_rollover_link_hover_color' );
if ($header_rollover_link_color || $header_rollover_link_hover_color) {
echo <<<CSS
  .no-class {}
  .roch-header-menu-wrapper.header-classic #roch-main-menu > li > a,
  .roch-header-active .roch-header-menu-wrapper #roch-main-menu > li > a {
    color: {$header_rollover_link_color};
  }

  .roch-header-menu-wrapper.header-classic #roch-main-menu > li > a,
  .roch-header-active .roch-header-menu-wrapper #roch-main-menu > li > a{
    color: {$header_rollover_link_hover_color};
  }
CSS;
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_bg_hover_color || $submenu_border_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  #roch-main-menu li.menu-item-has-children ul.sub-menu li a {
    color: {$submenu_link_color};
  }
  #roch-main-menu li.menu-item-has-children ul.sub-menu li {
    border-color: {$submenu_border_color};
  }
  #roch-main-menu li.menu-item-has-children ul.sub-menu li:hover > a, #roch-main-menu li.menu-item-has-children ul.sub-menu li.current_page_item > a, #roch-main-menu li.menu-item-has-children ul.sub-menu li.current-menu-ancestor.menu-item-has-children > a {
    background-color: {$submenu_bg_hover_color};
    color: {$submenu_link_hover_color};
  }
  #roch-main-menu li.menu-item-has-children ul.sub-menu {
    background-color: {$submenu_bg_color};
  }
CSS;
}

$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .roch-new-title,
  .roch-new-title a,.roch-blg-single-title {
    color: {$content_heading_color};
  }
  .navigation.pagination .nav-links .page-numbers:hover, .navigation.pagination .nav-links .current.page-numbers, .navigation.pagination ul .page-numbers:hover, .navigation.pagination ul .current.page-numbers, .woocommerce nav.woocommerce-pagination .nav-links .page-numbers:hover, .woocommerce nav.woocommerce-pagination .nav-links .current.page-numbers, .woocommerce nav.woocommerce-pagination ul .page-numbers:hover, .woocommerce nav.woocommerce-pagination ul .current.page-numbers {
      background-color: {$content_heading_color};
      border-color: {$content_heading_color} !important;
    }
CSS;
}

$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .roch-side-widget .roch-side-widget-title {
    color: {$sidebar_heading_color};
  }
CSS;
}

$title_heading_color  = cs_get_customize_option( 'title_heading_color' );
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .trnr-title-area .page-title {
    color: {$title_heading_color};
  }
CSS;
}

/* Footer */
$footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-area {background: {$footer_bg_color};}
CSS;
}
$footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-single-widget .roch-widgettitle {color: {$footer_heading_color};}
CSS;
}
$footer_text_color  = cs_get_customize_option( 'footer_text_color' );
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-single-widget, .roch-footer-single-widget p {color: {$footer_text_color};}
CSS;
}
$footer_link_border_color  = cs_get_customize_option( 'footer_link_border_color' );
if ($footer_link_border_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-single-widget li, .widget_recent_entries.roch-footer-single-widget li {border-bottom-color: {$footer_link_border_color};}
CSS;
}
$footer_link_color  = cs_get_customize_option( 'footer_link_color' );
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-single-widget li a, .widget_recent_entries.roch-footer-single-widget li a {color: {$footer_link_color};}
CSS;
}
$footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-single-widget li a:hover,
  .widget_recent_entries.roch-footer-single-widget li a:hover,
  footer .widget_list_style ul a:hover,
  footer .widget_categories ul a:hover,
  footer .widget_archive ul a:hover,
  footer .widget_archive ul li,
  footer .widget_recent_comments ul a:hover,
  footer .widget_recent_entries ul a:hover,
  footer .widget_meta ul a:hover,
  footer .widget_pages ul a:hover,
  footer .widget_rss ul a:hover,
  footer .widget_nav_menu ul a:hover {color: {$footer_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
if ($copyright_bg_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-area .roch-footer-bar-wrap {background: {$copyright_bg_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .roch-footer-bar-wrap .roch-copyright,
  .roch-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .roch-copyright a,
  .roch-footer-bar-wrap .roch-copyright a,
  .roch-footer-bar-wrap .roch-foo-menu li a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .roch-copyright a:hover,
  .roch-footer-bar-wrap .roch-copyright a:hover,
  .roch-footer-bar-wrap .roch-foo-menu li a:hover {color: {$copyright_link_hover_color};}
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  .roch-top-res-btn, .roch-serch-btn-main #roch-search-form, .roch-slider-readmore-btn:hover, .roch-slider-readmore-btn:focus, .roch-slider-readmore-btn:active, .roch-spec-dis-price, #roch-special-dishes-cuarosel .owl-dot.active, .roch-food-menu-nav li a:before, .roch-food-menu-item-highlight, .roch-view-full-food-menu-btn:hover, .roch-banner-btn, .roch-btn:hover, .datepicker .datepicker-switch:hover, .roch-footer-social li a:hover, .roch-btn.roch-btn-active, .roch-banner-btn-black:hover, .roch-banner-btn-black:focus, .roch-banner-btn-black:active, .roch-stylest-contact-form input[type="submit"]:hover, .roch-stylest-contact-form input[type="submit"]:focus, .roch-stylest-contact-form input[type="submit"]:active, .wpcf7 input[type="submit"]:hover, .wpcf7 input[type="submit"]:focus, .wpcf7 input[type="submit"]:active, .roch-cnct-pag-social ul li a:hover, .roch-cnct-pag-social ul li a:focus, .roch-cnct-pag-social ul li a:active, .roch-side-widget.widget_tag_cloud .tagcloud a:hover, .roch-side-widget.widget_tag_cloud .tagcloud a:focus, .roch-side-widget.widget_tag_cloud .tagcloud a:active, .woocommerce span.onsale, .woocommerce ul.products li.product .button.add_to_cart_button:hover, .woocommerce ul.products li.product .button.add_to_cart_button:focus, .woocommerce ul.products li.product .button.add_to_cart_button:active,.woocommerce .ajax_add_to_cart.button:hover, .woocommerce .ajax_add_to_cart.button:focus, .woocommerce .ajax_add_to_cart.button:active, .woocommerce #respond input#submit.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce #respond input#submit.alt:active,.woocommerce a.button.alt:hover, .woocommerce a.button.alt:focus, .woocommerce a.button.alt:active,.woocommerce button.button.alt:hover,.woocommerce button.button.alt:focus,.woocommerce button.button.alt:active,.woocommerce input.button.alt:hover,.woocommerce input.button.alt:focus,.woocommerce input.button.alt:active, .woocommerce .button.wc-backward:hover, .woocommerce .button.wc-backward:focus, .woocommerce .button.wc-backward:active, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, .woocommerce #respond input#submit:active,.woocommerce a.button:hover,.woocommerce a.button:focus,.woocommerce a.button:active, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce button.button:active,.woocommerce input.button:hover,.woocommerce input.button:focus,.woocommerce input.button:active, .roch-cart-count, .roch-header-cart-items .buttons .button:hover, .roch-header-cart-items .buttons .button:focus, .roch-header-cart-items .buttons .button:active, .roch-header-cart-items .buttons .button.checkout.wc-forward, .roch-header-cart-items .mini_cart_item a.remove:hover, .roch-header-cart-items .mini_cart_item a.remove:focus, .roch-header-cart-items .mini_cart_item a.remove:active, .roch-blg-sin-foo-meta a:hover, .roch-blg-sin-foo-meta a:focus, .roch-blg-sin-foo-meta a:active, .roch-blg-sin-scoial ul li a:hover, .roch-blg-sin-scoial ul li a:focus, .roch-blg-sin-scoial ul li a:active, #comments.pxls-comments-area.comments-area a.comment-reply-link:hover, #comments.pxls-comments-area.comments-area a.comment-reply-link:focus, #comments.pxls-comments-area.comments-area a.comment-reply-link:active, #comments.pxls-comments-area.comments-area #respond .form-submit #submit:hover, #comments.pxls-comments-area.comments-area #respond .form-submit #submit:focus, #comments.pxls-comments-area.comments-area #respond .form-submit #submit:active, .wp-link-pages > span, .wp-link-pages > span:hover, .wp-link-pages > span:focus, .wp-link-pages > span:active, .wp-link-pages > a:hover, .wp-link-pages > a:focus, .wp-link-pages > a:active, .woocommerce span.onsale, .woocommerce-cart table.cart td.actions > input.button:hover {background-color: {$all_element_color};}

  .roch-follow-us-social ul.list-inline li a:hover, .roch-header-info a:hover, #roch-main-menu > li > a:hover, #roch-main-menu > li.current_page_item > a,.roch-header-menu-wrapper.header-classic #roch-main-menu > li.current_page_item > a, .roch-section-heading [class*="roch-tangerineb-fontS"], .roch-headlin-secondary[class*="roch-tangerineb-fontS"], .roch-read-more-underline:hover, .roch-read-more-underline:focus, .roch-read-more-underline:active, .roch-special-dishe-text .roch-special-dishe-title:hover, .roch-special-dishe-text .roch-special-dishe-title:focus, .roch-special-dishe-text .roch-special-dishe-title:active, .roch-slash-meta li a:hover, .roch-slash-meta li a:focus, .roch-slash-meta li a:active, .roch-online-reser-info a:hover, #roch-main-menu > li.current_page_item.menu-item-has-children:before, #roch-main-menu > li.menu-item-has-children:hover > a, #roch-main-menu > li.menu-item-has-children:hover:before, #roch-main-menu > li.current-menu-ancestor.menu-item-has-children > a, #roch-main-menu > li.current-menu-ancestor.menu-item-has-children:before, .roch-sin-ser-capt-title i, .roch-sin-ser-capt-hov-title i, .roch-new-title a:hover, .roch-new-title a:focus, .roch-new-title a:active, .roch-simple-readmore, .roch-news-meta a:hover, .roch-news-meta a:focus, .roch-news-meta a:active, .roch-newsle-submit-btn:hover, .roch-newsle-submit-btn:focus, .roch-newsle-submit-btn:active, .roch-foo-subs-newsletter-form .roch-onl-res-fo-single .input-group input.form-control:focus + .roch-newsle-submit-btn, a.roch-reser-contact-more-info:hover, .roch-single-staff-photo .roch-single-staff-social ul a:hover, a.roch-single-staff-name:hover, a.roch-single-staff-name:focus, a.roch-single-staff-name:active, a.food-menu-list-single-text:hover, a.food-menu-list-single-text:focus, a.food-menu-list-single-text:active, a.roch-cnct-pag-single-info:hover, a.roch-cnct-pag-single-info:focus, a.roch-cnct-pag-single-info:active, .roch-side-widget .search-form .search-submit:hover:before, .roch-side-widget .search-form .search-submit:focus:before, .roch-side-widget .search-form .search-submit:active:before, .roch-side-widget .search-form .search-submit.roch-sideserch-active:before, .roch-side-widget > ul li a:hover, .roch-side-widget > ul li a:focus, .roch-side-widget > ul li a:active, .woocommerce ul.products li.product h3 a:hover, .woocommerce ul.products li.product h3 a:focus, .woocommerce ul.products li.product h3 a:active, .woocommerce ul.products li.product a.added_to_cart.wc-forward:hover, .woocommerce ul.products li.product a.added_to_cart.wc-forward:focus, .woocommerce ul.products li.product a.added_to_cart.wc-forward:active, .single-product.woocommerce div.product div.summary p.price, .single-product.woocommerce div.product div.summary span.price,.single-product.woocommerce-page div.product div.summary p.price,.single-product.woocommerce-page div.product div.summary span.price, .single-product.woocommerce div.product div.summary .product_meta a:hover, .single-product.woocommerce div.product div.summary .product_meta a:focus, .single-product.woocommerce div.product div.summary .product_meta a:active,.single-product.woocommerce-page div.product div.summary .product_meta a:hover,.single-product.woocommerce-page div.product div.summary .product_meta a:focus,.single-product.woocommerce-page div.product div.summary .product_meta a:active, .woocommerce-message:before, .roch-header-cart-items .roch-cart-product-title:hover, .roch-header-cart-items .roch-cart-product-title:focus, .roch-header-cart-items .roch-cart-product-title:active, .lost_password a:hover, .lost_password a:focus, .lost_password a:active, #add_payment_method #payment .payment_method_paypal .about_paypal:hover, #add_payment_method #payment .payment_method_paypal .about_paypal:focus, #add_payment_method #payment .payment_method_paypal .about_paypal:active, .woocommerce-cart #payment .payment_method_paypal .about_paypal:hover, .woocommerce-cart #payment .payment_method_paypal .about_paypal:focus, .woocommerce-cart #payment .payment_method_paypal .about_paypal:active, .woocommerce-cart .cart_item .product-remove .remove:hover, .woocommerce-cart .cart_item .product-remove .remove:focus, .woocommerce-cart .cart_item .product-remove .remove:active, .woocommerce-cart .cart_item .product-name a:hover, .woocommerce-cart .cart_item .product-name a:focus, .woocommerce-cart .cart_item .product-name a:active, .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-MyAccount-navigation ul li a:focus, .woocommerce-MyAccount-navigation ul li a:active, .roch-like-count-box a:hover, .roch-like-count-box a:focus, .roch-like-count-box a:active, #comments.pxls-comments-area.comments-area #respond #cancel-comment-reply-link:hover, #comments.pxls-comments-area.comments-area #respond #cancel-comment-reply-link:focus, #comments.pxls-comments-area.comments-area #respond #cancel-comment-reply-link:active, .roch-blog-single-strandard-entry-content a:hover, #comments.pxls-comments-area.comments-area .comment-content a:hover, .roch-side-widget #wp-calendar td a:hover, .roch-side-widget #wp-calendar td a:focus, .roch-side-widget #wp-calendar td a:active, #comments.pxls-comments-area.comments-area .pxls-comments-meta a:hover, #comments.pxls-comments-area.comments-area .pxls-comments-meta a:focus, #comments.pxls-comments-area.comments-area .pxls-comments-meta a:active, .roch-blg-sin-author-bio-desc a:hover, .roch-blg-sin-author-bio-desc a:focus, .roch-blg-sin-author-bio-desc a:active, .text-logo {color: {$all_element_color};}

CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body, .roch-single-b-stan-post .roch-news-post-entry-content p, .roch-news-meta, .roch-blog-single-strandard-entry-content p, #comments.pxls-comments-area.comments-area .comment-content p, #comments.pxls-comments-area.comments-area #respond #reply-title,.roch-like-count-box > span {color: {$body_color};}
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .roch-side-widget {color: {$sidebar_content_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '767';

echo <<<CSS
  .no-class {}
@media (max-width: {$breakpoint}px) {

}
CSS;

  echo $rodich_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'rodich_custom_font_load' ) ) {
  function rodich_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']) .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']) .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. esc_url($font['svg']) .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']) .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'rodich_vt_custom_css' ) ) {
  function rodich_vt_custom_css() {
    wp_enqueue_style('rodich-default-style', get_template_directory_uri() . '/style.css');
    $output  = rodich_custom_font_load();
    $output .= rodich_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = rodich_compress_css_lines( $output );

    wp_add_inline_style( 'rodich-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'rodich_vt_custom_js' ) ) {
  function rodich_vt_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'rodich_vt_custom_js' );
}