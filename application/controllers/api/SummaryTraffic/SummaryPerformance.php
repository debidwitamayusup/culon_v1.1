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
        $params = $this->security->xss_clean($this->input->post('params', true)); 
		$index = $this->security->xss_clean($this->input->post('index', true));
        $params_year = $this->security->xss_clean($this->input->post('params_year', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $data = $this->module_model->summary_performance_dashboard($params, $index, $params_year, $tid);

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