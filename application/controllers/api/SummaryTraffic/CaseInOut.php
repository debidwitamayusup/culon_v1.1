<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CaseInOut extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	public function case_in_interval()
	{
		$case['data'] = $this->Stc_Model->getCaseIn()->result();

		if($case)
		{
			$response = array(
				'status' => true,
				'data' => $case);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);
	}

	public function case_out_interval()
	{
		$case['data'] = $this->Stc_Model->getCaseOut()->result();

		if($case)
		{
			$response = array(
				'status' => true,
				'data' => $case);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);
	}
}
