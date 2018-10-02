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
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
        $nm_header_var = get_theme_mod( 'header_variation', '' );
        if( $nm_header_var == "top" ) {
            get_template_part( 'partials/navigation' ); 
        }
        ?>
        <div class="branding">
            <div class="container">
                <div class="logo">
                    <?php 
                        $nm_logo = get_theme_mod( 'logo_image', '' );
                        if( !empty( $nm_logo ) ) { 
                    ?>
                    <a href="<?php echo esc_url( site_url( '/' ) ); ?>">
                        <img src="<?php echo $nm_logo; ?>" alt="<?php echo bloginfo('name'); ?>">
                    </a>
                    <?php } else { ?>
                    <h1><a href="<?php echo esc_url( site_url( '/' ) ); ?>"><?php echo bloginfo( 'name' ); ?>
                        <span>
                            <?php if( get_theme_mod( 'show_hide_tag', '' ) == '1' ) { ?>
                                <h2 class="blog-tagline"><?php bloginfo('description'); ?></h2>
                            <?php } ?>
                        </span>
                    </a>
                    </h1>
                <?php } ?>
                </div>  
            </div>
        </div>
        <?php
        if( $nm_header_var == 'bottom') {
            get_template_part( 'partials/navigation' ); 
        } 
        ?>
    </header>
