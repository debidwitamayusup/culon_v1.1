<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiAgentPerformance extends CI_Controller {

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
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('summary_agent');
	}
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
		$channel_id = "";
		$agent_id = "";

		// collect from db

		// //process
		$data = "";
		$data = $this->summary_agent->get_all_rsummary();

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => $data,
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
		// get data 
		$agent_id = "";

		// collect from db

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
		// get data 
		$agent_id = "";

		// collect from db

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
		// get data 
		$agent_id = "";

		// collect from db

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
		// Summary (Call, AHT, ART, AST, SL) by tanggal per agent.

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
		// summary (case in, message in, message out) by tanggal per agent.

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
