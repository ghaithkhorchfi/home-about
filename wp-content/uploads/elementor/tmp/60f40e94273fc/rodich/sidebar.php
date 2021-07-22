<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$rodich_blog_widget = cs_get_option('blog_widget');
$rodich_single_blog_widget = cs_get_option('single_blog_widget');
$rodich_team_widget = cs_get_option('team_widget');

// Page Layout Options
$rodich_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

?>

<div class="roch-fix roch-blog-stan-custom-col-right">
	<div class="roch-sidebar-warp">
	<?php if(is_array($rodich_page_layout) && isset($rodich_page_layout)) {
			if (is_page() && $rodich_page_layout['page_sidebar_widget']) {
				if (is_active_sidebar($rodich_page_layout['page_sidebar_widget'])) {
					dynamic_sidebar($rodich_page_layout['page_sidebar_widget']);
				}
			} 
		} elseif (!is_page() && $rodich_blog_widget && !$rodich_single_blog_widget) {
			if (is_active_sidebar($rodich_blog_widget)) {
				dynamic_sidebar($rodich_blog_widget);
			}
		} else {
			if (is_active_sidebar('sidebar-1')) {
				dynamic_sidebar( 'sidebar-1' );
			}
		} ?>
	</div><!-- #secondary -->
</div>

<?php
