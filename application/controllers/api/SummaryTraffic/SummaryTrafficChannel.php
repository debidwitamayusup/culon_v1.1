<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryTrafficChannel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	//tampil perhari
	public function stc_today()
	{
		//proses select data
		$rowdate['data'] = $this->Stc_Model->getToday();

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
		$rowdate['data'] = $this->Stc_Model->getMonth();

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
		$rowdate['data'] = $this->Stc_Model->getYear();

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
}
