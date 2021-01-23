<?php

/**
 * @link              https://website
 * @since             1.0.0
 * @package           Plugin_Template
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Template
 * Plugin URI:        https://website
 * Description:       Plugin Template description.
 * Version:           1.0.0
 * Author:            Erik Sõlg
 * Author URI:        https://www.linkedin.com/in/erik-solg/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-template
 * Domain Path:       /languages
 */

 

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'PLUGIN', plugin_basename( __FILE__ ));

function activate_plugin_template() {
	require_once PLUGIN_PATH . 'includes/class-activator.php';
	Activator::activate();
}

function deactivate_plugin_template() {
	require_once PLUGIN_PATH . 'includes/class-deactivator.php';
	Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_template' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_template' );


require PLUGIN_PATH . 'includes/class-plugin-template.php';

add_action('plugins_loaded', function () {
	// Add custom validations here
	new PluginTemplate();
});