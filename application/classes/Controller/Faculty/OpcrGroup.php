<?php defined('SYSPATH') or die('No direct script access.');

interface Controller_Faculty_OpcrGroup {

	/**
	 * List forms
	 */
	public function action_opcr();

	/**
	 * Show department form
	 */
	public function opcr_view($opcr);

	/**
	 * Evaluate department form
	 */
	public function opcr_evaluate($opcr);

	/**
	 * Consolidate department forms
	 */
	public function opcr_consolidate($opcr);

} // End OpcrGroup
