<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AverageTime extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');

	}

	public function stc_art()
	{
		$data = array();
		$art = $this->Stc_Model->getArt()->result();

		if($art)
		{
			$channel = array();
			$lup_date = array();
			$lup_time = array();
			$avg_response_time = array();

			foreach ($art as $key) {
				array_push($channel, $key->channel);
				array_push($lup_date, $key->lup_date);
				array_push($lup_time, $key->lup_time);
				array_push($avg_response_time, $key->avg_response_time);
			}

			$data = [
				'channel' => $channel,
				'lup_date' => $lup_date,
				'lup_time' => $lup_time,
				'avg_response_time' => $avg_response_time
			];

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $data);
		}

		echo json_encode($response);
	}

	public function stc_aht()
	{
		$data = array();
		$aht = $this->Stc_Model->getAht()->result();

		if($aht)
		{
			$channel = array();
			$lup_date = array();
			$lup_interval = array();
			$avg_handling_time = array();
			
			foreach ($aht as $key){
				array_push($channel, $key->channel);
				array_push($lup_date,$key->lup_date);
				array_push($lup_interval, $key->lup_interval);
				array_push($avg_handling_time, $key->avg_handling_time);
			}

			$data = [
				"channel" => $channel,
				"lup_date" => $lup_date,
				"lup_interval" => $lup_interval,
				"avg_handling_time" => $avg_handling_time,
			];

			$response = array(
				'status' => 200,
				'massage' => "success",
				'data' => $data);
		
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);		
	}

	public function stc_ast()
	{
		$data = array();
		$ast= $this->Stc_Model->getAst()->result();

		if($ast)
		{
			$channel = array();
			$lup_date = array();
			$lup_time = array();
			$avg_service = array();
			foreach ($ast as $key) {
				array_push($channel, $key->channel);
				array_push($lup_date, $key->lup_date);
				array_push($lup_time, $key->lup_time);
				array_push($avg_service, $key->avg_service);
			}

			$data = [
				"channel" => $channel,
				"lup_date" => $lup_date,
				"lup_time" => $lup_time,
				"avg_service" =>$avg_service,
			];

			$response = array(
				'status' => 200,
				'massage' => "success",
				'data' => $data);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);
	}

}
