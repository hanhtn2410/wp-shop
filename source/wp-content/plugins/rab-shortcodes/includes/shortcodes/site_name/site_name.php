<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'site_name' ) ) {
	add_shortcode( 'site_name', 'rab_print_sitename' );
	function rab_print_sitename() {
		// since we don't need much info return directly
		return get_bloginfo('Name');
	}
}