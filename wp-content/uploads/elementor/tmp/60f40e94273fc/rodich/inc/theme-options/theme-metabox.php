<?php
/*
 * All Metabox related options for Rodich theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function rodich_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'rodich'),
    'post_type' => array('post', 'page', 'product'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Area
      array(
        'name'  => 'title_section',
        'title' => esc_html__('Title Area', 'rodich'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Title Type', 'rodich'),
            'options'   => array(
              'default-title'    => esc_html__('Default Title', 'rodich'),
              'hide-title'       => esc_html__('Hide Title', 'rodich'),
            ),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'rodich'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'rodich'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'page_custom_subtitle',
            'type'  => 'text',
            'title' => esc_html__('Sub Title', 'rodich'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'rodich'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'rodich'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'rodich'),
              'padding-custom' => esc_html__('Custom Padding', 'rodich'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'rodich'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'rodich'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),

        ),
      ),
      // Title Area 

      // Banner Area
      array(
        'name'  => 'banner_section',
        'title' => esc_html__('Banner Area', 'rodich'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_area_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'rodich'),
            'options'   => array(
              'default-banner'    => esc_html__('Default Banner', 'rodich'),
              'fullheight-banner' => esc_html__('Full Window Height', 'rodich'),
            ),
          ),
          array(
            'id'    => 'blog_banner_image',
            'type'  => 'image',
            'title' => esc_html__('Banner Background Image', 'rodich')
          ),
          array(
            'id'        => 'page_banner_button_active',
            'type'      => 'switcher',
            'title'     => esc_html__('Show Buttons?', 'rodich'),
            'default'   => false
          ),
          array(
            'id'              => 'page_banner_buttons',
            'type'            => 'group',
            'title'           => esc_html__('Button', 'rodich'),
            'button_title'    => esc_html__('Add New Button', 'rodich'),
            'accordion_title' => esc_html__('Add Button', 'rodich'),
            'fields'          => array(
              array(
                'id'    => 'button_text',
                'type'  => 'text',
                'title' => esc_html__('Button Text', 'rodich'),
              ),
              array(
                'id'    => 'button_link',
                'type'  => 'text',
                'title' => esc_html__('Link', 'rodich'),
                'attributes'    => array(
                  'placeholder' => 'http://www.link.com',
                ),
              ),
              array(
                'id'    => 'button_link_target',
                'type'  => 'switcher',
                'title' => esc_html__('Open in new tab?', 'rodich'),   
                'default' => false
              ),
            ),
            'dependency'  => array('page_banner_button_active', '==', true),
          ),         

        ),
      ),
      // Banner Area 
      
      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'rodich'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'rodich'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'rodich'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'rodich'),
          ),
          array(
            'id'        => 'enable_onepage',
            'type'      => 'switcher',
            'title'     => esc_html__('Enable Onepage?', 'rodich'),
            'info'      => esc_html__('Turn On if you want your naviagtion as onepage.', 'rodich'),
            'default'   => false,
            'dependency' => array('choose_menu', '!=', ''),
          ), 
          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable & Disable', 'rodich'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'rodich'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'rodich'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'rodich'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'rodich'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Widget', 'rodich'),
            'info' => esc_html__('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'rodich'),
            'default' => false,
            'dependency' => array('header_design', '==', 'style_two'),
          ),

        ),
      ),
      // Header

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'rodich'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'rodich'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'rodich'),
              'padding-custom' => esc_html__('Custom Padding', 'rodich'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'rodich'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'rodich'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'rodich'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'rodich'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_banner',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Banner', 'rodich'),
            'label' => esc_html__('Yes, Please do it.', 'rodich'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'rodich'),
            'label' => esc_html__('Yes, Please do it.', 'rodich'),
          ),          
          array(
            'id'        => 'active_onepage_footer',
            'type'      => 'select',
            'title'     => esc_html__('Choose Footer Type', 'rodich'),
            'options'   => array(
              'default'       => esc_html__('Default', 'rodich'),
              'onepage'       => esc_html__('Onepage', 'rodich'),
            ),
            'dependency'   => array('hide_footer', '==', false),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'rodich'),
    'post_type' => array('page'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => RODICH_CS_IMAGES . '/page-1.png',
              'right-sidebar' => RODICH_CS_IMAGES . '/page-4.png',
              'extra-width'   => RODICH_CS_IMAGES . '/page-2.png',
              'extra-width-banner'   => RODICH_CS_IMAGES . '/page-3.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'rodich'),
            'options'        => rodich_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'rodich'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'rodich'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'rodich'),
            'info'    => esc_html__('Enter client name', 'rodich'),
          ),
          array(
            'id'      => 'testi_city',
            'type'    => 'text',
            'title'   => esc_html__('City', 'rodich'),
            'info'    => esc_html__('Enter client city', 'rodich'),
          ),
          array(
            'id'      => 'testi_star',
            'type'    => 'text',
            'title'   => esc_html__('Client Feedback', 'rodich'),
            'info'    => esc_html__('Enter client feedback (Range: 1- 5)', 'rodich'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Job Position', 'rodich'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'rodich'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'rodich'),
          ),
          array(
            'id'      => 'team_custom_link',
            'type'    => 'text',
            'title'    => esc_html__('Custom Link', 'rodich'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'rodich'),
            ),
            'info'    => esc_html__('Enter your custom link, if you don\'t want to show this page.', 'rodich'),
          ),

        ),
      ),

    ),
  );
  $options[]    = array(
    'id'        => 'team_profile_options',
    'title'     => esc_html__('Social Profiles', 'rodich'),
    'post_type' => 'team',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      array(
        'name'   => 'team_profile_options_section',
        'fields' => array(
          array(
            'id'              => 'team_social_profiles',
            'type'            => 'group',
            'title'           => esc_html__('Social', 'rodich'),
            'button_title'    => esc_html__('Add New Social', 'rodich'),
            'accordion_title' => esc_html__('Add Social', 'rodich'),
            'fields'          => array(
              array(
                'id'      => 'social_name',
                'type'    => 'text',
                'title'    => esc_html__('Profile Name', 'rodich'),
              ),
              array(
                'id'      => 'social_icon',
                'type'    => 'icon',
                'title'    => esc_html__('Profile Icon', 'rodich'),
              ),
              array(
                'id'      => 'social_link',
                'type'    => 'text',
                'title'    => esc_html__('Profile Link', 'rodich'),
                'attributes' => array(
                  'placeholder' => esc_html__('http://', 'rodich'),
                ),
              ),
            ),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // Gallery
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'gallery_options',
    'title'     => esc_html__('Galleries', 'rodich'),
    'post_type' => 'gallery',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      array(
        'name'   => 'gallery_option_section',
        'fields' => array(

          array(
            'id'              => 'gallery_group',
            'type'            => 'group',
            'title'           => esc_html__('Gallery', 'rodich'),
            'button_title'    => esc_html__('Add New Gallery', 'rodich'),
            'accordion_title' => esc_html__('Add Gallery', 'rodich'),
            'fields'          => array(
              array(
                'id'    => 'gallery_title',
                'type'  => 'text',
                'title' => esc_html__('Gallery Title', 'rodich'),
              ),
              array(
                'id'      => 'gallery_image',
                'type'    => 'image',
                'title'   => esc_html__('Upload Images', 'rodich'),
              ),

            ),
          ),      
        ),
      ),

    ),
  );

  // -----------------------------------------
  // Food Menu
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'foodmenu_options',
    'title'     => esc_html__('Food Menu Info', 'rodich'),
    'post_type' => 'foodmenu',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'foodmenu_option_section',
        'fields' => array(
          
          array(
            'id'      => 'foodmenu_price',
            'title'   => esc_html__('Price:', 'rodich'),
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : $24', 'rodich'),
            ),
            'info'    => esc_html__('Enter this food item price.', 'rodich'),
          ),
          
          array(
            'id'      => 'foodmenu_label',
            'title'   => esc_html__('Label:', 'rodich'),
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Recommended', 'rodich'),
            ),
            'info'    => esc_html__('Enter this food item label.', 'rodich'),
          ),
          
          array(
            'id'      => 'foodmenu_link',
            'title'   => esc_html__('Custom Link:', 'rodich'),
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'rodich'),
            ),
            'info'    => esc_html__('Enter this food item custom link.', 'rodich'),
          ),
    
        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'rodich_vt_metabox_options' );