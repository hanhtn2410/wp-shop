<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://themeforest.net/user/bickyg/portfolio
 * @since             1.0
 * @package           Rab_Shortcodes
 *
 * @wordpress-plugin
 * Plugin Name:       RAB Shortcodes
 * Plugin URI:        https://themeforest.net/user/bickyg/portfolio
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.1
 * Author:            Kaththemes
 * Author URI:        https://kaththemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rab-shortcodes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rab-shortcodes-activator.php
 */
function activate_rab_shortcodes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rab-shortcodes-activator.php';
	Rab_Shortcodes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rab-shortcodes-deactivator.php
 */
function deactivate_rab_shortcodes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rab-shortcodes-deactivator.php';
	Rab_Shortcodes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rab_shortcodes' );
register_deactivation_hook( __FILE__, 'deactivate_rab_shortcodes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rab-shortcodes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rab_shortcodes() {

	$plugin = new Rab_Shortcodes();
	$plugin->run();

}
run_rab_shortcodes();
