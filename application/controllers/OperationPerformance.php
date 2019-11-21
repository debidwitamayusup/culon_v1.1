<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperationPerformance extends CI_Controller {

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
			11 channel
			voice
			email
			Webchat
			Sms
			Telegram
			Facebook
			facebook messenger
			twitter
			twitter DM
			instagram
			Whatsapp
	 */
	public function index()
	{

	}	

	public function responeRate(){
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
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => $return_data);

		//output json
		echo json_encode($response_data);
	}

	public function intervalResponeRate(){
		//get input data channel

		//process

		//output json
	}

	public function responeTime(){
		//get input data channel

		//filter by annual, monthly, weekly, daily

		//process

		//output json
	}

	public function handlingTime(){
		//get input data channel 
		$return_data = array(
			[
				"id" => 1,
				"name" => "voice",
				"handling_time" => "",
			],
			[
				"id" => 2,
				"name" => "email",
				"handling_time" => "",
			],
			[
				"id" => 3,
				"name" => "Webchat",
				"handling_time" => "",
			],
			[
				"id" => 4,
				"name" => "Sms",
				"handling_time" => "",
			],
			[
				"id" => 5,
				"name" => "Telegram",
				"handling_time" => "",
			],
			
		);
		//filter by annual, monthly, weekly, daily
		$filter = "";

		//process
		$response_data = array(
			"status" => 200, 
			"message" => "success", 
			"data" => $return_data
		);
		//output json
		echo json_encode($response_data);
	}

	public function avarageInteraction(){
		//get input data channel

		//process

		//output json
	}

	public function totalTraffic(){
		//get input data channel

		//by category

		//process

		//output json
	}

	public function totalFCR(){
		//get input data channel

		//process

		//output json
	}

	public function totalFCRByCategory(){
		//get input data channel

		//process

		//output json
	}

	public function productivityChannel(){
		//get input data channel

		//process

		//output json
	}

}
