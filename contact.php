<?php
/**
 * Template Name: Contact Template
 */

get_header(); ?>

<?php get_template_part('partials/breadcrumb'); ?>
<!--BLOG CONTENT START HERE-->
<div class="blog-container">
	<div class="container">
		<div class="row">
			<div class="col-md-8 blog-content">
				<div class="contact-form content-section-box">
					<div class="contact-intro clearfix">
						<h3 class="contact-page-title">Send Us a Message</h3>
							<p>
								Donec eget tortor id dolor pellentesque dignissim id ut sapien. Aenean vitae feugiat nulla. Aliquam nec interdum nunc. Nam in quam auctor, dignissim elit a, tristique libero. In mauris mauris, maximus et elit vel, semper laoreet ante. Donec et odio non ipsum ultricies imperdiet.
							</p>				
					</div>
						
					<form action="#">
						<div class="row">
							<div class="col-xs-4">
								<span class="form-label">Name <i class="filed-require">*</i></span>
								<input type="text" class="form-control">
							</div>
							<div class="col-xs-4">
								<span class="form-label">Email <i class="filed-require">*</i></span>
								<input type="text" class="form-control">
							</div>
							<div class="col-xs-4">
								<span class="form-label">Url</span>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div>
									<span class="form-label">Message <i class="filed-require">*</i></span>
									<textarea class="form-control form-message"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<input type="submit" value="Send" class="btn btn-default btn-contact ">
							</div>
						</div>
					</form>

				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>