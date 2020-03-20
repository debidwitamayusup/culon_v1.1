<?php


defined('BASEPATH') OR exit('No direct script access allowed');
 require (APPPATH.'/libraries/REST_Controller.php');

class SuperadminController extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('AuthModel','module_model');
    }

#region :: ragakasih


public function tntlst_post(){

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

    $res = $this->module_model->tenantdata();

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

public function addtnt_post()
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

    $id = $this->security->xss_clean($this->input->post('id'));
    $name = $this->security->xss_clean($this->input->post('name'));
    $group = $this->security->xss_clean($this->input->post('group'));

    $data2 = $this->module_model->tntchecker($id);
    if ($data2 = false) {
        $this->response([
            'status'  => TRUE,
            'message' => 'User Telah terdaftar!',
                ], REST_Controller::HTTP_OK);
    }

    $res = $this->module_model->addtnt($id,$name);

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
    // public function usrlst_post(){

    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $res = $this->module_model->userdata();

    //     if ($res) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'data found',
    //             'data' => $res
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Perubahan password gagal!'
    //                 ], REST_Controller::HTTP_OK);
    //     }

    // }

   

    // public function addusr_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $email = $this->security->xss_clean($this->input->post('email'));
    //     $username = $this->security->xss_clean($this->input->post('username'));
    //     $name = $this->security->xss_clean($this->input->post('name'));
    //     $phone = $this->security->xss_clean($this->input->post('phone'));
    //     $previlage = $this->security->xss_clean($this->input->post('previlage'));

    //     $data2 = $this->module_model->userchecker($username);
    //     if ($data2 = false) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'User Telah terdaftar!',
    //                 ], REST_Controller::HTTP_OK);
    //     }

    //     $res = $this->module_model->adduser($username,$name,$phone,$email,$previlage);

    //     if ($res) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'Berhasil menambahkan user!',
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Gagal menambahkan user!'
    //                 ], REST_Controller::HTTP_OK);
    //     }

    // }

    // public function changeusr_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $email = $this->security->xss_clean($this->input->post('email'));
    //     $username = $this->security->xss_clean($this->input->post('username'));
    //     $name = $this->security->xss_clean($this->input->post('name'));
    //     $phone = $this->security->xss_clean($this->input->post('phone'));
    //     $previlage = $this->security->xss_clean($this->input->post('previlage'));
      

    //     $data2 = $this->module_model->userchecker($username);

    //     if ($data2 == true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'User Telah terdaftar!',
    //                 ], REST_Controller::HTTP_OK);
    //     }

    //     $res = $this->module_model->changeuser($username,$name,$phone,$email,$previlage);

    //     if ($res = true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'Perubahan sukses',
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Perubahan gagal!'
    //                 ], REST_Controller::HTTP_OK);
    //     }

    // }

    // public function changeusrpwd_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

       
    //     $username = $this->security->xss_clean($this->input->post('username'));
        
    //     $data2 = $this->module_model->userchecker($username);

    //     if ($data2 == true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'User Telah terdaftar!',
    //                 ], REST_Controller::HTTP_OK);
    //     }

    //     $res = $this->module_model->changeuserpwd($username);

    //     if ($res = true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'Perubahan sukses',
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Perubahan gagal!'
    //                 ], REST_Controller::HTTP_OK);
    //     }

    // }

    // public function gettenantfilter_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $res = $this->module_model->tenantlist();

    //     if ($res) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'Data available!',
    //             'data'    => $res
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Not Found!'
    //                 ], REST_Controller::HTTP_OK);
    //     }
    // }

    // public function settenanttouser_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $username = $this->security->xss_clean($this->input->post('username'));
    //     $tenant = $this->security->xss_clean($this->input->post('tenant_id'));
    //     $data2 = $this->module_model->userchecker($username);

    //     if ($data2 == true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'User Telah terdaftar!',
    //                 ], REST_Controller::HTTP_OK);
    //     }

    //     $res = $this->module_model->assigntenanttouser($username,$tenant);

    //     if ($res = true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'Perubahan sukses',
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Perubahan gagal!'
    //                 ], REST_Controller::HTTP_OK);
    //     }
    // }

    // public function raincheck_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == true)
    //     {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => ' Welcome !!',
    //                 ], REST_Controller::HTTP_OK);
            
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }

    // public function remtenanttouser_post()
    // {
    //     $token = $_SERVER['HTTP_TOKEN'];
    //     if($token === NULL)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $data = $this->module_model->admin_checker($token);

    //     if($data == false)
    //     {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => '404 Not found.'
    //                 ], REST_Controller::HTTP_NOT_FOUND);
    //     }

    //     $username = $this->security->xss_clean($this->input->post('username'));

    //     $data2 = $this->module_model->userchecker($username);

    //     if ($data2 == true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'User Telah terdaftar!',
    //                 ], REST_Controller::HTTP_OK);
    //     }

    //     $res = $this->module_model->removetenanttouser($username);

    //     if ($res = true) {
    //         $this->response([
    //             'status'  => TRUE,
    //             'message' => 'Perubahan sukses',
    //                 ], REST_Controller::HTTP_OK);
    //     }
    //     else {
    //         $this->response([
    //             'status'  => FALSE,
    //             'message' => 'Perubahan gagal!'
    //                 ], REST_Controller::HTTP_OK);
    //     }
    // }

    // function upload_img($name){
        
    //     $config = array(
    //             'upload_path' => FCPATH.'public/user/',            
    //             'allowed_types' => "gif|jpg|png|jpeg",
    //             'max_size' => 2000,
    //             'max_width'=> 1500,
    //             'max_height' => 1500,  
    //             'file_name' => $name,       
    //             'overwrite' => TRUE
    //     );

    //     $this->load->library('upload',$config);
         
    //         if($this->upload->do_upload('image_user')) 
    //         {
    //             $upload_data = $this->upload->data();
    //             $file_name = $upload_data['file_name'];
    //             return $file_name;
    //         }
    //         else
    //         {
    //             return false;
    //         }
    // }

#Endregion

}

