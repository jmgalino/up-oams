<?php defined('SYSPATH') or die('No direct script access.');

interface Controller_Faculty_AccomGroup {

	/**
	 * List reports
	 */
	public function action_accom();

	/**
	 * List accomplishments
	 */
	public function accom_all();

	/**
	 * Show faculty report
	 */
	public function accom_view($accom);

	/**
	 * Evaluate faculty report
	 */
	public function accom_evaluate($accom);

	/**
	 * Consolidate reports
	 */
	public function accom_consolidate($accom);

} // End AccomGroup
