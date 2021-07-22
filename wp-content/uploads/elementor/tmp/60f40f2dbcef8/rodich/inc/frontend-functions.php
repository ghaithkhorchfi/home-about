<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'rodich_vt_excludeCat' ) ) {
  function rodich_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'rodich_vt_excludeCat');
}

/* Excerpt Length */
class RodichExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: rodich_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    RodichExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'RodichExcerpt::new_length');
    RodichExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(RodichExcerpt::$types[RodichExcerpt::$length]) )
      return RodichExcerpt::$types[RodichExcerpt::$length];
    else
      return RodichExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'rodich_excerpt' ) ) {
  function rodich_excerpt($length = 55) {
    RodichExcerpt::length($length);
  }
}

if ( ! function_exists( 'rodich_new_excerpt_more' ) ) {
  function rodich_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'rodich_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'rodich_vt_tag_cloud' ) ) {
  function rodich_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'rodich_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'rodich_vt_password_form' ) ) {
  function rodich_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'rodich_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'rodich_vt_maintenance_mode' ) ) {
  function rodich_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && $maintenance_mode_page && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'rodich_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'rodich_vt_footer_widgets' ) ) {
  function rodich_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

if( ! function_exists( 'rodich_vt_top_bar' ) ) {
  function rodich_vt_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="trnr-topbar"><div class="container"><div class="row">';
      $out .= rodich_vt_top_bar_modules( 'left' );
      $out .= rodich_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'rodich_wp_link_pages' ) ) {
  function rodich_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'rodich' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'rodich_post_metas' ) ) {
  function rodich_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="roch-news-meta">
    <?php
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <span class="roch-post-date"><?php echo get_the_date(); ?></span>
      <?php if (!is_single()) {
      echo '<br>';
      } else {
        echo '';
      }
    } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <span class="roch-post-by">
      <?php
      printf(
        esc_html__('By','rodich') .' <a class="roch-news-author-name" href="%1$s" rel="author">%2$s</a>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </span>
      <?php if (!is_single()) {
      echo '<br>';
      } else {
        echo '';
      }
    } // Author Hides
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ' );
        if ( $category_list ) {
          echo '<span class="roch-post-in">'. esc_html__('In ','rodich') . $category_list .' </span>';
        }
      }
    } // Category Hides
    ?>
  </div>
  <?php
  }
}

/* Metas Inline */
if ( ! function_exists( 'rodich_post_metas_inline' ) ) {
  function rodich_post_metas_inline() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="roch-news-meta">
    <?php
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <span class="roch-post-date"><?php echo get_the_date(); ?></span>
    <?php if (!$metas_hide): ?>
      &#45;
    <?php endif;  } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <span class="roch-post-by">
      <?php
      printf(
        esc_html__('By','rodich') .' <a class="roch-news-author-name" href="%1$s" rel="author">%2$s</a>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </span>
    <?php } // Author Hides ?>
  </div>
  <?php
  }
}

/* Author Info */
if ( ! function_exists( 'rodich_author_info' ) ) {
  function rodich_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'Author', 'rodich' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="roch-fix roch-blg-sin-author-bio">
    <div class="roch-blg-sin-author-bio-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
      </a>
    </div>
    <div class="roch-fix roch-blg-sin-author-bio-desc">
      <h5><a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a></h5>
      <p><?php echo get_the_author_meta( 'description' ); ?></p>
      <?php
      $facebook = get_the_author_meta('facebook');
      $twitter  = get_the_author_meta('twitter');
      $google_plus = get_the_author_meta('google_plus');
      $vine = get_the_author_meta('vine');
      $pinterest = get_the_author_meta('pinterest');
      $instagram = get_the_author_meta('instagram');
        if( $facebook || $twitter || $google_plus || $linkedin ){
          echo '<div class="roch-follow-us-social"><ul class="list-inline">';
            if($facebook){
              echo '<li><a href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a></li>';
            }
            if($twitter){
              echo '<li><a href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a></li>';
            }
            if($google_plus){
              echo '<li><a href="'.esc_url($google_plus).'"><i class="fa fa-google-plus"></i></a></li>';
            }
            if($vine){
              echo '<li><a href="'.esc_url($vine).'"><i class="fa fa-vine"></i></a></li>';
            }
            if($pinterest){
              echo '<li><a href="'.esc_url($pinterest).'"><i class="fa fa-pinterest-p"></i></a></li>';
            }
            if($instagram){
              echo '<li><a href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a></li>';
            }
          echo '</ul></div>';
        }
      ?>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'rodich_comment_modification' ) ) {
  function rodich_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = !( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="pxls-comments-meta">
        <h4><?php printf( '%s', get_comment_author() ); ?></h4>
        <span class="says"><?php echo esc_html__( 'Says ', 'rodich' ); ?></span>
        <span class="comments-date">
          <?php echo get_comment_date('d M Y'); echo esc_html__( ' at ', 'rodich' ); ?>
          <?php echo get_comment_time(); ?>
        </span>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'rodich' ); ?></em>
      <?php endif; ?>
      <div class="comment-content">
        <?php comment_text(); ?>
      </div>

      <div class="comments-reply">
      <?php
        comment_reply_link( array_merge( $args, array(
        'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','rodich') .'</span>',
        'before' => '',
        'class'  => '',
        'depth' => $depth,
        'max_depth' => $args['max_depth']
        ) ) );
      ?>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Comments Form - Textarea next to Normal Fields */
