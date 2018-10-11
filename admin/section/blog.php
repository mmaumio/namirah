<?php

Kirki::add_section( 'blog_section', array(
    'title'          => esc_attr__( 'Blog Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
	'type'     => 'number',
	'settings' => 'words_excerpt',
	'label'    => __( 'Number of words in excerpt', 'namirah' ),
	'section'  => 'blog_section',
	'default'  => 55,
) );

Kirki::add_field( 'namirah_config', array(
	'type'        => 'switch',
	'settings'    => 'post_sharing',
	'label'       => __( 'Post Sharing', 'namirah' ),
	'section'     => 'blog_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'namirah' ),
		'off' => esc_attr__( 'Disable', 'namirah' ),
	),
) );


Kirki::add_field( 'namirah_config', array(
	'type'        => 'switch',
	'settings'    => 'post_related',
	'label'       => __( 'Related Post', 'namirah' ),
	'section'     => 'blog_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'namirah' ),
		'off' => esc_attr__( 'Disable', 'namirah' ),
	),
) );