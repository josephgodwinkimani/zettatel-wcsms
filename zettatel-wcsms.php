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

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

    define( 'ZETTATEL_BASE_URL', plugin_dir_path( __FILE__ ) );

    require_once ZETTATEL_BASE_URL . '/inc/classes/class-zettatel-wcsms-admin.php';

}



