<?php
/**
 * namirah functions and definitions
 *
 * @package namirah
 */

/*
  * Add Admin functionalities
  */
require get_template_directory() . '/admin/admin-init.php';

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'namirah_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function namirah_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on namirah, use a find and replace
	 * to change 'namirah' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'namirah', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu', 'namirah' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	add_theme_support( 'post-thumbnails' );
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'audio'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'namirah_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 112,
		'width'       => 160,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_image_size( 'slide', 0, '520', false );
	add_image_size( 'slidethumb', '72', '72', true );
	add_image_size( 'blogpost', '750', '415', false );
	add_image_size( 'related', '214', '131', false );
	add_image_size( 'recentpost', '312', '191', false );
}
endif; // namirah_setup
add_action( 'after_setup_theme', 'namirah_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function namirah_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'namirah' ),
		'id'            => 'sidebar-widget-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-h"><h3>',
		'after_title'   => '</h3></div>',
	) );
	for ($i=1; $i < 5 ; $i++) { 
		register_sidebar( array(
	        'name'          => sprintf( __( 'Footer Widget %u', 'namirah' ), $i ),
	        'id'            => 'footer-widget-'.$i,
	        'description'   => __( 'Footer Widget 1 sidebar', 'namirah' ),
	        'before_widget' => '<div id="%1$s" class="widget-block %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<div class="widget-h"><h3>',
	        'after_title'   => '</h3></div>',
		) );	
	}

	global $nm_option;
	if( !empty($nm_option['multi-sidebar']) ) {
		for( $i=0; $i<count($nm_option['multi-sidebar']); $i++ ) {
			register_sidebar( array(
		        'name'          => $nm_option['multi-sidebar'][$i],
		        'id'            => str_replace(' ', '-', strtolower($nm_option['multi-sidebar'][$i]) ),
		        'description'   => '',
				'before_widget' => '<div id="%1$s" class="widget-block %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-h"><h3>',
				'after_title'   => '</h3></div>',
    		) );	
		}
	}  
}

add_action( 'widgets_init', 'namirah_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function namirah_scripts() {
	// Enqueue Css Styles

	wp_enqueue_style( 'namirah-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/nm-style.css', '', null );
	wp_enqueue_style( 'playfair-font', 'http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic', '', null );
	wp_enqueue_style( 'unica-one-font', 'http://fonts.googleapis.com/css?family=Unica+One', '', null );
	wp_enqueue_style( 'alegreya-font', 'http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700', '', null );

	// Enqueue Js scripts
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'namirah-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'namirah-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('jquery-migrate-js', get_template_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', array('jquery'), null, true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script('plugins-js', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), null, true );
	wp_enqueue_script('init-js', get_template_directory_uri() . '/assets/js/init.js', array('jquery'), null, true );

}
add_action( 'wp_enqueue_scripts', 'namirah_scripts' );


// Define Template Directory 
define("TEMP_DIR", get_template_directory_uri());

// CMB 2 config 
require get_template_directory().'/admin/cmb-config.php';

// Custom Widgets Added
require get_template_directory().'/widgets/recent-posts-widget.php';
require get_template_directory().'/widgets/about-author-widget.php';
require get_template_directory().'/widgets/tags-widget.php';
//require get_template_directory().'/widgets/ads-widget.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
