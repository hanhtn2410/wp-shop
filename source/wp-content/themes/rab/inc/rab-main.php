<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;    // exit if accessed directly
}

/**
 * =======================================
 * RAB main file
 *
 * Loads our theme file for additional
 * functionalities
 * =======================================
 */

// load helpers & libraries
require_once get_parent_theme_file_path( 'inc/helpers/helpers.php' );

// include plugin activation class
require_once get_parent_theme_file_path( 'inc/lib/class-tgm-plugin-activation.php' );

// include aq resize script
require_once get_parent_theme_file_path( 'inc/admin/aq_resize.php' );

// load our custom functions file
require_once get_parent_theme_file_path( 'inc/helpers/custom-functions.php' );

// load shortcodes helper
require_once get_parent_theme_file_path( 'inc/helpers/shortcodes.php' );

// load visual composer customization file
require_once get_parent_theme_file_path( 'inc/helpers/visual-composer.php' );

// include rab shortcode handler
require_once get_parent_theme_file_path( 'inc/lib/rab-shortcodes.php' );

// multiple sidebar class
require_once get_parent_theme_file_path( 'inc/lib/class-rab-sidebar.php' );
Rab_Sidebar::instance();

require_once get_parent_theme_file_path( 'inc/lib/megamenu/megamenu-init.php' );

// load our theme setup file
require_once get_parent_theme_file_path( 'inc/helpers/theme-setup.php' );

// load our enqueue handler file
require_once get_parent_theme_file_path( 'inc/helpers/enqueue-handler.php' );

// load our template function definition file
require_once get_parent_theme_file_path( 'inc/helpers/template-tags.php' );

// load our ajax handler file
require_once get_parent_theme_file_path( 'inc/helpers/ajax-handler.php' );

// load woocommerce customization file
require_once get_parent_theme_file_path( 'inc/helpers/woocommerce.php' );

// load our config files
require_once get_parent_theme_file_path( 'inc/config/plugins.config.php' );
require_once get_parent_theme_file_path( 'inc/config/options.config.php' );
require_once get_parent_theme_file_path( 'inc/config/metabox.config.php' );
require_once get_parent_theme_file_path( 'inc/config/importer.config.php' );

/**
 * Load our widgets
 */
require_once get_parent_theme_file_path( 'inc/lib/widgets/class-rab-recent-posts-widgets.php' );
require_once get_parent_theme_file_path( 'inc/lib/widgets/class-rab-promo-banner-widget.php' );


/* PHP Closing tag is omitted */