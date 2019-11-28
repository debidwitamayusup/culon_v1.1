<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrafficInterval extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	//interval 15 menit
	public function stc_interval15()
	{
		//proses get data
		$interval['data'] = $this->Stc_Model->getInterval15();

		//response true false
		if($interval)
		{
			$response = array(
				'status' => true,
				'data' => $interval);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}
		
		echo json_encode($response);
	}

	//interval 30menit
	public function stc_interval30()
	{
		//proses get data
		$interval['data'] = $this->Stc_Model->getInterval30();

		//response true false
		if($interval)
		{
			$response = array(
				'status' => true,
				'data' => $interval);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}
		
		echo json_encode($response);
	}
}
