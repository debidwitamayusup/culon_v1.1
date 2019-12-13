<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class TrafficCategory extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Stc_Model');
		}

		//get data for pie chart
		public function getSummaryPie(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$trafficName = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$totalTraffic = array(85, 48, 59);

			$data = array(
				"trafficName" => $trafficName,
				"totalTraffic" => $totalTraffic
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for barchart information traffic
		public function getInfoTraffic(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalTraffic = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalTraffic" => $totalTraffic
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for barchart complaint traffic
		public function getComplaintTraffic(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalTraffic = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalTraffic" => $totalTraffic
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}		

		//get data for barchart Request traffic
		public function getRequestTraffic(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalTraffic = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalTraffic" => $totalTraffic
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for echart summary by channel
		public function summaryTrafficChannel(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalTraffic = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalTraffic" => $totalTraffic
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}


	}
?>