<?php

/**
 * The file that defines the shortcode used within the theme
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://themeforest.net/user/bickyg/portfolio
 * @since      1.0.0
 *
 * @package    Rab_Shortcodes
 * @subpackage Rab_Shortcodes/includes
 */
if( ! function_exists( 'rab_vc_add_custom_fields' ) ) {
	function rab_vc_add_custom_fields() {
	    $vc_add_sc_param = 'vc_'.'add'.'_'.'shortcode_'.'param';
	    if (!function_exists($vc_add_sc_param)){
	        return false;
	    }

	    // add icon box option for vc
	    $vc_add_sc_param('vc_icons', 'rab_vc_icons_field', RAB_ASSETS_URI  . 'vc/vc_icon.js' );
	}

	add_action( 'admin_init', 'rab_vc_add_custom_fields');
}

