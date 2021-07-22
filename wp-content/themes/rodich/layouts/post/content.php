<?php
/**
 * Template part for displaying posts.
 */

// Theme Options
$rodich_blog_style = cs_get_option('blog_listing_style');
$rodich_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$rodich_read_more_text = cs_get_option('read_more_text');
$rodich_read_text = $rodich_read_more_text ? $rodich_read_more_text : esc_html__( 'KEEP READING', 'rodich' );

// Meta Data
$rodich_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );

// Style
if ($rodich_blog_style === 'style-grid-2') {
	$rodich_blog_columns = ' col-sm-6 ';
	$rodich_post_class = ' roch-single-b-grid-news ';
	$rodich_post_meta = 'inline';
} elseif ($rodich_blog_style === 'style-grid-3') {
	$rodich_blog_columns = ' col-md-4 col-sm-6 ';
	$rodich_post_class = ' roch-single-b-grid-news ';
	$rodich_post_meta = 'inline';
} else {
	$rodich_blog_columns = '';
	$rodich_post_class = ' roch-single-b-stan-post ';
	$rodich_post_meta = 'list';
}

if (is_sticky()) {
	$sticky_class = ' sticky';
} else {
	$sticky_class = '';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('roch-single-b-news' . $rodich_blog_columns . $rodich_post_class . $sticky_class); ?>>
	<?php if (has_post_thumbnail()) { ?>
	<div class="roch-news-photo">
		<?php
			if ($rodich_blog_style === 'style-grid-2') {
				the_post_thumbnail( 'rodich-featured-image-md' );
			} elseif ($rodich_blog_style === 'style-grid-3') {
				the_post_thumbnail( 'rodich-featured-image-sm' );
			} else {
				the_post_thumbnail( 'rodich-featured-image-lg' );
			}
		?>
	</div>
	<?php } // Featured Image ?>

	<!-- Content -->
	<div class="roch-fix roch-news-article-text">
		<?php
			if ($rodich_post_meta === 'list') {
				echo rodich_post_metas();
			}
		?>
		<div class="roch-fix roch-news-post-cont">
			<h2 class="text-uppercase roch-new-title"><a href="<?php echo esc_url( get_permalink() ); ?>" ><?php echo esc_attr(get_the_title()); ?></a></h2>

			<?php
				if ($rodich_post_meta === 'inline') {
					echo rodich_post_metas_inline();
				}
			?>

			<!--  entry content start\-->
			<div class="roch-news-post-entry-content">
				<p><?php
					$blog_excerpt = cs_get_option('theme_blog_excerpt');
					if ($blog_excerpt) {
						$blog_excerpt = $blog_excerpt;
					} else {
						$blog_excerpt = '35';
					}
					rodich_excerpt($blog_excerpt);
					echo rodich_wp_link_pages();
					?>
				</p>
			</div><!--/end-->

			<a class="text-uppercase roch-simple-readmore" href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo esc_attr($rodich_read_text); ?>
			</a>
		</div>
	</div>
	<!-- Content -->

</article><!-- #post-## -->

<?php 

