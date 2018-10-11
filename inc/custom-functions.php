<?php

// Primary Menu function
if( ! function_exists('namirah_primary_menu') ) {
    function namirah_primary_menu() {
		$defaults = array(
	        'theme_location'  => 'primary-menu',
	        'menu'            => 'Primary Menu',
	        'container'       => 'nav',
	        'container_class' => 'top-nav pull-left',
	        'container_id'    => false,
	        'menu_class'      => 'sf-menu',
	        'menu_id'         => 'main-nav',
	        'echo'            => true,
	        'fallback_cb'     => false,
	        'before'          => '',
	        'after'           => '',
	        'link_before'     => '',
	        'link_after'      => '',
	        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	        'depth'           => 0,
	        'walker'          => ''
	    );
		wp_nav_menu( $defaults );
    }
}

// Get Post Function
function nm_get_posts($type, $number) {
    $args = array(
        'post_type'        => $type,
        'posts_per_page'   => $number,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_status'      => 'publish',
    );

    $nm_posts = get_posts($args);
    return $nm_posts;
}


// Next previous post add attributes

add_filter('previous_post_link', 'prev_post_link_attributes');
add_filter('next_post_link', 'next_post_link_attributes');
 
function prev_post_link_attributes($output) {
    $code = 'class="prev-post nav-ind clearfix waves-effect"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

function next_post_link_attributes($output) {
    $code = 'class="next-post nav-ind clearfix waves-effect"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

// Limiting the title 
if ( !function_exists( 'nm_titlesmall' ) ) {
    function nm_titlesmall($before = '', $after = '', $title, $length = false) { 

        if ( $length && is_numeric($length) ) {
            $title = substr( $title, 0, $length );
        }

        if ( strlen($title)> 0 ) {
            $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
            echo $title;
        }
    }
}

// Breadcrumb

if ( !function_exists('nm_breadcrumb') ) { 
    function nm_breadcrumb() {
         
        // Settings
        $home_title = 'Home';
         
        // Get the query & post information
        global $post,$wp_query;
        $category = get_the_category();
         
        // Build the breadcrums
        echo '<div class="breadcrumb-wrap">';
         
        // Do not display on the homepage
        if ( !is_front_page() ) {
             
            // Home page
            echo '<span class="breadcrumb-label">'._e('You are here:', 'namirah').'</span>';
            echo '<span><a href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></span>';
             
            if ( is_single() ) {
                 
                // Single post (Only display the first category)
                echo '<span><a href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
                echo '<span class="breadcrumb-topic" title="' . get_the_title() . '">' . get_the_title() . '</span>';
                 
            } else if ( is_category() ) {
                 
                // Category page
                echo '<span><a href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</span>';
                 
            } else if ( is_page() ) {
                 
                // Standard page
                if( $post->post_parent ){
                     
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                     
                    // Get parents in the right order
                    $anc = array_reverse($anc);
                     
                    // Parent page loop
                    foreach ( $anc as $ancestor ) {
                        $parents .= '<span><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></span>';
                    }
                     
                    // Display parent pages
                    echo $parents;
                     
                    // Current page
                    echo '<span>' . get_the_title() . '</span>';
                     
                } else {
                     
                    // Just display current page if not parents
                    echo '<span>' . get_the_title() . '</span>';
                     
                }
                 
            } else if ( is_tag() ) {
                 
                // Tag page
                 
                // Get tag information
                $term_id = get_query_var('tag_id');
                $taxonomy = 'post_tag';
                $args ='include=' . $term_id;
                $terms = get_terms( $taxonomy, $args );
                 
                // Display the tag name
                echo '<span>' . $terms[0]->name . '</span>';
             
            } elseif ( is_day() ) {
                 
                // Day archive
                 
                // Year link
                echo '<span><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
                 
                // Month link
                echo '<span><a href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></span>';
                 
                // Day display
                echo '<span>' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</spam>';
                 
            } else if ( is_month() ) {
                 
                // Month Archive
                 
                // Year link
                echo '<span><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></spam>';
                 
                // Month display
                echo '<span>' . get_the_time('M') . ' Archives</spam>';
                 
            } else if ( is_year() ) {
                 
                // Display year archive
                echo '<span>' . get_the_time('Y') . ' Archives</span>';
                 
            } else if ( is_author() ) {
                 
                // Auhor archive
                 
                // Get the author information
                global $author;
                $userdata = get_userdata( $author );
                 
                // Display author name
                echo '<span>Author: ' . $userdata->display_name . '</span>';
             
            } else if ( get_query_var('paged') ) {
                 
                // Paginated archives
                echo '<span>'.__('Page') . ' ' . get_query_var('paged') . '</spam>';
                 
            } else if ( is_search() ) {
             
                // Search results page
                echo '<span>Search results for: ' . get_search_query() . '</span>';
             
            } elseif ( is_404() ) {
                 
                // 404 page
                echo '<span>' . 'Error 404' . '</span>';
            }
             
        }
         
        echo '</div>';
         
    }
}


// Featured Posts by post meta
if ( !function_exists('nm_featured_posts') ) {
    function nm_featured_posts( $count = 6 ) {
        $args = array(
            'posts_per_page'   => $count,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'meta_key'         => '_nm_featured_post',
            'meta_value'       => 'on'
        );

        return get_posts($args);
    }
}

// Retrieve all sidebars 
function nm_retrieve_sidebar() {
    $sidebar_array = array();
    
    foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
        $sidebar_array[$sidebar['id']] = $sidebar['name'];
    }

    return $sidebar_array;
}

// Search form
if ( !function_exists('nm_search_form') ) {
    function nm_search_form() {
        echo '<span class="search-icon pull-right waves-effect"><i class="fa fa-search"></i></span>
                <div class="search-form">
                    <form action="'.esc_url( home_url( '/' ) ).'" method="GET" class="clearfix">
                        <input type="text" name="s" value="" placeholder="'.__('Search Topic...', 'namirah').'" class="search-input">
                    </form>
                    <span class="search-close waves-effect"><i class="ico-cross"></i></span>
                </div>';
    }
}


// Featured Posts by post meta
function nm_recent_posts( $count = 4 ) {

    $args = array(
        'posts_per_page'   => $count,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'post_status'      => 'publish',
    );

    return get_posts($args);
}

function fetch_sidebar() {
  $side_array = array();

  foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
    $side_array[] = $sidebar['name'];
  }

  return $side_array;
}

// Post SEO meta data
add_action('wp_head', 'nm_meta_data');

function nm_meta_data() {
    global $post;

    $doc_desc = get_post_meta( $post->ID, '_nm_document_desc', true );
    if(!empty($doc_desc)) echo '<meta name="description" content="'.$doc_desc.'">';

    $doc_keyword = get_post_meta( $post->ID, '_nm_document_keyword', true ); 
    if(!empty($doc_keyword)) echo '<meta name="keywords" content="'.$doc_keyword.'">';

}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function namirah_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'namirah_pingback_header' );
