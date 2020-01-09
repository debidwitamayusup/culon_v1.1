<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class AgentPerformController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('AgentPerformModel','module_model');
    }

    public function getscrcof() {

        // if (!$this->input->post()) {
        //     $response = array(
		// 		'status' => false,
		// 		'message' => '404 Service Not Found');
        // }

        $data = $this->module_model->getScrCof();

        if ($data) {
            $response = array(
				'status' => true,
				'data' => $data
			);
        }
        else {
            $response = array(
				'status' => false,
                'data' => array(),
                'message' => 'Unable to fetch Data');
        }

        echo json_encode($response);
    }
}