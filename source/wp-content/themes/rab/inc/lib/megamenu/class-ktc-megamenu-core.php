<?php
/**
 * KathThemes MegaMenu Core class
 *
 * @package  Inc/Lib/megamenu
 * @author   Kaththemes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'Ktc_Megamenu_Core' ) ) {

	/**
	 * Core Megamenu Class 'Ktc_Megamenu_Core'
	 */
	class Ktc_Megamenu_Core {

		/**
		 * URL to the current folder.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $_url;

		/**
		 * An array of URLs.
		 *
		 * @static
		 * @access public
		 * @var array
		 */
		public static $_urls;

		/**
		 * Path to the current folder.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $_dir;

		/**
		 * An array of paths.
		 *
		 * @static
		 * @access public
		 * @var array
		 */
		public static $_dirs;

		/**
		 * Array of objects.
		 *
		 * @static
		 * @access public
		 * @var mixed
		 */
		public static $_classes;

		/**
		 * Constructor.
		 *
		 * @access public
		 */
		public function __construct() {

			$this->init();

			add_action( 'rab_init', 				array( $this, 'include_functions' ) );

			add_action( 'admin_enqueue_scripts', 	array( $this, 'register_scripts' ) );
			add_action( 'admin_enqueue_scripts',	array( $this, 'register_stylesheets' ) );

			do_action( 'rab_init' );

		}

		/**
		 * Things to run when this object is first instantiated.
		 *
		 * @static
		 * @access public
		 */
		public static function init() {

			// Windows-proof constants: replace backward by forward slashes. Thanks to: @peterbouwmeester.
			self::$_dir	 = RAB_MEGAMENU;
			$wp_content_dir = trailingslashit( str_replace( '\\', '/', WP_CONTENT_DIR ) );
			$relative_url   = str_replace( $wp_content_dir, '', self::$_dir );
			$wp_content_url = ( is_ssl() ? str_replace( 'http://', 'https://', WP_CONTENT_URL ) : WP_CONTENT_URL );

		}

		/**
		 * Instantiates the Ktc Megamenu class.
		 *
		 * @access public
		 */
		public function include_functions() {
			
			require_once get_parent_theme_file_path( 'inc/lib/megamenu/mega-menus.php' );

			self::$_classes['menus'] = new Ktc_Megamenu();

		}

		/**
		 * Register megamenu javascript assets.
		 */
		public function register_scripts( $hook ) {
			if ( 'nav-menus.php' === $hook ) {
				$theme_info = wp_get_theme();

				// Scripts.
				wp_enqueue_media();
				wp_register_script( 'ktc-megamenu', RAB_JS. 'admin/megamenu.js', array(),  RAB_VERSION );
				wp_enqueue_script( 'ktc-megamenu' );
			}
		}

		/**
		 * Enqueue stylesheet for megamenu
		 */
		public function register_stylesheets( $hook ) {
			if ( 'nav-menus.php' === $hook ) {
				$theme_info = wp_get_theme();

				wp_enqueue_style( 'rab-megamenu', RAB_CSS . 'admin/megamenu.css', false, RAB_VERSION );
			}
		}
	}
}

/* PHP Closing tag is omitted */