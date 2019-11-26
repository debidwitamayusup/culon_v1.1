<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryTrafficChannel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}
	// public function index()
	// {
	// 	$this->load->view('header');
	// 	$this->load->view('navbar');
	// 	$this->load->view('sidebar');
	// 	$this->load->view('stc/Summary_Call');
	// 	$this->load->view('footer');
	// }	

	// public function tc_menu()
	// {
	// 	$this->load->view('header');
	// 	$this->load->view('navbar');
	// 	$this->load->view('sidebar');
	// 	$this->load->view('stc/Traffic_Channel');
	// 	$this->load->view('footer');
	// }

	// public function avr_time_menu()
	// {
	// 	$this->load->view('header');
	// 	$this->load->view('navbar');
	// 	$this->load->view('sidebar');
	// 	$this->load->view('stc/Average_Time');
	// 	$this->load->view('footer');
	// }

	// public function case_menu()
	// {
	// 	$this->load->view('header');
	// 	$this->load->view('navbar');
	// 	$this->load->view('sidebar');
	// 	$this->load->view('stc/Case_In_Out');
	// 	$this->load->view('footer');
	// }

	//tampil perhari
	public function stc_today()
	{
		//proses select data
		$rowdate = $this->Stc_Model->getToday();

		//response true false
		if($rowdate)
		{
			$response = array(
				'status' => true,
				'data' => $rowdate);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}
		

		echo json_encode($response);
	}

	//tampil perbulan
	public function stc_month()
	{
		//proses select data
		$rowdate = $this->Stc_Model->getMonth();

		//response true false
		if($rowdate)
		{
			$response = array(
				'status' => true,
				'data' => $rowdate);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}
		

		echo json_encode($response);
	}

	//tampil pertahun
	public function stc_year()
	{
		//proses select data
		$rowdate = $this->Stc_Model->getYear();

		//response true false
		if($rowdate)
		{
			$response = array(
				'status' => true,
				'data' => $rowdate);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}
		

		echo json_encode($response);
	}

	public function persen_channel()
	{
		$persen = $this->Stc_Model->getPersenChannel();

		if($persen)
		{
			$response = array(
				'status' => true,
				'data' => $persen);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}
		

		echo json_encode($response);
	}
}
