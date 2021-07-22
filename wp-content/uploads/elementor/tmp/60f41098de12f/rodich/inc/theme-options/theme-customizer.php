<?php
/*
 * All customizer related options for Rodich theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'rodich_vt_customizer' ) ) {
  function rodich_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'rodich'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements Color', 'rodich'),
					'description'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'rodich'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Topbar Color
	$options[]      = array(
	  'name'        => 'topbar_color_section',
	  'title'       => esc_html__('01. Topbar Colors', 'rodich'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'topbar_bg_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Bar Color', 'rodich'),
					),
				),
			),
			array(
				'name'      => 'topbar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'rodich'),
				),
			),
			array(
				'name'      => 'topbar_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'rodich'),
				),
			),
			array(
				'name'          => 'topbar_text_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Common Color', 'rodich'),
					),
				),
			),
			array(
				'name'      => 'topbar_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'rodich'),
				),
			),
			array(
				'name'      => 'topbar_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'rodich'),
				),
			),
			array(
				'name'      => 'topbar_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'rodich'),
				),
			),
			array(
				'name'          => 'topbar_social_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Social Icon Color', 'rodich'),
					),
				),
			),
			array(
				'name'      => 'topbar_social_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icon Color', 'rodich'),
				),
			),
			array(
				'name'      => 'topbar_social_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icons Hover Color', 'rodich'),
				),
			),
	    // Fields End

	  )
	);
	// Topbar Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'rodich'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Main Menu Colors', 'rodich'),
					),
				),
			),
			array(
				'name'      => 'header_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'rodich'),
				),
			),
			array(
				'name'      => 'header_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'rodich'),
				),
			),
			array(
				'name'      => 'header_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'rodich'),
				),
			),
			array(
				'name'      => 'header_rollover_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Rollover Link Color', 'rodich'),
				),
			),
			array(
				'name'      => 'header_rollover_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Rollover Link Hover Color', 'rodich'),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'rodich'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'rodich'),
				),
			),
			array(
				'name'      => 'submenu_bg_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Hover Color', 'rodich'),
				),
			),
			array(
				'name'      => 'submenu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'rodich'),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'rodich'),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'rodich'),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('03. Content Colors', 'rodich'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'rodich'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'rodich'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Color', 'rodich'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'rodich'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'rodich'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'rodich'),
						),
					),
	      			array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'rodich'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('04. Footer Colors', 'rodich'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Rodich > Theme Options > Footer ', 'rodich'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'rodich'),
	      'settings'      => array(

			    // Fields Start
				array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'rodich'),
			        ),
			      ),
			    ),
				array(
					'name'      => 'footer_heading_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Widget Heading Color', 'rodich'),
					),
				),
				array(
					'name'      => 'footer_text_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Widget Text Color', 'rodich'),
					),
				),
				array(
					'name'      => 'footer_link_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Widget Link Color', 'rodich'),
					),
				),
				array(
					'name'      => 'footer_link_hover_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Widget Link Hover Color', 'rodich'),
					),
				),
				array(
					'name'      => 'footer_link_border_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Widget Link Border Color', 'rodich'),
					),
				),
				array(
					'name'      => 'footer_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Background Color', 'rodich'),
					),
				),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'rodich'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : <br /> <strong>Rodich > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'rodich'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'rodich'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'rodich'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'rodich'),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'rodich'),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'rodich_vt_customizer' );
}