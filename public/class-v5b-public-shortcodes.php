<?php

/**
 * The shortcodes class for the public-facing functionality of the plugin.
 *
 * @link       www.visamultimedia.com
 * @since      1.0.0
 *
 * @package    Veb
 * @subpackage Veb/public
 */

/**
 * The helper class for the public-facing functionality of the plugin.
 *
 * @package    Veb
 * @subpackage Veb/public
 * @author     Gabriele Coquillard <gabriele.coquillard@gmail.com>
 */
class V5b_Public_Shortcodes {

	/**
	 * Undocumented variable
	 *
	 * @var [type]
	 */
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->options = get_option( 'v5b_options' );
		$this::add_shortocdes();
	}

	/**
	 * Undocumented function
	 *
	 * @since    1.0.0
	 */
	public function add_shortocdes() {

		add_shortcode( 'v5b_display_form', array( $this, 'v5b_display_form' ) );

	}

	/**
	 * Undocumented function
	 * 
	 * @since    1.0.0
	 *
	 * @param [type] $atts
	 * @return void
	 */
	public function v5b_display_form( $atts ){
		$atts = shortcode_atts(
            array(),
			$atts,
			'v5b_display_form'
		);

		ob_start();
		?>

		<div id="v5b" class="clearfix" ng-app="v5b" ng-controller="vebController" ng-cloak ng-strict-di>

			<form name="vebForm" novalidate>

				<div class="v5b_dates clearfix">
					<div class="v5b_date v5b_date_arrival clearfix">
						<label><?= __( 'Arrival date', 'visa-5stelle-booking' ) ?></label>
						<input name="arrivalDate" type="date" ng-model="form.arrivalDate" ng-min="{{internal.minArrivalDate}}" min="{{internal.minArrivalDate | date:'yyyy-MM-dd'}}" required>
						<label class="validation-error" ng-if="vebForm.arrivalDate.$invalid"><?= __( 'Invalid date!', 'visa-5stelle-booking' ) ?></label>
					</div>
					<div class="v5b_date v5b_date_depart clearfix">
						<label><?= __( 'Departure date', 'visa-5stelle-booking' ) ?></label>
						<input name="departDate" type="date" ng-model="form.departDate" ng-min="{{internal.minDepartDate}}" min="{{internal.minDepartDate | date:'yyyy-MM-dd'}}" required>
						<label class="validation-error" ng-if="vebForm.departDate.$invalid"><?= __( 'Invalid date!', 'visa-5stelle-booking' ) ?></label>
					</div>
				</div>

				<div class="v5b_coupon clearfix">
					<label><?= __( 'Coupon', 'visa-5stelle-booking' ) ?></label>
					<input type="text" name="coupon" ng-model="submit.pc" />
				</div>

				<div class="v5b_submit clearfix">
					<input type="submit" ng-click="submitForm()" ng-disabled="vebForm.$invalid" value="<?= __( 'Submit', 'visa-5stelle-booking' ) ?>" />
					<label class="validation-error" ng-if="vebForm.$invalid"><?= __( 'There are one or more errors in your request. Please correct them before submitting.', 'visa-5stelle-booking' ) ?></label>
				</div>
			</form>

		</div>		

		<?php
		return ob_get_clean();
	}

}
