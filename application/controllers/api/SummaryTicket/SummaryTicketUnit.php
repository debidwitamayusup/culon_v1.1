<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH.'libraries/REST_Controller.php';

class SummaryTicketUnit extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('SummaryTicketModel','module_model');
    }

    public function getSummaryTicket(){
    	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		$index = $this->security->xss_clean($this->input->post('index', true));	// value params
		$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params

    	$data = $this->module_model->getSummTicket($params, $index, $params_year);

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

    public function getSummaryUnit(){
    	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		$index = $this->security->xss_clean($this->input->post('index', true));	// value params
		$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params

    	$data = $this->module_model->getSummUnit($params, $index, $params_year);

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

    public function getSummaryStatusperUnit(){
    	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		$index = $this->security->xss_clean($this->input->post('index', true));	// value params
		$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params
		
    	$data = $this->module_model->getSummStatusperUnit($params, $index, $params_year);

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

?>