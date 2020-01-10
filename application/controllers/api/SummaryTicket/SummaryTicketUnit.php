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

    	$data = $this->module_model->getSummTicket();

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