<?php


defined('BASEPATH') OR exit('No direct script access allowed');
 require (APPPATH.'/libraries/REST_Controller.php');

class SummaryTicketTime extends REST_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('SummaryTicketModel','module_model');
    }

    public function SAgentPerformSkill_post(){

        $src = $this->security->xss_clean($this->input->post('search'));

        $data = $this->module_model->getSummaryAgentPerformSkill($src);

        echo json_encode($data);

    }

}
