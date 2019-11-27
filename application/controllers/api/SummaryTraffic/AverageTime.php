<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AverageTime extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');

	}

	public function stc_art()
	{
		$art['data'] = $this->Stc_Model->getArt()->result();

		if($art)
		{
			$response = array(
				'status' => true,
				'data' => $art);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);
	}

	public function stc_aht()
	{
		$aht['data'] = $this->Stc_Model->getAht()->result();

		if($aht)
		{
			$response = array(
				'status' => true,
				'data' => $aht);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);		
	}

	public function stc_ast()
	{
		$ast['data'] = $this->Stc_Model->getAst()->result();

		if($ast)
		{
			$response = array(
				'status' => true,
				'data' => $ast);
		} else {
			$response = array(
				'status' => false,
				'data' => 'Data Not Found');
		}

		echo json_encode($response);
	}

}
