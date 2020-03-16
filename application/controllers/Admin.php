<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	// public function index()
	// {
	// 	$this->load->view('login_temp/header');
	// 	$this->load->view('v_login');
	// 	$this->load->view('login_temp/footer');
	// }

	public function admin_user(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar_admin');
		$this->load->view('v_user');
	}

}
