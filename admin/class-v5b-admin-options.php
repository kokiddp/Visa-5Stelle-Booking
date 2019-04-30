<?php

/**
 *
 * @link       www.visamultimedia.com
 * @since      1.0.0
 *
 * @package    Veb
 * @subpackage Veb/admin
 */


/**
 * The helper class for the public-facing functionality of the plugin.
 *
 * @package    Veb
 * @subpackage Veb/public
 * @author     Gabriele Coquillard <gabriele.coquillard@gmail.com>
 */
class V5b_Admin_Options {

	/**
	 * Helper class
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $options
	 */
	public $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->options = get_option( 'v5b_options' );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function v5b_add_options_page() {
		add_options_page( __('Visa 5Stelle Booking', 'visa-5stelle-booking'), __('Visa 5Stelle Booking', 'visa-5stelle-booking'), 'manage_options', 'v5b', array( $this, 'v5b_options_page' ) );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function v5b_options_page() {
		include_once 'partials/v5b-admin-display.php';
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function v5b_init_options() {
		register_setting( 'v5b_options', 'v5b_options', array( $this, 'v5b_options_validate' ) );
		
		add_settings_section( 'v5b_main', __('Main Settings', 'visa-5stelle-booking'), array( $this, 'v5b_main_section_text' ), 'v5b' );
		add_settings_field( 'v5b_url', __('URL base', 'visa-5stelle-booking'), array( $this, 'v5b_setting_url'), 'v5b', 'v5b_main' );
		add_settings_field( 'v5b_idh', __('ID Hotel', 'visa-5stelle-booking'), array( $this, 'v5b_setting_idh'), 'v5b', 'v5b_main' );

		add_settings_section( 'v5b_config', __('Configuration Settings', 'visa-5stelle-booking'), array( $this, 'v5b_config_section_text' ), 'v5b' );
		add_settings_field( 'v5b_min_nights', __('Minimum nights stay', 'visa-5stelle-booking'), array( $this, 'v5b_setting_min_nights'), 'v5b', 'v5b_config' );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function v5b_main_section_text() {
		echo '<p>' . __('Theese are the general settings', 'visa-5stelle-booking') . '</p>';
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function v5b_setting_url() {
		echo "<input type='text' style='width:100%' id='v5b_url' name='v5b_options[url]' value='{$this->options['url']}' />";
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function v5b_setting_idh() {
		echo "<input type='text' id='v5b_idh' name='v5b_options[idh]' value='{$this->options['idh']}' />";
	}


	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function v5b_config_section_text() {
		echo '<p>' . __('Theese are the configuration settings', 'visa-5stelle-booking') . '</p>';
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function v5b_setting_min_nights() {
		echo "<input type='number' step='1' min='1' id='v5b_min_nights' name='v5b_options[min_nights]' value='{$this->options['min_nights']}' />";
	}

	/**
	 * Undocumented function
	 *
	 * @param mixed $input
	 * @return mixed
	 */
	public function v5b_options_validate( $input ) {
		
		return $input;
	}
}
