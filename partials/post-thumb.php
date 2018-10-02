<?php
/**
 * @package macaw
 */

$audio_url = wp_oembed_get( get_post_meta( get_the_ID(), '_nm_audio_url', true ) );
$video_url = wp_oembed_get( get_post_meta( get_the_ID(), '_nm_video_url', true ) );

if( has_post_format('video') && !empty($video_url) ) { ?>
    <div class="featured-video"><?php echo $video_url; ?></div>    
<?php 
} elseif( has_post_format('audio') && !empty($audio_url) ) { ?>
    <div class="post-featured-audio"><?php echo $audio_url; ?></div>    
<?php
} elseif( has_post_format('gallery')) { 
    if ( get_post_meta(get_the_ID(), '_nm_gallery_select', true) == 'grid' ) { ?>
    <div class="post-grid-wrap clearfix">
        <div class="justified-post-grid clearfix">

        <?php $gallery_img = get_post_meta( get_the_ID(), '_nm_gallery_field', true ); 
            foreach ( $gallery_img as $key => $grid ) { ?>
                <a href="<?php echo esc_url( $grid ); ?>" data-src="<?php echo esc_url( $grid ); ?>" data-source="<?php echo esc_url( $grid ); ?>" title="<?php echo get_the_title($key); ?>">
                    <img src="<?php echo esc_url( $grid ); ?>" alt="<?php echo get_the_title($key); ?>">
                </a>
        <?php } ?>
    
        </div>
    </div>
    <?php } elseif( get_post_meta( get_the_ID(), '_nm_gallery_select', true ) == 'slider' ) { ?>

        <div class="post-img-slides">
            <div class="cycle-slideshow post-slider" data-cycle-slides=">
        .post-slide-item" data-cycle-fx="scrollHorz" data-cycle-timeout="5000">
                <?php $gallery_img = get_post_meta( get_the_ID(), '_nm_gallery_field', true ); 
                foreach ( $gallery_img as $key => $slide ) { 
                    $slide_size = wp_get_attachment_image_src( $key, 'blogpost' );
                ?>
                    <div class="post-slide-item">
                        <a href="<?php echo esc_url( $slide_size[0] ); ?>" title="<?php echo get_the_title($key); ?>" data-source="<?php echo esc_url( $slide_size[0] ); ?>"><img src="<?php echo esc_url( $slide_size[0] ); ?>" alt="<?php echo get_the_title($key); ?>">
                        </a>
                    </div>
                <?php } ?>
                
                <div class="cycle-pager"></div>
            </div>
        </div>
    <?php } ?>

<?php
} else { ?>
    <div class="post-featured-img waves-effect">
        <?php echo get_the_post_thumbnail( get_the_ID(), 'blogpost' ); ?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="post-featured-overlay"><span class="waves-effect"><i class="fa fa-expand"></i></span></a>
    </div>
<?php
}
