<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package namirah
 */
?>

<!--FOOTER START HERE-->
    <footer>
        <div class="footer-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-socket">
            <div class="copyright-socket">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="copyright-info">
                                <?php
                                    $namirah_copyright = get_theme_mod( 'footer_copyright' );
                                    if ( !empty( $namirah_copyright ) ) 
                                        echo '<span>' . $namirah_copyright . '</span>';  
                                ?>        
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="social-profile">
                                <a href="<?php echo esc_url( get_theme_mod( 'facebook_url', '#' ) ); ?>" class="waves-effect s-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo esc_url( get_theme_mod( 'twitter_url', '#' ) ); ?>" class="waves-effect s-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="<?php echo esc_url( get_theme_mod( 'google_plus_url', '#' ) ); ?>" class="waves-effect s-gplus"><i class="fa fa-google-plus"></i></a>
                                <a href="<?php echo esc_url( get_theme_mod( 'linkedin_url', '#' ) ); ?>" class="waves-effect s-gplus"><i class="fa fa-linkedin"></i></a>
                                <a href="<?php echo esc_url( get_theme_mod( 'pinterest_url', '#' ) ); ?>" class="waves-effect s-pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--FOOTER END HERE-->
</div> <!-- Page Wrapper ends -->

<?php wp_footer(); ?>

</body>
</html>
