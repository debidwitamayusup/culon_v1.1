<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

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
	public function index()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_pengajuan_dashboard');
	}

	public function v_login()
	{
		$this->load->view('login_temp/header');
		$this->load->view('v_login');
		$this->load->view('login_temp/footer');
	}

	public function v_home(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_pengajuan_dashboard');
	}

	public function v_pengajuan()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/body');
	}

	public function v_detil_pengajuan()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_detil_pengajuan');
	}

	public function v_approve_pengajuan()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_approve_pengajuan_cuti');
	}

	public function v_approve_pengajuan_hrd()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_approve_pengajuan_cuti_hrd');
	}

	public function v_detil_approval_pengajuan()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_detil_approval_pengajuan');
	}

	public function v_detil_approval_pengajuan_hrd()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_detil_approval_pengajuan_hrd');
	}

	public function add_user()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_add_user');
	}

	function pdf(){
		$this->load->helper('pdf_helper');
		/*
			---- ---- ---- ----
			your code here
			---- ---- ---- ----
		*/
		$this->load->view('pdfreport');
	}
	
}
