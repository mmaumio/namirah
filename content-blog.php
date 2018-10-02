<?php
/**
 * @package macaw
 */
?>


<?php get_template_part('partials/breadcrumb'); ?>

<!--BLOG CONTENT START HERE-->
<div class="blog-container">
    <div class="container">
        <div class="row">
		    <div class="col-md-8 blog-content">
			    <?php if ( is_author() ) { ?>
			    <?php $nm_user_field = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
			    <div class="archive-author">
	                <div class="author-thumb">
	                    <?php echo get_avatar( $nm_user_field->ID ); ?>
	                </div>
	                <div class="author-intro">
	                    <div class="author-name">
	                        <?php echo $nm_user_field->display_name; ?>
	                    </div>
	                    <?php echo esc_html($nm_user_field->description); ?>
	                    <div class="archive-post-count">
	                        <span class="post-number"><?php echo count_user_posts( $nm_user_field->ID ); ?></span>

	                        <span class="a-post-title"><?php _e('Entries', 'namirah'); ?></span>

	                    </div>
	                    <div class="n-profile">
	                        <span class="p-title">Connect:</span>
	                        <a href="https://www.facebook.com/sharer.php?u=undefined" class="waves-effect s-facebook"><i class="fa fa-facebook"></i></a>
	                        <a href="https://twitter.com/home?status=undefined" class="waves-effect s-twitter"><i class="fa fa-twitter"></i></a>
	                        <a href="https://plus.google.com/share?url=undefined" class="waves-effect s-gplus"><i class="fa fa-google-plus"></i></a>
	                        <a href="https://pinterest.com/pin/create/button/?url=undefined&amp;media=undefined" class="waves-effect s-pinterest"><i class="fa fa-pinterest"></i></a>
	                    </div>
	                </div>

	            </div>
	            <?php } ?>

				<?php if ( have_posts() ) : ?>
				    <?php /* Start the Loop */ ?>
				    <?php while ( have_posts() ) : the_post(); ?>

				    <?php get_template_part( 'content' ); ?>

				    <?php endwhile; ?>

				    <?php else : ?>

				    <?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				<?php 
					if ( ! is_single() ) {
						get_template_part( 'partials/pagination' );
					}
				?>

				<?php if( is_single() ) { ?>

                <div class="related-blog-section section-wrap">
                    <h3 class="inner-h">You May Also Like</h3>
                    <div>
                        <div class="row">
                        <?php	
                    	global $post;
			            $nm_tags = wp_get_post_tags($post->ID);
			            if ($nm_tags) {
			                $first_tag = $nm_tags[0]->term_id;
			                $args=array(
			                    'tag__in' => array($first_tag),
			                    'post__not_in' => array($post->ID),
			                    'posts_per_page'=>3
			                );

			                $nm_rlt_query = new WP_Query($args);
			                if ( $nm_rlt_query->have_posts() ) {
			                    while ($nm_rlt_query->have_posts()) : $nm_rlt_query->the_post(); ?>
		                            <div class="col-md-4">
		                                <div class="related-blog-post">
		                                    <div class="post-thumb">
		                                        <a href="<?php esc_url( the_permalink() ); ?>">
		                                            <?php echo get_the_post_thumbnail( $post->ID, 'related' ); ?>
		                                        </a>
		                                    </div>
		                                    <div class="post-intro">
		                                        <h3>
		                                        	<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
		                                        </h3>
		                                    </div>
		                                </div>
		                            </div>
                			<?php endwhile;
				                } else { ?>
				                    <div class="col-md-12">
				                        <div class="alert alert-info blogpost-alert"><?php _e('There are no related posts to show matched with the tags', 'namirah'); ?></div>
				                    </div>
				            <?php } 
				                wp_reset_query();
				            } else { ?>
				                <div class="col-md-12">
				                    <div class="alert alert-info blogpost-alert"><?php _e('There are no related posts to show as no tags are there to match with', 'namirah'); ?></div>
				                </div>
				        <?php } ?>  
                        </div>

                    </div>
                </div>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				}	
				?>

			</div>
        	<?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!--BLOG CONTENT END HERE-->

