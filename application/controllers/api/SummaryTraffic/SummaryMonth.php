<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryMonth extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	public function lineChartPerMonth()
	{
		$month = $this->input->post('month');
		$channel_name = $this->input->post('channel_name');
		$data = array();
		
		$date = array();
		$total_traffic =array();

		if ($month == "" || $channel_name == "")
		{
			$month = date('m');
			//sementara
			$channel_name = "Email";
		}

		//condition for days of month based on month
		$getDaysofMonth = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
		if ($getDaysofMonth == 31) 
		{
			$total_traffics = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);	
		}elseif ($getDaysofMonth == 30) 
		{
			$total_traffics = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		}elseif ($getDaysofMonth == 29) 
		{
			$total_traffics = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		}else
		{
			$total_traffics = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		}

		//get Interval Per Month for Vertical Graphic
		$ipm = $this->Stc_Model->getIntervalPerMonth($month, $channel_name)->result();
		foreach ($ipm as $key) 
		{
			array_push($total_traffic, $key->total_traffic);
			array_push($date, $key->date);
		}
		for ($i=0; $i < sizeof($total_traffics); $i++) 
		{ 
			for ($j=0; $j < sizeof($date) ; $j++) 
			{ 
				if ($i == $date[$j]-1)
				{
					$total_traffics[$i] = (int)$total_traffic[$j];
				}
			}	
		}


	
		$data = array(
			'channel_name' => $channel_name,
			'total_traffic' => $total_traffics
		
		);

		// get Average Interval for Data Table
		$avgIntervalTable = $this->Stc_Model->getAvgIntervalTable($month)->result();


		$total_channel_per_month = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		$array_channel = array(1=>"Whatsapp", 2=>"Twitter", 3=>"Facebook", 4=>"Email", 5=>"Telegram", 6=>"Line", 7=>"Voice", 8=>"Instagram", 9=>"Messenger", 10=>"Twitter DM", 11=>"Live Chat", 12=>"SMS");
		$channel_name_for_chart = array();
		$rate = array();
		$sumIntervalMonth = $this->Stc_Model->getSumIntervalMonth($month)->result();
		foreach ($sumIntervalMonth as $keys) 
		{
			array_push($channel_name_for_chart, $keys->channel_name_for_chart);
			array_push($rate, $keys->rate);
		}
		for ($i=1; $i < sizeof($total_channel_per_month); $i++) 
		{ 
			for ($j=1; $j < sizeof($channel_name_for_chart) ; $j++) 
			{ 
				if ($array_channel[$i] == $channel_name_for_chart[$j])
				{
					$total_channel_per_month[$i] = (double)$rate[$j];
				}
			}	
		}
		
		$dataForTable = array(
			// 'channel_name_for_chart' => $channel_name_for_chart,
			'rate' => $total_channel_per_month
		
		);

		if ($ipm || $avgIntervalTable || $sumIntervalMonth) 
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data,
				'data_table' => $avgIntervalTable,
				'data_for_chart' => $dataForTable);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $data);
		}
		echo json_encode($response);
	}

}