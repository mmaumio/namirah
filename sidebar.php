<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package namirah
 */

$get_sidebar = get_post_meta( get_the_ID(), '_nm_select_sidebar', true );

?>

<div class="col-md-4 sidebar">
	<?php 
	if ( !empty( $get_sidebar ) ) {
		dynamic_sidebar( $get_sidebar );
	} else {
		dynamic_sidebar( 'sidebar-widget-1' );
	}	
    ?>	
</div>