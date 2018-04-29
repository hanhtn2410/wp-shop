<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! shortcode_exists( 'rab_blog' ) ) {
	add_shortcode( 'rab_blog', 'rab_sc_blog' );

	function rab_sc_blog( $atts, $content = null ) {
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var('paged') : 1;

		$attributes = shortcode_atts( 
			array(
			'post_type'                    => 'post',
			'paged'                        => $paged,
			'posts_per_page'               => 4,
			'order'                        => 'DESC',
			'orderby'                      => 'date',
			'columns'                      => 4,
			'display_style'                => 'normal',  // normal | masonry 
			'view_mode'                    => 'grid',  // grid | list
			'alternate_layout'             => true,
			'pagination_style'             => 'none', // loadmore|infinitescroll|link|none
			'link'                         => '',
			'button_label'                 => 'Load more'               
			), 
			$atts 
		);
		ob_start();
		include 'output.php';
		return ob_get_clean();
	}
}