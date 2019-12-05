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
		//date("m")
		$month = $this->input->post('month') ? $this->input->post('month') :12 ;
		$channel_name = $this->input->post('channel_name') ? $this->input->post('channel_name') : "Voice";
		
		$data = array();
		
		$date = array();
		$total_traffic =array();

		//condition for days of month based on month
		$query_date = date("Y-m-d");
 
   		$paramDate = date('t', strtotime($query_date));
		$arrDate = array();
		$total_traffics = array();
		for($i=1;$i<=$paramDate;$i++) {
			array_push($arrDate,$i);
		}
		
		
		//get Interval Per Month for Vertical Graphic
		$ipm = $this->Stc_Model->getIntervalPerMonth($month, $channel_name)->result();
		foreach ($ipm as $key) 
		{
			array_push($total_traffic, $key->total_traffic);
			array_push($date, $key->date);
		}
		for ($i=0; $i < sizeof($arrDate); $i++) 
		{ 
			for ($j=0; $j < sizeof($date) ; $j++) 
			{ 
				if ($i == $date[$j]-1)
				{
					$total_traffics[$i] = (int)$total_traffic[$j];
				}
			}	
		}

		$data = [
            'channel_name' => $channel_name,
            'month' => $month,
			'total_traffic' => $total_traffics,
			'param_date' => $arrDate,
        ];
        if($data){
            $response = array(
                'status' => true,
                'data' => $data
            );
        }else{
            $response = array(
                'status' => false,
                'data' => 'data not found'
            );
        }

        echo json_encode($response);
	}

	public function averageIntervalTable(){
		// get Average Interval for Data Table
		$month = $this->input->post('month') ? $this->input->post('month') :12 ;
		$avgIntervalTable = $this->Stc_Model->getAvgIntervalTable($month)->result();

		if($avgIntervalTable){
            $response = array(
                'status' => true,
                'data' => $avgIntervalTable
            );
        }else{
            $response = array(
                'status' => false,
                'data' => 'data not found'
            );
        }

        echo json_encode($response);
	}
	
	public function summaryIntervalMonth(){
		$month = $this->input->post('month') ? $this->input->post('month') :12 ;
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

		if ($sumIntervalMonth) 
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $dataForTable);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $dataForTable);
		}
		echo json_encode($response);
	}

}