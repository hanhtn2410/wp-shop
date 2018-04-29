<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Flash Sale",
		"base" => "flash_sale",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-info-banner",
		"params" => array(
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Heading", "rab"),
					"param_name" => "title",
					"value" => "",
					"description" => esc_html__(" text", "rab") ,   
				),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Sub heading", "rab"),
                    "param_name" => "subtitle",
                    "value" => "",   
                ),

                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Date", "rab"),
                    "param_name" => "date",
                    "description" => __( 'Please enter date in <em>Oct 30, 2018</em> format', 'rab' ),
                    "value" => "",   
                ),
                
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Custom class", "rab"),
					"param_name" => "custom_class",
					"value" => "",
				),
			)
		)
);