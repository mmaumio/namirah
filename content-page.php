<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package namirah
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
    <div class="post-content">
        <?php the_content(); ?> 
    </div>
</div>