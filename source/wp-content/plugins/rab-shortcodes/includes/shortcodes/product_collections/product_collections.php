<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'product_collections' ) ) {
	add_shortcode( 'product_collections', 'rab_product_collections' );
	function rab_product_collections( $atts, $content = null ) {
		$args = array(
			'style'                => 'normal',
			'title'                => '',
			'button_label'         => '',
			'button_url'           => '',
			'featured_image'       => '',
			'product_cat'          => '',
			'orderby'              => 'ID',
			'order'                => 'DESC',
			'featured_only'        => false,
			'custom_class'         => '',
		);

		$attr = shortcode_atts( $args, $atts );

		$filename = $attr['style'];
		ob_start();
			include "style-{$filename}.php";
		return ob_get_clean();
	}
}