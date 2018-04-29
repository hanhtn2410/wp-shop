<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'category_banner' ) ) {
	//icon-wpb-single-image
	add_shortcode( 'category_banner', 'rab_category_banner' );

	function rab_category_banner( $atts, $content = null ) {
		$attributes = shortcode_atts( array(
			'title'                        => '',
			'subtitle'                     => '',
			'content'                      => '',
			'image'                        => '',
			'link'                         => '#',
			'size'                         => 'standard',
			'custom_class'                 => '',
			), $atts );
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}