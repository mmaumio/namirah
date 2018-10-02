<?php
Kirki::add_section( 'contact_section', array(
    'title'          => esc_attr__( 'Contact Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'textarea',
	'settings' => 'contact_address',
	'label'    => __( 'Contact Address', 'namirah' ),
	'section'  => 'contact_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'contact_email',
	'label'    => __( 'Contact Email', 'namirah' ),
	'section'  => 'contact_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'gmap_latitude',
	'label'    => __( 'Google Map Latitude', 'namirah' ),
	'section'  => 'contact_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'gmap_longtitude',
	'label'    => __( 'Google Map Lontitude', 'namirah' ),
	'section'  => 'contact_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'text',
	'settings' => 'contact_form_heading',
	'label'    => __( 'Contact Form heading', 'namirah' ),
	'section'  => 'contact_section',
	'priority' => 10,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'textarea',
	'settings' => 'contact_form_textarea',
	'label'    => __( 'Contact Form Textarea', 'namirah' ),
	'section'  => 'contact_section',
	'priority' => 10,
) );

