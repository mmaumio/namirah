<?php
/**
 * Template Name: Blog Grid Template
 */

get_header(); ?>
<div class="blog-container">
    <div class="container">
        <div class="row">
	    	<div class="pin-layout">
				<?php get_template_part( 'partials/custom-loop-grid' ); ?> 
			</div>   
			<?php get_template_part( 'partials/pagination' ); ?>
		</div>
    </div>
</div>
<?php get_footer(); ?>