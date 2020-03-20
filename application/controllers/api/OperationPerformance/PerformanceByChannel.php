<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	require (APPPATH.'/libraries/REST_Controller.php');

	/**
	 * 
	 */
	class PerformanceByChannel extends REST_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('OperationModel','module_model');
		}

		public function BarSummaryService_post()
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
	
			$params = $this->security->xss_clean($this->input->post('params'));
			$index = $this->security->xss_clean($this->input->post('index'));
			$params_year =  $this->security->xss_clean($this->input->post('params_year'));
	
			$result = $this->module_model->getSService($params,$index,$params_year);
			
			if($result){
				// $this->session->set_userdata($res);
					$this->response([
						'status'  => TRUE,
						'message' => 'Data Found',
						'data'    => $result
							], REST_Controller::HTTP_OK);
				}
				else {
					$this->response([
						'status'  => FALSE,
						'message' => 'Data Not Exist!'
							], REST_Controller::HTTP_OK);
			}
		}

		public function BarSummaryServiceByChannel_post()
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
	
			$params = $this->security->xss_clean($this->input->post('params'));
			$index = $this->security->xss_clean($this->input->post('index'));
			$params_year =  $this->security->xss_clean($this->input->post('params_year'));
			$result = $this->module_model->getSServicebyChannel($params,$index,$params_year);
			
			if($result){
				// $this->session->set_userdata($res);
					$this->response([
						'status'  => TRUE,
						'message' => 'Data Found',
						'data'    => $result
							], REST_Controller::HTTP_OK);
				}
				else {
					$this->response([
						'status'  => FALSE,
						'message' => 'Data Not Exist!'
							], REST_Controller::HTTP_OK);
			}
		}

	}
