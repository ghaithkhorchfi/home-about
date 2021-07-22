<?php
/**
 * Single Post.
 */
// Metabox
$rodich_id    = ( isset( $post ) ) ? $post->ID : 0;
$rodich_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $rodich_id;
$rodich_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $rodich_id;

$rodich_page_layout_meta  = get_post_meta( $rodich_id, 'page_layout_options', true );
if ($rodich_page_layout_meta) {
	$rodich_sidebar_position = $rodich_page_layout_meta['page_layout'];
} else {
	$rodich_sidebar_position = '';
}

$rodich_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$rodich_blog_style = cs_get_option('blog_listing_style');
$rodich_single_featured_image = cs_get_option('single_featured_image');

// Single Theme Option
$rodich_single_author_info = cs_get_option('single_author_info');
$rodich_single_share_option = cs_get_option('single_share_option');

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('roch-single-blog-post'); ?>>
	<header class="roch-blg-single-header">
		<?php if (has_post_thumbnail()) { ?>
			<div class="roch-blg-single-banner">
				<?php the_post_thumbnail( 'rodich-featured-image-lg' ); ?>
			</div>
		<?php } ?>

		<h2 class="text-uppercase roch-blg-single-title"><?php the_title(); ?></h2>
		<?php if(!is_page()){ echo rodich_post_metas(); } ?>
	</header>

	<!-- Content -->
	<article class="roch-blog-single-strandard-entry-content">
		<?php
			the_content();
			echo rodich_wp_link_pages();
		?>
	</article>
	<!-- Content -->

	<?php if(!is_page()){ ?>

	<!-- Tags and Share -->
	<footer class="roch-blg-single-footer">
		<?php
			$tag_list = get_the_tags();
		  	if($tag_list) {
  		?>
		<div class="roch-blg-single-foo-meta-warp">
			<?php the_tags( '<span>' . esc_html__( 'Tags: ', 'rodich' ) . '</span><p class="roch-blg-sin-foo-meta">', ' ', '</p>' ); ?>
		</div>
		<?php }
		if ( function_exists( 'rodich_likes' ) ) { ?>
		<!-- social start/-->
		<div class="roch-blg-sin-foo-social-warp">
			<?php
			if ( function_exists( 'rodich_likes' ) ) {
				echo rodich_likes();
			} ?>

			<!-- socail start \-->
			<div class="text-right col-xs-8 roch-blg-sin-scoial">
				<?php
					if($rodich_single_share_option == false) {
						if ( function_exists( 'rodich_wp_share_option' ) ) {
							echo rodich_wp_share_option();
						}
					}
				?>
			</div><!--/ end-->
		</div><!--/ end-->
		<?php } ?>
	</footer>
	<!-- Tags and Share -->

	<!-- Author Info -->
	<?php
	if($rodich_single_author_info == false) {
		echo rodich_author_info();
	}
	?>
	<!-- Author Info -->

	<?php } ?>

</div><!-- #post-## -->

<?php

