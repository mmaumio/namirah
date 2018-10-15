<?php

// CMB 2 config file 

add_action( 'cmb2_init', 'nm_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function nm_register_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_nm_';


	$cmb_side = new_cmb2_box( array(
		'id'            => $prefix . 'side_metabox',
		'title'         => __( 'Featured Post Section', 'namirah' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'side',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_side->add_field( array(
		'name' => __( 'Featured Post', 'namirah' ),
		'desc' => __( 'Make the post featured', 'namirah' ),
		'id'   => $prefix . 'featured_post',
		'type' => 'checkbox',
	) );

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Page Metabox', 'namirah' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_demo->add_field( array(
	    'name'             => __('Select Sidebar', 'namirah'),
	    'id'               => $prefix . 'select_sidebar',
	    'type'             => 'select',
	    'options'          => nm_retrieve_sidebar(),
	    'default'          => 'sidebar-widget-1',
	) );

	$cmb_demo->add_field( array(
	    'name'             => __('Sidebar Layout', 'namirah'),
	    'id'               => $prefix . 'sidebar_layout',
	    'type'             => 'select',
	    'options'          => array(
	    		'default' => __('Default', 'namirah'),
	    		'1' => __('Sidebar on Left', 'namirah'),
	    		'2' => __('Sidebar on Right', 'namirah'),
	    	),
	) );

	$cmb_demo->add_field( array(
	    'name'             => __('Custom Document Description', 'namirah'),
	    'id'               => $prefix . 'document_desc',
	    'type'             => 'textarea',
	) );

	$cmb_demo->add_field( array(
	    'name'             => __('Custom Post/Page Meta Keywords, comma separated', 'namirah'),
	    'id'               => $prefix . 'document_keyword',
	    'type'             => 'text',
	) );

	$cmb_post = new_cmb2_box( array(
		'id'            => $prefix . 'posts',
		'title'         => __( 'Post Metabox', 'namirah' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );


	$cmb_post->add_field( array(
		'name' => __( 'Gallery Images', 'namirah' ),
		'desc' => __( 'Upload images for gallery post (Only Works in Gallery Post Format)', 'namirah' ),
		'id'   => $prefix . 'gallery_field',
		'type' => 'file_list',
	) );

	$cmb_post->add_field( array(
		'name'             => __( 'Gallery View', 'namirah' ),
		'desc'             => __( 'Select the View of gallery post (Only Works in Gallery Post Format)', 'namirah' ),
		'id'               => $prefix . 'gallery_select',
		'type'             => 'select',
		'options'          => array(
			'grid' => __( 'Grid View', 'namirah' ),
			'slider'   => __( 'Slider View', 'namirah' ),
		),
		'default' => 'grid',
	) );

}