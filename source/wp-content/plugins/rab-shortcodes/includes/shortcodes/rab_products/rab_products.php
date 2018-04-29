<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'rab_products' ) ) {
	add_shortcode( 'rab_products', 'rab_sc_products' );

	function rab_sc_products( $atts, $content = null ) {
		$attributes = shortcode_atts( array(
			'per_page'                     => 4,
			'order'                        => 'DESC',
			'orderby'                      => 'date',
			'columns'                      => 4,
			'featured'                     => false,
			'display_style'                => 'normal',  // normal | carousel
			), 
		$atts );
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}