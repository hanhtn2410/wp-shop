<?php 
$sidebar = cs_get_option( 'blog-fieldset' );
$selected = $sidebar['blog-archive-sidebar-select'];


if( is_page() ){
	global $post;
	$meta = get_post_meta( $post->ID, '_custom_meta', true );
	$is_sidebbar = ( isset( $meta['sidebar'] ) && $meta['sidebar'] ) ? true : false;
	$selected = ( isset( $meta['page-sidebar-select'] ) ) ? $meta['page-sidebar-select']: 'rab-primary-sidebar';
}

if( is_active_sidebar( 'rab-primary-sidebar' ) || is_active_sidebar( $selected ) ) {
	if( empty( $selected ) ) {
	    dynamic_sidebar( 'rab-primary-sidebar' );
	} else {
	    dynamic_sidebar( $selected );
	}
}

