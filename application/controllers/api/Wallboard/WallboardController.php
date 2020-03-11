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

        $date = $this->security->xss_clean($this->input->post('date'));

        $params = $this->security->xss_clean($this->input->post('params'));
        $index = $this->security->xss_clean($this->input->post('index'));
        $params_year = $this->security->xss_clean($this->input->post('params_year'));
        $grup = $this->security->xss_clean($this->input->post('grup'));

        $res = $this->module_model->Traffic_ops($params,$index,$params_year,$grup);
        //$res2 =$this->module_model->T_id($params,$index,$params_year);
        
        $res2 =$this->module_model->Channel_data();
       // $res2 =$this->module_model->Channel_data();
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
                'message' => 'Not Found!',
                'data'    => array(),
                'channel' => array()
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function TrafficOPStop5_post(){
            
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
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

        $res = $this->module_model->Top5_opsdata($params,$index,$params_year,$tid);
    
        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $res,
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'data'    => array(),
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
                'message' => 'Not Found!',
                'data' => ''
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

    public function GetTennantFilter_post()
    {
        $date = $this->security->xss_clean($this->input->post('date'));
        $res = $this->module_model->Tenantscrfilter();

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

    public function SPOKIP_post()
    {
        $tanggal = $this->security->xss_clean($this->input->post('date'));
        $res = $this->module_model->getSPOstatsticket($tanggal);

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
                'message' => 'Not Found!',
                'data'    => []
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function GetInvalMonthTable_post()
    {
        $channels = $this->security->xss_clean($this->input->post('channel'));
        $month = $this->security->xss_clean($this->input->post('month'));
        

        $res = $this->module_model->get_traffic_interval_monthly($month,$channels);
        $res_timeval = $this->module_model->getalldateinmonth($month);
        // $tot = $this->module_model->getallagentpermonth($month);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'dates' => $res_timeval,
                // 'total_agent' => $tot,
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'dates' => 'EMPTY',
                // 'total_agent' => 'EMPTY',
                'data'    => 'EMPTY'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function GetBarchannelPerMonth_post()
    {
        $year = $this->security->xss_clean($this->input->post('params_year'));
        $month = $this->security->xss_clean($this->input->post('month'));

        $res = $this->module_model->getBarchannelPerMonth($month,$year);

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
                'message' => 'Not Found!',
                'dates' => 'EMPTY',
                'total_agent' => 'EMPTY',
                'data'    => 'EMPTY'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function WallboardMain_post()
    {
        //token

        $res = $this->module_model->WallboardMain();

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
                'message' => 'Not Found!',
                'data'    => 'EMPTY'
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


    public function DataTableNasional_post()
    {
        $data = $this->module_model->get_datatable_perform_nas();
        $channels = $this->module_model->get_channel_only();
        

        if ($data) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                'data'    => $data,
                'channels'=> $channels
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

    #region :: debi
    public function summaryTicketCloseWall_post()
    {
        $month = $this->security->xss_clean($this->input->post('index', true));
        $year = $this->security->xss_clean($this->input->post('params_year', true));
        //$channel = $this->security->xss_clean($this->input->post('channel_name', true));

        $res = $this->module_model->summaryTicketCloseWall($month, $year);
        // $res_timeval = $this->module_model->getalldateinmonth($month);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Data available!',
                // 'dates' => $res_timeval,
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Not Found!',
                'dates' => 'Not found',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function summaryPerformanceNasional_post()
    {
        $data = $this->module_model->summary_performance_nasional();
        
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

    public function summaryPerformanceNasionalDANK_post()
    {
        $data = $this->module_model->thomas_the_dank_engine();
    
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

    public function summaryPerformanceNasionalBar_post()
    {

        $data = $this->module_model->summary_performance_nas_bar();

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

    public function summaryPerformanceNasionalPie_post()
    {
        $data = $this->module_model->summary_performance_nas_pie();

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

    public function summaryPerformanceNasionalInterval_post()
    {
        $channel = $this->security->xss_clean($this->input->post('channel', true));
        $data = $this->module_model->get_interval_performance_nas();

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

    public function getAvaildatawallmon_post()
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));
        $data = $this->module_model->get_available_data_wallmon($tid);

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

    public function agentMonitoring_post()
    {
        
        $res = $this->module_model->getAgentMonitoringData();

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
                'message' => 'Not Found!',
                'dates' => 'Not found',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
    }
    #endregion debi

}