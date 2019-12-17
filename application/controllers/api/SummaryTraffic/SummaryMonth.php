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
		$month = $this->input->post('month') ? $this->input->post('month') :11 ;
		$channel_name = $this->input->post('channel_name') ? $this->input->post('channel_name') : "ShowAll";
		$data = array();
		$date = array();
		$total_traffic =array();

		//condition for days of month based on month
		$query_date = date("Y-m-d");

		//convert number of month to three letter of month
 	// 	$dateObj   = DateTime::createFromFormat('!m', $month);
		// $monthName = $dateObj->format('M');
 		
   		$paramDate = date('t', strtotime($query_date));
		$arrDate = array();
		$total_traffics = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		// $channel_color = "#B22222";
		for($i=1;$i<=$paramDate;$i++) {
			// array_push($arrDate,$i.' '.$monthName);
			array_push($arrDate, $i);
		}
				
		//get Interval Per Month for Vertical Graphic
		$ipm = $this->Stc_Model->getIntervalPerMonth($month, $channel_name)->result();
		// print_r($ipm);
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

		if (!$ipm || $channel_name =="ShowAll"){
			$channel_color = "#B22222";
		}else{
			$channel_color = $ipm[0]->channel_color;
		}
		$data = [
            'channel_name' => $channel_name,
            'month' => $month,
			'total_traffic' => $total_traffics,
			'param_date' => $arrDate,
			'channel_color' => $channel_color
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
		// $avgIntervalTable = $this->Stc_Model->getAvgIntervalTable($month)->result();

		$params= "month";
        $index = $month;
        $avgIntervalTable = $this->Stc_Model->getAverageIntervalToday($params, $index);

		if($avgIntervalTable){
            $response = array(
                'status' => true,
                'data' => $avgIntervalTable
            );
        }else{
            $response = array(
                'status' => false,
                'data' => ''
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
			'channel_name_for_chart' => $channel_name_for_chart,
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

	public function getPercentageTrafficMonth(){
		$month = $this->input->post('month') ? $this->input->post('month') :12 ;

        $arr_channel = $this->Stc_Model->get_all_channel();
        $arr_data = array();

        $sumIntervalMonth = $this->Stc_Model->getSumIntervalMonth($month);
        $i = 0;
        if($sumIntervalMonth){
            while($i < sizeof($arr_channel)){
                $index = 0;
                $status = 0;
                while($index<sizeof($sumIntervalMonth) && $status == 0){
                    $obj = array();
                    if($arr_channel[$i]->channel_name == $sumIntervalMonth[$index]->channel_name){
                        $obj = [
                            "channel_name" => $arr_channel[$i]->channel_name,
                            "rate" => $sumIntervalMonth[$index]->rate
                        ];
                        $status = 1;
                    }else{
                        $obj = [
                            "channel_name" => $arr_channel[$i]->channel_name,
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
                'data' => $arr_data, 
            );
        }else{
            $response = array(
                'status' => false,
                'data' => ''
            );
        }
        echo json_encode($response);
    }

}