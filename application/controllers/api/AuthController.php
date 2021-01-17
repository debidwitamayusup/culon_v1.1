<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('AuthModel','module_model');
    }


    public function doLogin(){
        if(!$this->input->post('id_user') || !$this->input->post('password'))
        {
            $response = array(
                'status'  => FALSE,
                'message' => 'Lengkapi Kredensial anda.'
            );
            echo json_encode($response);
            exit;
        }

        $user_id = $this->security->xss_clean($this->input->post('id_user'));
        $pwd = $this->security->xss_clean($this->input->post('password'));

        $data = $this->module_model->loginApp($user_id, $pwd);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Berhasil Login!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Username atau Password Salah!'
            );
            echo json_encode($response);
        }
    }

    public function getDropdownCuti(){
        $jenis_kelamin = $this->security->xss_clean($this->input->post('jenis_kelamin'));

        $data = $this->module_model->getDropdownCutiApp($jenis_kelamin);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }
    }

    public function updatepwd(){

        $password = $this->security->xss_clean($this->input->post('password'));
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));

        $data = $this->module_model->c_pwd($password,$nomorInduk);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data berhasil diubah!'
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data gagal diubah!'
            );
            echo json_encode($response);
        }

    }
}
?>