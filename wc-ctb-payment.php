<?php
/**
 * Plugin Name: WooCommerce CTB Payment
 * Plugin URI:  https://github.com/nothing5201972/wc-ctb-payment
 * Description: Credit card and virtual account (ATM) payment methods powered by ctb.
 * Version:     1.0.0
 * Author:      Neo Chen
 * Author URI:  https://neochen.in/zh/
 * License:     GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: wc-ctb-payment
 * Domain Path: /languages
 */

if (! defined( 'WPINC') ){
    die;
}

/**
 * WooCommere CTB Pament plugin uses "ctb" as the prefix on its functions.
 * WooCommere CTB Pament plugin uses "CTB" as the prefix on its constants.
 */

if (! defined('CTB_INC')){
        define('CTB_INC', true);
}
/**
 * CONSTANTS - CTB stands for Woocommerce ctb Payment ^_^
 *
 * CTB_PLUGIN_NAME          : Plugin's name.
 * CTB_PLUGIN_DIR           : The absolute path of the CTB plugin directory.
 * CTB_PLUGIN_URL           : The URL of the CTB plugin directory.
 * CTB_PLUGIN_PATH          : The absolute path of the CTB plugin launcher.
 * CTB_PLUGIN_LANGUAGE_PACK : Translation Language pack.
 * CTB_PLUGIN_VERSION       : CTB plugin version number
 * CTB_PLUGIN_TEXT_DOMAIN   : CTB plugin text domain
 *
 * Expected values:
 *
 * CTB_PLUGIN_DIR           :(absolute_path)/wp-content/plugins/
 * CTB_PLUGIN_URL           :(protocol)://(domain_name)/wp-content/plugins/wc-ctb-payment/
 * CTB_PLUGIN_PATH          :(absolute_path)/wp-content/plugins/wc-ctb-payment/wc-ctb-payment.php
 * CTB_PLUGIN_LANGUAGE_PACK : wc-ctb-payment/languages
 */

define( 'CTB_PLUGIN_NAME', plugin_basename( __FILE__) );
define( 'CTB_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define( 'CTB_PLUGIN_URL', plugin_dir_url(__FILE__)) ;
define( 'CTB PLUGIN PATH',__FILE__);
define( 'CTB_PLUGIN_LANGUAGE_PACK', dirname( plugin_basename(__FILE__)). '/languages' );
define( 'CTB_PLUGIN_VERSION', '1.0.0' );
define( 'CTB_PHP_SDK_VERSION', '0.0.10' );
define( 'CTB_PLUGIN_TEXT_DOMAIN', 'wc-ctb-payment');

/**
 * Start to run WCSP plugin cores.
 */

// The minimum supported version of PHP.
if ( version_compare( phpversion(), '7.1.0', '>=' ) ) {

    require_once CTB_PLUGIN_DIR . 'vendor/autoload.php';

    // Todo
    require_once CTB_PLUGIN_DIR . 'controllers/class-ctb-payment.php';

    $ctb = new ctb_Payment();
    $ctb->init();
}
/**
 * WooCommerce ctb payment is open sourced at:
 * https://github.com/nothing5201972/wc-ctb-payment
 *
 * If you have found any bug or have any suggestion, please let me know.
 */


