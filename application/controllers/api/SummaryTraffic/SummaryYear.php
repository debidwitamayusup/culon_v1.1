<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryYear extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	public function gInterval()
	{
		$year = $this->input->post('year') ? $this->input->post('year') : date('Y');
		$channel_name = $this->input->post('channel_name') ? $this->input->post('channel_name') : "ShowAll";

		$data = array();
		$total_traffic = array();
		$date = array();
		$traffic = array(0,0,0,0,0,0,0,0,0,0,0,0);
		// $bulan = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$month_of_year = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

		$interval = $this->Stc_Model->getIntervalYear($year,$channel_name)->result();

		foreach ($interval as $key) {
				array_push($total_traffic,$key->total_traffic);
				array_push($date,$key->date);
			}

			for ($i=0; $i < sizeof($traffic); $i++)
			{
				for ($x=0; $x < sizeof($date); $x++)
				{
					if($i == $date[$x]-1)
					{
						$traffic[$i] = (int)$total_traffic[$x];
					}
				}
			}

			$data = ([
				'channel_name' => $channel_name,
				'date' => $date,
				'total_traffic' => $traffic,
				'month_x_axis' => $month_of_year
			]);

		if($data)
		{
			$response = array(
				'status' => 200,
				'message' => "Success",
				'data' => $data,
				'Y' => $year);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data' => $data);
		}
		echo json_encode($response);
	}

	public function averageInterval()
	{
		$year = $this->input->post('year') ? $this->input->post('year') : date('Y');

		$params = "year";
		$index = $year;
		$avgIntervalTable = $this->Stc_Model->getAverageIntervalToday($params, $index);

		if($avgIntervalTable)
		{
			$response = array(
				'status' => 200,
				'message' => "Success",
				'data' => $avgIntervalTable);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data' => "");
		}
		echo json_encode($response);
	}

	public function summaryIntervalYear()
	{
		$year = $this->input->post('year') ? $this->input->post('year') : date('Y');

		$array_channel = $this->Stc_Model->get_all_channel();
		$arr_data = array();

		$sumIntervalYear = $this->Stc_Model->getSumIntervalYear($year);
		$i = 0;
		if($sumIntervalYear)
		{
			while ($i < sizeof($array_channel)) {
				$index = 0;
				$status = 0;
				while ($index < sizeof($sumIntervalYear) && $status == 0) {
					$obj = array();
					if ($array_channel[$i]->channel_name == $sumIntervalYear[$index]->channel_name) 
					{
						$obj = [
							"channel_name" => $array_channel[$i]->channel_name,
							"rate" => $sumIntervalYear[$index]->rate
						];
						$status = 1;
					}else{
						$obj = [
							"channel_name" => $array_channel[$i]->channel_name,
							"rate" => 0
						];
					}
					$index++;
				}
				array_push($arr_data, $obj);
				$i++;
			}

			$response = array(
				'status' => true,
				'data' => $arr_data
			);
		} else {
			$response = array(
				'status' => false,
				'data' => ''
			);
		}

		echo json_encode($response);
	}
}
