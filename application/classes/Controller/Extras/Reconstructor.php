<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Extras_Reconstructor extends Controller {

	public function action_redate()
	{
		$date = '';

		$start = $this->request->post('start');
		$stime = strtotime($start);
		$sdate = date('d', $stime);
		$smonth = date('F', $stime);
		$syear = date('Y', $stime);

		$end = $this->request->post('end');
		$etime = strtotime($end);
		$edate = date('d', $etime);
		$emonth = date('F', $etime);
		$eyear = date('Y', $etime);

		if (($smonth == $emonth) AND ($syear == $eyear))
		{
			if ($sdate == $edate)
			{
				$date = date('F d, Y', strtotime($start));
			}
			else
			{
				$date = $smonth.' '.$sdate.'-'.$edate.', '.$syear;
			}
		}
		else
			$date = date('F d, Y', strtotime($start)).' - '.date('F d, Y', strtotime($end));

		$this->response->body = $date;
		// return $date;
	}

} // End Reconstructor
