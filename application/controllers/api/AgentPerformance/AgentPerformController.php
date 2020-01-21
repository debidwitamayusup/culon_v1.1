<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH.'libraries/REST_Controller.php';

class AgentPerformController extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('AgentPerformModel','module_model');
    }

#region :: Ragakasih
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
    public function getSTsallchannel(){

        $src = $this->security->xss_clean($this->input->post('search'));
        $params = $this->security->xss_clean($this->input->post('params'));// day /month /year
        $index = $this->security->xss_clean($this->input->post('index'));// date / month /year
        $params_year = $this->security->xss_clean($this->input->post('params_year'));// year
        $param_year = date('Y'); // year-month
        $data = $this->module_model->getSSallchannel($src,$params,$index,$params_year);
        
        echo json_encode($data);

    }
    public function getSAgentperformskill(){

        $src = $this->security->xss_clean($this->input->post('search'));
        $params = $this->security->xss_clean($this->input->post('params'));// AHT/ART/COF
        $params_time = $this->security->xss_clean($this->input->post('params_time'));
        $index = $this->security->xss_clean($this->input->post('index'));
        $params_year = $this->security->xss_clean($this->input->post('params_year'));

        $data = $this->module_model->getSAgentperformskills($src,$params, $params_time, $index, $params_year);

        echo json_encode($data);

    }
    public function getSAgentperformBYskill(){

        $src = $this->security->xss_clean($this->input->post('search'));
        $params = $this->security->xss_clean($this->input->post('params'));// AHT/ART/COF
        $index = $this->security->xss_clean($this->input->post('index'));
        $params_year = $this->security->xss_clean($this->input->post('params_year'));

        $data = $this->module_model->getSAgentperformByskill($params, $index, $params_year);

        $response = array(
                'status' => 200,
                'message' => 'Success',
                'data' => $data
            );
            echo json_encode($response);

        // echo json_encode($data);

    }
#endregion
}