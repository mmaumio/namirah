<?php
Kirki::add_section( 'layout_section', array(
    'title'          => esc_attr__( 'Layout Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
	'type'        => 'color-palette',
	'settings'    => 'theme_color',
	'label'       => esc_attr__( 'Color Scheme', 'namirah' ),
	'section'     => 'layout_section',
	'default'     => '#4CAF50',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'namirah' ),
		'size'   => 40,
		'style'  => 'round',
	),
) );