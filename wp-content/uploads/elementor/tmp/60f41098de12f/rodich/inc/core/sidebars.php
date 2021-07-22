<?php
/*
 * Rodich Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( ! function_exists( 'rodich_vt_widget_init' ) ) {
	function rodich_vt_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'rodich' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'rodich' ),
					'before_widget' => '<aside id="%1$s" class="roch-side-widget %2$s">',
					'after_widget' => '</aside> <!-- end widget -->',
					'before_title' => '<h2 class="roch-side-widget-title">',
					'after_title' => '</h2>',
				)
			);
			// Main Widget Area

			// Footer Widgets
			$footer_widgets = cs_get_option( 'footer_widget_layout' );
		    if( $footer_widgets ) {

		      switch ( $footer_widgets ) {
		        case 5:
		        case 6:
		        case 7:
		          $length = 3;
		        break;

		        case 8:
		        case 9:
		          $length = 4;
		        break;

		        default:
		          $length = $footer_widgets;
		        break;
		      }

		      for( $i = 0; $i < $length; $i++ ) {

		        $num = ( $i+1 );

		        register_sidebar( array(
		          'id'            => 'footer-' . $num,
		          'name'          => esc_html__( 'Footer Widget ', 'rodich' ). $num,
		          'description'   => esc_html__( 'Appears on footer section.', 'rodich' ),
		          'before_widget' => '<div class="roch-footer-single-widget %2$s">',
		          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
		          'before_title'  => '<h2 class="roch-widgettitle">',
		          'after_title'   => '</h2>'
		        ) );
		      }
		    }
		    // Footer Widgets

		    // Onepage Widgets
	        register_sidebar( array(
	          'id'            => 'footer-onepage',
	          'name'          => esc_html__( 'Footer Widget (Onepage) ', 'rodich' ),
	          'description'   => esc_html__( 'Appears on footer section in onepage.', 'rodich' ),
	          'before_widget' => '<div class="roch-footer-single-widget %2$s">',
	          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
	          'before_title'  => '<h2 class="roch-widgettitle">',
	          'after_title'   => '</h2>'
	        ) );
	        // Onepage Widgets

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_attr($heading),
					'id' => $own_id,
					'description' => esc_attr($desc),
					'before_widget' => '<div id="%1$s" class="roch-side-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h2 class="roch-side-widget-title">',
					'after_title' => '</h2>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'rodich_vt_widget_init' );
}