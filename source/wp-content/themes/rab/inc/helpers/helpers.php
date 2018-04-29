<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;    // exit if accessed directly
}

/**
 * ================================
 * Helper functions definition file
 * ================================
 * 
 */

// checks for plugin activation
if( ! function_exists( 'rab_plugin_active' ) ) {
	function rab_plugin_active( $slug ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		return is_plugin_active( $slug );
	}
}

/** 
 * Title Tag Backward Compatibility
 */
if( ! function_exists( '_wp_render_title_tag' ) ) {
    function rab_print_title_tag() {
        ?>
        <title><?php wp_title( '-', true, 'right' ); ?></title>
        <?php
    }

    add_action( 'wp_head', 'rab_print_title_tag', 99 );
}

/**
 * WP Title filter
 */
if( ! function_exists( 'rab_filter_title' ) ) {
    function rab_filter_title( $title, $sep ) {
        if ( is_feed() ) return $title;
        
        global $paged, $page;

        if ( is_search() ) {
            
            $title = sprintf( esc_html__( 'Search results for %s', 'rab' ), '"' . get_search_query() . '"' );

            if ( $paged >= 2 ) {
                $title .= " $separator " . sprintf( esc_html__( 'Page %s', 'rab' ), $paged );
            }

            $title .= " $separator " . get_bloginfo( 'name', 'display' );

            return $title;

        }

        return $title;
    }
    add_filter( 'wp_title', 'rab_filter_title', 10, 2 );
}

