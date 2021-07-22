<?php
/**
 * Template part for displaying food menus.
 */

// Meta Options
$info = get_post_meta( get_the_ID(), 'foodmenu_options', true );
if (isset($info)) {
	$price 	= $info['foodmenu_price'];
	$label 	= $info['foodmenu_label'];
	$link 	= $info['foodmenu_link'];
} else {
	$price 	= '';
	$label 	= '';
	$link 	= '';
}
?>

<!--roch product content filter function-->
<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-6 foodmenu-single'); ?>>
    <div class="text-center roch-special-dishe-single">
	    <div class="roch-special-dishe-photo">
	    	<?php
		    	if($price){
		    		echo '<span class="roch-spec-dis-price">'. esc_html__( 'Only', 'rodich' ) . ' ' . esc_attr( $price ).'</span>';
		    	}
	        	if (has_post_thumbnail()) {
	        		the_post_thumbnail( 'rodich-featured-image-foodmenu' );
	       		}
	        ?>
	    </div>
	    <div class="roch-special-dishe-text">
	    	<?php
        if ($link) {
          $link = $link;
        } else {
          $link = get_the_permalink();
        }
	    	?>
		    <h4><a class="roch-special-dishe-title" href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
		    <ul class="roch-remove-defult-list-style roch-slash-meta roch-special-dishe-meta">
				<?php
				    $terms = get_the_terms( get_the_ID(), 'foodmenu_cat' );
				    foreach ( $terms as $term ) {
				      echo '<li><a href="'.esc_url( get_term_link( $term->slug, 'foodmenu_cat' ) ).'">'.esc_attr( $term->name ).'</a></li>';
				    }
				?>
		    </ul>
		</div>
	</div>
</div>

<?php
