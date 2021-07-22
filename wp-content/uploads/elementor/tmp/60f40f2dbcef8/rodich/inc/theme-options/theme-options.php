<?php
/*
 * All Theme Options for Rodich theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function rodich_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => RODICH_NAME . esc_html__(' Options', 'rodich'),
    'menu_slug'       => sanitize_title(RODICH_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => RODICH_NAME .' <small>V-'. RODICH_VERSION .' by <a href="'. RODICH_BRAND_URL .'" target="_blank">'. RODICH_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'rodich_vt_settings' );

// Theme Framework Options
function rodich_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'rodich'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'rodich'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'rodich')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('White Logo', 'rodich'),
            'info'  => esc_html__('Upload your white logo here. If you not upload, then site title will load in this logo location.', 'rodich'),
            'add_title' => esc_html__('Add Logo', 'rodich'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina White Logo', 'rodich'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'rodich'),
            'add_title' => esc_html__('Add Retina Logo', 'rodich'),
          ),
          array(
            'id'    => 'brand_logo_dark',
            'type'  => 'image',
            'title' => esc_html__('Black Logo', 'rodich'),
            'info'  => esc_html__('Upload your black logo here. If you not upload, then site title will load in this logo location.', 'rodich'),
            'add_title' => esc_html__('Add Logo', 'rodich'),
          ),
          array(
            'id'    => 'rodich_brand_logo_retina_dark',
            'type'  => 'image',
            'title' => esc_html__('Retina Black Logo', 'rodich'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'rodich'),
            'add_title' => esc_html__('Add Retina Logo', 'rodich'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'rodich'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'rodich'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'rodich'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'rodich'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'rodich')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'rodich'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'rodich'),
            'add_title' => esc_html__('Add Login Logo', 'rodich'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => esc_html__('Mobile Logo', 'rodich'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'rodich')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Mobile Logo', 'rodich'),
            'info'  => esc_html__('Upload your mobile logo as retina size.', 'rodich'),
            'add_title' => esc_html__('Add Mobile Logo', 'rodich'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Width', 'rodich'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Height', 'rodich'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'rodich'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'rodich'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'rodich'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'rodich'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'rodich'),
              'add_title' => esc_html__('Add Fav Icon', 'rodich'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'rodich'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'rodich'),
              'add_title' => esc_html__('Add iPhone Icon', 'rodich'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'rodich'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'rodich'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'rodich'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'rodich'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'rodich'),
              'add_title' => esc_html__('Add iPad Icon', 'rodich'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'rodich'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'rodich'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'rodich'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'rodich'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'rodich'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Preloader Options', 'rodich')
      ),
      array(
        'id'    => 'show_preloader',
        'type'  => 'switcher',
        'title' => esc_html__('Show Preloader', 'rodich'),
        'info'  => esc_html__('Turn off if you don\'t want prealoder in your site.', 'rodich'),
        'default' => false,
      ),

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Background Options', 'rodich'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'rodich'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'rodich'),
          'bg-pattern' => esc_html__('Pattern', 'rodich'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'rodich'),
        'info' => esc_html__('Select background pattern', 'rodich'),
        'options'      => array(
          'pattern-1'    => RODICH_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => RODICH_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => RODICH_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => RODICH_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => RODICH_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'rodich'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => esc_html__('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'rodich'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'rodich'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),
      array(
        'id'      => 'theme_bg_parallax',
        'type'    => 'switcher',
        'title'   => esc_html__('Parallax', 'rodich'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_parallax_speed',
        'type'    => 'text',
        'title'   => esc_html__('Parallax Speed', 'rodich'),
        'attributes' => array(
          'placeholder'     => '0.4',
        ),
        'dependency' => array( 'theme_layout_width_container|theme_bg_parallax', '==|!=', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__('Overlay Color', 'rodich'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'rodich'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'rodich'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'rodich'),
            'attributes'  => array( 'placeholder' => '767' ),
            'info' => esc_html__('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'rodich'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'rodich'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'rodich'),
            'default' => true,
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'rodich'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'rodich'),
            'default' => true,
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Widget', 'rodich'),
            'info' => esc_html__('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'rodich'),
            'default' => false,
            'dependency' => array('header_design', 'any', 'style_two,style_four'),
          ),

        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'rodich'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),
          array(
            'id'    => 'top_bar_info',
            'type'  => 'textarea',
            'shortcode'  => true,
            'title' => esc_html__('Top Bar Info', 'rodich'),
            'dependency' => array('top_bar', '==', false),
          ),
          array(
            'id'    => 'social_icon_text',
            'type'  => 'text',
            'title' => esc_html__('Social Area Title', 'rodich'),
            'dependency' => array('top_bar', '==', false),
          ),
          array(
            'id'              => 'top_bar_social',
            'type'            => 'group',
            'title'           => esc_html__('Social Media', 'rodich'),
            'button_title'    => esc_html__('Add New', 'rodich'),
            'accordion_title' => esc_html__('Add New Social', 'rodich'),
            'fields'          => array(
              array(
                'id'    => 'top_bar_social_text',
                'type'  => 'text',
                'title' => esc_html__('Social Media Title', 'rodich'),
              ),
              array(
                'id'    => 'top_bar_social_icon',
                'type'  => 'icon',
                'title' => esc_html__('Select Icon', 'rodich'),
              ),
              array(
                'id'    => 'top_bar_social_link',
                'type'  => 'text',
                'title' => esc_html__('Social Media Profile Link', 'rodich'),
              ),
            ),
            'dependency' => array('top_bar', '==', false)
          ),

          array(
            'id'          => 'top_bar_search',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Search', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),

          array(
            'id'          => 'top_bar_shop',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Shop', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),

          array(
            'id'          => 'top_bar_reservation',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar Button', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
            'dependency' => array('top_bar', '==', false)
          ),
          array(
            'id'    => 'top_bar_reservation_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'rodich'),
            'dependency' => array('top_bar|top_bar_reservation', '==|==', 'false|false')
          ),
          array(
            'id'    => 'top_bar_reservation_link',
            'type'  => 'text',
            'title' => esc_html__('Button Link', 'rodich'),
            'dependency' => array('top_bar|top_bar_reservation', '==|==', 'false|false')
          ),

        )
      ),

      // header side menu
      array(
        'name'     => 'header_side_bar_tab',
        'title'    => esc_html__('Toggle Bar', 'rodich'),
        'icon'     => 'fa fa-plus',
        'fields'   => array(

          array(
            'id'          => 'side_bar_area',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Slide Bar', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),

          array(
            'id'           => 'side_bar_area_bg',
            'type'         => 'background',
            'title'        => esc_html__('Background', 'rodich'),
            'default'      => array(
              'image'      => RODICH_IMAGES . '/off-canves-full--bg.jpg',
              'repeat'     => 'no-repeat',
              'position'   => 'center top',
              'attachment' => 'scroll',
              'size'       => '',
              'color'      => '#111110',
            ),
          ),

          array(
            'id'          => 'side_logo',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Logo', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),

          array(
            'id'          => 'side_menu',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Menu', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),

          array(
            'id'          => 'side_flickr',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Flickr', 'rodich'),
            'on_text'     => esc_html__('Yes', 'rodich'),
            'off_text'    => esc_html__('No', 'rodich'),
            'default'     => false,
          ),

          array(
            'id'             => 'side_flickr_title',
            'type'           => 'text',
            'title'          => esc_html__('Section Title', 'rodich'),
            'dependency'   => array( 'side_flickr', '==', false ),
          ),

          array(
            'id'             => 'side_flickr_user',
            'type'           => 'text',
            'title'          => esc_html__('Flickr User ID', 'rodich'),
            'attributes' => array(
              'placeholder'     => 'bolandrotor',
            ),
            'dependency'   => array( 'side_flickr', '==', false ),
          ),

          array(
            'type'            => 'notice',
            'class'           => 'info',
            'content'         => __('To get flickr API key <a href="https://www.flickr.com/services/apps/create/apply/" target="__blank">click here</a>', 'rodich'),
          ),

          array(
            'id'             => 'side_flickr_key',
            'type'           => 'text',
            'title'          => esc_html__('Flickr API Key', 'rodich'),
            'attributes' => array(
              'placeholder'     => 'c8b78492701afd6bccee3ed830c0ce14',
            ),
            'dependency'   => array( 'side_flickr', '==', false ),
          ),

          array(
            'id'             => 'side_additional_info',
            'type'           => 'wysiwyg',
            'title'          => esc_html__('Additional Info', 'rodich'),
            // 'dependency'     => array( 'side_flickr', '==', true ),
            'settings' => array(
              'textarea_rows' => 5,
              'wpautop ' => false,
            )
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Banner', 'rodich'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(


          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Top Banner Styles', 'rodich')
          ),
          array(
            'id'             => 'blog_banner_style',
            'type'           => 'select',
            'title'          => esc_html__('Show/Hide Banner', 'rodich'),
            'options'        => array(
              'show-banner' => esc_html__('Show', 'rodich'),
              'hide-banner' => esc_html__('Hide', 'rodich'),
            ),
            'default' => 'show-banner',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'rodich'),
          ),
          array(
            'id'             => 'blog_banner_image',
            'type'           => 'image',
            'title'          => esc_html__('Banner Background Image', 'rodich'),
            'dependency'   => array('blog_banner_style', '==', 'show-banner'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'rodich'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'rodich'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'rodich')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'rodich'),
            'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'rodich'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'rodich'),
            'info' => esc_html__('Choose your footer widget layouts.', 'rodich'),
            'default' => 4,
            'options' => array(
              1   => RODICH_CS_IMAGES . '/footer/footer-1.png',
              2   => RODICH_CS_IMAGES . '/footer/footer-2.png',
              3   => RODICH_CS_IMAGES . '/footer/footer-3.png',
              4   => RODICH_CS_IMAGES . '/footer/footer-4.png',
              5   => RODICH_CS_IMAGES . '/footer/footer-5.png',
              6   => RODICH_CS_IMAGES . '/footer/footer-6.png',
              7   => RODICH_CS_IMAGES . '/footer/footer-7.png',
              8   => RODICH_CS_IMAGES . '/footer/footer-8.png',
              9   => RODICH_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'rodich'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'rodich'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'rodich'),
            'default' => true,
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'rodich'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),
          array(
            'id'    => 'need_menu',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Footer Menu', 'rodich'),
            'default' => true,
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'rodich'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'rodich'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'rodich'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'rodich'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'rodich'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'rodich'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'rodich'),
            'info'           => esc_html__('Enter css selectors like : <strong>body, .custom-class</strong>', 'rodich'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'rodich'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'rodich'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'rodich'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'rodich'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'rodich'),
        'accordion_title'     => esc_html__('New Typography', 'rodich'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'rodich'),
            'selector'        => 'body, .roch-off-canves-footer-info p, .roch-off-canves-footer-info a, .roch-slash-meta li, .roch-slash-meta li + li:before, .roch-slash-meta a, .roch-testimonial-text-heading h4, .roch-testimonial-text-heading a, .roch-testimonial-text p, .roch-testimonial-text q, .roch-res-subtitle, .roch-onl-res-fo-single .input-group input.form-control, .roch-online-reser-info, .roch-online-reser-info a, .widget_recent_entries.roch-footer-single-widget li a, #roch_custom_foo_opening_hours li h5, .roch-footer-bar-wrap .roch-copyright, .roch-footer-bar-wrap .roch-copyright a, .roch-footer-bar-wrap .roch-foo-menu li a, .roch-side-widget > ul li a, .roch-side-widget.widget_tag_cloud .tagcloud a, .single-product.woocommerce div.product div.summary .product_meta span, .single-product.woocommerce div.product div.summary .product_meta a, .single-product.woocommerce-page div.product div.summary .product_meta span, .single-product.woocommerce-page div.product div.summary .product_meta a, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce-tabs .roch-wooc-tabs-panel-description p, .woocommerce-error, .woocommerce-info, .woocommerce-message, .roch-header-cart-items .roch-cart-product-title, .woocommerce .roch-header-cart-items .roch-cart-product-title, .roch-header-cart-items .quantity, .woocommerce .roch-header-cart-items .quantity, .roch-header-cart-items .widget_shopping_cart_content > .total .woocommerce-Price-amount, .woocommerce .roch-header-cart-items .widget_shopping_cart_content > .total .woocommerce-Price-amount, .lost_password a, .woocommerce table.shop_table td, .woocommerce-checkout #payment ul.payment_methods .wc_payment_method > label, .woocommerce-tabs .woocommerce-Reviews .comment-text p.meta > time, .woocommerce-tabs .woocommerce-Reviews .description, .woocommerce-tabs .woocommerce-Reviews #commentform > p > label, .roch-blg-sin-foo-meta a, .roch-like-count-box > a, #comments.pxls-comments-area.comments-area .comment-content, #comments.pxls-comments-area.comments-area a.comment-reply-link, #comments.pxls-comments-area.comments-area #commentform textarea, #comments.pxls-comments-area.comments-area #commentform input:not(#submit), .roch-stylest-contact-form input, .roch-stylest-contact-form textarea, .roch-stylest-contact-form select, .wpcf7 input, .wpcf7 textarea, .wpcf7 select, .roch-blog-single-strandard-entry-content, .roch-blog-single-strandard-entry-content p, #comments.pxls-comments-area.comments-area .comment-content p, .roch-clas-tes-single-item p, .roch-clas-tes-single-item q',
            'font'            => array(
              'family'        => 'Cabin',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'rodich'),
            'selector'        => '#roch-main-menu > li > a, #roch-off-canves-menu > li > a, .roch-read-more-underline, .roch-food-menu-nav li a, .roch-footer-logo-subtitle, .roch-sin-ser-caption-hover p, .roch-ban-cap-sub-info, .roch-single-counter h5, .roch-single-counter a, .roch-header-cart-items .widget_shopping_cart_content > .total strong, .woocommerce .roch-header-cart-items .widget_shopping_cart_content > .total strong, .woocommerce table.shop_table th, .woocommerce-cart .woocommerce-shipping-calculator > p > a, .woocommerce strong, .roch-blog-single-entry-content p strong, .roch-blog-single-strandard-entry-content h5, .roch-blog-single-strandard-entry-content h6, #comments.pxls-comments-area.comments-area .comment-content h5, #comments.pxls-comments-area.comments-area .comment-content h6, .roch-blog-single-strandard-entry-content strong, .roch-blog-single-strandard-entry-content dt, #comments.pxls-comments-area.comments-area .comment-content strong, #comments.pxls-comments-area.comments-area .comment-content dt',
            'font'            => array(
              'family'        => 'Cabin',
              'variant'       => '500',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'rodich'),
            'selector'        => '.dropdown-menu, .mean-container .mean-nav ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'rodich'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .roch-header-info, .roch-follow-us-text, #roch_custom_foo_opening_hours .roch-read-more-underline, #roch-main-menu li.menu-item-has-children ul.sub-menu li a, #roch-off-canves-menu ul.sub-menu li a, .roch-sin-ser-caption-hover a.roch-btn.roch-btn-active, .roch-great-service-back-hover a.roch-btn, .roch-clas-tes-name, .roch-foo-subs-newsletter h4, .roch-footer-social-title, .woocommerce-tabs .woocommerce-Reviews .comment-text p.meta > strong, .roch-side-widget #wp-calendar caption, .roch-side-widget p strong, .roch-side-widget.widget_text p.wp-caption-text, .roch-blog-single-strandard-entry-content h4, .roch-blog-single-strandard-entry-content h3, .roch-blog-single-strandard-entry-content th, #comments.pxls-comments-area.comments-area .comment-content h4, #comments.pxls-comments-area.comments-area .comment-content h3, #comments.pxls-comments-area.comments-area .comment-content th',
            'font'            => array(
              'family'        => 'Cabin',
              'variant'       => '600',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Headings Typography', 'rodich'),
            'selector'        => '[class*="roch-tangerineb-fontS"], .lg-sub-html',
            'font'            => array(
              'family'        => 'Tangerine',
              'variant'       => '700',
            ),
          ),
          array(
            'title'           => esc_html__('Banner and Testimonial Typography', 'rodich'),
            'selector'        => '[class*="roch-oswaldr-fontS"], .roch-food-menu-list-single-item .food-menu-list-single-text, .roch-gallery-top-title h2, .roch-testimonial-text-heading h5, .roch-testimonial-text-heading a, .roch-great-service-front-title, .roch-great-service-back-title, .roch-clas-tes-title, .roch-single-counter .roch-counter, .woocommerce ul.products li.product .price',
            'font'            => array(
              'family'        => 'Oswald',
              'variant'       => 'normal',
            ),
          ),
          array(
            'title'           => esc_html__('Widget Headings Typography', 'rodich'),
            'selector'        => '.roch-widgettitle, .roch-footer-single-widget .roch-widgettitle, .roch-special-dishe-text .roch-special-dishe-title, .roch-home-gallery-title, .roch-sin-ser-capt-title, .roch-sin-ser-capt-hov-title, .roch-hom-para-spec-dishe-text .roch-hom-para-spec-dishe-title, .roch-onepage-sin-serv-title, .roch-new-title, .roch-new-title a, .roch-food-list-title-primary, .roch-food-list-title-secondary, .roch-food-list-title-secondary-sub, .roch-reser-contact-text .roch-reser-contact-title, .roch-single-staff-text .roch-single-staff-name, .roch-cnct-pag-info-title, .roch-side-widget .roch-side-widget-title, .woocommerce ul.products li.product h3, .woocommerce ul.products li.product h3 a, .single-product.woocommerce div.product div.summary .product_title, .single-product.woocommerce-page div.product div.summary .product_title, .single-product.woocommerce div.product div.summary p.price, .single-product.woocommerce div.product div.summary span.price, .single-product.woocommerce-page div.product div.summary p.price, .single-product.woocommerce-page div.product div.summary span.price, .roch-page-entry-content h2.roch-page-title, .roch-blg-single-title, .roch-error-text > h2',
            'font'            => array(
              'family'        => 'Oswald',
              'variant'       => '700',
            ),
          ),
          array(
            'title'           => esc_html__('Button Typography', 'rodich'),
            'selector'        => '.roch-top-res-btn, .roch-slider-readmore-btn, .roch-spec-dis-price, .woocommerce ul.products li.product .onsale, .roch-food-menu-list-single-item .food-menu-list-single-text .roch-food-menu-item-highlight, .roch-view-full-food-menu-btn, .roch-btn, .roch-stylest-contact-form input[type="submit"], .roch-stylest-contact-form button[type="submit"], .wpcf7 input[type="submit"], .wpcf7 button[type="submit"], .roch-banner-btn, .roch-banner-btn-black, .roch-simple-readmore, .navigation.pagination .nav-links .page-numbers, .navigation.pagination ul .page-numbers, .woocommerce nav.woocommerce-pagination .nav-links .page-numbers, .woocommerce nav.woocommerce-pagination ul .page-numbers, .woocommerce ul.products li.product .button.add_to_cart_button,.woocommerce ul.products li.product a.added_to_cart.wc-forward,.woocommerce .ajax_add_to_cart.button, .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt, .woocommerce-tabs .roch-wooc-tabs-panel-description h2,.woocommerce-tabs #reviews #comments .woocommerce-Reviews-title,.woocommerce-tabs #reviews #review_form_wrapper #reply-title, .roch-page-entry-content h2:not([class]), .roch-page-entry-content h3:not([class]), .roch-page-entry-content legend, .woocommerce .button.wc-backward, .woocommerce #respond input#submit,.woocommerce a.button, .woocommerce button.button,.woocommerce input.button, .roch-header-cart-items .buttons .button, .woocommerce .roch-header-cart-items .buttons .button, .woocommerce-billing-fields > h3, .woocommerce-shipping-fields > h3, .checkout.woocommerce-checkout #order_review_heading, .woocommerce #customer_login [class*="u-column"] > h2, .woocommerce-page #customer_login [class*="u-column"] > h2, .woocommerce .related.products > h2, .woocommerce-page .related.products > h2, .woocommerce-cart .cart_totals > h2, .roch-blog-single-entry-content h4, .roch-blg-single-foo-meta-warp > span, .roch-like-count-box > span, .roch-blg-sin-author-bio-desc h5, #comments.pxls-comments-area.comments-area .comments-section > .comments-title, #comments.pxls-comments-area.comments-area .pxls-comments-meta > h4, #comments.pxls-comments-area.comments-area #respond #reply-title, #comments.pxls-comments-area.comments-area #commentform .form-submit #submit, .roch-side-widget #wp-calendar th, .roch-stylest-contact-form .roch-file-upload .roch-file-btn, .wpcf7 .roch-file-upload .roch-file-btn, .roch-blog-single-strandard-entry-content h1, .roch-blog-single-strandard-entry-content h2,#comments.pxls-comments-area.comments-area .comment-content h1,#comments.pxls-comments-area.comments-area .comment-content h2, .roch-blog-single-strandard-entry-content .post-password-form input[type="submit"],#comments.pxls-comments-area.comments-area .comment-content .post-password-form input[type="submit"]',
            'font'            => array(
              'family'        => 'Cabin',
              'variant'       => '700',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'rodich'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'rodich'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'rodich'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400', '400i', '500', '500i', '600', '600i', '700', '700i' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'svg',
            'type'           => 'upload',
            'title'          => 'Upload .svg <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.svg</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'rodich'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'rodich'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Team Single', 'rodich')
      ),
      array(
        'id'      => 'team_top_spacing',
        'type'    => 'text',
        'title'   => esc_html__('Top Spacing', 'rodich'),
        'info'   => esc_html__('Enter value in px, for team single pages top value.', 'rodich'),
        'default' => '60px',
      ),
      array(
        'id'      => 'team_bottom_spacing',
        'type'    => 'text',
        'title'   => esc_html__('Bottom Spacing', 'rodich'),
        'info'   => esc_html__('Enter value in px, for team single pages bottom value.', 'rodich'),
        'default' => '0px',
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'rodich'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'rodich'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'rodich')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Style', 'rodich'),
            'options'        => array(
              'style-list' => esc_html__('List (Default)', 'rodich'),
              'style-grid-2' => esc_html__('Grid (2 Column)', 'rodich'),
              'style-grid-3' => esc_html__('Grid (3 Column)', 'rodich'),
            ),
            'default_option' => 'Select blog style',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'rodich'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar Settings', 'rodich')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'rodich'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'rodich'),
              'sidebar-hide' => esc_html__('Hide', 'rodich'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'rodich'),
            'info'          => esc_html__('Default option : Right', 'rodich'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'rodich'),
            'options'        => rodich_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'rodich'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'rodich'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'rodich')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'rodich'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'rodich'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'rodich'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'rodich'),
            'default' => '30',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'rodich'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'rodich'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'rodich'),
              'date'    => esc_html__('Date', 'rodich'),
              'author'     => esc_html__('Author', 'rodich'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'rodich'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'rodich')
          ),
          array(
            'id'    => 'single_banner_area',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Top Banner', 'rodich'),
            'info' => esc_html__('If need to hide banner from single blog post page, please turn this ON.', 'rodich'),
            'default' => false,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Author Info', 'rodich'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this ON.', 'rodich'),
            'default' => false,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Share', 'rodich'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this ON.', 'rodich'),
            'default' => false,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'rodich')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'rodich'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'rodich'),
              'sidebar-hide' => esc_html__('Hide', 'rodich'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'rodich'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'rodich'),
            'options'        => rodich_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'rodich'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'rodich'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'rodich'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'rodich'),
        'options'        => array(
          'sidebar-hide' => esc_html__('Hide', 'rodich'),
          'right-sidebar' => esc_html__('Right', 'rodich'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'rodich'),
        'info'          => esc_html__('Default option : Hide', 'rodich'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'rodich'),
        'options'        => rodich_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'rodich'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'rodich'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'rodich')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'rodich'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'rodich'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Product', 'rodich')
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'rodich'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'rodich'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'rodich'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'rodich'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'rodich'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'rodich'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'rodich'),
            'info'  => esc_html__('Enter 404 page heading.', 'rodich'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'rodich'),
            'info'  => esc_html__('Enter 404 page content.', 'rodich'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'rodich'),
            'info'  => esc_html__('Choose 404 page background styles.', 'rodich'),
            'add_title' => esc_html__('Add 404 Image', 'rodich'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'rodich'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'rodich'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'rodich'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'rodich')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'rodich'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'rodich'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'rodich'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'rodich'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'rodich'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'rodich'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'rodich'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'rodich'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'rodich'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'rodich'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'rodich'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'rodich'),
            'accordion_title' => esc_html__('New Sidebar', 'rodich'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'rodich'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom CSS', 'rodich')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'rodich'),
            ),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'rodich')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'rodich'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'rodich'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'rodich')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'rodich'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'rodich'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'rodich'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WooCommerce', 'rodich')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'rodich'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'rodich')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'rodich'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'rodich'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'rodich_vt_options' );