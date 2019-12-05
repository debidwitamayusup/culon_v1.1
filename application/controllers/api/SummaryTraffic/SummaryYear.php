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
		$channel_name = $this->input->post('channel_name') ? $this->input->post('channel_name') : "Email";

		$data = array();
		$total_traffic = array();
		$date = array();
		$traffic = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$month_of_year = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des');

		$interval = $this->Stc_Model->getIntervalYear($year,$channel_name)->result();

		foreach ($interval as $key) {
				array_push($total_traffic,$key->total_traffic);
				array_push($date,$key->month);
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
		$avgIntervalTable = $this->Stc_Model->getIntervalYearTable($year)->result();

		// $data = array();
		// $channel_id = array();
		// $SLA = array();
		// $art = array();
		// $aht = array();
		// $ast = array();

		// foreach ($avgIntervalTable as $key) {
		// 	array_push($channel_id, $key->channel_id);
		// 	array_push($SLA, $key->SLA);
		// 	array_push($art, $key->art);
		// 	array_push($aht, $key->aht);
		// 	array_push($ast, $key->ast);
		// }

		// $dataForTable = array(
		// 	'channel_id' => $channel_id,
		// 	'SLA' => $SLA,
		// 	'art' => $art,
		// 	'aht' => $aht,
		// 	'ast' => $ast);

		if($avgIntervalTable)
		{
			$response = array(
				'status' => 200,
				'message' => "Success",
				'data_chart' => $avgIntervalTable);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data_chart' => $avgIntervalTable);
		}
		echo json_encode($response);
	}

	public function summaryIntervalYear()
	{
		$year = $this->input->post('year') ? $this->input->post('month') : date('Y');

		$array_channel = $this->Stc_Model->get_all_channel();
		$arr_data = array();

		$sumIntervalYear = $this->Stc_Model->getSumIntervalYear($year)->result();
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
		// foreach ($sumIntervalYear as $key) {
		// 	array_push($channel_for_chart, $key->channel_for_chart);
		// 	array_push($rate, $key->rate);
		// }

		// for ($i=1; $i < sizeof($total_channel_peryear); $i++)
		// {
		// 	for ($x=1; $x < sizeof($channel_for_chart); $x++)
		// 	{
		// 		if ($array_channel[$i] == $channel_for_chart[$x])
		// 		{
		// 			$total_channel_peryear[$i] = (double)$rate[$x];
		// 		}
		// 	}
		// }

		// $data = array(
		// 	'rate' => $total_channel_peryear);

		// if ($sumIntervalYear) {
		// 	$response = array(
		// 		'status' => 200,
		// 		'message' => 'Success',
		// 		'data' => $data);
		// } else {
		// 	$response = array(
		// 		'status' => 200,
		// 		'message' => 'Data Not Found',
		// 		'data' => $data);
		// }

		echo json_encode($response);
	}
}
