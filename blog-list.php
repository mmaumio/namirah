<?php
/**
 * Template Name: Blog List Template
 */

get_header(); ?>
<div class="blog-container">
    <div class="container">
        <div class="row">
		    <div class="col-md-8 blog-content">
				<?php get_template_part( 'partials/custom-loop' ); ?>    
				<?php get_template_part( 'partials/pagination' ); ?>
			</div>
        	<?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>