<?php
/**
 * namirah functions and definitions
 *
 * @package namirah
 */
 ?>

<!--SLIDER START HERE-->
<div class="slider-container">
	
    <div class="featured-slider cycle-slideshow" data-cycle-slides=">
	 div" data-cycle-fx="fade" data-cycle-timeout="5000" data-cycle-speed="1000" data-cycle-pager="#per-slide-template" data-cycle-prev=".prevControl" data-cycle-next=".nextControl" data-cycle-auto-height="container">
     
     <?php
    
	    if ( isset($nm_feat_post) ) {
	        foreach ($nm_feat_post as $post) : setup_postdata($post);
            $nm_image_slide = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slide' );
            $nm_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slidethumb' );
	?>
   
        <div class="n-slide" data-src="<?php echo $nm_image_slide[0]; ?>" data-cycle-pager-template="<li>
                <a href='#'><img src='<?php echo $nm_image_thumb[0]; ?>' alt='<?php echo get_the_title(); ?>'></a></li>">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slider-meta">
                            <div class="f-a-thumb">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), '80', 'http://indietravelpodcast.com/images/no_gravatar.jpg'); ?>
                            </div>
                            <div class="f-a-meta">
                                <span><?php the_time('F j, Y'); ?></span>
                                <span><?php _e('By ', 'namirah') . the_author_posts_link(); ?></span>
                            </div>
                        </div>
                        <div class="slider-post">
                            <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                            <?php the_excerpt(); ?>
                            <a href="<?php esc_url( the_permalink() ); ?>" class="slider-btn waves-effect">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php
        endforeach;
        wp_reset_postdata();
    }    
	?>  
    </div>
    <div class="slider-pagination">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="slider-thumb">
                        <ul id="per-slide-template">
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="slider-nav">
                        <ul>
                            <li><a href="#" class="prevControl"><i class="fa fa-long-arrow-left"></i>Previous</a>
                            </li>
                            <li><a href="#" class="nextControl">Next<i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--SLIDER END HERE-->
