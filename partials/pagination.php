<!-- Post Pagination -->
<?php 
global $wp_query;
$big = 999999999; // need an unlikely integer
$num_links = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type' => 'array',
    'prev_next' => true,
    'prev_text' => __('Previous', 'namirah'),
    'next_text' => __('Next', 'namirah'),
    'mid_size' => 3
));

if ($num_links) { ?>
<div class="blog-pagination">
	<ul>
    <?php 
    	foreach ($num_links as $links) {
            if (strpos($links, "current"))
                echo '<li class="active"><a>' . $links . "</a></li>\n";
            else
                echo '<li>' . $links . "</li>\n";
        }
    ?>
    </ul>
</div>
<?php } ?>