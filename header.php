<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package namirah
 */

global $nm_option; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
    $layout_option = get_post_meta( get_the_ID(), '_nm_sidebar_layout', true );
    if($layout_option == '1') {
        $sidebar_layout = 'left-sidebar';
    } else {
        $sidebar_layout = '';
    }
?>
<div class="page-wrapper <?php echo $sidebar_layout; ?>">
    <header>
        <?php 
        $nm_header_var = get_theme_mod( 'header_variation', 'top' );
        if( $nm_header_var == "top" ) {
            get_template_part( 'partials/navigation' ); 
        }
        ?>
        <div class="branding">
            <div class="container">
                <?php
                    the_custom_logo();
                    if ( display_header_text() == true ) {
                        if ( is_front_page() && is_home() ) :
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                        else :
                            ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                        endif;
                        $namirah_description = get_bloginfo( 'description', 'display' );
                        if ( $namirah_description || is_customize_preview() ) :
                            ?>
                            <h2 class="site-description blog-tagline"><?php echo $namirah_description; ?></p>
                        <?php 
                        endif; 
                    }
                ?>
            </div>
        </div>
        <?php
        if( $nm_header_var == 'bottom') {
            get_template_part( 'partials/navigation' ); 
        } 
        ?>
        <?php if ( get_header_image() ) : ?>
            <div id="site-header" class="container">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            </div>
        <?php endif; ?>
    </header>
