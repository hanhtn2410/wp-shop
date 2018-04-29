<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'rab_single_product' ) ) {
	add_shortcode( 'rab_single_product', 'rab_single_product' );

	function rab_single_product( $atts, $content = null ) {
		$attributes = shortcode_atts( array(
			'id' => '',
			'sku' => ''
			), 
		$atts );
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}