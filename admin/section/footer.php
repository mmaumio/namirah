<?php
Kirki::add_section( 'footer_section', array(
    'title'          => esc_attr__( 'Footer Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'textarea',
	'settings' => 'footer_copyright',
	'label'    => __( 'Footer Copyright', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );