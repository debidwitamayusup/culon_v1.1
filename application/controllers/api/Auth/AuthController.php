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

        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL || $token == "")
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

       $user_id = $this->security->xss_clean($this->input->post('username'));

       $res = $this->module_model->logoutapp($token);
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

        $data = $this->module_model->usercheckempt($user_id);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => 'User has logged in!'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $res = $this->module_model->loginapp($user_id,$pwd);

        
        
        if ($res) {
        $tok = $this->module_model->generate_token($user_id);
            $this->response([
                'status'  => TRUE,
                'message' => 'Login sukses!',
                'token' => $tok,
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

    //update profile
    public function getdataupdate_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];

        if($token===NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => 'Lengkapi Kredensial anda.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $res = $this->module_model->getdataupdate($token);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'data ditemukan!',
                'data' => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan gagal!'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function updateprof_post(){

        $token = $_SERVER['HTTP_TOKEN'];

        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $pass = $this->security->xss_clean($this->input->post('password'));
        $phone = $this->security->xss_clean($this->input->post('phone'));

            
        if($token === NULL || $pass === NULL)
        {
            $this->response([
                'status'  => FALSE,
                // 'message' => 'Lengkapi Kredensial anda.'
                'message' => 'token pass kosong'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $check = $this->module_model->pwd_checker($token,$pass);
        
        if($check == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => 'pwd salah'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $tru = $this->upload_img($username.date('y'));

        if($tru==FALSE)
        {
            $this->response([
                'status'  => FALSE,
                'message' => 'image upload failed'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $res = $this->module_model->update_prof($token,$username,$email,$phone,$pass,$tru);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Perubahan sukses!',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan gagal!'
                    ], REST_Controller::HTTP_OK);
        }

    }
    
    public function updatepwd_post(){

        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => 'Lengkapi Kredensial anda.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $password = $this->security->xss_clean($this->input->post('password'));
        $newpwd = $this->security->xss_clean($this->input->post('new_password'));

        $res = $this->module_model->c_pwd($token,$password,$newpwd);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Perubahan password sukses!',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan password gagal!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function usrlst_post(){

        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $res = $this->module_model->userdata();

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'data found',
                'data' => $res
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan password gagal!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function addusr_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $previlage = $this->security->xss_clean($this->input->post('previlage'));

        $data2 = $this->module_model->userchecker($username);
        if ($data2 = false) {
            $this->response([
                'status'  => TRUE,
                'message' => 'User Telah terdaftar!',
                    ], REST_Controller::HTTP_OK);
        }

        $res = $this->module_model->adduser($username,$name,$phone,$email,$previlage);

        if ($res) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Berhasil menambahkan user!',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Gagal menambahkan user!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function changeusr_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $email = $this->security->xss_clean($this->input->post('email'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $previlage = $this->security->xss_clean($this->input->post('previlage'));
      

        $data2 = $this->module_model->userchecker($username);

        if ($data2 == true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'User Telah terdaftar!',
                    ], REST_Controller::HTTP_OK);
        }

        $res = $this->module_model->changeuser($username,$name,$phone,$email,$previlage);

        if ($res = true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Perubahan sukses',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan gagal!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function changeusrpwd_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

       
        $username = $this->security->xss_clean($this->input->post('username'));
        
        $data2 = $this->module_model->userchecker($username);

        if ($data2 == true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'User Telah terdaftar!',
                    ], REST_Controller::HTTP_OK);
        }

        $res = $this->module_model->changeuserpwd($username);

        if ($res = true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Perubahan sukses',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan gagal!'
                    ], REST_Controller::HTTP_OK);
        }

    }

    public function gettenantfilter_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $res = $this->module_model->tenantlist();

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

    public function settenanttouser_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $username = $this->security->xss_clean($this->input->post('username'));
        $tenant = $this->security->xss_clean($this->input->post('tenant_id'));
        $data2 = $this->module_model->userchecker($username);

        if ($data2 == true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'User Telah terdaftar!',
                    ], REST_Controller::HTTP_OK);
        }

        $res = $this->module_model->assigntenanttouser($username,$tenant);

        if ($res = true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Perubahan sukses',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan gagal!'
                    ], REST_Controller::HTTP_OK);
        }
    }

    public function raincheck_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == true)
        {
            $this->response([
                'status'  => TRUE,
                'message' => ' Welcome !!',
                    ], REST_Controller::HTTP_OK);
            
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function remtenanttouser_post()
    {
        $token = $_SERVER['HTTP_TOKEN'];
        if($token === NULL)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $data = $this->module_model->admin_checker($token);

        if($data == false)
        {
            $this->response([
                'status'  => FALSE,
                'message' => '404 Not found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
        }

        $username = $this->security->xss_clean($this->input->post('username'));

        $data2 = $this->module_model->userchecker($username);

        if ($data2 == true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'User Telah terdaftar!',
                    ], REST_Controller::HTTP_OK);
        }

        $res = $this->module_model->removetenanttouser($username);

        if ($res = true) {
            $this->response([
                'status'  => TRUE,
                'message' => 'Perubahan sukses',
                    ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status'  => FALSE,
                'message' => 'Perubahan gagal!'
                    ], REST_Controller::HTTP_OK);
        }
    }

    function upload_img($name){
        
        $config = array(
                'upload_path' => FCPATH.'public/user/',            
                'allowed_types' => "gif|jpg|png|jpeg",
                'max_size' => 2000,
                'max_width'=> 1500,
                'max_height' => 1500,  
                'file_name' => $name,       
                'overwrite' => TRUE
        );

        $this->load->library('upload',$config);
         
            if($this->upload->do_upload('image_user')) 
            {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                return $file_name;
            }
            else
            {
                return false;
            }
    }

#Endregion

}