if( ! function_exists( 'rodich_move_comment_field' ) ) {
  add_filter( 'comment_form_fields', 'rodich_move_comment_field' );
  function rodich_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
  }
}

/* Title Area */
if ( ! function_exists( 'rodich_title_area' ) ) {
  function rodich_title_area() {
    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $vtheme_id    = ( isset( $post ) ) ? $post->ID : 0;
    $vtheme_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $vtheme_id;
    $vtheme_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $vtheme_id;
    $vtheme_meta  = get_post_meta( $vtheme_id, 'page_type_metabox', true );

    if ($vtheme_meta && (!is_archive() || is_shop())) {
      $custom_title = $vtheme_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    if ( is_front_page() && is_home() ) {
      bloginfo('name');
    } elseif ( is_front_page() ) {
      bloginfo('name');
    } elseif ( is_home() ) {
      single_post_title();
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'rodich' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Tag: ', 'rodich'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( esc_html__( 'Archive for %s', 'rodich' ), get_the_date());
      } elseif ( is_month() ) {
        printf( esc_html__( 'Archive for %s', 'rodich' ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( esc_html__( 'Archive for %s', 'rodich' ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( esc_html__( 'Posts by: %s', 'rodich' ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_woocommerce_shop() ) {
        echo esc_attr( $custom_title );
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'rodich' );
      }
    } elseif( is_404() ) {
      esc_html_e('404', 'rodich');
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'rodich_paging_nav' ) ) {
  function rodich_paging_nav($nav_query = NULL) {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( 'Prev', 'rodich' );
      $newer_post = $newer_post ? $newer_post : esc_html__( 'Next', 'rodich' );

      global $wp_query;
      $big = 999999999;
      $current = max( 1, get_query_var('paged') );
      $total = ($nav_query != NULL) ? $nav_query->max_num_pages : $wp_query->max_num_pages;

      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => '<i class="fa fa-angle-left"></i> ' . $older_post,
        'next_text' => $newer_post . ' <i class="fa fa-angle-right"></i>',
        'current' => $current,
        'total' => $total,
        'type' => 'plain'
      ));
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

/**
 * Strip Single Tag
 */
if ( ! function_exists( 'rodich_strip_single_tag' ) ) {
  function rodich_strip_single_tag( $str, $tag ) {
    $str1 = preg_replace('/<\/'.$tag.'>/i', '', $str);
    if( $str1 != $str ) {
      $str=preg_replace('/<'.$tag.'[^>]*>/i', '', $str1);
    }
    return $str;
  }
}

/**
 * Strip Single p Tag
 */
if ( ! function_exists( 'rodich_strip_p_tag' ) ) {
  function rodich_strip_p_tag( $str ) {
    $str1 = preg_replace('/<\/p>/i', '', $str);
    if( $str1 != $str ) {
      $str = preg_replace( '/<p[^>]*>/i', '', $str1 );
    }
    return $str;
  }
}

/**
 * Default Menu Fallback
 */
if ( ! function_exists( 'rodich_menu_fallback' ) ) {
  function rodich_menu_fallback($args) {
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before . '<a href="' .admin_url( 'nav-menus.php' ) . '">' . $before . esc_html__( 'Add a menu', 'rodich' ) . $after . '</a>' . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( $container )
    {
        $output = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo ) {
      echo $output;
    }

    return $output;
  }
}

/**
 * Contact Form 7
 */
function ruchis_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );
  return $form;
}
add_filter( 'wpcf7_form_elements', 'ruchis_wpcf7_form_elements' );

/***************************************************************************************
 * Woocommerce settings
****************************************************************************************/

// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// Remove the product rating display on single product loops
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

/**
 * Hide shop title
*/
function rodich_woo_hide_page_title() {
  return false;
}
add_filter( 'woocommerce_show_page_title' , 'rodich_woo_hide_page_title' );

/**
 * Product Category
 * Custom Hook
*/
function rodich_woocommerce_shop_loop_item_cat_function() {
  global $post;
  $terms = get_the_terms( $post->ID, 'product_cat' );
  if($terms){
    echo '<ul class="product-cats roch-remove-defult-list-style roch-slash-meta">';
    foreach ($terms as $category) {
      echo '<li>'.$category->name.'</li>';
    }
    echo '</ul>';
  }
}
add_action( 'rodich_woocommerce_shop_loop_item_cat' , 'rodich_woocommerce_shop_loop_item_cat_function' );

/**
 * Product Shorter
 * Custom Hook
*/
if(!function_exists('rodich_woocommerce_shop_filter_menu_function')){
  function rodich_woocommerce_shop_filter_menu_function() {
    $product_categories = get_terms( 'product_cat' );
    echo '<div class="roch-shop-filter-list-warp"><div id="roch_sorters" class="text-center roch-filter-btn-group">';
    echo '<ul class="roch-remove-defult-list-style  roch-food-menu-nav">';
    echo '<li class="button is-checked" data-cat=""><a href="#">'. esc_html__( 'All Product', 'rodich' ) .'</a></li>';
    foreach ($product_categories as $category) {
      echo '<li class="button"><a href="#" data-cat="'.$category->slug.'">'.$category->name.'</a></li>';
    }
    echo '</ul>';
    echo '</div></div>';
  }
  add_action( 'rodich_woocommerce_shop_filter_menu' , 'rodich_woocommerce_shop_filter_menu_function' );
}

/**
 * Product Title with link
 * Custom Hook
*/
if ( ! function_exists( 'rodich_woocommerce_template_loop_product_title_function' ) ) {
  function rodich_woocommerce_template_loop_product_title_function() {
    echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
  }
  add_action( 'rodich_woocommerce_template_loop_product_title' , 'rodich_woocommerce_template_loop_product_title_function' );
}

/**
 * Ajaxify menu cart total.
*/
function rodich_woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
  <a class="roch-cart-count" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'rodich'); ?>"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></a>
  <?php
  $fragments['a.roch-cart-count'] = ob_get_clean();
  return $fragments;
}
add_filter('add_to_cart_fragments', 'rodich_woocommerce_header_add_to_cart_fragment');

/**
 * Ajaxify menu mini cart
*/
function rodich_woocommerce_add_to_cart_fragments( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
  <div class="widget_shopping_cart_content">
      <?php woocommerce_mini_cart(); ?>
  </div>
  <?php $fragments['div.widget_shopping_cart_content'] = ob_get_clean();
  return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'rodich_woocommerce_add_to_cart_fragments' );

/**
 * Limit products (Theme Option)
*/
function rodich_new_loop_shop_per_page( $cols ) {
  $limit = cs_get_option('theme_woo_limit');
  if (!$limit) {
    $cols = 9;
  } else {
    $cols = $limit;
  }
  return $cols;
}
add_filter( 'loop_shop_per_page', 'rodich_new_loop_shop_per_page', 20 );

/**
 * Remove Upsell and Related Product (Theme Option)
*/
function rodich_woo_disable_options(){

  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if ($woo_single_upsell) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
  }

  $woo_single_related = cs_get_option('woo_single_related');
  if ($woo_single_related) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }

}
add_action( 'init', 'rodich_woo_disable_options' );

/**
 * Change add to cart text (Theme Option)
*/
function rodich_add_to_cart_text(){
  $add_to_cart_text = cs_get_option('add_to_cart_text');
  if ($add_to_cart_text) {
    add_filter( 'woocommerce_product_add_to_cart_text', function(){return cs_get_option('add_to_cart_text');} );    // 2.1 +
    add_filter( 'woocommerce_product_single_add_to_cart_text', function(){return cs_get_option('add_to_cart_text');} );    // 2.1 +
  }
}
add_action( 'init', 'rodich_add_to_cart_text' );

/**
 * Single Product Image Lightbox Active
*/
function rodich_single_product_gallery_image() {
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'rodich_single_product_gallery_image' );

// Define image sizes
add_theme_support( 'woocommerce', array(
  'thumbnail_image_width' => 370,
  'single_image_width' => 585,
  ) );

update_option( 'woocommerce_thumbnail_cropping', 'custom' );
update_option( 'woocommerce_thumbnail_cropping_custom_width', '19' );
update_option( 'woocommerce_thumbnail_cropping_custom_height', '18' );
