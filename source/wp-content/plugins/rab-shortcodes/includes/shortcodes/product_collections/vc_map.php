<?php
/**
 * Product Collections Visual Composer configuration file
 */

if( ! defined( 'ABSPATH' ) )  {
	exit; // exit if accessed directly
}

// proceed only if visual composer is active.
function rab_get_product_categories() {
	$categories = array();

	$targs = array( 'taxonomy' => 'product_cat', 'hide_empty' => false );

	$terms = get_terms( $targs );

	if( $terms ) {
		foreach( $terms as $term ) {
			$categories[$term->name] = $term->term_id;
		}
	}
	return $categories;
}

add_action( 'vc_before_init', 'register_params_product_collections' );
function register_params_product_collections() {
	if( function_exists( 'vc_map' ) ) {
	$cats = rab_get_product_categories();

	$args = array(
		"name" => "Product Collections",
		"base" => "product_collections",
		"category" => 'RAB Elements',
        'weight' => 5,
		"icon" => "icon-wpb-collection-banner",
		"params" => array(
			// General Group
			array(
				'type'        => 'textfield',
				'holder'      => '',
				'class'       => '',
				'group'       => 'General',
				'heading'     => esc_html__( 'Title', 'rab-shortcodes' ),
				'param_name'  => 'title',
				'description' => esc_html__( 'Title', 'rab-shortcodes' ),
			),
			array(
				'type'        => 'textarea_html',
				'holder'      => '',
				'group'       => 'General',
				'class'       => '',
				'heading'     => esc_html__( 'Short description', 'rab-shortcodes' ),
				'param_name'  => 'content',
			),
			array(
				'type'        => 'attach_image',
				'holder'      => '',
				'group'       => 'General',
				'class'       => '',
				'heading'     => esc_html__( 'Featured image', 'rab-shortcodes' ),
				'param_name'  => 'featured_image'
			),
			array(
				'type'        => 'textfield',
				'holder'      => '',
				'class'       => '',
				'group'       => 'General',
				'heading'     => esc_html__( 'Custom Class', 'rab-shortcodes' ),
				'param_name'  => 'custom_class',
			),

			// Button group
			array(
				'type'        => 'textfield',
				'holder'      => '',
				'group'       => 'Link',
				'heading'     => 'Link text',
				'param_name'  => 'button_label',
			),
			array(
				'type'        => 'vc_link',
				'holder'      => '',
				'group'       => 'Link',
				'heading'     => 'Link URL',
				'param_name'  => 'button_url'
			),

			// Products Group
			array(
				'type'        => 'dropdown',
				'holder'      => '',
				'group'       => 'Products',
				'heading'     => esc_html__( 'Select product categories to display products', 'rab-shortcodes' ),
				'value'       => $cats,
				'param_name'  => 'product_cat'
 			),

 			// display group
 			array(
 				'type'        => 'dropdown',
 				'holder'      => '',
 				'group'       => 'Display',
 				'heading'     => esc_html__( 'Template', 'rab-shortcodes' ),
 				'value'       => array(
 					'Normal'  => 'normal',
 					'Overlay' => 'overlay'
 				),
 				'description' => esc_html__( "Select one of the variation of template", 'rab-shortcodes' ),
 				'param_name'  => 'style',
 			)
		)
	);

	vc_map( $args );
}
}

