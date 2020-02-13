<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryTrafficChannel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	public function uniqueCustomerPerChannel(){

		$params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
		$params_year = $this->security->xss_clean($this->input->post('params_year', true));

		$query = $this->Stc_Model->get_all_unique_customer_per_channel($params, $index, $params_year);
		
		$channel = array();
		foreach($query as $key){
			array_push($channel, $key->channel_name);
		}
		$channel_empty = $this->Stc_Model->get_channel_negation($channel);
		if($query)
		{
			$response = array(
				'status' => true,
				'data' => $query,
				'data_empty' => $channel_empty
			);
		} else {
			$response = array(
				'status' => false,
				'massage' => 'Data Not Found',
				'data' => $query,
				'data_empty' => $channel_empty);
		}

		echo json_encode($response);
	}

	public function cardMain()
	{
		$params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
		$params_year = $this->security->xss_clean($this->input->post('params_year', true));
		$data = array();
		$card_today = $this->Stc_Model->getCardMain($params, $index, $params_year);

		// $channel = array();
		// $total = array();

		// foreach ($card_today as $key) {
		// 	array_push($channel, $key->channel);
		// 	array_push($total, $key->total);
		// }
		// // $channel_empty = $this->Stc_Model->get_channel_negation($channel);
		// // if($channel_empty){
		// // 	foreach($channel_empty as $row){
		// // 		array_push($channel, $row->channel_name);
		// // 		array_push($total, 0);
		// // 	}
		// // }
		
		// $data = [
		// 	'channel' => $channel,
		// 	'total' => $total
		// ];

		if($card_today)	
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $card_today,
				// 'data_empty' => $channel_empty,
			);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $card_today
			);
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
		$params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
		$params_year = $this->security->xss_clean($this->input->post('params_year', true));

		$totInteraction = $this->Stc_Model->getTotInteraction($params, $index, $params_year)->row();

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
		$params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
		$params_year = $this->security->xss_clean($this->input->post('params_year', true));

		$totUniqueCustomer = $this->Stc_Model->getTotUniqueCustomer($params, $index, $params_year)->row();

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
		$params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));

		$averageCustomer = $this->Stc_Model->getAverageCustomer($params, $index)->row();

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

	public function getTotalCaseInCaseOut(){
		$params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
		$params_year = $this->security->xss_clean($this->input->post('params_year', true));

		$data = $this->Stc_Model->get_summary_case_tot_agent_sla($params, $index, $params_year);
		
		if ($data) 
		{
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $data
			);
		}
		echo json_encode($response);
	}

}
