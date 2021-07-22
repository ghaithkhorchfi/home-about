<?php

if (!function_exists('ruchis_more_product_ajax_scripts')) {
  function ruchis_more_product_ajax_scripts() {
    wp_enqueue_script( 'ruchis-more-product', RODICH_SCRIPTS . '/product-post.js', array( 'jquery' ), RODICH_VERSION, false );
    $rodich_admin_url = array( 
      'ajaxurl' => admin_url('admin-ajax.php'),
      'olderpost' => (cs_get_option('older_post')) ? : esc_html__( 'Prev', 'rodich' ),
      'newerpost' => (cs_get_option('newer_post')) ? : esc_html__( 'Next', 'rodich' ),
    );
    wp_localize_script( 'ruchis-more-product', 'rodich_product_admin', $rodich_admin_url );
  }
  add_action('wp_enqueue_scripts', 'ruchis_more_product_ajax_scripts');
}

if (!function_exists('ruchis_more_product_ajax')) {
  function ruchis_more_product_ajax(){
    $limit = cs_get_option('theme_woo_limit');
    if (!$limit) {
      $ppp = 9;
    } else {
      $ppp = $limit;
    }
    
    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';

    $args = array(
      'post_type'      => 'product',
      'posts_per_page' => $ppp
    );

    if ($cat) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'product_cat',
          'field'    => 'slug',
          'terms'    => $cat,
        ),
      );
    }

    $products = new WP_Query($args);
    if($products->have_posts()) {

      wc_get_template( 'loop/loop-start.php' );
        while ($products->have_posts()) {
          $products->the_post();
          wc_get_template_part ( 'content', 'product' );
        }
      wc_get_template( 'loop/loop-end.php' );

      $max_products = $products->max_num_pages;
      $total_products = $products->found_posts;
      $newerpost = (cs_get_option('newer_post')) ? : esc_html__( 'Next', 'rodich' );

      if ($ppp < $total_products) {
        echo '<nav class="woocommerce-pagination"><ul class="page-numbers ajax-page-numbers">';
          for ($i=1; $i <= $max_products; $i++) { 
            $current = ($i == 1) ? 'current disabled-click' : '';
            echo '<li><a data-page="'.$i.'" class="page-numbers '.$current.'" href="#">'.$i.'</a></li>';
          }
          if ($ppp < $total_products) { echo '<li class="last update-item"><a class="next page-numbers" data-page="2" href="#">'.$newerpost.' <i class="fa fa-angle-right"></i></a></li>'; }
        echo '</ul></nav>';
      }
    }
    wp_die();
  }
}
add_action('wp_ajax_nopriv_ruchis_more_product_ajax', 'ruchis_more_product_ajax');
add_action('wp_ajax_ruchis_more_product_ajax', 'ruchis_more_product_ajax');

if (!function_exists('ruchis_more_product_ajax_pagi')) {
  function ruchis_more_product_ajax_pagi(){
    $limit = cs_get_option('theme_woo_limit');
    if (!$limit) {
      $ppp = 9;
    } else {
      $ppp = $limit;
    }
    
    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
    if ($offset > 1) {
      $offset  = ($offset - 1) * $ppp;
    } else {
      $offset  = 0;
    }

    $args = array(
      'post_type'      => 'product',
      'posts_per_page' => $ppp,
      'offset'         => $offset       
    );

    if ($cat) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'product_cat',
          'field'    => 'slug',
          'terms'    => $cat,
        ),
      );
    }    

    $products = new WP_Query($args);
    if($products->have_posts()) {
      while ($products->have_posts()) {
        $products->the_post();
        wc_get_template_part ( 'content', 'product' );
      }
    }
    wp_die();
  }
}
add_action('wp_ajax_nopriv_ruchis_more_product_ajax_pagi', 'ruchis_more_product_ajax_pagi');
add_action('wp_ajax_ruchis_more_product_ajax_pagi', 'ruchis_more_product_ajax_pagi');