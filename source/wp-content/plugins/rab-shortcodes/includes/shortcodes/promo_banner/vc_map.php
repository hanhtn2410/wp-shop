<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Promo Banner",
		"base" => "promo_banner",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-promo-banner",
		"params" => array(
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
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Link opens in", "rab"), 
                    "param_name" => "alignment",
                    "description" => esc_html__("Choose one of available button alignments.", "rab") ,
                    "value" => array(
                        "Same window" => "same",
                        "New window" => "new",
                    ),
                ),
			)
		)
);