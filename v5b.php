<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.elk-lab.com
 * @since             1.0.0
 * @package           Veb
 *
 * @wordpress-plugin
 * Plugin Name:       Visa 5Stelle Booking
 * Plugin URI:        http://www.visamultimedia.com/
 * Description:       This plugin integrates a 5Stelle Booking reservation form.
 * Version:           1.0.0
 * Author:            VisaMultimedia
 * Author URI:        http://www.visamultimedia.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       visa-5stelle-booking
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VEB_VERSION', '1.0.0' );

/**
 * Current environment state.
 *
 */
define( 'VEB_ENVIRONMENT', 'production' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-v5b-activator.php
 */
function activate_v5b() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-v5b-activator.php';
	V5b_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-v5b-deactivator.php
 */
function deactivate_v5b() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-v5b-deactivator.php';
	V5b_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_v5b' );
register_deactivation_hook( __FILE__, 'deactivate_v5b' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-v5b.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_v5b() {

	$plugin = new Veb();
	$plugin->run();

}
run_v5b();
