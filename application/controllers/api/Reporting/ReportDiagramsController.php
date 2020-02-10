<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . 'libraries/REST_Controller.php';
  

    class ReportDiagramsController extends REST_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('ReportDiagramsModel', 'module_model');
        }
        
        public function ReportingDiagramsSC_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $t_start = $this->security->xss_clean($this->input->post('start_time'));
            $t_end = $this->security->xss_clean($this->input->post('end_time'));
            $meth = 'data';
            //token
            $res = $this->module_model->get_diagramsSC($tid,$t_start,$t_end,$meth);
    
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

       
    }
?>