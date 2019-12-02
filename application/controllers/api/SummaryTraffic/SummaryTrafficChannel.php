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
		$rowdate = $this->Stc_Model->getToday()->result();

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
		$rowdate = $this->Stc_Model->getMonth()->result();

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
		$rowdate = $this->Stc_Model->getYear()->result();

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

	public function uniqueCustomerPerChannel(){

		$query = $this->Stc_Model->get_all_unique_customer_per_channel();
		if($query)
		{
			$response = array(
				'status' => true,
				'data' => $query);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);
	}

	public function cardMain()
	{
		$data = array();
		$card_today = $this->Stc_Model->getCardMain();


		$channel = array();
		$total = array();

		foreach ($card_today as $key) {
			array_push($channel, $key->channel);
			array_push($total, $key->total);
		}

		$data = [
			'channel' => $channel,
			'total' => $total
		];

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

	public function total_interaction()
	{
		$totInteraction = $this->Stc_Model->getTotInteraction()->row();

		if($totInteraction)
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $totInteraction);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $interaction);
		}
		echo json_encode($response);
	}

	public function total_unique_customer()
	{
		$totUniqueCustomer = $this->Stc_Model->getTotUniqueCustomer()->row();

		if ($totUniqueCustomer) 
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $totUniqueCustomer);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $totUniqueCustomer);
		}
		echo json_encode($response);
	}

	public function average_customer()
	{
		$averageCustomer = $this->Stc_Model->getAverageCustomer()->row();

		if ($averageCustomer) 
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $averageCustomer);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $averageCustomer);
		}
		echo json_encode($response);
	}

}
