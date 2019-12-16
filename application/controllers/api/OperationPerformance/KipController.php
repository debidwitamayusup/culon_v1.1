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
			$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
			$index = $this->security->xss_clean($this->input->post('index', true));	// value params
			$arr_category = $this->OperationModel->get_top_3_category($params, $index);
			// $arr_category = $this->OperationModel->get_top_3_category('day', '2019-12-01');
			// $arr_kip = $this->OperationModel->get_kip_per_channel('day', '2019-12-01', $arr_category);
			$arr_kip = $this->OperationModel->get_kip_per_channel($params, $index, $arr_category);
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
			);
			echo json_encode($response);

		}

		public function getDetailKip(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$arr_category = $this->security->xss_clean($this->input->post('category', true));
			$channel_id = $this->security->xss_clean($this->input->post('channel_id', true));
			// if(!$arr_category){
			// 	$response = array(
			// 		'status' => 502,
			// 		'message' => 'failed'
			// 	);
			// 	echo json_encode($response);
			// 	return;
			// }
			$data = array();

			$arr_kip = array();
			foreach($arr_category as $key){
				$data_category = $this->OperationModel->get_data_sub_category($params, $index, $channel_id, $key);
				array_push($arr_kip, $data_category);
				// array_push($arr_kip, $key);
			}
			$data = $arr_kip;
			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
				// 'data' => $arr_category
			);
			echo json_encode($response);
		}

		public function getKipInfo(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$summaryKipName = array('Informasi Produk','Informasi','Informasi Promo','Informasi Cabut','Informasi Member');
			$summaryKipNames = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$sum = array(0,0,0);
			$summaryKip = array(14, 18, 20, 14,100);
			$arr_data = array();

			$data = array(
				"summaryKipName" => $summaryKipName,
				"summaryKip" => $summaryKip

			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);	
		}

		public function getKipComp(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$summaryKipName = array('Internet Lambat','Lampu Tidak Nyala','Internet Putus','Telepon Putus','Tidak Bisa Internet');
			$summaryKipNames = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$sum = array(0,0,0);
			$summaryKip = array(14, 18, 20, 14,100);
			$arr_data = array();

			$data = array(
				"summaryKipName" => $summaryKipName,
				"summaryKip" => $summaryKip

			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);	
		}

		//mengambil data request
		public function getKipReq(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$summaryKipName = array('Data Member','Reset Account','Pasang Produk','Cabut Produk','Maaf');
			$summaryKipNames = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$sum = array(0,0,0);
			$summaryKip = array(14, 18, 20, 14,100);
			$arr_data = array();

			$data = array(
				"summaryKipName" => $summaryKipName,
				"summaryKip" => $summaryKip

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