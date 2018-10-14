<?php

Kirki::add_section( 'header_section', array(
    'title'          => esc_attr__( 'Header Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
	'type'        => 'select',
	'settings'    => 'header_variation',
	'label'       => esc_attr__( 'Header Variation', 'namirah' ),
	'section'     => 'header_section',
	'default'     => 'top',
	'choices'     => array(
			'top'  => __('Top Navigation', 'namirah'),
            'bottom'  => __('Bottom Navigation', 'namirah'),
		)
) );

Kirki::add_field( 'namirah_config', array(
    'type'        => 'typography',
    'settings'    => 'header_nav_font',
    'label'       => esc_attr__( 'Navigation Font', 'namirah' ),
    'section'     => 'header_section',
    'choices' => array(
    'fonts' => array(
        'google'   => array( 'popularity', 30 ),
        'standard' => array(
            'Georgia,Times,"Times New Roman",serif',
            'Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
            ),
        ),
    ),
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => 'ul.top-nav',
        ),
    ),
) );

Kirki::add_field( 'namirah_config', array(
	'type'        => 'background',
	'settings'    => 'header_background',
	'label'       => esc_attr__( 'Header Background Color', 'namirah' ),
	'description' => esc_attr__( 'Change the background color of the top header', 'namirah' ),
	'section'     => 'header_section',
	'default'     => array(
		'background-color'      => '#F5F5F5',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'output'      => array(
        array(
            'element' => '.branding',
        ),
    ),
) );

Kirki::add_field( 'namirah_config', array(
	'type'        => 'background',
	'settings'    => 'nav_background',
	'label'       => esc_attr__( 'Navigation Menu Background Color', 'namirah' ),
	'section'     => 'header_section',
	'default'     => array(
		'background-color'      => '#FFFFFF',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'output'      => array(
        array(
            'element' => '.nav-bar',
        ),
    ),
) );


