<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Hero Product",
		"base" => "rab_single_product",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-woocommerce",
		"params" => array(
            array(
                'type' => 'autocomplete',
                'heading' => esc_html__( 'Enter Product', 'rab' ),
                'param_name' => 'id',
                'description' => esc_html__( 'Enter Product ID/ sku, or title to display', 'rab' ),
            ),
            array(
                'type' => 'hidden',
                // This will not show on render, but will be used when defining value for auto-complete
                'param_name' => 'sku',
            ),

		)
	)
);

if(class_exists('Vc_Vendor_Woocommerce')) {
    $vc_vendor_wc = new Vc_Vendor_Woocommerce();
    //Filters For autocomplete param:
    //For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
    add_filter( 'vc_autocomplete_rab_single_product_id_callback', array(
        &$vc_vendor_wc,
        'productIdAutocompleteSuggester',
    ), 10, 1 ); // Get suggestion(find). Must return an array
    add_filter( 'vc_autocomplete_rab_single_product_id_render', array(
        &$vc_vendor_wc,
        'productIdAutocompleteRender',
    ), 10, 1 ); // Render exact product. Must return an array (label,value)
    //For param: ID default value filter
    add_filter( 'vc_form_fields_render_field_rab_single_product_id_param_value', array(
        &$vc_vendor_wc,
        'productIdDefaultValue',
    ), 10, 4 ); // Defines default value for param if not provided. Takes from other param value.

    add_filter( 'vc_autocomplete_rab_single_product_sku_callback', array(
        &$vc_vendor_wc,
        'productIdAutocompleteSuggester',
    ), 10, 1 ); // Get suggestion(find). Must return an array
    add_filter( 'vc_autocomplete_rab_single_product_sku_render', array(
        &$vc_vendor_wc,
        'productIdAutocompleteRender',
    ), 10, 1 ); // Render exact product. Must return an array (label,value)
    //For param: ID default value filter
    add_filter( 'vc_form_fields_render_field_rab_single_product_sku_param_value', array(
        &$vc_vendor_wc,
        'productIdDefaultValue',
    ), 10, 4 ); // Defines default value for param if not provided. Takes from other param value.
}