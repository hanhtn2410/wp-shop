<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'info_banner' ) ) {
	//icon-wpb-single-image
	add_shortcode( 'info_banner', 'rab_info_banner' );

	function rab_info_banner( $atts, $content = null ) {
		$attributes = shortcode_atts( array(
			'title'                        => '',
			'content'                      => '',
			'image'                        => '',
			'button_text'                  => 'Shop Now',
			'link'                         => '#',
			'size'                         => 'standard',
			'icon'                         => 'long-arrow-right',
			'alignment'                    => 'center',
			'button_bg_style'              => 'transparent',
			'button_text_color'            => '#fff',
			'button_text_hover_color'      => '#fff',
			'button_bg_color'              => '#fff',
			'button_bg_border_color'       => '#fff',
			'button_border_radius'         => '0px',
			'button_border_width'          => '1px',
			'custom_class'                 => '',
			'content_style'                => 'default',
			'content_position'             => 'middle',
			), $atts );
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}