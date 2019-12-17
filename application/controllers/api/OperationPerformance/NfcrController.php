<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class NfcrController extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Stc_Model');
		}

		//get data for pie chart
		public function getNfcrPie(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$operationName = array(0=> "FCR", 1=>"N-FCR");
			$totalTraffic = array(75, 25);

			$data = array(
				"operationName" => $operationName,
				"totalNfcr" => $totalTraffic
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for information NFCR
		public function getNfcrInfo(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalNfcr = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalNfcr" => $totalNfcr
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for complaint NFCR
		public function getNfcrComplaint(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalNfcr = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalNfcr" => $totalNfcr
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for request NFCR
		public function getNfcrRequest(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalNfcr = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalNfcr" => $totalNfcr
			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for summary traffic NFCR
		public function getNfcrSummaryTraffic(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$channelName = array(0=> "Whatsapp", 1=>"Instagram", 2=>"Twitter", 3=>'Facebook', 4=>'Messenger',5=>'Telegram',6=>'Twitter DM',7=>'Voice',8=>'Live Chat',9=>'Line',10=>'SMS', 11=>'Email');
			$totalNfcr = array(14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25);

			$data = array(
				"channelName" => $channelName,
				"totalNfcr" => $totalNfcr
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