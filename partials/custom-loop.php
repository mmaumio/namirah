<?php
/**
 * @package macaw
 */

global $nm_option;
// Define custom query parameters
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array(
    'posts_per_page'   => 5,
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
    'paged'            => $paged,
    );

// Instantiate custom query
$nm_custom_query = new WP_Query( $args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $nm_custom_query;

// Output custom query loop
if ( $nm_custom_query->have_posts() ) :
    while ( $nm_custom_query->have_posts() ) : $nm_custom_query->the_post();
        get_template_part( 'content' );
    endwhile;
endif;

wp_reset_postdata();
