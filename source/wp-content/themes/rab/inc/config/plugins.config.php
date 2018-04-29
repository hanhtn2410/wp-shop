<?php

if( ! defined( 'ABSPATH' ) ) {

	exit; 	// exit if accessed directly

}



add_action( 'tgmpa_register', 'rab_register_required_plugins' );



/**

 * Register the required plugins for this theme.

 *

 * This function is hooked into tgmpa_init, which is fired within the

 * TGM_Plugin_Activation class constructor.

 */

function rab_register_required_plugins() {

	

	$plugins = array(

		/**

		 * Bundled Plugins

		 */

		// codestar framework

		array(

			'name'               => esc_html__( 'Codestar Framework', 'rab' ),

			'slug'               => 'codestar-framework',

			'source'             => RAB_EXTERNAL_PLUGIN_SOURCE . 'codestar-framework.zip',

			'required'           => true,

			'version'            => '1.0.1', 

		),



		// rab shortcodes

		array(

			'name'	             => esc_html__( 'RAB Shortcodes', 'rab' ),

			'slug'               => 'rab-shortcodes',

			'source'             =>  RAB_EXTERNAL_PLUGIN_SOURCE . 'rab-shortcodes.zip',

			'required'           => true,

			'version'            => '1.0.0'  

		),



		// rab demo importer

		array(

			'name'	             => esc_html__( 'Kath Demo Importer', 'rab' ),

			'slug'               => 'kath-demo-importer',

			'source'             =>  RAB_EXTERNAL_PLUGIN_SOURCE . 'kath-demo-importer.zip',

			'required'           => true,

			'version'            => '1.0.0'  

		),



		// visual composer

		array(

			'name'               => esc_html__( 'WPBakery Page Builder', 'rab' ),

			'slug'               => 'js_composer',

			'source'             => RAB_EXTERNAL_PLUGIN_SOURCE . 'js_composer-5.4.5.zip',

			'required'           => true,

			'version'            => '5.4.5'

		),



		// slider revolution

		array(

			'name'	             => esc_html__( 'Slider Revolution', 'rab' ),

			'slug'               => 'revslider',

			'source'             =>  RAB_EXTERNAL_PLUGIN_SOURCE . 'revslider-5.4.6.3.1.zip',

			'required'           => true,

			'version'            => '5.4.6.3.1'  

		),



		/**

		 * Plugins from WordPress repository

		 */

		array(

			'name'      => esc_html__( 'WooCommerce', 'rab' ),

			'slug'      => 'woocommerce',

			'required'  => true,

		),



		// Contact form 7

		array(

			'name'      => esc_html__( 'Contact Form 7', 'rab' ),

			'slug'      => 'contact-form-7',

			'required'  => true,

		),



		// YITH wishlist plugin

		array(

			'name'      => esc_html__( 'YITH WooCommerce Wishlist', 'rab' ),

			'slug'      => 'yith-woocommerce-wishlist',

			'required'  => false,

		),



		// YITH Quick view plugin

		array(

			'name'      => esc_html__( 'YITH WooCommerce Quick View', 'rab' ),

			'slug'      => 'yith-woocommerce-quick-view',

			'required'  => false,

		),



		// YITH compare plugin

		array(

			'name'      => esc_html__( 'YITH WooCommerce Compare', 'rab' ),

			'slug'      => 'yith-woocommerce-compare',

			'required'  => false,

		),



		// Instashow Lite

		array(

			'name'      => esc_html__( 'Instashow Lite', 'rab' ),

			'slug'      => 'instashow-lite',

			'required'  => false,

		),



		// Mailpoet newsletter 3 latest version

		array(

			'name'      => esc_html__( 'MailPoet 3 (New)', 'rab' ),

			'slug'      => 'mailpoet',

			'required'  => false,

			'version'   => '3.2.4'

		),



		// YITH WooCommerce Social Login

		array(

			'name'      => esc_html__( 'YITH WooCommerce Social Login', 'rab' ),

			'slug'      => 'yith-woocommerce-social-login',

			'required'  => false,

			'version'   => '1.2.0'

		)



	);



	// Settings for plugin installation screen

	$config = array(

		'id'           => 'tgmpa-rab',

		'default_path' => '',

		'menu'         => 'rab-install-plugins',

		'parent_slug'  => 'themes.php',

		'capability'   => 'edit_theme_options',

		'has_notices'  => true,

		'dismissable'  => true,

		'dismiss_msg'  => '',

		'is_automatic' => false,

		'message'      => '',		

	);



	tgmpa( $plugins, $config );



}



/* PHP Closing tag is omitted */