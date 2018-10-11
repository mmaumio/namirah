<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package namirah
 */

get_header(); ?>

<?php 
$nm_feat_post = nm_featured_posts(4); 
if ( !empty($nm_featured_post) )
	get_template_part( 'partials/featured-carousel' ); 

?>

<?php get_template_part( 'content', 'blog' ); ?>

<?php get_footer(); ?>
