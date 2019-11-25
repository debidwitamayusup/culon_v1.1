<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryTicket extends CI_Controller {

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

	}

	public function ticketStatusToday(){


		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function ticketStatusInterval(){

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function proportionStatusTicket(){

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function SummaryTicketByChannel(){


		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function SummaryTicketInSLA(){


		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function SummaryTicketOutSLA()}{


		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => "",
		);

		//output json
		echo json_encode($response_data);
	}

	public function SummaryTicketByUnitHandle(){


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
