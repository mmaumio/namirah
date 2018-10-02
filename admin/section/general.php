<?php

Kirki::add_section( 'general_section', array(
    'title'          => esc_attr__( 'Generel Settings', 'namirah' ),
    'panel'          => 'theme_options_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'namirah_config', array(
    'type'        => 'typography',
    'settings'    => 'body_font_setting',
    'label'       => esc_attr__( 'Body Font', 'namirah' ),
    'section'     => 'general_section',
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
        'font-size'      => '14px',
    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => 'body',
        ),
    ),
) );
Kirki::add_field( 'namirah_config', array(
    'type'        => 'typography',
    'settings'    => 'heading_font_setting',
    'label'       => esc_attr__( 'Heading Font', 'namirah' ),
    'section'     => 'general_section',
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
    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => 'h1, h2, h3, h4, h5, h6',
        ),
    ),
) );

Kirki::add_field( 'namirah_config', array(
    'type'        => 'code',
    'settings'    => 'css_code_setting',
    'label'       => esc_attr__( 'Css Code', 'namirah' ),
    'description' => esc_attr__( 'Put your custom css code here', 'namirah' ),
    'section'     => 'general_section',
    'default'     => '',
    'choices'     => array(
        'language' => 'css',
    ),
) );

Kirki::add_field( 'namirah_config', array(
    'type'        => 'code',
    'settings'    => 'js_code_setting',
    'label'       => esc_attr__( 'JS Code', 'namirah' ),
    'description' => esc_attr__( 'Put your custom Javascript code here', 'namirah' ),
    'section'     => 'general_section',
    'default'     => '',
    'choices'     => array(
        'language' => 'js',
    ),
) );
