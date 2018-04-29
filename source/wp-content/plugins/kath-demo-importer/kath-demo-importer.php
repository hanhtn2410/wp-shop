<?php
/**
 * Kath Demo Importer
 *
 * @package     KathDemoImporter
 * @author      Kaththemes
 * @copyright   2017 Kaththemes
 * @license     GPL-2.0+
 *
 * Plugin Name: Kaththemes Demo Importer
 * Plugin URI:  https://themeforest.net/user/bickyg/portfolio
 * Description: Demo importer for Kath themes
 * Version:     1.1.0
 * Author:      Kaththemes
 * Author URI:  https://kaththemes.com
 * Text Domain: kath-demo-importer
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Importer Path
 */
if( ! function_exists( 'kath_importer_get_path_locate' ) ) {
  function kath_importer_get_path_locate() {
    $dirname        = wp_normalize_path( dirname( __FILE__ ) );
    $plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
    $located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
    $directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
    $directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
    $basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
    $dir            = $directory . $basename;
    $uri            = $directory_uri . $basename;
    return apply_filters( 'kath_importer_get_path_locate', array(
      'basename' => wp_normalize_path( $basename ),
      'dir'      => wp_normalize_path( $dir ),
      'uri'      => $uri
    ) );
  }
}

/**
 * Importer constants
 */
$get_path = kath_importer_get_path_locate();

define( 'KATH_IMPORTER_VER' , '1.0.0' );
define( 'KATH_IMPORTER_DIR' , $get_path['dir'] );
define( 'KATH_IMPORTER_URI' , $get_path['uri'] );
define( 'KATH_IMPORTER_CONTENT_DIR' , KATH_IMPORTER_DIR . '/demos/' );
define( 'KATH_IMPORTER_CONTENT_URI' , KATH_IMPORTER_URI . '/demos/' );



/**
 * Scripts and styles for admin
 */
function kath_importer_enqueue_scripts() {

    wp_enqueue_script( 'rab-importer', KATH_IMPORTER_URI . '/assets/js/import.js', array( 'jquery' ), KATH_IMPORTER_VER, true);
    wp_enqueue_style( 'rab-importer-css', KATH_IMPORTER_URI . '/assets/css/import.css', null, KATH_IMPORTER_VER);
}

add_action( 'admin_enqueue_scripts', 'kath_importer_enqueue_scripts' );

/**
 *
 * Decode string for backup options (Source from codestar)
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/**
 * Load Importer
 */
require_once KATH_IMPORTER_DIR . '/classes/abstract.class.php';
require_once KATH_IMPORTER_DIR . '/classes/importer.class.php';
