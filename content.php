<?php
/**
 * @package namirah
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
    <?php if( is_sticky() ) { ?>
    <div class="post-type-badge">
        <span class="post-ribbon"><i class="fa fa-star"></i><?php _e('Featured Post', 'namirah'); ?></span>
    </div>
    <?php } ?>

    <?php if( !is_page() ) { ?>
    <div class="blog-post-meta">
        <div class="row">
            <div class="col-md-6">
                <div class="author-meta">
                    <div class="f-a-thumb">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), '80', 'http://indietravelpodcast.com/images/no_gravatar.jpg'); ?>
                    </div>
                    <div class="f-a-meta">
                        <span><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></span>
                        <span><?php _e('By ', 'namirah') . the_author_posts_link(); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="post-feedback">
                    <li>
                        <a href="" class="waves-effect p-comments">
                            <span><i class="fa fa-comments"></i></span>
                            <span class="f-count"><?php echo get_comments_number( '0', '1', '%' ); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <?php get_template_part( 'partials/post-thumb' ); ?>
    <?php } ?>

    <div class="post-content">
        <?php if( is_single() ) { ?>
        <div class="post-categories">
            <?php
            $categories = get_the_category();
            $output = '';
            if($categories) {
                foreach($categories as $category) {
                    $output .= '<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>';
                }
            }    
            ?>
            <span><?php _e('Categories:', 'namirah'); ?></span> <?php echo trim($output); ?>
        </div>
        <?php } ?>
        <?php the_title( sprintf( '<h2 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <?php 
            if( is_single() || is_page() ) {
                the_content();
            }
            else {
                the_excerpt();   
            }   
        ?>

        <?php if( is_single() ) { ?> 

            <?php if (has_tag()) { ?>
                <span class="tags-title"><?php _e('Tags:', 'namirah'); ?></span>
                    <div class="post-tags-list">
                        <?php the_tags( '', ' ' ); ?>
                    </div>
            <?php } ?>
            <?php 
                $namirah_post_share = get_theme_mod( 'post_sharing', true );
                if ( isset( $namirah_post_share ) && true == $namirah_post_share ) :
            ?>
                <div class="details-post-share namirah-share-post">
                    <span class="post-s-title"><?php _e( 'Share This:', 'namirah' ); ?></span>
                    <a href="#" class="waves-effect s-facebook" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="waves-effect s-twitter" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="waves-effect s-gplus" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="waves-effect s-pinterest" target="_blank" data-url="<?php the_permalink(); ?>" data-src="https://s-media-cache-ak0.pinimg.com/236x/0e/2f/97/0e2f976be48de2887b711985d781699c.jpg"><i class="fa fa-pinterest"></i></a>
                    <a href="#" class="waves-effect s-linkedin" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
                </div>
            <?php endif; ?>    
        <?php } ?>

        <?php 
        $namirah_post_share = get_theme_mod( 'post_sharing', true );
        if ( isset( $namirah_post_share ) && true == $namirah_post_share ) : ?>
            <div class="post-share namirah-share-post">
                <span class="post-s-title"><?php _e( 'Share This:', 'namirah' ); ?></span>
                <a href="#" class="waves-effect s-facebook" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                <a href="#" class="waves-effect s-twitter" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
                <a href="#" class="waves-effect s-gplus" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="waves-effect s-pinterest" target="_blank" data-url="<?php the_permalink(); ?>" data-src="https://s-media-cache-ak0.pinimg.com/236x/0e/2f/97/0e2f976be48de2887b711985d781699c.jpg"><i class="fa fa-pinterest"></i></a>
                <a href="#" class="waves-effect s-linkedin" target="_blank" data-url="<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>
                <span class="post-share-close waves-effect" target="_blank" data-url="<?php the_permalink(); ?>"><i class="ico-cross"></i></span>
            </div>
        <?php endif; ?>
        <?php if( is_home() || is_archive() ) { ?>
            <div class="post-action clearfix">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="post-btn waves-effect"><?php _e( 'View Details', 'namirah' ); ?></a>
                <?php 
                    $namirah_post_share = get_theme_mod( 'post_sharing', true );
                    if ( isset( $namirah_post_share ) && true == $namirah_post_share ) : ?> 
                        <a href="#" class="post-share-btn waves-effect"><i class="fa fa-share-alt"></i></a>
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>
</div>