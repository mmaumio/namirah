<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package namirah
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
    
    <div class="post-content">
        <?php the_content(); ?> 
        <div class="post-share">
            <span class="post-s-title">Share This:</span>
            <a href="#" class="waves-effect s-facebook" data-url="http://themeforest.net/item/stain-creative-one-page-portfolio-blog-template/9742110"><i class="fa fa-facebook"></i></a>
            <a href="#" class="waves-effect s-twitter" data-url="http://themeforest.net/item/stain-creative-one-page-portfolio-blog-template/9742110"><i class="fa fa-twitter"></i></a>
            <a href="#" class="waves-effect s-gplus" data-url="http://themeforest.net/item/stain-creative-one-page-portfolio-blog-template/9742110"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="waves-effect s-pinterest" data-url="http://themeforest.net/item/stain-creative-one-page-portfolio-blog-template/9742110" data-src="https://s-media-cache-ak0.pinimg.com/236x/0e/2f/97/0e2f976be48de2887b711985d781699c.jpg"><i class="fa fa-pinterest"></i></a>
            <a href="#" class="waves-effect s-linkedin" data-url="http://themeforest.net/item/stain-creative-one-page-portfolio-blog-template/9742110"><i class="fa fa-linkedin"></i></a>
            <span class="post-share-close waves-effect" data-url="http://themeforest.net/item/stain-creative-one-page-portfolio-blog-template/9742110"><i class="ico-cross"></i></span>
        </div>
        
    </div>
</div>