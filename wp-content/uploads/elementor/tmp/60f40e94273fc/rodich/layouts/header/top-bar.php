<?php
// Metabox
global $post;
$rodich_id    = ( isset( $post ) ) ? $post->ID : false;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;
$rodich_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $rodich_id : false;
$rodich_meta  = get_post_meta( $rodich_id, 'page_type_metabox', true );

$top_bar_info = cs_get_option('top_bar_info');
$social_icon_text = cs_get_option('social_icon_text');
$top_bar = cs_get_option('top_bar');
$top_bar_social = cs_get_option('top_bar_social');
$top_bar_reservation = cs_get_option('top_bar_reservation');
$top_bar_reservation_text = cs_get_option('top_bar_reservation_text');
$top_bar_reservation_link = cs_get_option('top_bar_reservation_link');

if($top_bar == false) {
?>
<!--  header top start  \-->
<div class="roch-header-top-info">
    <div class="container">
        <div class="row">
            <!--  header top info start  \-->
            <div class="col-md-7">
                <h4 class="text-left roch-header-info">
                    <?php echo do_shortcode( $top_bar_info ); ?>
                </h4>
            </div><!--/  header top info end-->

            <!--  header top follow us social start  \-->
            <div class="col-md-5">
                <div class="text-right roch-follow-us-social">
                    <?php if ($top_bar == false):
                     if ($social_icon_text): ?>
                            <span class="roch-follow-us-text"><?php echo esc_attr($social_icon_text); ?> :</span>
                        <?php endif;

                         if(isset($top_bar_social)) : ?>
                        <ul class="list-inline">
                            <?php foreach ($top_bar_social as $key => $social): ?>
                                <li><a href="<?php echo esc_url($social['top_bar_social_link']); ?>"><i class="<?php echo esc_attr( $social['top_bar_social_icon'] ); ?>"></i></a></li>
                            <?php endforeach ?>
                        </ul>
                        <?php endif;
                         endif;
                          if ( $top_bar_reservation == false ):
                           if ( $top_bar_reservation_text ): ?>
                            <!--header Reservation btn start-->
                            <a class="roch-top-res-btn roch-btn-hover-one" href="<?php echo esc_url( $top_bar_reservation_link ); ?>"><span><?php echo esc_attr( $top_bar_reservation_text ); ?></span></a><!--/ end-->
                        <?php endif;
                         endif ?>
                </div>
            </div><!--/  header top follow us social end-->
        </div>
    </div>
</div><!--/  header top end-->
<?php } // Hide Topbar - From Metabox