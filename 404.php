<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package namirah
 */

wp_head(); ?>


<div class="page-wrapper">
        <!--HEADER START HERE-->
        <header>
            <!--NAVIGATION START HERE-->
            <div class="nav-bar">
                <div class="container clearfix nav-container">
                    <h2 class="title-404 pull-left">Oops! Page not found...</h2>
                    <span class="search-icon pull-right waves-effect"><i class="fa fa-search"></i></span>
                    <!--SERCH FORM START HERE-->
                    <div class="search-form">
                        <form>
                            <input name="searchbox" value="" placeholder="Search Topic..." class="search-input">
                        </form>
                        <span class="search-close waves-effect"><i class="ico-cross"></i></span>
                    </div>
                    <!--SERCH FORM END HERE-->
                </div>

            </div>
            <!--NAVIGATION END HERE-->
            <!--LOGO BRANDING START HERE-->
            <div class="branding">
                <div class="container">
                    <div class="logo">
                        <a href="index.html" title="Namirah The Princes of Blog"><img src="images/logo-namirah.png" alt="Namirah">
                        </a>
                    </div>
                </div>
            </div>
            <!--LOGO BRANDING END HERE-->
        </header>
        <!--HEADER END HERE-->

<!--BLOG CONTENT START HERE-->
<div class="blog-container error-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="error-number">
                    <span class="error-digit">4<span>0</span>4</span>
                    <h3>Oops! Page not found...</h3>
                </div>

            </div>
            <div class="col-md-6">

                <div class="error-message">

                    <p>We are sorry the page you are trying to reach dose not exist :(</p>

                </div>

                <h3>Lost? We suggest...</h3>
                <div class="error-instruction">
                    <ol class="instruction-list">
                        <li>Checking the web address for typos.</li>
                        <li>Visiting the <a href="#">home page</a>
                        </li>
                        <li>Using our site search</li>
                    </ol>


                </div>
                <div class="error-instruction">
                    <p>You may have mistyped the URL or the page may have been removed from our system. Try searching by entering keyword in the search field.</p>
                </div>


            </div>

        </div>
    </div>
</div>

<!--FOOTER START HERE-->
<footer>
    <div class="footer-socket">
        <div class="copyright-socket">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="copyright-info">
                            <span>Copyright © 2015 Namirah - Blog Theme Demo by <a href="http://themepicasso.com/">ThemePicasso</a></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="social-profile">
                            <a href="#" class="waves-effect s-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="waves-effect s-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="waves-effect s-gplus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="waves-effect s-pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER END HERE-->

<?php wp_footer(); ?>
