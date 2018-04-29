<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! function_exists('vc_map' ) ) {
    return;
}
vc_map( 
	array(
		"name" => "Blog",
		"base" => "rab_blog",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-application-icon-large",
		"params" => array(

                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Per Page", "rab"), 
                    "param_name" => "posts_per_page",
                    "description" => esc_html__("No. of items to show per page", "rab") ,
                    "value" => 8
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
            	),

                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Display Style", "rab"), 
                    "param_name" => "display_style",
                    "value" => array(
                        "Normal" => "normal",
                        "Masonry" => "masonry",
                    ),
                ),

                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("View mode", "rab"), 
                    "param_name" => "view_mode",
                    "value" => array(
                        "Grid" => "grid",
                        "List" => "list",
                    ),
                    'dependency' => array(
                        'element' => 'display_style',
                        'value'   => array( 'normal' )
                    )
                ),

                array(
                    "type" => "checkbox",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Alternate Layout", "rab"), 
                    "param_name" => "alternate_layout",
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
                    'dependency' => array(
                        'element' => 'alternate_layout',
                        'value'   => false
                    )
                ),

                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Pagination Style", "rab"), 
                    "param_name" => "pagination_style",
                    "value" => array(
                        "None" => "none",
                        "Pagination" => "normal",
                        'Load More Button' => 'loadmore',
                        'Link'  => 'link'
                    ),
                ),

                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Button Label", "rab"), 
                    "param_name" => "button_label",
                    'dependency' => array(
                        'element' => 'pagination_style',
                        'value'   =>  array('loadmore', 'link')
                    )
                ),

                array(
                    "type" => "vc_link",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Link", "rab"), 
                    "param_name" => "link",
                    'dependency' => array(
                        'element' => 'pagination_style',
                        'value'   =>  array('link')
                    )
                ),
			)
		)
);