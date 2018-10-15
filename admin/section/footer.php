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
	'default'  => __( 'Copyright © 2018 Namirah - Blog Theme Demo by <a href="http://aumio.rocks/">Aumio</a>', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'link',
	'settings' => 'facebook_url',
	'label'    => __( 'Facebook URL', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'twitter_url',
	'label'    => __( 'Twitter URL', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'google_plus_url',
	'label'    => __( 'Google+ URL', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'linkedin_url',
	'label'    => __( 'Linkedind URL', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'pinterest_url',
	'label'    => __( 'Pinterest URL', 'namirah' ),
	'section'  => 'footer_section',
	'priority' => 10,
) );