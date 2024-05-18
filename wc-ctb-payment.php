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
 * WooCommere CTB Pament plugin uses "wcsp" as the prefix on its functions.
 * WooCommere CTB Pament plugin uses "WCSP" as the prefix on its constants.
 */

if (! defined('WCSP_INC')){
        define('WCSP_INC', true);
}
/**
 * CONSTANTS - WCSP stands for Woocommerce ctb Payment ^_^
 *
 * WCSP_PLUGIN_NAME          : Plugin's name.
 * WCSP_PLUGIN_DIR           : The absolute path of the WCSP plugin directory.
 * WCSP_PLUGIN_URL           : The URL of the WCSP plugin directory.
 * WCSP_PLUGIN_PATH          : The absolute path of the WCSP plugin launcher.
 * WCSP_PLUGIN_LANGUAGE_PACK : Translation Language pack.
 * WCSP_PLUGIN_VERSION       : WCSP plugin version number
 * WCSP_PLUGIN_TEXT_DOMAIN   : WCSP plugin text domain
 *
 * Expected values:
 *
 * WCSP_PLUGIN_DIR           :(absolute_path)/wp-content/plugins/
 * WCSP_PLUGIN_URL           :(protocal)://(domain_name)/wp-content/plugins/wc-ctb-payment/
 * WCSP_PLUGIN_PATH          :(absolute_path)/wp-content/plugins/wc-ctb-payment/wc-ctb-payment.php
 * WCSP_PLUGIN_LANGUAGE_PACK : wc-ctb-payment/languages
 */

define( 'WCSP_PLUGIN_NAME', plugin_basename( __FILE__) );
define( 'WCSP_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define( 'WCSP_PLUGIN_URL', plugin_dir_url(__FILE__)) ;
define( 'WCSP PLUGIN PATH',__FILE__);
define( 'WCSP_PLUGIN_LANGUAGE_PACK', dirname( plugin_basename(__FILE__)). '/languages' );
define( 'WCSP_PLUGIN_VERSION', '1.0.0' );
define( 'WCSP_PHP_SDK_VERSION', '0.0.10' );
define( 'WCSP_PLUGIN_TEXT_DOMAIN', 'wc-ctb-payment');

/**
 * Start to run WCSP plugin cores.
 */

// The minimum supported version of PHP.
if ( version_compare( phpversion(), '7.1.0', '>=' ) ) {

    require_once WCSP_PLUGIN_DIR . 'includes/helpers.php' ;
    require_once WCSP_PLUGIN_DIR . 'vendor/autoload.php';

    // Todo
    require_once WCSP_PLUGIN_DIR . 'controllers/class-ctb-payment.php';

    $ctb = new ctb_Payment();
    $ctb->init();
}
/**
 * WooCommerce ctb payment is open sourced at:
 * https://github.com/nothing5201972/wc-ctb-payment
 *
 * If you have found any bug or have any suggestion, please let me know.
 */


