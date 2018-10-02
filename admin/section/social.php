<?php
Kirki::add_section( 'social_section', array(
    'title'          => esc_attr__( 'Social Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'link',
	'settings' => 'facebook_url',
	'label'    => __( 'Facebook URL', 'namirah' ),
	'section'  => 'social_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'twitter_url',
	'label'    => __( 'Twitter URL', 'namirah' ),
	'section'  => 'social_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'google_plus_url',
	'label'    => __( 'Google+ URL', 'namirah' ),
	'section'  => 'social_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'linked_url',
	'label'    => __( 'Linkedind URL', 'namirah' ),
	'section'  => 'social_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'pinterest_url',
	'label'    => __( 'Pinterest URL', 'namirah' ),
	'section'  => 'social_section',
	'priority' => 10,
) );