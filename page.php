<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package namirah
 */

get_header(); ?>
<?php get_template_part( 'content', 'blog' ); ?>
<?php get_footer(); ?>