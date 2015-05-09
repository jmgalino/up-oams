<?php defined('SYSPATH') or die('No direct script access.');

interface Controller_Faculty_IpcrGroup {

	/**
	 * List forms
	 */
	public function action_ipcr();

	/**
	 * Show faculty form
	 */
	public function ipcr_view($ipcr, $opcr);

	/**
	 * Evaluate faculty form
	 */
	public function ipcr_evaluate($ipcr);

	/**
	 * Consolidate forms
	 */
	public function ipcr_consolidate($ipcr, $opcr);

} // End IpcrGroup
