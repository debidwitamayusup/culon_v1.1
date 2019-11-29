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
		$arr_data = array(
			[
				"agent_id" => 1,
				"aht" => 215,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 2,
				"aht" => 433,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 3,
				"aht" => 165,
				"date" => "2019-11-30"
			]
		);

		$data = array();
		if($arr_data){
			// var_dump($query);die();
			$agent_id = array();
			$aht = array();
			$date = array();
			foreach ($arr_data as $key){
				array_push($agent_id, $key['agent_id']);
				array_push($aht, $key['aht']);
				array_push($date, $key['date']);
			}
			// var_dump($row_date);die();
			$data = [
				"agent_id" => $agent_id,
				"aht" => $aht,
				"date" => $date,
			];

			$response_data = array(
				"status" => 200, 
				"message" => "success", 
				"data" => $data,
			);
		}else{
			$response_data = array(
				"status" => 204, 
				"message" => "data not found", 
				"data" => '',
			);
		}

		//output json
		echo json_encode($response_data);
	}

	public function averageResponseTime(){
		// get data 
		$agent_id = "";

		// collect from db
		$arr_data = array(
			[
				"agent_id" => 1,
				"art" => 215,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 2,
				"art" => 433,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 3,
				"art" => 165,
				"date" => "2019-11-30"
			]
		);

		$data = array();
		if($arr_data){
			// var_dump($query);die();
			$agent_id = array();
			$art = array();
			$date = array();
			foreach ($arr_data as $key){
				array_push($agent_id, $key['agent_id']);
				array_push($art, $key['art']);
				array_push($date, $key['date']);
			}
			// var_dump($row_date);die();
			$data = [
				"agent_id" => $agent_id,
				"art" => $art,
				"date" => $date,
			];

			$response_data = array(
				"status" => 200, 
				"message" => "success", 
				"data" => $data,
			);
		}else{
			$response_data = array(
				"status" => 204, 
				"message" => "data not found", 
				"data" => '',
			);
		}

		//output json
		echo json_encode($response_data);
	}

	public function averageServiceTime(){
		// get data 
		$agent_id = "";

		// collect from db

		$arr_data = array(
			[
				"agent_id" => 1,
				"ast" => 215,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 2,
				"ast" => 433,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 3,
				"ast" => 165,
				"date" => "2019-11-30"
			]
		);

		//process
		$data = array();
		if($arr_data){
			// var_dump($query);die();
			$agent_id = array();
			$ast = array();
			$date = array();
			foreach ($arr_data as $key){
				array_push($agent_id, $key['agent_id']);
				array_push($ast, $key['ast']);
				array_push($date, $key['date']);
			}
			// var_dump($row_date);die();
			$data = [
				"agent_id" => $agent_id,
				"ast" => $ast,
				"date" => $date,
			];

			$response_data = array(
				"status" => 200, 
				"message" => "success", 
				"data" => $data,
			);
		}else{
			$response_data = array(
				"status" => 204, 
				"message" => "data not found", 
				"data" => '',
			);
		}

		//output json
		echo json_encode($response_data);
	}

	public function summaryCall(){
		// Summary (Call, AHT, ART, AST, SL) by tanggal per agent.
		// dummy
		$arr_data = array(
			[
				"agent_id" => 1,
				"name" => "Agent 1",
				"call" => 20,
				"aht" => 200,
				"art" => 100,
				"ast" => 76,
				"sl" => 52,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 2,
				"name" => "Agent 2",
				"call" => 10,
				"aht" => 100,
				"art" => 60,
				"ast" => 32,
				"sl" => 16,
				"date" => "2019-11-30"
			],
			[
				"agent_id" => 3,
				"name" => "Agent 3",
				"call" => 50,
				"aht" => 40,
				"art" => 30,
				"ast" => 20,
				"sl" => 10,
				"date" => "2019-11-30"
			]
		);
		

		$data = array();
		if($arr_data){
			// var_dump($query);die();
			$agent_id = array();
			$name = array();
			$call = array();
			$aht = array();
			$art = array();
			$ast = array();
			$sl = array();
			$date = array();
			foreach ($arr_data as $key){
				array_push($agent_id, $key['agent_id']);
				array_push($name, $key['name']);
				array_push($call, $key['call']);
				array_push($aht, $key['aht']);
				array_push($art, $key['art']);
				array_push($ast, $key['ast']);
				array_push($sl, $key['sl']);
				array_push($date, $key['date']);
			}
			// var_dump($row_date);die();
			$data = [
				"agent_id" => $agent_id,
				"name" => $name,
				"call" => $call,
				"aht" => $aht,
				"art" => $art,
				"ast" => $ast,
				"sl" => $sl,
				"date" => $date,
			];

			//process
			$response_data = array(
				"status" => 200, 
				"message" => "success", 
				"data" => $data,
			);
		}
		else{
			$response_data = array(
				"status" => 204, 
				"message" => "data not found", 
				"data" => '',
			);
		}

		//output json
		echo json_encode($response_data);
	}

	public function summaryCase(){
		// summary (case in, message in, message out) by tanggal per agent.

		// get data agent
		//data belum per agent 
		$data = array();
		$query = $this->summary_agent->get_summary_case();
		if($query){
			// var_dump($query);die();
			$row_date = array();
			$tenant_id = array();
			$case_in = array();
			$case_out = array();
			$msg_in = array();
			$msg_out = array();
			foreach ($query as $key){
				array_push($row_date, $key->row_date);
				array_push($tenant_id, $key->tenant_id);
				array_push($case_in, $key->case_in);
				array_push($case_out, $key->case_out);
				array_push($msg_in, $key->msg_in);
				array_push($msg_out, $key->msg_out);
			}
			// var_dump($row_date);die();
			$data = [
				"row_date" => $row_date,
				"tenant_id" => $tenant_id,
				"case_in" => $case_in,
				"case_out" => $case_out,
				"msg_in" => $msg_in,
				"msg_out" => $msg_out,

			];
		
			$response_data = array(
				"status" => 200, 
				"message" => "success", 
				"data" => $data
			);
		}else {
			$response_data = array(
				"status" => 204, 
				"message" => "not found", 
				"data" => $data,
			);
		}

		//output json
		echo json_encode($response_data);
	}
}