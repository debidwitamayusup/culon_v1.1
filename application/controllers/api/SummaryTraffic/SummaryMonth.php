<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryMonth extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	public function lineChartPerMonthShowAll()
	{
		//date("m")
		$month = $this->security->xss_clean($this->input->post('index', true));
		$year = $this->security->xss_clean($this->input->post('params_year', true));
		$channel = $this->security->xss_clean($this->input->post('channel_name', true));

		$result = $this->Stc_Model->getIntervalPerMonthShowAll($month, $year,$channel);
        
        echo json_encode($result);

	}

	public function lineChartPerMonth()
	{
		//date("m")
		$month = $this->input->post('month') ? $this->input->post('month') :11 ;
		$year = $this->input->post('year') ? $this->input->post('year') :2019 ;
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
		$ipm = $this->Stc_Model->getIntervalPerMonth($month, $channel_name, $year)->result();
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
			$channel_color = "#5F9EA0";
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
		$year = $this->input->post('year') ? $this->input->post('year') :2019 ;
		// $avgIntervalTable = $this->Stc_Model->getAvgIntervalTable($month)->result();

		$params= "month";
        $index = $month;
        $avgIntervalTable = $this->Stc_Model->getAverageIntervalMonth($params, $index, $year);

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
	
	public function getIntervalTrafficMonthly(){

        $month_id =   $this->security->xss_clean($this->input->post('month', true));
        $channel = $this->security->xss_clean($this->input->post('arr_channel', true));


        $result = $this->Stc_Model->get_traffic_interval_monthly($month_id, $channel);
        

        echo json_encode($result);
      
    }

	public function getPercentageTrafficMonth(){
		$month = $this->input->post('month') ? $this->input->post('month') :12 ;
		$year = $this->input->post('year') ? $this->input->post('year') :2019 ;

        $arr_channel = $this->Stc_Model->get_all_channel();
        $arr_data = array();

        $sumIntervalMonth = $this->Stc_Model->getSumIntervalMonth($month, $year);
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

    //function for get dinamic year value for dropdown
    public function optionYear()
	{
		$data = array();
		$niceDate = array();

		$getOption = $this->Stc_Model->getOptionYear();

		foreach ($getOption as $key) {
			array_push($niceDate, $key->niceDate);
		}

		$data = ([
			'niceDate' => $niceDate
		]);

		if ($data) {
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => '');
		}
		echo json_encode($response);
	}

}