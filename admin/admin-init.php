<?php
/**
* Integrate Kirki Customer API 
*/

if ( file_exists( dirname( __FILE__ ).'/kirki/kirki.php' ) ) {
	require_once dirname( __FILE__ ).'/kirki/kirki.php';
}

Kirki::add_config( 'namirah_config', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

Kirki::add_panel( 'theme_options_panel', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Theme Options', 'namirah' ),
) );

include_once dirname( __FILE__ ) . '/section/general.php';
include_once dirname( __FILE__ ) . '/section/header.php';
include_once dirname( __FILE__ ) . '/section/blog.php';
include_once dirname( __FILE__ ) . '/section/layout.php';
include_once dirname( __FILE__ ) . '/section/contact.php';
include_once dirname( __FILE__ ) . '/section/footer.php';