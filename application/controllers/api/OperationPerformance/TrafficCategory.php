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
			$params_year = $this->security->xss_clean($this->input->post('year', true));
			// $arr_category = $this->OperationModel->get_top_3_category($params, $index);
			$arr_category = $this->OperationModel->get_top_3_category_operation_performance($params, $index, $params_year);
			$arr_traffic_category = $this->OperationModel->get_traffic_per_channel($params, $index, $arr_category, $params_year);
			
			if ($arr_category && $arr_traffic_category) {
				$data = [
				'summary' => $arr_category,
				'traffic_channel' => $arr_traffic_category
				];
				$response = array(
					'status' => 200,
					'message' => 'Success',
					'data' => $data
				);	
			}else{
				$response = array(
					'status' => 200,
					'massage' => 'Failed',
					'data' => ''
				);
			}
			

			echo json_encode($response);
		}

		//get data for barchart trafficc category 1 top three
		// public function getCategory1(){
		// 	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		// 	$index = $this->security->xss_clean($this->input->post('index', true)); //value params
		// 	$params_year = $this->security->xss_clean($this->input->post('year', true));
		// 	$arr_category = $this->OperationModel->get_top_3_category($params, $index);
		// 	// var_dump($arr_category);
		// 	$getCategory1 = $this->OperationModel->getCategory1($params, $index, $arr_category, $params_year);
			
		// 	$response = array(
		// 		'status' => 200,
		// 		'message' => 'Success',
		// 		'data' => $getCategory1,
		// 		'year' => $params_year
		// 	);
		// 	echo json_encode($response);
		// }

		//get data for barchart category 2 top three
		// public function getCategory2(){
		// 	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		// 	$index = $this->security->xss_clean($this->input->post('index', true)); //value params
		// 	$params_year = $this->security->xss_clean($this->input->post('year', true));
		// 	$arr_category = $this->OperationModel->get_top_3_category($params, $index);
		// 	$getCategory2 = $this->OperationModel->getCategory2($params, $index, $arr_category, $params_year);

		// 	$response = array(
		// 		'status' => 200,
		// 		'message' => 'Success',
		// 		'data' => $getCategory2
		// 	);
		// 	echo json_encode($response);
		// }

		//get data for barchart category 3 top three
		// public function getCategory3(){
		// 	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		// 	$index = $this->security->xss_clean($this->input->post('index', true)); //value params
		// 	$params_year = $this->security->xss_clean($this->input->post('year', true));
		// 	$arr_category = $this->OperationModel->get_top_3_category($params, $index);
		// 	$getCategory2 = $this->OperationModel->getCategory3($params, $index, $arr_category, $params_year);

		// 	$response = array(
		// 		'status' => 200,
		// 		'message' => 'Success',
		// 		'data' => $getCategory2
		// 	);
		// 	echo json_encode($response);
		// }
		
		//get data for echart summary by channel
		// public function summaryTrafficChannel(){
		// 	$params = $this->security->xss_clean($this->input->post('params', true)); 
		// 	$index = $this->security->xss_clean($this->input->post('index', true));
		// 	$params_year = $this->security->xss_clean($this->input->post('year', true));

		// 	$arr_category = $this->OperationModel->get_top_3_category($params, $index);
		// 	$arr_traffic_category = $this->OperationModel->get_traffic_per_channel($params, $index, $arr_category, $params_year);
			
		// 	$response = array(
		// 		'status' => 200,
		// 		'message' => 'Success',
		// 		'data' => $arr_traffic_category
		// 	);
		// 	echo json_encode($response);
		// }
	}
?>