<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentPerformance extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('Summary_Call');
		$this->load->view('footer');
	}	

	public function get_traffic()
	{
		
	}

	public function totalCallByAgent(){
		//get input data channel
		$channel_id = 1;

		//process
		$channel_name = "voice line";
		$respone_rate_total = 100;
		$return_data = array(
			"id" => $channel_id,
			"name" => $channel_name,
			"respone_rate_total" => $respone_rate_total,
		);
		
		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => $return_data,
		);

		//output json
		echo json_encode($response_data);
	}

	public function detailIntervalCall(){
		// get data agent 

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function averageHandlingTime(){
		// get data agent

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function averageResponseTime(){
		// get data agent

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function averageServiceTime(){
		// get data agent

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function summaryCall(){
		// get data agent

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function summaryCase(){
		// get data agent

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}
}
