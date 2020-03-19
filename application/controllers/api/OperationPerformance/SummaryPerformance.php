<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class SummaryPerformance extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SummaryPerformanceModel', 'module_model');
       
    }
#region :: raga

    public function summaryPerformanceDashboard_post()
    {
        #region :: TOKEN
        $token = $_SERVER['HTTP_TOKEN'];
            if($token===NULL)
            {
                $this->response([
                    'status'  => FALSE,
                    'message' => 'Lengkapi Kredensial anda.'
                        ], REST_Controller::HTTP_NOT_FOUND);
            }

            $res = $this->module_model->authceck($token);
            if($res == FALSE)
            {
                $this->response([
                    'status'  => FALSE,
                    'message' => '404 Not found.'
                        ], REST_Controller::HTTP_NOT_FOUND);
            }
    #endregion :: TOKEN

        $params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
        $params_year = $this->security->xss_clean($this->input->post('params_year', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));
        $offset = $this->security->xss_clean($this->input->post('offset', true));
        $limit = $this->security->xss_clean($this->input->post('limit', true));

        $data = $this->module_model->summary_performance_dashboard($params, $index, $params_year,$limit,$offset,$token);
        $amt = $this->module_model->summary_performance_dashboard($params, $index, $params_year,0 ,0 ,$token);

        if ($data) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data_amt' => count($amt),
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'dates' => 'Not found',
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function summaryPerformanceDashboardBar_post()
    {

        $params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
        $params_year = $this->security->xss_clean($this->input->post('params_year', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $data = $this->module_model->summary_performance_dash_bar($params,$index,$params_year,$tid);

        if ($data) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'dates' => 'Not found',
                'data'    => []
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function summaryPerformanceDashboardPie_post()
    {
        $params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
        $params_year = $this->security->xss_clean($this->input->post('params_year', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $data = $this->module_model->summary_performance_dash_pie($params,$index,$params_year,$tid);

        if ($data) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'dates' => 'Not found',
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function summaryPerformanceDashboardInterval_post()
    {
        $params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
        $params_year = $this->security->xss_clean($this->input->post('params_year', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $data = $this->module_model->get_interval_performance_dash($params,$index,$params_year,$tid);

        if ($data) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'dates' => 'Not found',
                'data'    => $data
                    ], REST_Controller::HTTP_OK);
        }
    }
#endregion raga
}