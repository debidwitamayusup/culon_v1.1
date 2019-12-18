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
			$this->load->model('OperationModel');
		}

		//get data for pie chart
		public function getNfcrPie(){
			$nfcr = $this->OperationModel->get_total_nfcr();


			// $data = array(
			// 	"fcr" => $fcr,
			// 	"nfcr" => $
			// );

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $nfcr
			);
			echo json_encode($response);
		}

		public function getNfcrCategory1(){
			$arr_category = $this->OperationModel->get_top_3_category("", "");
			// var_dump($arr_category);
			$getCategory1 = $this->OperationModel->getNfcrCategory1($arr_category);
			
			// $data = array(
			// 	"channelName" => $channel_name,
			// 	"totalTraffic" => $total
			// );

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $getCategory1
			);
			echo json_encode($response);
		}

		public function getNfcrCategory2(){
			$arr_category = $this->OperationModel->get_top_3_category("", "");
			// var_dump($arr_category);
			$getCategory2 = $this->OperationModel->getNfcrCategory2($arr_category);
			
			// $data = array(
			// 	"channelName" => $channel_name,
			// 	"totalTraffic" => $total
			// );

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $getCategory2
			);
			echo json_encode($response);
		}

		public function getNfcrCategory3(){
			$arr_category = $this->OperationModel->get_top_3_category("", "");
			// var_dump($arr_category);
			$getCategory3 = $this->OperationModel->getNfcrCategory3($arr_category);
			
			// $data = array(
			// 	"channelName" => $channel_name,
			// 	"totalTraffic" => $total
			// );

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $getCategory3
			);
			echo json_encode($response);
		}

		public function getSummaryTrafficNfcr(){
			// var_dump($arr_category);
			$summary = $this->OperationModel->getSummaryTrafficNfcr();
			
			// $data = array(
			// 	"channelName" => $channel_name,
			// 	"totalTraffic" => $total
			// );

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $summary
			);
			echo json_encode($response);
		}

		

	}

?>