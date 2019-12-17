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
			$this->load->model('OperationModel');
		}

		//get data for pie chart
		public function getSummaryPie(){
			$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
			$index = $this->security->xss_clean($this->input->post('index', true)); //value params
			$arr_category = $this->OperationModel->get_top_3_category($params, $index);
			$arr_traffic_category = $this->OperationModel->get_traffic_per_channel($params, $index, $arr_category);
			// $trafficName = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			// $totalTraffic = array(85, 48, 59);

			$data = [
				'summary' => $arr_category,
				'traffic_channel' => $arr_traffic_category
			];
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		//get data for barchart information traffic
		public function getCategory1(){
			$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
			$index = $this->security->xss_clean($this->input->post('index', true)); //value params
			$arr_category = $this->OperationModel->get_top_3_category($params, $index);
			// var_dump($arr_category);
			$getCategory1 = $this->OperationModel->getCategory1($params, $index, $arr_category);
			
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

		//get data for barchart category 2 top three
		public function getCategory2(){
			$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
			$index = $this->security->xss_clean($this->input->post('index', true)); //value params
			$arr_category = $this->OperationModel->get_top_3_category($params, $index);
			$getCategory2 = $this->OperationModel->getCategory2($params, $index, $arr_category);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $getCategory2
			);
			echo json_encode($response);
		}

		//get data for barchart category 3 top three
		public function getCategory3(){
			$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
			$index = $this->security->xss_clean($this->input->post('index', true)); //value params
			$arr_category = $this->OperationModel->get_top_3_category($params, $index);
			$getCategory2 = $this->OperationModel->getCategory3($params, $index, $arr_category);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $getCategory2
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

			$arr_category = $this->OperationModel->get_top_3_category($params, $index);
			$arr_traffic_category = $this->OperationModel->get_traffic_per_channel($params, $index, $arr_category);
			
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $arr_traffic_category
			);
			echo json_encode($response);
		}


	}
?>