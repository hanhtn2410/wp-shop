<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

/**
 * =========================================
 * RAB theme setups & widgets initialization
 * =========================================
 */

/**
 * RAB content area width setup
 */
if( ! function_exists( 'rab_setup_content_width' ) ) {
	function rab_setup_content_width() {
		$site_width = esc_attr( cs_get_option('site-width', 1140 ) );
		$GLOBALS['content_width'] = apply_filters( 'rab_content_width', $site_width );
	}
	add_action( 'after_setup_theme', 'rab_setup_content_width', 0 );
}


/**
 * RAB setups
 */
if( ! function_exists( 'rab_setup' ) ) {
	function rab_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RAB, use a find and replace
		 * to change 'rab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rab', RAB_LANGUAGES );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Custom image size
		add_image_size( 'rab-small-thumb', 70, 63, true );
		add_image_size( 'rab-blog-classic', 848, 390, true );
		add_image_size( 'rab-blog-classic-no-sidebar', 945, 400, true );
		add_image_size( 'rab-blog-detail-banner', 1920, 600, true );
		add_image_size( 'rab-page-banner', 1920, 400, true );
		add_image_size( 'rab-product-default', 262, 350, true );
		add_image_size( 'rab-blog-default', 270, 165, true );
		add_image_size( 'rab-blog-col-full', 370, 230, true );
		add_image_size( 'rab-product-featured-carousel', 555, 562, true );
		add_image_size( 'rab-blog-masonry-small', 360, 292, true );
		add_image_size( 'rab-blog-masonry-medium', 360, 341, true );
		add_image_size( 'rab-blog-masonry-large', 360, 389, true );
		add_image_size( 'rab-blog-modern-featured', 670, 411, true );
		add_image_size( 'rab-blog-modern-big', 470, 578, true );
		add_image_size( 'rab-blog-modern-small', 370, 448, true );
		add_image_size( 'rab-shop-detail', 670, 520, true );
		add_image_size( 'rab-shop-detail-thumb', 117, 117, true );
		add_image_size( 'rab-shop-detail-alt', 533, 513, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-3-left'   => esc_html__( 'Header 3 Left', 'rab' ),
			'primary'         => esc_html__( 'Primary', 'rab' ),
			'header-3'        => esc_html__( 'Header v3', 'rab' ),
		) );

		// makes our theme WC compatible
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
	add_action( 'after_setup_theme', 'rab_setup' );
}

if( ! function_exists( 'rab_widgets_setup' ) ) {
	function rab_widgets_setup() {
		$sidebars = array();

		// primary sidebar
		$sidebars[] 	= 	array(
			'id'			=>		'rab-primary-sidebar',
			'name'			=>		esc_html__( 'Primary Sidebar', 'rab' ),
			'description'	=>		'',
			'before_widget'	=>		'<div class="widget %2$s mb-30">',
			'after_widget'	=>		'</div>',
			'before_title'	=>		'<h5 class="widget-title">',
			'after_title'	=>		'</h5>'
		);

		// product pages sidebar
		$sidebars[]		=	array(
			'id'			=>		'rab-product-sidebar',
			'name'			=>		esc_html__( 'Product Sidebar', 'rab' ),
			'description'	=>		'',
			'before_widget'	=>		'<div id="%1$s" class="box mb-30 widget %2$s">',
			'after_widget'	=>		'</div>',
			'before_title'	=>		'<h5 class="widget-title">',
			'after_title'	=>		'</h5>'
		);

		foreach( $sidebars as $sidebar ) {
			register_sidebar( $sidebar );
		}

		// footer widgets
		$footer_fieldset = cs_get_option( 'footer-widgets-fieldset' );
		$number = (int)$footer_fieldset['widgets-column'];
		if( ! $number ) {
			$number = 4;
		}
		$total = 12;
		$cols = $total / $number;
		$class = 'col-md-'.$cols . ' col-sm-'.$cols;

		register_sidebars($number, array(
			'id'			=>		'footer-widgets',
			'name'			=>		esc_html__( 'Footer Widget Area %d', 'rab' ),
			'description'	=>		'',
			'before_widget'	=>		'<div id="%1$s" class="widget %2$s ' . $class . ' col-xs-12">',
			'after_widget'	=>		'</div>',
			'before_title'	=>		'<h6 class="footer-title">',
			'after_title'	=>		'</h6>'
		));

	}
	add_action( 'widgets_init', 'rab_widgets_setup' );
}

/* PHP Closing tag is omitted */