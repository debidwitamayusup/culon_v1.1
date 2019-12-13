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
			$trafficName = array(0=> "FCR", 1=>"N-FCR");
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
	}

?>