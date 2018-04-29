<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Products",
		"base" => "rab_products",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-woocommerce",
		"params" => array(

                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Display modes", "rab"), 
                    "param_name" => "display_style",
                    "description" => esc_html__("Choose one of following display modes", "rab") ,
                    "value" => array(
                        "Normal" => "normal",
                        "Carousel" => "carousel",
                    ),
                ),

                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Per Page", "rab"), 
                    "param_name" => "per_page",
                    "description" => esc_html__("No. of items to show per page", "rab") ,
                    "value" => 8
                ),

                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Columns", "rab"), 
                    "param_name" => "columns",
                    "description" => esc_html__("No. of columns to show", "rab") ,
                    "value" => array(
                        "1" => "1",
                        "2" => "2",
                        "3" => "3",
                        "4" => "4",
                    ),
                ),

                array(
                	"type" => "checkbox",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Display featured products", "rab"), 
                    "param_name" => "featured",
                    "description" => esc_html__("Display featured only?", "rab") ,
            	),

                array(
                	'type'  => 'dropdown',
                	'admin_label' => true,
                	'class' => '',
                	'heading' => esc_html__( 'Default order', 'rab' ),
                	'param_name' => 'order',
                	'value' => array(
                		'Ascending' => 'ASC',
                		'Descending' => 'DESC',
            		)
            	),

                array(
                	'type'  => 'dropdown',
                	'admin_label' => true,
                	'class' => '',
                	'heading' => esc_html__( 'Order by', 'rab' ),
                	'param_name' => 'orderby',
                	'value' => array(
                		'ID' => 'ID',
                		'Date' => 'date',
                		'Author' => 'author',
                		'Title' => 'title',
                		'Modified Date' => 'modified',
                		'Random' => 'rand',
                		'Comment Count' => 'comment_count',
                		'Menu Order' => 'menu_order'
            		)
            	)

			)
		)
);