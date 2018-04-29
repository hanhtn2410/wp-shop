<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Info Banner",
		"base" => "info_banner",
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
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Sub heading", "rab"),
                    "param_name" => "content",
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
					"heading" => esc_html__("Button Text", "rab"),
					"param_name" => "button_text",
					"value" => "Shop Now",
					"description" => esc_html__("Button label", "rab") ,   
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content Position", "rab"),
					"param_name" => "content_position",
					"description" => esc_html__("Choose content position", "rab") ,
					"value" => array(
                        "Middle" => "middle",
						"Bottom" => "bottom",  
					),
				),

				array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content style", "rab"),
					"param_name" => "content_style",
					"description" => esc_html__("Choose content style", "rab") ,
					"value" => array(
                        "Default" => "default",
						"Inline"  => "inline",  
					),
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Size", "rab"),
					"param_name" => "size",
					"description" => esc_html__("Choose one of three button sizes", "rab") ,
					"value" => array(
                        "Small" => "small",
						"Standard" => "standard",
                        "Large" => "large"   
					),
				),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Alignment", "rab"), 
                    "param_name" => "alignment",
                    "description" => esc_html__("Choose one of available button alignments.", "rab") ,
                    "value" => array(
                        "Left" => "left",
                        "Center" => "center",
                        "Right" => "right"
                    ),
                ),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Text & Icon Color", "rab"),
					"param_name" => "button_text_color",
					"value" => "#fff",
					"description" => esc_html__("Enter optional color for button's text and icon.", "rab") ,  
				),
                array(
                    "type" => "colorpicker",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Text & Icon On-hover Color", "rab"),
                    "param_name" => "button_text_hover_color",
                    "value" => "",
                    "description" => esc_html__("The color of button's text and icon on hover mode.", "rab") ,  
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Button style", "rab"), 
                    "param_name" => "button_bg_style",
                    "value" => array(
                    	__( 'Transparent', 'rab') => 'Transparent',
                    	__( 'Fill', 'rab' )       => 'Fill'
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Border Color", "rab"),
                    "param_name" => "button_bg_color",
                    "value" => "",
                    "description" => esc_html__("Select border color for your button.", "rab") ,  
                ),
                array(
                    "type" => "colorpicker",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Border & Background Color", "rab"),
                    "param_name" => "button_bg_border_color",
                    "value" => "",
                    "description" => esc_html__("Select border and background color for your button.", "rab") ,  
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Border Radius ", "rab"), 
                    "param_name" => "button_border_radius",
                    "value" => array(
                    	"0px" => '0px',
                        "1px" => "1px",
                        "5px" => "5px",
                        "10px" => "10px",
                        "15px" => "15px",
                        "20px" => "20px",
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Border stroke ", "rab"), 
                    "param_name" => "button_border_width",
                    "value" => array(
                        "1px" => "1px",
						"2px" => "2px",
                        "3px" => "3px",
						"4px" => "4px",
                    ),
                ),
                array(
                    "type" => "vc_icons",
                    "heading" => esc_html__("Button Icon", "rab"),
                    "param_name" => "icon",
                    'group'		=> esc_html__( "Icon",  "rab"),
                    "description" => esc_html__("Select an icon to be shown in button", "rab") ,   
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