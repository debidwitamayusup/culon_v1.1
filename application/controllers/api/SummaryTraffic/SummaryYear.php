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
		$year = $this->input->post('year');
		$channel_name = $this->input->post('channel_name');

		$data = array();
		$total_traffic = array();
		$date = array();
		$traffic = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$month_of_year = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des');

		if ($year == "") 
		{
			$year = date("Y");
		}

		if ($channel_name == "") 
		{
			$channel_name = "Email";
		}

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

		$avgIntervalTable = $this->Stc_Model->getIntervalYearTable($year)->result();

		$total_channel_peryear = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,);
		$array_channel = array("Whatsapp", "Twitter", "Facebook", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS");
		$channel_for_chart = array();
		$rate = array();

		$sumIntervalYear = $this->Stc_Model->getSumIntervalYear($year)->result();
		foreach ($sumIntervalYear as $key) {
			array_push($channel_for_chart, $key->channel_for_chart);
			array_push($rate, $key->rate);
		}

		for ($i=1; $i < sizeof($total_channel_peryear); $i++)
		{
			for ($x=1; $x < sizeof($channel_for_chart); $x++)
			{
				if ($array_channel[$i] == $channel_for_chart[$x])
				{
					$total_channel_peryear[$i] = (double)$rate[$x];
				}
			}
		}

		$dataForTable = array(
			'rate' => $total_channel_peryear);

		if($interval || $avgIntervalTable || $sumIntervalYear)
		{
			$response = array(
				'status' => 200,
				'message' => "Success",
				'data' => $data,
				'data_table' => $avgIntervalTable,
				'data_chart' => $dataForTable);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data' => $data,
				'data_table' => $avgIntervalTable,
				'data_chart' => $dataForTable);
		}
		echo json_encode($response);
	}

}
