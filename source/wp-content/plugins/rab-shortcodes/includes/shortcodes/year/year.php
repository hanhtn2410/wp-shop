<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'year' ) ) {
	add_shortcode( 'year', 'rab_print_year' );
	function rab_print_year() {
		return date_i18n('Y');
	}
}