<?php
/**
 * Template Name: About Template
 */

get_header(); ?>

<?php get_template_part('partials/breadcrumb'); ?>
<!--BLOG CONTENT START HERE-->
<div class="blog-container">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="content-section-box">
					<img src="<?php echo get_post_meta( get_the_ID(), '_nm_about_img', true ); ?>" alt="about image">
				</div>
			</div>

			<div class="col-md-6">
				<div class="about-page-content">

					<?php if ( have_posts() ) : ?>
					    <?php /* Start the Loop */ ?>
					    <?php while ( have_posts() ) : the_post(); ?>

					    <?php the_content(); ?>

						<?php endwhile; ?>

					<?php endif; ?>

					<div class="n-profile">
						<span class="p-title">Connect:</span>
						<a href="https://www.facebook.com/sharer.php?u=undefined" class="waves-effect s-facebook"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/home?status=undefined" class="waves-effect s-twitter"><i class="fa fa-twitter"></i></a>
						<a href="https://plus.google.com/share?url=undefined" class="waves-effect s-gplus"><i class="fa fa-google-plus"></i></a>
						<a href="https://pinterest.com/pin/create/button/?url=undefined&amp;media=undefined" class="waves-effect s-pinterest"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>