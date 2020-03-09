<?php


defined('BASEPATH') OR exit('No direct script access allowed');
 require (APPPATH.'/libraries/REST_Controller.php');

class AuthController extends REST_Controller {

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
        // $this->load->library('REST_Controller','rest');
    }

    //not needed
    public function doLogout_post(){

       // $this->session->sess_destroy();
    
       if(!$this->input->post('username'))
       {
           $this->response([
               'status'  => FALSE,
               'message' => 'Lengkapi Kredensial anda.'
                   ], REST_Controller::HTTP_NOT_FOUND);
       }

       $user_id = $this->security->xss_clean($this->input->post('username'));

       $res = $this->module_model->logoutapp($user_id);
       
       if ($res) {
       // $this->session->set_userdata($res);
           $this->response([
               'status'  => TRUE,
               'message' => 'Logout sukses!',
               'data'    => $res
                   ], REST_Controller::HTTP_OK);
       }
       else {
           $this->response([
               'status'  => FALSE,
               'message' => 'Logout gagal, silahkan coba kembali!'
                   ], REST_Controller::HTTP_OK);
       }
    }

#region :: ragakasih
    //login
    public function doLogin_post(){
            
        if(!$this->input->post('username') || !$this->input->post('password'))
        {
            $this->response([
                'status'  => FALSE,
                'message' => 'Lengkapi Kredensial anda.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $user_id = $this->security->xss_clean($this->input->post('username'));
        $pwd = $this->security->xss_clean($this->input->post('password'));
        $res = $this->module_model->loginapp($user_id,$pwd);

        $this->module_model->generate_token($user_id);
        
        if ($res) {
        // $this->session->set_userdata($res);
            $this->response([
                'status'  => TRUE,
                'message' => 'Login sukses!',
                'data'    => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Login gagal, silahkan coba kembali!'
                    ], REST_Controller::HTTP_OK);
        }

    }
    //forgotpwd
    public function doForgotpassword_post() {

        // if (!$this->input->post()) {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => '404 Service Not Found.'
        //             ], REST_Controller::HTTP_NOT_FOUND);
        // }

        // if (!$this->module_model->checkId()) {
        //     $this->response([
        //         'status'  => FALSE,
        //         'message' => 'Nomor handphone anda belum terdaftar di aplikasi kami.'
        //             ], REST_Controller::HTTP_OK);
        // }


        $submit = $this->module_model->do_forgotpwd();

        if ($submit) {
            $this->response([
                'status'  => TRUE,
                'message' => '',
                'data'    => $submit
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Proses gagal, silahkan coba kembali!'
                    ], REST_Controller::HTTP_OK);
        }
    }
    //register
    public function doRegister_post() {



        if ($this->module_model->checkId()) {
                $this->response([
                    'status'  => FALSE,
                    'message' => 'Akun yang sama telah terdaftar pada aplikasi kami, silahkan cek kembali!'
                        ], REST_Controller::HTTP_OK);
            }

        $usr = $this->security->xss_clean($this->input->post('username'));
        $pwd = $this->security->xss_clean($this->input->post('password'));

        $data = $this->module_model->do_registeracc($usr,$pwd); // can use or not use params by directly take post data body requests

        if ($data) {
            // $this->session->set_userdata($res);
                $this->response([
                    'status'  => TRUE,
                    'message' => 'Registrasi akun sukses!',
                    'data'    => $data
                        ], REST_Controller::HTTP_OK);
            }
            else {
                $this->response([
                    'status'  => FALSE,
                    'message' => 'Registrasi akun gagal, Periksa kembali data anda!'
                        ], REST_Controller::HTTP_OK);
            }
    }

#Endregion

}

