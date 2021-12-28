<?php
/**
 * Zettatel Zettatel_WCSMS_Admin. Admin Class.
 *
 * @class    Zettatel_WCSMS_Admin
 * @package  Zettatel-wcsms\Classes
 * @version  1.0.0
 */

namespace Gkimani\Zettatel_WCSMS;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( '__construct()' ) ) {
	require_once ABSPATH . 'wp-content/woocommerce/woocommerce.php';
}

/**
 * Zettatel_WCSMS_Admin class.
 */
class Zettatel_WCSMS_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {

		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_tab' ), 100 );
		add_action( 'woocommerce_settings_tabs_zettatel_sms', array( $this, 'zettatel_sms_settings_tab' ) );
		add_action( 'woocommerce_update_options_zettatel_sms', array( $this, 'update_zettatel_sms_settings' ) );
		add_action( 'woocommerce_admin_field_wc_zettatel_sms_link', array( $this, 'add_link_field' ) );

		add_action( 'wp_ajax_wc_zettatel_sms_send_test_sms', array( $this, 'send_test_sms' ) );
		add_filter( 'plugin_action_links_' . ZETTATEL_BASE_URL, array( $this, 'plugin_action_links' ) );
	}

	/**
	 * Add Zettatel-wcsms settings tab.
     *
	 * @param array $settings_tabs.
	 * @return array
	 */
	public function add_settings_tab( $settings_tabs ) {

		$zettatel_settings_tab = array();

		foreach ( $settings_tabs as $tab_id => $tab_title ) {

			$zettatel_settings_tab[ $tab_id ] = $tab_title;

			if ( 'email' === $tab_id ) {
				$zettatel_settings_tab['zettatel_sms'] = 'Zettatel SMS';
			}
		}

		return $zettatel_settings_tab;
	}

	/**
	 * Zettatel settings.
	 *
	 * @return mixed|void
	 */
	public function zettatel_sms_settings() {

		$settings = array(
			array(
				'title' => 'Zettatel SMS API Credentials',
				'type'  => 'title',
				'desc'  => 'To get your SMS API Key login to your account <a href="https://portal.zettatel.com" target="_blank">zettatel customer area</a> and navigate to Profile > API Key > Manage API Key',
			),
			array(
				'title' => 'API Key',
				'desc'  => 'apiKey needs to be sent as HTTP header when you are not using userId and password credentials.',
				'type'  => 'text',
				'id'    => 'wc_zettatel_api_key',
				'css'   => 'width:40%',
			),
			array(
				'title' => 'Sender ID',
				'desc'  => 'Your registered and approved sender name.',
				'type'  => 'text',
				'id'    => 'wc_zettatel_sender_id',
			),

			array( 'type' => 'sectionend' ),

			array(
				'name' => 'Send Test SMS',
				'type' => 'title',
				'desc' => 'The Sender ID that will be used is the Sender ID that was set above.',
			),

			array(
				'id'       => 'wc_zettatel_sms_test_mobile',
				'name'     => 'Mobile Number',
				'desc_tip' => 'Enter the mobile number with country code/prefix',
				'type'     => 'text',
			),

			array(
				'id'       => 'wc_zettatel_sms_test_msg',
				'name'     => 'Text Message',
				'desc_tip' => 'Enter the test text message to be sent.',
				'type'     => 'textarea',
				'css'      => 'min-width: 500px;',
			),

			array(
				'name'   => 'Send SMS',
				'href'   => '#',
				'class'  => 'wc_send_sms_test_sms_button button',
				'length' => 160,
				'type'   => 'wc_zettatel_sms_link',
			),

			array( 'type' => 'sectionend' ),

		);

		return apply_filters( 'zettatel_api_details_settings', $settings );
	}

	/**
	 * Add link field.
	 *
	 * @param $field
	 */
	public function add_link_field( $field ) {

		if ( isset( $field['name'] ) && isset( $field['class'] ) && isset( $field['href'] ) ) :

			?>
			<tr valign="top">
				<th scope="row" class="titledesc"></th>
				<td class="forminp">
					<a href="<?php echo esc_url( $field['href'] ); ?>" class="<?php echo esc_attr( $field['class'] ); ?>"><?php echo wp_filter_kses( $field['name'] ); ?></a>
				</td>
			</tr>
			<?php

		endif;
	}

	/**
	 * Save zettatel settings.
	 */
	public function update_zettatel_sms_settings() {
		woocommerce_update_options( $this->zettatel_sms_settings() );
	}

	/**
	 * Plugin action links.
	 *
	 * @param array $links Action links.
	 *
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		$settings_link = array(
			'settings' => '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=zettatel_sms' ) . '" title="View zettatel Settings">Settings</a>',
		);
		return array_merge( $links, $settings_link );
	}

}
new Zettatel_WCSMS_Admin();
