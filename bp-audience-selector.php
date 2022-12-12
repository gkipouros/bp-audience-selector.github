<?php
/**
 * Audience Selector for BuddyPress
 *
 * Allow post authors to select who is going to view their posts
 *
 * @link              https://gianniskipouros.com/bp-audience-selector/
 * @since             1.0.0
 * @package           bp-audience-selector
 *
 * @wordpress-plugin
 * Plugin Name:       Audience Selector for BuddyPress
 * Plugin URI:        https://gianniskipouros.com/bp-audience-selector/
 * Description:       Allow post authors to select who is going to view their posts
 * Version:           1.0.0
 * Author:            Giannis Kipouros
 * Author URI:        https://gianniskipouros.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bp-audience-selector
 * Domain Path:       /languages
 */

/**
 * Main file, contains the plugin metadata and activation processes
 *
 * @package    bp-audience-selector
 */
if ( ! defined( 'BPAS_VERSION' ) ) {
    /**
     * The version of the plugin.
     */
    define( 'BPAS_VERSION', '1.0.0' );
}

if ( ! defined( 'BPAS_PATH' ) ) {
    /**
     *  The server file system path to the plugin directory.
     */
    define( 'BPAS_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'BPAS_URL' ) ) {
    /**
     * The url to the plugin directory.
     */
    define( 'BPAS_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'BPAS_BASE_NAME' ) ) {
    /**
     * The url to the plugin directory.
     */
    define( 'BPAS_BASE_NAME', plugin_basename( __FILE__ ) );
}

/**
 * Include files.
 */
function bpas_include_plugin_files() {

    // Bail out if BP is not enabled.
    if ( ! function_exists( 'bp_is_active' ) ) {
        return;
    }

    // Include Class files
    $files = array(
        'app/main/class-bp-audience-selector.php',
    );

    // Include Includes files
    $includes = array();

    // Merge the two arrays
    $files = array_merge( $files, $includes );

    foreach ( $files as $file ) {

        // Include functions file.
        require BPAS_PATH . $file . '.php';

    }

}

add_action( 'plugins_loaded', 'bpas_include_plugin_files' );


/**
 * Load plugin's textdomain.
 */
function bpas_language_textdomain_init() {
    // Localization
    load_plugin_textdomain( 'bp-audience-selector', false, dirname( plugin_basename( __FILE__ ) ) . "/languages" );
}

// Add actions
add_action( 'init', 'bpas_language_textdomain_init' );



