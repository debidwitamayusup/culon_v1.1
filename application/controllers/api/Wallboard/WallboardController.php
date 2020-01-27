<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class WallboardController extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Wallboardmodel', 'module_model');
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
        $res = $this->module_model->Traffic_ops($date);
        
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

    public function TrafficOPSPieChart_post(){
            
        // if(!$this->input->post('token'))
        // {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Token Not found,Loging off!'
        //             ], REST_Controller::HTTP_NOT_FOUND);
        // }

        $date = $this->security->xss_clean($this->input->post('date'));
        $res = $this->module_model->scr_pie_chart_channel($date);
        
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

}