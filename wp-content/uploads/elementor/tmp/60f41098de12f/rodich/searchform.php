<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'rodich' ); ?></span>
		<input class="search-field" type="text" name="s" id="s" placeholder="<?php esc_html_e('Search...', 'rodich'); ?>" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php esc_html_e('Search', 'rodich'); ?></span></button>
</form>
<?php
