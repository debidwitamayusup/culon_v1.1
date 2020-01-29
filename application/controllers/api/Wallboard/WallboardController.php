<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class WallboardController extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('WallboardModel', 'module_model');
    }

    public function SummaryTicketStatusNC_post(){
            
        // if(!$this->input->post('token'))
        // {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Token Not found,Loging off!'
        //             ], REST_Controller::HTTP_NOT_FOUND);
        // }

        $src = $this->security->xss_clean($this->input->post('src'));

        $res = $this->module_model->Op_Performance($src);
        
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function SummAllTicketStatusNC_post(){

        $res = $this->module_model->sumStat_NC();
        
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function TrafficOPS_post(){
            
        // if(!$this->input->post('token'))
        // {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Token Not found,Loging off!'
        //             ], REST_Controller::HTTP_NOT_FOUND);
        // }

        $date = $this->security->xss_clean($this->input->post('date'));

        $params = $this->security->xss_clean($this->input->post('params'));
        $index = $this->security->xss_clean($this->input->post('index'));
        $params_year = $this->security->xss_clean($this->input->post('params_year'));

        $res = $this->module_model->Traffic_ops($params,$index,$params_year);
        $res2 =$this->module_model->Channel_data();
        
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res,
                'channel' => $res2
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function TrafficOPSPieChart_post(){
            
        // if(!$this->input->post('token'))
        // {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Token Not found,Loging off!'
        //             ], REST_Controller::HTTP_NOT_FOUND);
        // }

        

        $params = $this->security->xss_clean($this->input->post('params'));
        $index = $this->security->xss_clean($this->input->post('index'));
        $params_year = $this->security->xss_clean($this->input->post('params_year'));

        $res = $this->module_model->scr_pie_chart_channel($params,$index,$params_year);
        
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function IntervalToday_post(){
            
        // if(!$this->input->post('token'))
        // {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Token Not found,Loging off!'
        //             ], REST_Controller::HTTP_NOT_FOUND);
        // }

        $params = $this->security->xss_clean($this->input->post('params'));
        $index = $this->security->xss_clean($this->input->post('index'));
        $params_year = $this->security->xss_clean($this->input->post('params_year'));
        $channel = $this->security->xss_clean($this->input->post('channel'));

        $res = $this->module_model->get_intervalchart($params,$index,$params_year,$channel);
        
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function SummPerformOps_post()
    {

        $src = $this->security->xss_clean($this->input->post('search'));
        $date = $this->security->xss_clean($this->input->post('date'));

        $res = $this->module_model->SummPerformOps($date,$src);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function SummStatusTicketOps_post()
    {

        $src = $this->security->xss_clean($this->input->post('search'));
        $date = $this->security->xss_clean($this->input->post('date'));

        $res = $this->module_model->SummStatusTicketOps($date,$src);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function GetTennantscr_post()
    {
        $date = $this->security->xss_clean($this->input->post('date'));
        $res = $this->module_model->Tenantscrget($date);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function GetInvalMonthTable_post()
    {
        $channels = $this->security->xss_clean($this->input->post('channel'));
        $month = $this->security->xss_clean($this->input->post('month'));

        $res = $this->module_model->get_traffic_interval_monthly($month,$channels);
        $res_timeval = $this->module_model->getalldateinmonth($month);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'dates' => $res_timeval,
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }
    }

//under const
    public function SummTicketC_post()
    {
        $res = $this->module_model->SummTicketC($months,$year);
        
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    // debi
    public function summaryTicketCloseWall_post()
    {
        $month = $this->security->xss_clean($this->input->post('index', true));
        $year = $this->security->xss_clean($this->input->post('params_year', true));
        $channel = $this->security->xss_clean($this->input->post('channel_name', true));

        $res = $this->module_model->summaryTicketCloseWall($month, $year);

        echo json_encode($res);
    }

}