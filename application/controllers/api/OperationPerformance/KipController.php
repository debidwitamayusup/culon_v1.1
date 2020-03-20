<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class KipController extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('OperationModel');
		}

		public function getAllChannel(){
			$data = $this->OperationModel->get_all_channel();
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);
		}

		public function getSummaryKip()
		{
			#region :: TOKEN
			$token = $_SERVER['HTTP_TOKEN'];
			if($token===NULL)
			{
				$response = array(
				'status'  => FALSE,
				'message' => 'Lengkapi Kredensial anda.');
	
				echo json_encode($response);
				exit;          
			}
	
			$res = $this->Stc_Model->authceck($token);
			if($res == FALSE)
			{
				$response = array(
				'status'  => FALSE,
				'message' => '404 Not found.');
	
				echo json_encode($response);
				exit;
			}
			#endregion :: TOKEN

			
			$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
			// $params = 'month';
			$index = $this->security->xss_clean($this->input->post('index', true));	// value params
			$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params
			// $arr_category = $this->OperationModel->get_top_3_category($params, $index);
			$arr_category = $this->OperationModel->get_top_3_category_operation_performance($params, $index, $params_year);
			// $arr_category = $this->OperationModel->get_top_3_category('day', '2019-12-01');
			// $arr_kip = $this->OperationModel->get_kip_per_channel('day', '2019-12-01', $arr_category);
			$arr_kip = $this->OperationModel->get_kip_per_channel($params, $index, $arr_category, $params_year);
			
			if ($arr_category && $arr_kip){
				$data = [
					'summary' => $arr_category,
					'kip_channel' => $arr_kip
				];
				$response = array(
					'status' => 200,
					'message' => 'Success',
					'data' => $data,
					'params' => $params,
					'index' => $index,
					'year' => $params_year
				);
			}else{
				$response = array(
					'status' => 200,
					'message' => 'Failed',
					'data' => ''
				);
			}
			echo json_encode($response);
		}

		public function getDetailKip(){
			#region :: TOKEN
			$token = $_SERVER['HTTP_TOKEN'];
			if($token===NULL)
			{
				$response = array(
				'status'  => FALSE,
				'message' => 'Lengkapi Kredensial anda.');
	
				echo json_encode($response);
				exit;          
			}
	
			$res = $this->Stc_Model->authceck($token);
			if($res == FALSE)
			{
				$response = array(
				'status'  => FALSE,
				'message' => '404 Not found.');
	
				echo json_encode($response);
				exit;
			}
			#endregion :: TOKEN
	
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$params_year = $this->security->xss_clean($this->input->post('year', true));
			$arr_category = $this->security->xss_clean($this->input->post('category', true));
			$channel_id = $this->security->xss_clean($this->input->post('channel_id', true) ? $this->input->post('channel_id', true): "");
			if(!$arr_category){
				$response = array(
					'status' => 502,
					'message' => 'failed'
				);
				echo json_encode($response);
				return;
			}
			$data = array();

			$arr_kip = array();
			foreach($arr_category as $key){
				$data_category = $this->OperationModel->get_data_sub_category($params, $index, $channel_id, $key, $params_year);
				array_push($arr_kip, $data_category);
				// array_push($arr_kip, $key);
			}
			$data = $arr_kip;
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data,
				'cat' =>$arr_category
			);
			echo json_encode($response);
		}
	}
?>