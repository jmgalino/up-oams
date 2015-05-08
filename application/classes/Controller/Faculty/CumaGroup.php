<?php defined('SYSPATH') or die('No direct script access.');

interface Controller_Faculty_CumaGroup {

	/**
	 * List forms
	 */
	public function action_cuma();

	/**
	 * Show faculty form
	 */
	public function cuma_view($cuma);

} // End CumaGroup
