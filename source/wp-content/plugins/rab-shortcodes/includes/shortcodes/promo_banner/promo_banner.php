<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'promo_banner' ) ) {

	add_shortcode( 'promo_banner', 'rab_promo_banner' );

	function rab_promo_banner( $atts, $content = null ) {
		$attributes = shortcode_atts( array(
			'image'                        => '',
			'link'                         => '#',
			'image_alt'                    => '',
			'link_opens'                   => 'same'
		), $atts );
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}