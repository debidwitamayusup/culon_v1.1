<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryTrafficChannel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	//tampil perhari
	public function stc_today()
	{
		//proses select data
		$data = array();
		$rowdate = $this->Stc_Model->getToday();

		if($rowdate)
		{
			$channel = array();
			$summary_traffic = array();
			foreach ($rowdate as $key) {
				array_push($channel, $key->channel);
				array_push($summary_traffic, $key->summary_traffic);
			}

			$data = [
				"channel" => $channel,
				"summary_traffic" => $summary_traffic
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

	//tampil perbulan
	public function stc_month()
	{
		//proses select data
		$data = array();
		$rowdate = $this->Stc_Model->getMonth();

		$channel = array();
		$summary_traffic = array();

		foreach ($rowdate as $key) {
			array_push($channel, $key->channel);
			array_push($summary_traffic, $key->summary_traffic);
		}

		$data = [
			'channel' => $channel,
			'summary_traffic' => $summary_traffic
		];

		//response true false
		if($data)
		{
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

	//tampil pertahun
	public function stc_year()
	{
		//proses select data
		$data = array();
		$rowdate = $this->Stc_Model->getYear();

		$channel = array();
		$summary_traffic = array();

		foreach ($rowdate as $key) {
			array_push($channel, $key->channel);
			array_push($summary_traffic, $key->summary_traffic);
		}

		$data = [
			'channel' => $channel,
			'summary_traffic' => $summary_traffic
		];

		//response true false
		if($data)
		{
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

	public function cardMain()
	{
		$card_today = $this->Stc_Model->getCardMain();

		if($card_today)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $card_today);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $card_today);
		}
		echo json_encode($response);
	}

	public function cGraphMain()
	{
		$circle_main = $this->Stc_Model->getCGraph();

		if($circle_main)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $circle_main);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $circle_main);
		}
		echo json_encode($response);
	}

	public function bGraphMain()
	{
		$batang_main = $this->Stc_Model->getBGraph();

		if($batang_main)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $batang_main);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $batang_main);
		}
		echo json_encode($response);
	}

	public function interaction()
	{
		$interaction = $this->Stc_Model->getInteraction();

		if($interaction)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $interaction);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $interaction);
		}
		echo json_encode($response);
	}

	public function uniqueCustomer()
	{
		$customer = $this->Stc_Model->getUniqueCustom();

		if($customer)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $customer);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $customer);
		}
		echo json_encode($response);
	}

	public function averageCustomer()
	{
		$customer = $this->Stc_Model->getAverageCustom();

		if($customer)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $customer);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $customer);
		}
		echo json_encode($response);
	}
}
