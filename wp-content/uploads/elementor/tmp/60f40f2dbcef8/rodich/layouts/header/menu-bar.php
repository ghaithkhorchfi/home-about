<?php
// Metabox
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $rodich_id : false;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox

$rodich_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$rodich_breakpoint = $rodich_mobile_breakpoint ? $rodich_mobile_breakpoint : '767';

$rodich_side_bar_area = cs_get_option('side_bar_area');
$rodich_side_bar_area_bg = cs_get_option('side_bar_area_bg');
$rodich_side_flickr = cs_get_option('side_flickr');
$rodich_side_logo = cs_get_option('side_logo');
$rodich_top_bar_search = cs_get_option('top_bar_search');
$rodich_top_bar_shop = cs_get_option('top_bar_shop');
$rodich_side_menu = cs_get_option('side_menu');
$rodich_side_additional_info = cs_get_option('side_additional_info');
$sticky_header_cs = cs_get_option('sticky_header');
$sticky_header = $sticky_header_cs ? 'roch-sticky' : '';
?>
<!--  header menu area start  \-->
<div class="roch-header-menu-wrapper <?php echo esc_attr($sticky_header); ?>">
  <div class="container">
    <div class="row">
      <!--  header logos start  \-->
      <div class="col-xs-6 col-sm-4 col-md-2 roch-header-logos">
        <!--  header logo white start  \-->
        <?php get_template_part( 'layouts/header/logo', 'white' );

         get_template_part( 'layouts/header/logo', 'dark' ); ?>
        <!--/ end-->

      </div><!--/  header logos end-->

      <div class="col-xs-6 col-sm-8 col-md-10">

        <!-- header buttons start \-->
        <div class="roch-menu-btn-warp">
          <?php if(!$rodich_top_bar_search){ ?>
          <!-- serch form start \-->
          <div class="roch-serch-btn-main">
            <a href="#" class="roch-search-icon"></a>
            <div id="roch-search-form">
                <form  action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" name="s" id="s" placeholder="<?php esc_html_e('Search...', 'rodich'); ?>" />
                </form>
            </div>
          </div><!--/ end-->
          <?php }

           if(!$rodich_top_bar_shop){ ?>
          <!-- Shop btn start \-->
          <div class="roch-shop-btn-main">
            <?php if (is_woocommerce_activated()):
             global $woocommerce; ?>
              <a class="roch-cart-count" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'rodich'); ?>"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></a>
              <!--wooc cart widget start\-->
              <div class="roch-header-cart-items">
                <div class="widget_shopping_cart_content">
                  <?php echo wc_get_template( 'cart/mini-cart.php' ); ?>
                </div>
              </div>
            <?php endif ?>
          </div><!--/ end-->
          <?php }
           if(!$rodich_side_bar_area){ ?>
          <!-- off canves menu open btn start \-->
          <a href="#" class="roch-off-canves-nav-icon"></a><!--/ end-->
          <?php } ?>

        </div>
        <!--/ header buttons end-->

        <!-- Nav main menu start \-->
        <?php
          if ($rodich_meta) {
            $rodich_choose_menu = $rodich_meta['choose_menu'];
            if ($rodich_choose_menu) {
              $rodich_menu = $rodich_meta['enable_onepage'];
              if ($rodich_menu) {
                $rodich_choose_menu_class = 'roch-smooth-hash-link';
              } else {
                $rodich_choose_menu_class = '';
              }
            } else {
              $rodich_choose_menu_class = '';
            }
          } else {
            $rodich_choose_menu = '';
            $rodich_choose_menu_class = '';
          }
          $rodich_choose_menu = $rodich_choose_menu ? $rodich_choose_menu : '';
          $rodich_choose_menu_class = $rodich_choose_menu_class ? $rodich_choose_menu_class : '';

          echo '<div class="hidden-xs hidden-sm roch-nav-wrapper"><nav id="roch-main-menu-warp" data-starts="'. $rodich_breakpoint .'">';

          wp_nav_menu(
            array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'container'         => '',
              'container_class'   => '',
              'container_id'      => '',
              'menu'              => $rodich_choose_menu,
              'menu_class'        => 'roch-remove-defult-list-style ' . $rodich_choose_menu_class,
              'menu_id'           => 'roch-main-menu',
              'fallback_cb'       => 'rodich_menu_fallback'
            )
          );
          echo '</nav></div>';

         if(!$rodich_side_bar_area){ ?>
          <!-- = Off canves menu area start = \-->
          <?php
            if($rodich_side_bar_area_bg){
              $bg_image = esc_url($rodich_side_bar_area_bg['image']);
              $bg_repeat = esc_attr($rodich_side_bar_area_bg['repeat']);
              $bg_position = esc_attr($rodich_side_bar_area_bg['position']);
              $bg_attachment = esc_attr($rodich_side_bar_area_bg['attachment']);
              $bg_size = esc_attr($rodich_side_bar_area_bg['size']);
              $bg_color = esc_attr($rodich_side_bar_area_bg['color']);
              $toggle_bar_bg = 'background: url(' . $bg_image . ') ' . $bg_repeat . ' ' . $bg_attachment . ' ' . $bg_position . ' ' . $bg_size . ' ' . $bg_color;
            } else {
              $toggle_bar_bg = '';
            }
          ?>
          <div class="roch-off-canves-overly"></div>
          <div id="roch-off-canves-area" style="<?php echo esc_attr($toggle_bar_bg); ?>">
            <?php if(!$rodich_side_logo){ ?>
            <!-- Off canves header start \-->
            <div class="roch-off-canves-header">
              <?php get_template_part( 'layouts/header/logo', 'white' ); ?>
            </div><!--/ end-->
            <?php } ?>

            <!-- Off canves main content start \-->
            <div class="roch-off-canves-main-content">
              <?php if(!$rodich_side_menu){

                wp_nav_menu(
                  array(
                    'menu'              => 'sidemenu',
                    'theme_location'    => 'sidemenu',
                    'container'         => 'div',
                    'container_class'   => 'roch-off-canves-menu-warp',
                    'container_id'      => '',
                    'menu'              => '',
                    'menu_class'        => 'roch-remove-defult-list-style',
                    'menu_id'           => 'roch-off-canves-menu',
                    'fallback_cb'       => 'rodich_menu_fallback'
                  )
                );
              ?>
              <!--/ end-->
              <div style="clear:both;"></div>
              <!-- off canves single widget start \-->
              <?php }

                if (!$rodich_side_flickr) {
                  if (function_exists('rodich_flickr_images')) {
                    rodich_flickr_images();
                  }
                }
              ?><!--/ end-->

            <!-- off canves footer start \-->
            <div class="roch-off-canves-footer">
              <div class="roch-off-canves-footer-info">
                <?php echo wpautop(do_shortcode( $rodich_side_additional_info )); ?>
              </div>
            </div><!--/ end-->

            <!-- off canves menu cloase btn start \-->
            <a href="#" class="roch-off-canves-close-btn"></a><!--/ end-->
          </div>
          <!--/=XXX Off canves menu area end XXX=-->

        </div>
      <?php } ?>
      </div>

    </div>
  </div>
</div><!--/  header menu area end-->
<?php
