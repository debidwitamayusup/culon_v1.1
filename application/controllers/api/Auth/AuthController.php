<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
        $this->load->model('OperationModel');
        $this->load->model('AuthModel','module_model');
    }

    public function doLogin(){
        $tenant_id = $this->security->xss_clean($this->input->post('tenant_id', true));
        $this->session->set_userdata('tenant_id', $tenant_id);
        
        $response = array(
            'status' => 200,
            'message' => "success",
            'data' => $this->session->userdata('tenant_id')
        );

        echo json_encode($response);
    }

    public function doLogout(){
        
        $this->session->sess_destroy();
        
        $response = array(
            'status' => 200,
            'message' => "success",
            'data' => ''
        );

        echo json_encode($response);
    }

#region Raga

    public function doforgotpassword() {

        if (!$this->input->post()) {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Service Not Found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        if (!$this->module_model->checkId()) {
            $this->response([
                'status'  => FALSE,
                'message' => 'Nomor handphone anda belum terdaftar di aplikasi kami.'
                    ], REST_Controller::HTTP_OK);
        }

        // if ($this->module_model->driverCheckedReset()) {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Anda telah melakukan reset password sebelumnya, silahkan hubungi Admin untuk meminta password baru!'
        //             ], REST_Controller::HTTP_OK);
        // }

        $submit = $this->module_model->do_forgotpwd();

        if ($submit) {
            $this->response([
                'status'  => TRUE,
                'message' => ''
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Proses gagal, silahkan coba kembali!'
                    ], REST_Controller::HTTP_OK);
        }
    }
    
#Endregion

}

