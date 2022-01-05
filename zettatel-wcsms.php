<?php

/**
 * Plugin Name: Zettatel SMS Plugin for WooCommerce
 * Plugin URI: https://kimani.gocho.live/
 * Description: The unOfficial Zettatel plugin for for WooCommerce.
 * Version: 1.0.0
 * Author: josephgodwinke
 * Author URI: https://kimani.gocho.live/
 * Text Domain: zettatel-wcsms
 * Domain Path: /i18n/languages/
 * Requires at least: 5.6
 * Requires PHP: 5.6 or greater
 *
 * @package Zettatel SMS Plugin for WooCommerce
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Test to see if WooCommerce is active (including network activated).
$mother_plugin_path = trailingslashit(WP_PLUGIN_DIR) . 'woocommerce/woocommerce.php';

if (
    in_array($mother_plugin_path, wp_get_active_and_valid_plugins())
    || in_array($mother_plugin_path, wp_get_active_network_plugins())
) {
    // Custom code here. WooCommerce is active, however it has not
    // necessarily initialized (when that is important, consider
    // using the `woocommerce_init` action).

    // For calling numerous files, it is sometimes convenient to define a constant
    // Get the directory of the current file:
    // $plugin_path = plugin_dir_path( __FILE__ );

    define('ZETTATEL_BASE_URL', plugin_dir_path(__FILE__));

    define('ZETTATEL_ASSETS_URL', plugins_url('/assets', __FILE__));

    require_once ZETTATEL_BASE_URL . '/inc/init.php';
}
