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
		$data = array();
		$interval = $this->Stc_Model->getInterval15()->result();

		if($interval)
		{
			$dl = array();
			$tl = array();
			$tp = array();
			$a = array();
			$cip = array();

			foreach ($interval as $key) {
				array_push($dl, $key->dl);
				array_push($tl, $key->tl);
				array_push($tp, $key->tp);
				array_push($a, $key->a);
				array_push($cip, $key->cip);
			}

			$data = [
				'tl' => $tl,
				'dl' => $dl,
				'tot_pickup' => $tp,
				'antrian' => $a,
				'chat_in_progress' => $cip
			];

		//response true false
			$response = array(
				'status' => 200,
				'message' => "Success",
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data' => $data);
		}
		
		echo json_encode($response);
	}

	//interval 30menit
	public function stc_interval30()
	{
		//proses get data
		$data = array();
		$interval = $this->Stc_Model->getInterval30()->result();

		//response true false
		if($interval)
		{
			$dl = array();
			$tl = array();
			$tp = array();
			$a = array();
			$cip = array();

			foreach ($interval as $key) {
				array_push($dl, $key->dl);
				array_push($tl, $key->tl);
				array_push($tp, $key->tp);
				array_push($a, $key->a);
				array_push($cip, $key->cip);
			}

			$data = [
				'dl' => $dl,
				'tl' => $tl,
				'tot_pickup' => $tp,
				'antrian' => $a,
				'chat_in_progress' => $cip
			];

			$response = array(
				'status' => 200,
				'message' => "Success",
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data' => $data);
		}
		
		echo json_encode($response);
	}
}
