<?php
/**
 * RAB Constants definition file
 *
 * @package  Rab
 */
// get theme data
$theme = wp_get_theme();

// theme core directory path & uri
$dir = get_template_directory();
$uri = get_template_directory_uri();

/**
 * Theme constants
 */
define( 'RAB_THEME', $theme->get( 'Name' ) );
define( 'RAB_VERSION', $theme->get( 'Version' ) );

/**
 * Template directory & uri
 */
define( 'RAB_DIR', wp_normalize_path( $dir ) );
define( 'RAB_URI', trailingslashit( $uri ) );

/**
 * Theme assets URI & DIR
 */
define( 'RAB_ASSETS', RAB_DIR . '/assets/' );
define( 'RAB_ASSETS_URI', RAB_URI . 'assets/' );
define( 'RAB_CSS', RAB_ASSETS_URI . 'css/' );
define( 'RAB_JS', RAB_ASSETS_URI . 'js/' );
define( 'RAB_IMAGES', RAB_ASSETS_URI . 'images/' );
define( 'RAB_RESOURCES', RAB_ASSETS . 'vc/' );

/**
 * External plugin sources
 */
define( 'RAB_EXTERNAL_PLUGIN_SOURCE', 'http://demo.kaththemes.com/pplugins/' );

/**
 * Include paths
 */
define( 'RAB_INC', RAB_DIR . '/inc/' );
define( 'RAB_INC_URI', RAB_URI . 'inc/' );
define( 'RAB_ADMIN', RAB_INC . 'admin/' );
define( 'RAB_HELPERS', RAB_INC . 'helpers/' );
define( 'RAB_PLUGINS', RAB_INC . 'plugins/' );
define( 'RAB_LIB', RAB_INC . 'lib/' );
define( 'RAB_WIDGETS', RAB_LIB . 'widgets/' );
define( 'RAB_SHORTCODES', RAB_LIB . 'shortcodes/' );
define( 'RAB_MEGAMENU', RAB_LIB . 'megamenu/' );

/**
 * Config paths
 */
define( 'RAB_CONFIG', RAB_INC . 'config/' );

/**
 * RAB Demos path & uri
 */
define( 'RAB_DEMO', RAB_INC . 'demos/' );
define( 'RAB_DEMO_URI', RAB_INC_URI . 'demos/' );

/**
 * Language path
 */
define( 'RAB_LANGUAGES', RAB_DIR . '/languages' );

/**
 * CS_OPTION fallback
 */
if( !defined( 'CS_OPTION' ) ) {
	define( 'CS_OPTION', '_cs_options' );
}

// Codestar framework specific customization
define( 'CS_ACTIVE_SHORTCODE', false );
/* PHP Closing tag is omitted */