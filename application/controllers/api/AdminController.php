<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel','module_model');
    }

    public function listKaryawan(){
        $data = $this->module_model->listKaryawanApp();
        if($data != TRUE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan',
                'data'  => $data
            );
            echo json_encode($response);
        }
    }

    public function ubahPasswordUser(){
        $user_id = $this->security->xss_clean($this->input->post('id_user'));
        $pwd = $this->security->xss_clean($this->input->post('password'));
        $data = $this->module_model->ubahPasswordUserApp($user_id, $pwd);
        if($data = TRUE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'berhasil!'
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'gagal'
            );
            echo json_encode($response);
        }
    }
}

?>