<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://redefiningtheweb.com/
 * @since             1.0.0
 * @package           Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Variation Swatches Master Lite for WooCommerce
 * Plugin URI:        https://redefiningtheweb.com/plugins/
 * Description:       Variation Swatches Master Lite for WooCommerce is an advanced module for WP-powered online stores. It helps you to customize the variations on your product pages in a few clicks to display them into outstanding swatches.
 * Version:           1.0.0
 * Author:            RedefiningTheWeb
 * Author URI:        https://redefiningtheweb.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rtwvsmlw-variation-swatches-lite-for-woocommerce
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
define( 'RTWVSMLW_VARIATION_SWATCHES_MASTER_FOR_WOOCOMMERCE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/rtwvsmlw-class-woocommerce-variation-swatches-master-activator.php
 */
function rtwvsmlw_activate_variation_swatches_master_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/rtwvsmlw-class-woocommerce-variation-swatches-master-activator.php';
	Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce_Activator::rtwvsmlw_activate();
}

register_activation_hook( __FILE__, 'rtwvsmlw_activate_variation_swatches_master_for_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/rtwvsmlw-class-woocommerce-variation-swatches-master.php';

//Plugin Constant
define('RTWVSMLW_DIR', plugin_dir_path( __FILE__ ) );
define('RTWVSMLW_URL', plugin_dir_url( __FILE__ ) );
define('RTWVSMLW_HOME', home_url() );
define('RTWVSMLW_ADMIN_PARTIALS_TABS_DIR',plugin_dir_path( __FILE__ ).'admin/partials/rtwvsmlw_admin_tabs/');
define( 'RTWVSMLW_PUBLIC_DIR',plugin_dir_path( __FILE__ ).'public/partials/' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function rtwvsmlw_run_variation_swatches_master_for_woocommerce() {

	if( function_exists('is_multisite') && is_multisite() )
	{
		include_once(ABSPATH. 'wp-admin/includes/plugin.php');
		if( is_plugin_active('rtwwvsm-woocommerce-variation-swatches-master/rtwwvsm-woocommerce-variation-swatches-master.php') )
		{
			return;
		}
	}
	else{
		if( in_array('rtwwvsm-woocommerce-variation-swatches-master/rtwwvsm-woocommerce-variation-swatches-master.php', apply_filters('active_plugins', get_option('active_plugins'), array() ) ) )
		{
			return;
		}
	}

	$plugin = new Rtwvsmlw_Variation_Swatches_Master_For_Woocommerce();
	$plugin->rtwvsmlw_run();

}
rtwvsmlw_run_variation_swatches_master_for_woocommerce();
