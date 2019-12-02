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
		$data = array();
		$case = $this->Stc_Model->getCaseIn()->result();

		if($case)
		{
			$lup = array();
			$case_in = array();

			foreach ($case as $key) {
				array_push($lup, $key->lup);
				array_push($case_in, $key->case_in);
			}

			$data = [
				'lup' => $lup,
				'case_in' => $case_in
			];

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $data);
		}

		echo json_encode($response);
	}

	public function case_out_interval()
	{
		$data = array();
		$case = $this->Stc_Model->getCaseOut()->result();

		if($case)
		{
			$lup = array();
			$case_out = array();

			foreach ($case as $key) {
				array_push($lup, $key->lup);
				array_push($case_out, $key->case_out);
			}

			$data = [
				'lup' => $lup,
				'case_out' => $case_out
			];

			$response = array(
				'status' => 200,
				'message' => 'Success',
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => 'Data Not Found',
				'data' => $data);
		}

		echo json_encode($response);
	}
}
