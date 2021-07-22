<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package VT_Framework
 */

?>

<div class="no-results not-found">
	<div class="page-content">
		<header class="roch-blg-single-header">
			<h2 class="text-uppercase roch-blg-single-title no-margin-top"><?php esc_html_e( 'Nothing Found', 'rodich' ); ?></h2>
		</header>
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rodich' ); ?></p>
			<div class="roch-side-widget widget_search">
				<?php get_search_form();?> 
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rodich' ); ?></p>
			<div class=" roch-side-widget widget_search">
				<?php get_search_form();?> 
			</div>
		<?php endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->

<?php
