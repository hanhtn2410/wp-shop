<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Category Banner",
		"base" => "category_banner",
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
                    "type" => "vc_link",
                    "holder" => "",
                    "class" => "",
                    "heading" => esc_html__("Link", "rab"),
                    "param_name" => "link",
                    "value" => "",
                    "description" => esc_html__("Optional URL to another web page", "rab") ,   
                ),

                array(
                    "type" => "attach_image",
                    "holder" => "",
                    "class" => "",
                    "heading" => esc_html__("Image", "rab"),
                    "param_name" => "image",
                    "value" => "",
                    "description" => esc_html__("Optional URL to another web page", "rab") ,   
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