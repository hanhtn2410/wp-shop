<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'flash_sale' ) ) {
	//icon-wpb-single-image
	add_shortcode( 'flash_sale', 'rab_flash_sale' );

	function rab_flash_sale( $atts, $content = null ) {
		$attributes = shortcode_atts( array(
			'title'                        => '',
			'subtitle'                     => '',
			'date'                         => '',
			'custom_class'                 => '',
			), $atts );
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}