<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class KipCOntroller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Stc_Model');
		}

		public function getSummaryKip()
		{
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$summaryKipName = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$summaryKipNames = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$sum = array(0,0,0);
			$totalKip = array(60, 30, 10);
			$arr_data = array();
			// var_dump($summaryKip);
			// $summaryKip = $this->Stc_Model->getSummaryKip($params, $index);
			// $i = 0;
			// while($i < sizeof($summaryKipName)){
   //              $index = 0;
   //              $status = 0;
   //              while($index<sizeof($summaryKip) && $status == 0){
   //                  $obj = array();
   //                  if($summaryKipName[$i] == $summaryKipNames[$index]){
   //                      $obj = [
   //                          "summaryKipName" => $summaryKipName[$i],
   //                          "summaryKip" => $summaryKip[$index]
   //                      ];
   //                      $status = 1;
   //                  }else{
   //                      $obj = [
   //                          "summaryKipName" => $summaryKipName[$i],
   //                          "summaryKip" => 0
   //                      ];
   //                  }
   //                  $index++;
   //              }
   //              array_push($arr_data, $obj);
   //              $i++;
   //          }

			$data = array(
				"summaryKipName" => $summaryKipName,
				"summaryKip" => $totalKip

			);

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data
			);
			echo json_encode($response);

		}


		public function getKipPerChannel(){
			$params = $this->security->xss_clean($this->input->post('params', true)); 
			$index = $this->security->xss_clean($this->input->post('index', true));
			$data = array();
			$summaryKipName = array('Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS');
			$summaryKipNames = array(0=> "Information", 1=>"Request", 2=>"Complaint");
			$sum = array(0,0,0);
			$summaryKip = array(14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24);
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