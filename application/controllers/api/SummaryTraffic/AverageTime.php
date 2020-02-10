<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AverageTime extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');

	}

	public function getAT()
	{
		$index = $this->security->xss_clean($this->input->post('index', true));
		$params = $this->security->xss_clean($this->input->post('params', true));
		// $params = 'day';
		// $date = date("Y-m-d");
		// $date = "2019-11-02";
		// $index = $date;

		$data= array();
		$ast = array();
		$art = array();
		$aht = array();
		$channel_name = array();
		$total = array();
		// $arr_channel = $this->Stc_Model->get_all_channel();
		$getAverageTime = $this->Stc_Model->getAverageIntervalToday($params, $index);
		// var_dump($getAverageTime);

		$getTotalInteraction = $this->Stc_Model->getCardMain($params, $index);
		
		$i = 0;
        if($getAverageTime && $getTotalInteraction){
            while($i < sizeof($getAverageTime)){
                $index = 0;
                $status = 0;
                while($index<sizeof($getAverageTime) && $status == 0){
                    $obj = array();
                    if($getAverageTime[$i]->channel_name == $getAverageTime[$index]->channel_name){
                        $obj = [
                            "channel_name" => $getAverageTime[$i]->channel_name,
                            "art" => $getAverageTime[$index]->art,
                            "aht" => $getAverageTime[$index]->aht,
                            "ast" => $getAverageTime[$index]->ast,
                            "total" => $getTotalInteraction[$index]->total,
                            "channel_icon" => $getAverageTime[$index]->icon_dashboard,
                            "channel_color" => $getAverageTime[$index]->channel_color
                        ];
                        $status = 1;
                    }else{
                        $obj = [
                            "channel_name" => $getAverageTime[$i]->channel_name,
                            "art" => 0,
                            "aht" => 0,
                            "ast" => 0
                        ];
                    }
                    $index++;
                }
                array_push($data, $obj);
                $i++;
            }
         }

		if ($getAverageTime || $getTotalInteraction) 
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data,
			);
		}else{
			$response = array(
				'status' => 200,
				'message' => 'Error',
				'data' => '',
			);
		}
		echo json_encode($response);
	}	
}
